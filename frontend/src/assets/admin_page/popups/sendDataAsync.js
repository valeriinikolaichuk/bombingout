export async function sendDataAsync(url, data) {
  fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  })
  .then(response => {
    if (!response.ok) throw new Error('Server error');
    return response.json();
  })
  .then(result => {
    console.log('Server response', result);
  })
  .catch(error => {
    console.error('Error sending data', error);

    const retryQueue = JSON.parse(localStorage.getItem('retryQueue') || '[]');
    retryQueue.push(data);
    localStorage.setItem('retryQueue', JSON.stringify(retryQueue));
  });
}