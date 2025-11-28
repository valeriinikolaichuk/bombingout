import { checkConnectionsData } from './checkConnectionsData.js';

export async function deleteOldConnections(){
    let data = {
        id_user: window.appData.num
    };

    let response = await fetch("/api/delete_old_connections", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    })

    if (!response.ok){
        throw new Error("error by path: /api/delete_old_connections");
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
