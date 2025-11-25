async function checkSessionData(){
    let data = {
            id_user: window.appData.num
        };


    let response = await fetch("/api/showConnections", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    })

    if (!response.ok){
        throw new Error("error by path: assets/models_js/redirection_models/checkSession_json.php");
    }

    let previousClient = await response.json();

    if (previousClient.length === 0) {
        const messages = {
            en: "Connection established",
            uk: "3'єднання встановлено",
            pl: "Połączenie zostało nawiązane"
        };

        alert(messages[lang]);
    } else {
        const messages = {
            en: " A connection already exists. \n Establish a new connection? (the session will be terminated) - Y \n Continue the existing session - N",
            uk: " 3'єднання вже існує. \n Встановити нове з'єднання? (сесію буде знищено) - Y \n Продовжити існуючу сесію - N",
            pl: " Połączenie już istnieje. \n Nawiązać nowe połączenie? (sesja zostanie usunięta) - Y \n Kontynuować istniejącą sesję - N"
        };

        let choice = confirm(messages[lang]);

        if (choice){
            let response = await fetch("assets/models_js/redirection_models/deleteOldSession_json.php", {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify(data)
            })

            if (!response.ok){
                throw new Error("error by path: assets/models_js/redirection_models/deleteOldSession_json.php");
            }

            let tableData = await response.json();

            if (tableData == 'ok'){
                const messages = {
                    en: "Connection established",
                    uk: "3'єднання встановлено",
                    pl: "Połączenie zostało nawiązane" 
                };

                alert(messages[lang]);
            } else {
                alert("error: not deleted");
            }
            console.log("Session deleted");
        } else {
            console.log("Session continued");
        }
    }
}