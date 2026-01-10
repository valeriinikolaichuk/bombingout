import { checkAdmin } from './functions/checkAdmin.js';
import { deleteOldConnections } from './functions/deleteOldConnections.js';

export function checkConnectionsButtons(dialog){
    const continueBtn = document.getElementById('continueBtn');
    continueBtn.addEventListener('click', () => {
        let statusValue = checkAdmin();

        if (statusValue !== 'not found'){
            const admin = document.querySelector('.admin');
            const adminBtn = admin.closest("div");
            adminBtn.style.backgroundColor = "rgb(200,200,200)";
        }

        dialog.close();
    });

    const deleteBtn = document.getElementById('deleteBtn');
    deleteBtn.addEventListener('click', () => {
        deleteOldConnections();
        dialog.close();
    });
}