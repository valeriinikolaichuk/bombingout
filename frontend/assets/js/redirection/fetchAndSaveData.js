import { db } from '../../db.js';

export async function fetchAndSaveData(usersId) {
  try {
    const res = await fetch(`/api/getCompetitionData`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        dataType: 'getAll',
        usersId: usersId
      })
    });

    if (!res.ok) throw new Error(`Server returned ${res.status}`);

    const data = await res.json();

    if (!data || typeof data !== 'object') {
      throw new Error('Invalid response format');
    }

    const now = Date.now();

    await db.transaction('rw', 
      db.competitions,
      db.main_table,
      db.sessions_table,
      async () => {

      const withUpdatedAt = (items = []) =>
        items.map(i => ({
          ...i,
          updatedAt: i.updatedAt || now,
          event_id: crypto.randomUUID()
        }));

        await db.competitions.bulkPut(withUpdatedAt(data.competitions));
        await db.main_table.bulkPut(withUpdatedAt(data.mainTable));
        await db.sessions_table.bulkPut(withUpdatedAt(data.sessions));
      }
    );

    console.log(`Saved to IndexedDB`);
  } catch (err) {
    console.error('Failed to fetch/get data:', err);
  }
}