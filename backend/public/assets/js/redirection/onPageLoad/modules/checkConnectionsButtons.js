import { checkAdmin } from './functions/checkAdmin.js';
import { deleteOldConnections } from './functions/deleteOldConnections.js';

export function checkConnectionsButtons(dialog){
    const continueBtn = document.getElementById('continueBtn');
    continueBtn.addEventListener('click', async() => {
        await checkAdmin();
        dialog.close();
    });

    const deleteBtn = document.getElementById('deleteBtn');
    deleteBtn.addEventListener('click', () => {
        deleteOldConnections();
        dialog.close();
    });
}