function InitViewMainTable(){
    this.vmMainTable = new ViewModelMainTable();

    this.langUkColumns = document.querySelectorAll('[data-lang-show]');
    this.vmMainTable.toggleLangColumns(this.langUkColumns);

    this.powerliftingColumns = document.querySelectorAll('[data-discipline]');
    this.vmMainTable.toggleDiciplineColumns(this.powerliftingColumns);

    this.secondToolbar = document.querySelector('.hd_btns');
    this.syncToolbarWidth();

    this.taBle = document.getElementById('table');
    this.tableBody = document.getElementById('table_body');
    this.formElem = document.getElementById('formElem');
    this.heaAders = this.taBle.querySelectorAll('thead tr:nth-child(2) th[draggable="true"]');

    if (this.taBle.dataset.listenerset == "false"){
        this.rightClick();

        this.taBle.addEventListener('click', this.vmMainTable.tableSortingVM);

        this.tableBody.addEventListener('click', (event) => {
            this.vmMainTable.showLine(event);
        });

        this.formElem.addEventListener('submit', (event) => {
            event.preventDefault();
            this.vmMainTable.onSubmit(this.formElem);
        });

        this.tableBody.addEventListener('contextmenu', (evRightClick) => {
            if (evRightClick.target.parentElement.id == 'tr0' || evRightClick.target.parentElement.parentElement.id == 'tr0'){
                return;
            }

            evRightClick.preventDefault();
            this.deleteParticipant = document.getElementById('id_delete');
            this.vmMainTable.eventRightClick(evRightClick.target.id, this.deleteParticipant);
        });

        this.rightClickToolbar.addEventListener('click', (event) => {
            event.preventDefault();
            this.deleteParticipant = document.getElementById('id_delete');
            this.vmMainTable.deleteThisParticipant(this.deleteParticipant);
        });

        this.taBle.dataset.listenerset = "true";
    }

    this.dragIndex = null;
    this.initDragAndDrop();

    this.allThs = this.taBle.querySelectorAll('thead tr:last-child th');
    this.initResizableColumns();

    this.headInputLine = document.getElementById('tr0');
    this.headInputLine.addEventListener('input', this.vmMainTable.addCoeffInputLine);

    this.initView = new InitView();
}