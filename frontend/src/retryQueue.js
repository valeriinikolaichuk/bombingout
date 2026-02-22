let isSyncing = false;

export async function retryQueuedRequests(maxRetries = 5) {
  if (isSyncing) return;
  isSyncing = true;

  const queued = await db.syncQueue
    .where('status')
    .equals('pending')
    .toArray();

  for (const request of queued){
    if (request.retries >= maxRetries) {
      await db.syncQueue.update(request.id, { status: 'failed' });
      continue;
    }

    await db.syncQueue.update(request.id, { status: 'syncing' });

    try {
      const res = await fetch(request.endpoint, {
        method: request.method,
        credentials: "include",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            ...request.payload,
            actionId: request.actionId
        }),
      });

      if (!res.ok) throw new Error(`Server returned ${res.status}`);

      await db.syncQueue.delete(request.id);

      console.log(`Action ${request.actionType} (${request.actionId}) synced successfully`);
    } catch (e) {
      await db.syncQueue.update(request.id, {
        status: 'pending',
        retries: (request.retries || 0) + 1,
      });

      console.warn(`Action ${request.actionType} (${request.actionId}) failed, retry count: ${request.retries + 1}`);
    } finally { 
        isSyncing = false; 
    }
  }
}