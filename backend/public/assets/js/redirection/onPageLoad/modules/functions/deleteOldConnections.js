import { checkConnectionsData } from '../../checkConnectionsData.js';

export async function deleteOldConnections(){
    let data = {
        usersId: window.appData.num,
        id_status: window.appData.num_st,
        hasDeleteCriteria: 'delete all by usersId'
    };

    let response = await fetch("/api/deleteConnection", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    })

    if (!response.ok){
        throw new Error("error by path: /api/deleteConnection");
    }

    let tableData = await response.json();

    if (tableData == 'ok'){
        const message = {
            en: "Connections have been deleted",
            uk: "3'єднання видалені",
            pl: "Połączenia zostały usunięte" 
        };

        alert(message[window.appData.lang]);
    } else {
        alert("error: not deleted");
    }

    checkConnectionsData();
}
