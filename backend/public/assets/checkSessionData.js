async function checkSessionData(){
    let data = {
            id_user: num,
            id_status : num_st
        };

    let response = await fetch("/api/check_session", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    })

    if (!response.ok){
        throw new Error("error by path: /api/check_session");
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
        if (lang != previousClient["lang"]){
            lang = previousClient["lang"];

            dataLang = {
                newLang: lang,
                id_status : num_st
            };
        
            let response = await fetch("assets/models_js/redirection_models/changeLanguage_json.php", {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify(dataLang)
            })

            if (!response.ok){
                throw new Error("error by path: assets/models_js/redirection_models/changeLanguage_json.php");
            }

            changedLang = await response.json();
            console.log("current language: "+changedLang);
        }

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