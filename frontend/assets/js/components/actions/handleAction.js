export async function handleAction(id, actions, appData) {
    if (!actions[id]) {
        console.log(`Action "${id}" not found`);
        return;
    }

    let data = {
        lang: appData.lang,
        id_user: appData.num,
        id_status: appData.num_st,
        status: appData.status,
        type: id
    };

        let response = await fetch("/api/goBackToPage", {
        method: "POST",
        credentials: "include",
        headers: {"Content-Type": "application/json", 
            "Accept": "application/json"},
        body: JSON.stringify(data)
    });

    if (!response.ok){
        throw new Error('error by path: /api/goBackToPage');
    }

    let result = await response.json();

    if (result.success && result.message == "go back to page"){
        window.location.href = actions[id];
    } else {
        console.log('Returning error: '+id);
    }
}