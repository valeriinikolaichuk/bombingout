export async function retryQueuedRequests() {
    const retryQueue = JSON.parse(
        localStorage.getItem('retryQueue') || '[]'
    );

    if (!retryQueue.length) return;

    const failed = [];

    for (const data of retryQueue){
        try{
            const res = await fetch('/api/createCompetition', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            });

            if (!res.ok) throw new Error('Server error');

            console.log('Retry success');
        } catch (e){
            failed.push(data);
        }
    }

    if (failed.length){
        localStorage.setItem('retryQueue', JSON.stringify(failed));
    } else {
        localStorage.removeItem('retryQueue');
    }
}