import { checkAdmin } from './functions/checkAdmin.js';
import { deleteOldConnections } from './functions/deleteOldConnections.js';

export function checkConnectionsButtons(dialog){
    const continueBtn = document.getElementById('continueBtn');
    const deleteBtn = document.getElementById('deleteBtn');

    continueBtn.replaceWith(continueBtn.cloneNode(true));
    deleteBtn.replaceWith(deleteBtn.cloneNode(true));

    const newContinueBtn = document.getElementById('continueBtn');
    const newDeleteBtn = document.getElementById('deleteBtn');

    newContinueBtn.addEventListener('click', async() => {
        await checkAdmin();
        dialog.close();
    });

    newDeleteBtn.addEventListener('click', () => {
        deleteOldConnections();
        dialog.close();
    });
}