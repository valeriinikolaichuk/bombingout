function ViewModelAttemptsPage(){
    this.applyHeight = this.applyHeight.bind(this);
    this.showSession = this.showSession.bind(this);
    this.showDiscAtt = this.showDiscAtt.bind(this);
    this.getPairs = this.getPairs.bind(this);
    this.getInputs = this.getInputs.bind(this);
    this.getAttemptsData = this.getAttemptsData.bind(this);
    this.rightClickOff = this.rightClickOff.bind(this);
    this.rightClick = this.rightClick.bind(this);
    this.rightClickCancelOff = this.rightClickCancelOff.bind(this);
    this.rightClickCancel = this.rightClickCancel.bind(this);
}

ViewModelAttemptsPage.prototype.applyHeight = function(footer, tableWrapper, sidePanel){
    if (footer.scrollHeight > 100){ 
        footer.style.height = 150 + 'px';
        tableWrapper.style.height = 'calc(100vh - 188px)';
        sidePanel.style.height = 'calc(100vh - 188px)';
    } else if (footer.scrollHeight > 70){
        footer.style.height = 100 + 'px';
        tableWrapper.style.height = 'calc(100vh - 140px)';
        sidePanel.style.height = 'calc(100vh - 140px)';
    }
}

ViewModelAttemptsPage.prototype.showSession = async function(buttons, btn, disciplineButtons, attemptButtons, disciplineBtn, attemptBtn){
    disciplineButtons.forEach(b => {
        b.style.backgroundColor = '';
    });

    attemptButtons.forEach(b => {
        b.style.backgroundColor = '';
    });

    disciplineBtn.setAttribute('style', 'background-color: rgba(112, 112, 254, 1);');
    attemptBtn.setAttribute('style', 'background-color: rgba(112, 112, 254, 1);');

    buttons.forEach(b => {
        b.style.backgroundColor = '';
        b.removeAttribute('data-session');
    });

    btn.style.backgroundColor = 'yellow';
    btn.setAttribute('data-session', '');

    const text = btn.textContent;
    let url = "assets/models_js/attempts_models/sessionsDataAttempts_json.php";

    let values = await this.sendJson(url, text);
    this.createTableRows(values);

    if (attempt > 2){
        url = "assets/models_js/attempts_models/addSessionsDataAttempts_json.php";
        let valuesNext = await this.sendJson(url, text);

        if (Array.isArray(valuesNext)){
            this.createNextTableRows(valuesNext);
        } else if (typeof valuesNext === "string" && valuesNext === "no groups found") {
            console.log(valuesNext);
        }
    }
}

ViewModelAttemptsPage.prototype.showDiscAtt = async function(btn, buttons, text){
    buttons.forEach(b => {
        b.style.backgroundColor = '';
    });

    btn.setAttribute('style', 'background-color: rgba(112, 112, 254, 1);');

    let url = "assets/models_js/attempts_models/sessionsDataAttempts_json.php";
    let values = await this.sendJson(url, text);
    this.createTableRows(values);

    if (attempt > 2){
        url = "assets/models_js/attempts_models/addSessionsDataAttempts_json.php";
        let valuesNext = await this.sendJson(url, text);

        if (Array.isArray(valuesNext)){
            this.createNextTableRows(valuesNext);
        } else if (typeof valuesNext === "string" && valuesNext === "no groups found") {
            console.log(valuesNext);
        }
    }
}

ViewModelAttemptsPage.prototype.sendJson = async function(url, text){
    const responce = await fetch(url, {
        method: 'POST',
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
           },
        body: JSON.stringify({
                compID: compID,
                sessions_name: text,
                discipline: discipline,
                attempt: attempt
            })
    });

    if (!responce.ok){
        throw new Error('error by path: '+url);
    }

    let serverResponce = await responce.json();
    return serverResponce;
}

ViewModelAttemptsPage.prototype.createTableRows = function(data){
    this.viewProt = Object.create(ViewAttemptsPage.prototype);
    this.tableNext = this.viewProt.getTable('next_group');
    this.tableNext.innerHTML = '';

    this.tabLe = this.viewProt.getTable('current_group');
    this.tabLe.querySelectorAll('tr.dynamic-row').forEach(tr => tr.remove());

    data.forEach((row, index) => {
        const tr = document.createElement('tr');
        tr.classList.add('dynamic-row');
        tr.id = `tr${index}`;

        const tdHidden = document.createElement('td');
        tdHidden.style.display = 'none';

        const inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.id = `id_score${index}`;
        inputHidden.name = 'main_id_score';
        inputHidden.setAttribute('value', row.main_id);

        tdHidden.appendChild(inputHidden);
        tr.appendChild(tdHidden);

        const tdN = document.createElement('td');
        tdN.style.textAlign = 'center';
        tdN.textContent = index + 1;
        tr.appendChild(tdN);

        const tdName = document.createElement('td');
        tdName.dataset.name = row.main_id;
        tdName.textContent = row.surname_name;
        tr.appendChild(tdName);

        const tdWeight = document.createElement('td');
        tdWeight.style.textAlign = 'center';
        tdWeight.textContent = row.bodyweight;
        tr.appendChild(tdWeight);

        const tdCategory = document.createElement('td');
        tdCategory.style.textAlign = 'center';
        tdCategory.textContent = row.category;

        const inputCategory = document.createElement('input');
        inputCategory.id = `num${index}`;
        inputCategory.type = 'hidden';
        inputCategory.name = 'category_num';
        inputCategory.setAttribute('value', row.category_num);

        tdCategory.appendChild(inputCategory);
        tr.appendChild(tdCategory);

        const tdLot = document.createElement('td');
        tdLot.style.textAlign = 'center';
        tdLot.textContent = row.lot;
        tr.appendChild(tdLot);

        for (let i = 1; i <= 4; i++) {
            const attemptValue = row[`${discipline}_${i}`];
            const attemptStyle = row[`${discipline}_${i}_CSS`];

            const td = document.createElement('td');
            td.id = `attempt${i}${index}`;
            td.style.backgroundColor = 'rgba(252,252,234,1)';
            td.style.textAlign = 'center';

            const hiddenColor = document.createElement('input');
            hiddenColor.type = 'hidden';
            hiddenColor.name = `${discipline}_${i}_CSS`;
            hiddenColor.id = `attemptColor_${i}${index}`;
            hiddenColor.setAttribute('value', attemptStyle);

            td.appendChild(hiddenColor);

            if (attemptStyle === 'color: #000000;') {
                const input = document.createElement('input');
                input.type = 'number';
                input.min = '0';
                input.max = '999';
                input.step = '0.5';
                input.name = `${discipline}_${i}`;
                input.id = `${discipline}_${i}${index}`;
                input.className = 'input attempt-number';
                input.style.cssText = attemptStyle;
                input.setAttribute('value', attemptValue);

                td.appendChild(input);
            } else {
                const span = document.createElement('span');
                span.textContent = attemptValue;
                span.style.cssText = `${attemptStyle}; font-size:115%;`;
                span.id = `${discipline}_${i}${index}`;
                td.appendChild(span);

                const hiddenValue = document.createElement('input');
                hiddenValue.type = 'hidden';
                hiddenValue.name = `${discipline}_${i}`;
                hiddenValue.setAttribute('value', attemptValue);

                td.appendChild(hiddenValue);
            }

            tr.appendChild(td);
        }

        const tdEmpty = document.createElement('td');
        tr.appendChild(tdEmpty);

        this.tabLe.appendChild(tr);
    });

    this.showSidePanel();
}

ViewModelAttemptsPage.prototype.createNextTableRows = function(data){
    this.viewProt = Object.create(ViewAttemptsPage.prototype);
    this.tableNext = this.viewProt.getTable('next_group');
    this.tableNext.querySelectorAll('tr.dynamic-row').forEach(tr => tr.remove());

    data.forEach((row, index) => {
        const tr = document.createElement("tr");
        tr.classList.add("dynamic-row");
        tr.id = `no${index + 1}`;
        tr.style.backgroundColor = "#ddddddff";

        let tdHidden = document.createElement("td");
        tdHidden.style.display = "none";

        const inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'main_id_score';
        inputHidden.setAttribute('value', row.main_id);

        tdHidden.appendChild(inputHidden);
        tr.appendChild(tdHidden);

        let tdNum = document.createElement("td");
        tdNum.style.textAlign = "center";
        tdNum.textContent = index + 1;
        tdNum.style.width = "25px";
        tr.appendChild(tdNum);

        let tdName = document.createElement("td");
        tdName.textContent = row.surname_name;
        tdName.style.width = "319px";
        tr.appendChild(tdName);

        let tdWeight = document.createElement("td");
        tdWeight.style.textAlign = "center";
        tdWeight.style.width = "58px";
        tdWeight.textContent = row.bodyweight;
        tr.appendChild(tdWeight);

        let tdCat = document.createElement("td");
        tdCat.style.textAlign = "center";
        tdCat.style.width = "62px";
        tdCat.textContent = row.category;

        const inputCategory = document.createElement('input');
        inputCategory.id = `number${index}`;
        inputCategory.type = 'hidden';
        inputCategory.name = 'category_num';
        inputCategory.setAttribute('value', row.category_num);

        tdCat.appendChild(inputCategory);
        tr.appendChild(tdCat);

        let tdLot = document.createElement("td");
        tdLot.style.textAlign = "center";
        tdLot.style.width = "57px";
        tdLot.textContent = row.lot;
        tr.appendChild(tdLot);

        let td1 = document.createElement("td");
        td1.style.backgroundColor = "rgba(252, 252, 234, 1)";
        td1.style.width = "75px";

        if (row[`${discipline}_1_CSS`] === "color: #000000;"){
            let input = document.createElement('input');
            input.className = "input attempt-number";
            input.type = "number";
            input.min = "0";
            input.max = "999";
            input.step = "0.5";
            input.name = `${discipline}_1`;
            input.value = row[`${discipline}_1`];

            td1.appendChild(input);
        } else {
            td1.style.textAlign = "center";
            td1.style.cssText += row[`${discipline}_1_CSS`] + " font-size:115%;";

            let spanText = document.createElement('span');
            spanText.textContent = row[`${discipline}_1`];

            let hiddenValue = document.createElement('input');
            hiddenValue.type = 'hidden';
            hiddenValue.name = `${discipline}_1`;
            hiddenValue.setAttribute('value', row[`${discipline}_1`]);

            td1.appendChild(spanText);
            td1.appendChild(hiddenValue);
        }

        const hiddenColor = document.createElement('input');
        hiddenColor.type = 'hidden';
        hiddenColor.name = `${discipline}_1_CSS`;
        hiddenColor.setAttribute('value', row[`${discipline}_1_CSS`]);

        td1.appendChild(hiddenColor);
        tr.appendChild(td1);

        let td2 = document.createElement("td");
        td2.style.backgroundColor = "rgba(252, 252, 234, 1)";
        td2.style.textAlign = "center";
        td2.style.width = "75px";
        td2.style.cssText += row[`${discipline}_2_CSS`] + " font-size:115%;";
        td2.textContent = row[`${discipline}_2`];
        tr.appendChild(td2);

        let td3 = document.createElement("td");
        td3.style.backgroundColor = "rgba(252, 252, 234, 1)";
        td3.style.textAlign = "center";
        td3.style.width = "75px";
        td3.style.cssText += row[`${discipline}_3_CSS`] + " font-size:115%;";
        td3.textContent = row[`${discipline}_3`];
        tr.appendChild(td3);

        let td4 = document.createElement("td");
        td4.style.backgroundColor = "rgba(252, 252, 234, 1)";
        td4.style.textAlign = "center";
        td4.style.width = "75px";
        td4.style.cssText += row[`${discipline}_4_CSS`] + " font-size:115%;";
        td4.textContent = row[`${discipline}_4`];
        tr.appendChild(td4);

        let tdEmpty = document.createElement("td");
        tdEmpty.style.width = "75px";
        tr.appendChild(tdEmpty);

        this.tableNext.querySelector("tbody") 
            ? this.tableNext.querySelector("tbody").appendChild(tr)
            : this.tableNext.appendChild(tr);
    });
}