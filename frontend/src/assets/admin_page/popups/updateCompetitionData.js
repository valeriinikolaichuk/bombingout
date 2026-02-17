export async function updateCompetitionData() {

  const actions = await db.syncQueue.orderBy('createdAt').toArray();

  for (const action of actions) {
    try {
      let response = await fetch('/api/updateCompetitionData', 
      {
        method: "POST",
        credentials: "include",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            ...action.payload,
            actionId: action.actionId
          })
      });

      if (!response.ok){
        throw new Error('error by path: /api/updateCompetitionData');
      }

      let result = await response.json();

      if (result.success && result.compID){
  //      alert(competitionCreated[lang]);
  //      onClose();

        await db.syncQueue.delete(action.id);
      }
    } catch (error) {
      console.error('Error updating competition data:', error);
    }
  //  const html = await response.json();

  //  const root = document.getElementById('page-root');
  //      if (root) {
  //        root.innerHTML = html;
  }
}