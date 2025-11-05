ViewModelMainPage.prototype.sendData = async function(url, dataJson){
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
    this.serverResponceRouter(serverResponce, dataJson);
    return serverResponce;
}

ViewModelMainPage.prototype.serverResponceRouter = function(serverResponce, dataJson){
    switch (serverResponce){
        case 'the competition was created':
            if (lang === 'uk'){
                alert('змагання було створено');
            } else if (lang === 'pl'){
                alert('zawody zostały utworzone');
            } else {
                alert(serverResponce);
            }

            this.dialogsValues.dialogCreate.close();
            window.location.href = "admin.php";
            break;
        case 'the competition data has been updated':
            if (lang === 'uk'){
                alert('дані про змагання було змінено');
            } else if (lang === 'pl'){
                alert('zawodowe dane zostały zmienione');
            } else {
                alert(serverResponce);
            }

            let dataChanged = JSON.parse(dataJson);

            competition_Name[this.index] = dataChanged[0][1];
            coUntry[this.index] = dataChanged[1][1];
            cIty[this.index] = dataChanged[2][1]; 
            start_Date[this.index] = dataChanged[3][1]; 
            end_Date[this.index] = dataChanged[4][1];
            diVision[this.index] = dataChanged[5][1];
            sEx[this.index] = dataChanged[6][1];
            age_Group[this.index] = dataChanged[7][1];
            tYpe[this.index] = dataChanged[8][1]; 
            categorIes[this.index] = dataChanged[9][1];

            this.previousCompName = dataChanged[0][1];
            this.idOfPreviousComp = dataChanged[10][1];

            this.viewButtons.currentForm.innerHTML = "";

            let inputOne = document.createElement("input");
            inputOne.type = "hidden";
            inputOne.name = "compNumber";
            inputOne.value = this.idOfPreviousComp;

            let inputTwo = document.createElement("input");
            inputTwo.type = "hidden";
            inputTwo.name = "compNAME";
            inputTwo.value = this.previousCompName;

            let submitForm = document.createElement("button");
            submitForm.type = "submit";
            submitForm.className = "btn-block";
            submitForm.style.backgroundColor = "rgb(255, 255, 215)";
            submitForm.textContent = this.previousCompName;

            this.viewButtons.currentForm.appendChild(inputOne);
            this.viewButtons.currentForm.appendChild(inputTwo);
            this.viewButtons.currentForm.appendChild(submitForm);

            this.viewButtons.initOpenList(this.setButtonsValues);
            this.compInfoAndPopupsValues(this.idOfPreviousComp, this.previousCompName, dataChanged[1][1], dataChanged[2][1], dataChanged[3][1], dataChanged[4][1], dataChanged[5][1], dataChanged[6][1], dataChanged[7][1], dataChanged[8][1], dataChanged[9][1]);
            this.dialogsValues.dialogCreate.close();
            break;
        case 'the nomination already exists':
            if (lang === 'uk'){
                alert('номінація вже існує');
            } else if (lang === 'pl'){
                alert('nominacja już istnieje');
            } else {
                alert(serverResponce);
            }

            this.unsetButtonsValues();
            this.dialogsValues.compInfoDiv.innerHTML = '';
            switchLanguage(lang);
            this.dialogsValues.dialogAddNom.close();
            break;
        case 'open nomin modal':
            this.dialogsValues.dialogAddNom.showModal();
            break;
        case 'the nomination was created':
            if (lang === 'uk'){
                alert('номінацію було створено');
            } else if (lang === 'pl'){
                alert('nominacja została utworzona');
            } else {
                alert(serverResponce);
            }

            this.dialogsValues.dialogAddNom.close();
            break;
        case 'the competition was deleted':
            if (lang === 'uk'){
                alert('змагання було видалено');
            } else if (lang === 'pl'){
                alert('zawody zostały usunięte');
            } else {
                alert(serverResponce);
            }

            this.unsetButtonsValues();
            let currCompId = JSON.parse(dataJson);
            this.viewButtons.deleteCurrentComp(currCompId);
            this.viewButtons.deleteCurrComp.remove();
            this.dialogsValues.compInfoDiv.innerHTML = '';
            switchLanguage(lang);

            if (typeof compID !== "undefined") {
                if (compID == currCompId){
                    window.location.href = "admin.php";
                }
            }

            break;
        case 'the participant was deleted':
            if (lang === 'uk'){
                alert('учасника було видалено');
            } else if (lang === 'pl'){
                alert('uczestnik został usunięty');
            } else {
                alert(serverResponce);
            }

            this.vmMainTable = new ViewModelMainTable();
            this.vmMainTable.rightClickOff();
            let dataId = JSON.parse(dataJson);

            this.viewMTPrototype = Object.create(InitViewMainTable.prototype);
            this.viewMTPrototype.newElement('tr', dataId['mainId']).remove();
            this.viewMTPrototype.getTbody();
            this.vmMainTable.newNumber(this.viewMTPrototype.tableNumber);
            break;
        default:
            this.vmMainTableGetData = Object.create(ViewModelMainTable.prototype);
            this.vmMainTableGetData.getData(serverResponce);
    }
}