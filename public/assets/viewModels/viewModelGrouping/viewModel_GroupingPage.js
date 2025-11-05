function ViewModelGroupingPage(viewGroupingPage){
    this.viewGroupingPage = viewGroupingPage;

    this.addSelect = this.addSelect.bind(this);
    this.autoGroupingSelected = this.autoGroupingSelected.bind(this);
    this.lotNumber = this.lotNumber.bind(this);
    this.block_allCheckboxes = this.block_allCheckboxes.bind(this);
    this.highlightEvenGroups = this.highlightEvenGroups.bind(this);
}

ViewModelGroupingPage.prototype.showCategory = function (checkbox){
    const category = checkbox.value;
    const rows = this.viewGroupingPage.getCategory(category);
    if (!rows || rows.length === 0) {
        console.warn(`rows for category ${category} didn't find`);
        return;
    }

    rows.forEach(row => {
        if (checkbox.checked) {
            row.classList.remove('hidden');
        } else {
            row.classList.add('hidden');
        }
    });

    this.renumberVisibleRows();
}

ViewModelGroupingPage.prototype.renumberVisibleRows = function (){
    const rows = this.viewGroupingPage.allRows;
    let counter = 1;
    rows.forEach(row => {
        if (!row.classList.contains('hidden')){
            const numberCell = row.querySelector('.num');
            if (numberCell) {
                numberCell.textContent = counter++;
            }
        }
    });
}

ViewModelGroupingPage.prototype.addNumberInput = function(cell) {
    const oldText = cell.textContent;
    const input = document.createElement('input');
    input.type = 'number';
    input.min = 1;
    input.value = oldText && !isNaN(oldText) ? oldText : 1;

    cell.textContent = '';
    cell.appendChild(input);

    input.focus();
    input.addEventListener('blur', () => {
        cell.textContent = input.value || oldText;
    });

    input.addEventListener('change', () => {
        const newValue = input.value;
        const dataJson = JSON.stringify({
            lot: cell.dataset.lot,
            value: newValue
        });

        let url = "assets/models_js/grouping_models/sendGroupLotManually_json.php";
        this.sendSelectedData(url, dataJson);
    });
}

ViewModelGroupingPage.prototype.checkCheckboxes = function(event, checkboxes){
    const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
    if (!anyChecked) {
        event.preventDefault();
        return;
    }
}

ViewModelGroupingPage.prototype.addSelect = function(cell){
    const oldText = cell.textContent;
    const options = [oldText, '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    const select = document.createElement('select');
    options.forEach(text => {
        const option = document.createElement('option');
        option.value = text;
        option.textContent = text;
        select.appendChild(option);
    });

    cell.textContent = '';
    cell.appendChild(select);

    select.focus();
    select.addEventListener('blur', () => {
        cell.textContent = select.value || oldText;
        this.highlightEvenGroups();
    });

    select.addEventListener('change', () => {
        const newValue = select.value;
        const dataJson = JSON.stringify({
            grp: cell.dataset.grp,
            value: newValue
        });

        let url = "assets/models_js/grouping_models/sendGroupLotManually_json.php";
        this.sendSelectedData(url, dataJson);
    });
}

ViewModelGroupingPage.prototype.autoGroupingSelected = function(selectedValue, tbodyRows){
    const data = [];
    data.push(selectedValue);
    tbodyRows.forEach(row => {
        const id = row.getAttribute('data-ID'); 
        if (id) {
            data.push(id);
        }
    });

    if (data.length == 1){
        return;
    } else {
        const dataJson = JSON.stringify(data);
        let url = "assets/models_js/grouping_models/sendGroupsAuto_json.php";
        this.sendSelectedData(url, dataJson);
    }
}

ViewModelGroupingPage.prototype.lotNumber = function(tbodyRows){
    const data = [];
    tbodyRows.forEach(row => {
        const id = row.getAttribute('data-ID'); 
        if (id) {
            data.push(id);
        }
    });

    const dataJson = JSON.stringify(data);
    let url = "assets/models_js/grouping_models/lotNumber_json.php";
    this.sendSelectedData(url, dataJson);
}

ViewModelGroupingPage.prototype.inputDateTime = function(dateTime, buttonStartTime, btnDeleteSession){
    dateTime.children[0].innerHTML = "";

    const input = document.createElement('input');
    input.setAttribute('form', 'sessCheckBoxes');
    input.setAttribute('type', 'datetime-local');
    input.setAttribute('name', 'start_time');
    input.className = 'button';
    input.step = '60';
    input.setAttribute('value', date);

    dateTime.children[0].appendChild(input);

    buttonStartTime.addEventListener('click', () => {
        dateTime.style = "border: none;";
        btnDeleteSession.style = "display: none;";
        input.showPicker?.();
        input.focus();
    });

    document.addEventListener('click', (event) => {
        const isClickInside = buttonStartTime.contains(event.target) || input.contains(event.target);
        if (!isClickInside) {
            dateTime.style = "display: none;";
            btnDeleteSession.style = "border: none;";
        }
    });
}

ViewModelGroupingPage.prototype.setSessionTime = function(buttonCreate, hiddenSessionsName){
    buttonCreate.dataset.en = 'set ⏰';
    buttonCreate.dataset.uk = 'встанови ⏰';
    buttonCreate.dataset.pl = 'ustaw ⏰';

    switchLanguage(lang);

    buttonCreate.addEventListener('click', () => {
        const datetimeLocal = this.viewGroupingPage.getDatetimeLocal();
        const dataJson = JSON.stringify({
            start_time: datetimeLocal,
            sessions_name: hiddenSessionsName.value,
            comp_id: compID
        });

        let url = "assets/models_js/grouping_models/newSessionDate_json.php";
        this.sendSelectedData(url, dataJson);
    });
}

ViewModelGroupingPage.prototype.buttonCreate_on = function(buttonCreate){
    buttonCreate.setAttribute('form', 'sessCheckBoxes');
    buttonCreate.setAttribute('formmethod', 'POST');
    buttonCreate.setAttribute('type', 'submit');
    buttonCreate.setAttribute('name', 'session');
    buttonCreate.setAttribute('value', 'create');
} 

ViewModelGroupingPage.prototype.block_allCheckboxes = function(allCheckboxes){
    allCheckboxes.forEach(cb => {
        cb.disabled = true;
    });
}

ViewModelGroupingPage.prototype.highlightEvenGroups = function(){
    let allTableRows = this.viewGroupingPage.getTableRows();
    allTableRows.forEach(td => {
        const tr = td.closest('tr');
        const grp = parseInt(td.textContent.trim(), 10);

        if (!isNaN(grp) && grp % 2 === 0) {
            tr.style.backgroundColor = 'yellow';
        } else {
            tr.style.backgroundColor = '';
        }
    });
}