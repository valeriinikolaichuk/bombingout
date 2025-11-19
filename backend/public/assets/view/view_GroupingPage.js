function View_GroupingPage(){
    this.vmGroupingPage = new ViewModelGroupingPage(this);
    this.vmGroupingPage.highlightEvenGroups();

    this.allRows = document.querySelectorAll('tr[data-category]');
    this.allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
    this.allCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (event) => {
            this.vmGroupingPage.showCategory(event.target);
        });
    });

    const self = this;

    this.lotColumn = document.querySelectorAll('.editlot');
    this.lotColumn.forEach(cell => {
        cell.addEventListener('click', function(){
            if (this.querySelector('number')){
                return;
            }

            self.vmGroupingPage.addNumberInput(this);
        });
    });

    this.sendGroup = document.getElementById('sendGroupBtn');
    this.buttonCreate = document.getElementById('button_create');
    this.dateTime = document.getElementById('inputDatetime');
    this.buttonStartTime = document.getElementById('button_startTime');
    this.btnDeleteSession = document.getElementById('delete_session');
    this.buttonsTarget = document.querySelector('button[data-target]');
    this.hiddenSessionsName = document.getElementById('sessionsName');

    this.buttonCreate.addEventListener('click', (event) => {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        self.vmGroupingPage.checkCheckboxes(event, checkboxes);
    });

    this.vmGroupingPage.inputDateTime(this.dateTime, this.buttonStartTime, this.btnDeleteSession);

    if (this.buttonsTarget.dataset.target == 'on'){
        this.groupColumn = document.querySelectorAll('.editable');
        this.groupColumn.forEach(cell => {
            cell.addEventListener('click', function(){
                if (this.querySelector('select')){
                    return;
                }

                self.vmGroupingPage.addSelect(this);
            });
        });

        this.sendGroup.addEventListener('click', async () => {
            this.seLect = document.getElementById('groupSelect');
            const selectedValue = this.seLect.value;
            if (selectedValue === '0'){
                return;
            } else {
                this.tbodyRows = document.querySelectorAll('#tbody tr:not(.hidden)');
                this.vmGroupingPage.autoGroupingSelected(selectedValue, this.tbodyRows);
                this.seLect.value = '0';
            }
        });

        this.vmGroupingPage.buttonCreate_on(this.buttonCreate);
    } else {
        this.vmGroupingPage.block_allCheckboxes(this.allCheckboxes);
        this.vmGroupingPage.setSessionTime(this.buttonCreate, this.hiddenSessionsName);
    }

    this.lotNumber = document.getElementById('lot');
    this.lotNumber.addEventListener('click', async () => {
        this.tbodyRows = document.querySelectorAll('#tbody tr:not(.hidden)');
        this.vmGroupingPage.lotNumber(this.tbodyRows);
    });
}

View_GroupingPage.prototype.getCategory = function(category){
    return document.querySelectorAll(`tr[data-category="${category}"]`);
}

View_GroupingPage.prototype.getRow = function(itemId){
    return document.querySelector(`tr[data-ID="${itemId}"]`);
}

View_GroupingPage.prototype.getCell = function(row, condition){
    return row.querySelector(condition);
}

View_GroupingPage.prototype.getDatetimeLocal = function(){
    return document.querySelector('input[type="datetime-local"]').value;
}

View_GroupingPage.prototype.setNewDatetime = function(){
    return document.getElementById('timeSess');
}

View_GroupingPage.prototype.getTableRows = function(){
    return document.querySelectorAll('td.editable');
}