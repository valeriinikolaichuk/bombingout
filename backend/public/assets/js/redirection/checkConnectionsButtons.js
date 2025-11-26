function checkConnectionsButtons(){
    const dialog = document.getElementById('connectionDialog');

    const continueBtn = document.getElementById('continueBtn');
    continueBtn.addEventListener('click', () => {
        dialog.close();
    });

    const deleteBtn = document.getElementById('deleteBtn');
    deleteBtn.addEventListener('click', () => {
        deleteOldConnections();
        dialog.close();
    });
}