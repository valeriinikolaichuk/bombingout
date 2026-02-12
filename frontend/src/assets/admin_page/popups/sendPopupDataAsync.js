export async function sendPopupDataAsync(url, data) {
  let response = await fetch(url, {
    method: "POST",
    credentials: "include",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify(data)
  });

  if (!response.ok){
    throw new Error('error by path: '+url);
  }

  const html = await response.json();

  const root = document.getElementById('page-root');
      if (root) {
        root.innerHTML = html;

}