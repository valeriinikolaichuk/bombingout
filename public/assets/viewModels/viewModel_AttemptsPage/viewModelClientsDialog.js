function ViewModelClientsDialog(view){
    this.viewClientsDialog = view;
}

ViewModelClientsDialog.prototype.getClientsData = function(){
    let url = "assets/models_js/attempts_models/clientsDialog_json.php";
    let dataJson = JSON.stringify(compID);
    this.sendJsonData(url, dataJson);
}

ViewModelClientsDialog.prototype.sendJsonData = async function(url, dataJson){
    const responce = await fetch(url, {
        method: 'POST',
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
           },
        body: dataJson
    });

    if (!responce.ok){
        throw new Error('error by path: '+url);
    }

    let serverResponce = await responce.json();

    if (url == "assets/models_js/attempts_models/clientsDialog_json.php"){
        this.showClients(serverResponce);
    }

    return serverResponce;
}

ViewModelClientsDialog.prototype.showClients = function(serverResponce){
    let langDataSet = new Array();
    serverResponce.forEach((item, index) => {
        const row = document.createElement("tr");

        const tdNum = document.createElement("td");
        tdNum.textContent = index + 1;
        tdNum.id = `row${index + 1}_num`;
        tdNum.style = "background-color: rgba(183, 183, 255, 1);";

        const td1 = document.createElement("td");
        td1.textContent = item.id_status;
        td1.id = `row${index+1}-id_status`;
        td1.style = "display: none";

        const td2 = document.createElement("td");
        td2.textContent = item.comp_status;
        td2.id = `row${index+1}-comp_status`;
        td2.style = "background-color: rgba(183, 183, 255, 1);";

        langDataSet = this.switchStatusLang(item.comp_status);
        if (langDataSet){
            td2.dataset.en = langDataSet[0];
            td2.dataset.uk = langDataSet[1];
            td2.dataset.pl = langDataSet[2];
        }

        const tdSelect = document.createElement("td");
        tdSelect.style = "background-color: rgba(183, 183, 255, 1);";
        const select = document.createElement("select");
        select.style = "width: 200px; background-color: rgba(183, 183, 255, 1);";
        select.name = "new_comp_status";

        ["scoreboard", "order", "bars", "information", "timer"].forEach(optValue => {
            const option = document.createElement("option");
            option.value = optValue;
            option.textContent = optValue;

            langDataSet = this.switchStatusLang(optValue);
            if (langDataSet){
                option.dataset.en = langDataSet[0];
                option.dataset.uk = langDataSet[1];
                option.dataset.pl = langDataSet[2];
            }

            if (item.comp_status === optValue){
                option.selected = true;
            }

            select.appendChild(option);
        });

        tdSelect.appendChild(select);

        const tdButton = document.createElement("td");
        tdButton.style = "width: 200px; background-color: rgba(183, 183, 255, 1); text-align: center;";
        const button = document.createElement("button");
        button.type = "button";
        button.textContent = "CHANGE";
        button.dataset.en = "CHANGE";
        button.dataset.uk = "ЗМІНИТИ";
        button.dataset.pl = "ZMIEŃ";

        button.addEventListener("click", () => {
            const idStatus = row.querySelector(`#row${index + 1}-id_status`).textContent;
            const selectElem = row.querySelector("select[name='new_comp_status']");
            const newStatus = selectElem.value;
            const dataArr = [idStatus, newStatus];
            const serverResponce = this.getSelectedData(dataArr);

            if (serverResponce != false){
                const tdCompStatus = row.querySelector(`#row${index + 1}-comp_status`);
                tdCompStatus.textContent = newStatus;

                const langDataSet = this.switchStatusLang(newStatus);
                if (langDataSet) {
                    tdCompStatus.dataset.en = langDataSet[0];
                    tdCompStatus.dataset.uk = langDataSet[1];
                    tdCompStatus.dataset.pl = langDataSet[2];
                }

                switchLanguage(lang);
            }
        });

        tdButton.appendChild(button);

        row.appendChild(tdNum);
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(tdSelect);
        row.appendChild(tdButton);

        this.viewClientsDialog.clientsTbody.appendChild(row);
    });

    switchLanguage(lang);
}

ViewModelClientsDialog.prototype.switchStatusLang = function(comp_status){
    let langDataSet = new Array();
    switch (comp_status){
        case "scoreboard":
            langDataSet[0] = "SCOREBOARD";
            langDataSet[1] = "ПРОТОКОЛ ЗМАГАНЬ";
            langDataSet[2] = "PROTOKÓŁ ZAWODÓW";
            break;
        case "order":
            langDataSet[0] = "LIFTING ORDER";
            langDataSet[1] = "ПОРЯДОК ВИХОДУ";
            langDataSet[2] = "KOLEJNOŚĆ PODEJŚĆ";
            break;
        case "bars":
            langDataSet[0] = "DISCS SEQUENCE";
            langDataSet[1] = "ПОРЯДОК ДИСКІВ";
            langDataSet[2] = "KOLEJNOŚĆ TALERZY";
            break;
        case "information":
            langDataSet[0] = "INFORMATION";
            langDataSet[1] = "ІНФОРМАЦІЯ";
            langDataSet[2] = "INFORMACJA";
            break;
        case "timer":
            langDataSet[0] = "TIMER";
            langDataSet[1] = "ТАЙМЕР";
            langDataSet[2] = "TIMER";
            break;       
    }

    return langDataSet;
}

ViewModelClientsDialog.prototype.getSelectedData = async function(dataArr){
    let url = "assets/models_js/attempts_models/changeClientsData_json.php";
    let dataJson = JSON.stringify(dataArr);
    const serverResponce = await this.sendJsonData(url, dataJson);

    if (!serverResponce || serverResponce.length === 0) {
        console.error("Server response is empty:", serverResponce);
        return false;
    }

    if (serverResponce.error) {
        console.error("Server returned error:", serverResponce.error);
        return false;
    }

    return serverResponce;
}