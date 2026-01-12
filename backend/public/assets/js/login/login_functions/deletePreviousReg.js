import { deleteMessage } from './modules/deleteMessage.js';

export function deletePreviousReg(){
    const dialogContinue = document.getElementById("dialogContinue");
    dialogContinue.addEventListener('click', () => {
        document.getElementById("loginDialog").close();
    });

    const dialogDelete = document.getElementById("dialogDelete");
    dialogDelete.addEventListener('click', async  function() {
        let data = {
            usersId: document.getElementById("usersId").value,
            usersIp: document.getElementById("usersIp").value,
            usersAgent: document.getElementById("usersAgent").value,
            hasDeleteCriteria: 'del previous registration'
        };

        let response = await fetch("/api/deleteConnection", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(data)
        });

        if (!response.ok){
            throw new Error('error by path: /api/deleteConnection');
        }

        let json = await response.json();

        document.getElementById("loginDialog").close();

        let mess = deleteMessage(json);
        alert(mess);
    });
}
