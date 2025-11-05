ViewModelAttemptsPage.prototype.showSidePanel = function(){
    this.viewProt = Object.create(ViewAttemptsPage.prototype);
    this.tableValues = this.viewProt.getTableValues('tr[id^="tr"]');
    this.myPairs = this.getPairs(this.tableValues);
    this.setSidePanelsValues(this.myPairs);
}

ViewModelAttemptsPage.prototype.getPairs = function(tableValues, currAttempt = attempt, pairs = []){
    const maxAttempts = 4;
    if (pairs.length >= 3 || currAttempt > maxAttempts){
        return pairs.slice(0, 3);
    }

    let currentPairs = new Array();
    tableValues.forEach(row => {
        this.idInput = this.viewProt.getRow(row, 'input[id^="id_score"]');
        this.colorInput = this.viewProt.getRow(row, 'input[id^="attemptColor_'+currAttempt+'"]');
        this.liftInput = this.viewProt.getRow(row, `input[id^="${discipline}_${currAttempt}"]`);
        if (this.idInput && this.colorInput && this.liftInput){
            const mainId = this.idInput.value;
            const color = this.colorInput.value;
            const liftValue = this.liftInput.value;

            if (color === 'color: #000000;' && liftValue !== '0.0'){
                currentPairs.push({ id: mainId, lift: parseFloat(liftValue)});
            }
        }
    });

    currentPairs.sort((a, b) => a.lift - b.lift);

    for (let i = 0; i < currentPairs.length && pairs.length < 3; i++) {
        pairs.push(currentPairs[i]);
    }

    return this.getPairs(tableValues, currAttempt + 1, pairs);
}

ViewModelAttemptsPage.prototype.setSidePanelsValues = function(myPairs){
    this.oldValues = this.viewProt.getTableValues('.info');
    this.oldValues.forEach(el => {
        el.textContent = '';
    });

    this.oldValues = this.viewProt.getTableValues('.info_line');
    this.oldValues.forEach(el => {
        el.textContent = '';
    });

    this.mainIds = myPairs.map(item => item.id);
    this.liftValues = myPairs.map(item => item.lift);

    let num = 0;
    this.mainIds.forEach(id => {
        this.surnameNameCell = this.viewProt.getParticipantsRow(`td[data-name="${id}"]`).textContent;
        this.surnameNameRow = this.viewProt.getHtmlElem('surname_name'+num);
        this.surnameNameRow.textContent = this.surnameNameCell;
        this.liftValuesRow = this.viewProt.getHtmlElem('weight_value'+num);
        this.liftValuesRow.textContent = this.liftValues[num];

        let dataJson = JSON.stringify({ id: id });
        this.sendData(dataJson, num);

        ++num;
    });
}

ViewModelAttemptsPage.prototype.sendData = async function(dataJson, num){
    const responce = await fetch("assets/models_js/attempts_models/sidePanelData_json.php", {
        method: 'POST',
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
           },
        body: dataJson
    });

    if (!responce.ok){
        throw new Error('error by path: ');
    }

    let serverResponce = await responce.json();
    this.setSidePanelsData(serverResponce, num);

    return serverResponce;
}

ViewModelAttemptsPage.prototype.setSidePanelsData = function(serverResponce, num){
    const keys = {};
    const data = serverResponce[0];

    for (const key in data){
        keys[`${key}Key`] = key;
        this.sidePanelElement = this.viewProt.getHtmlElem(keys[`${key}Key`]+num);
        if (this.sidePanelElement) {
            this.sidePanelElement.textContent = data[key] !== null ? data[key] : '';          
        }
    }

    const trenerValues = [
        data.trener_1,
        data.trener_2,
        data.trener_3,
        data.trener_4
    ];

    const hasTreners = trenerValues.some(v => v != null && String(v).trim() !== '');
    this.sidePanelElement = this.viewProt.getHtmlElem('info_treners'+num);

    if (this.sidePanelElement){
        if (hasTreners){
            switch (lang){
                case 'en':
                    this.sidePanelElement.textContent = "trener(s):";
                    break;
                case 'uk':
                    this.sidePanelElement.textContent = "тренер(и):";
                    break;
                default:
                    this.sidePanelElement.textContent = "trener(y):";
            }
        } else {
            this.sidePanelElement.textContent = "";
        }
    }
}