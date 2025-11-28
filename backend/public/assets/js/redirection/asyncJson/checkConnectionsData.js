import { showConnections } from './modules/showConnections.js';
import { dialogContent } from './modules/dialogContent.js';

const dialog = document.getElementById('connectionDialog');

export async function checkConnectionsData(){
    let data = {
        id_user: window.appData.num
    };

    let response = await fetch("/api/showConnections", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    })

    if (!response.ok){
        throw new Error("error by path: /api/showConnections");
    }

    let json = await response.json();

    if (!json.success){
        alert(json.message);
        return;
    }

    showConnections(json);
    dialogContent(window.appData.lang);
    dialog.showModal();
}