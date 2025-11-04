const socket = io('http://localhost:3000', { query: { id_status } });

socket.on('tableUpdated', () => {
    console.log('Table updated for id_status:', id_status);
    location.reload();
});