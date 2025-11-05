InitViewMainTable.prototype.syncToolbarWidth = function(){
    this.secondToolbar.style.width = table.offsetWidth + 'px';
}

InitViewMainTable.prototype.getTbody = function(){
    this.tableRows = document.getElementById('table_body');
    this.tboby = document.querySelector('tbody');
    this.tableNumber = document.getElementsByClassName('table_number');
}

InitViewMainTable.prototype.viewInputLine = function(){
    this.lineTd130 = document.getElementById('td130');
    this.lineTdDd0 = document.getElementById('tdDd0');
    this.lineTdMo0 = document.getElementById('tdMo0');
    this.lineTd140 = document.getElementById('td140');
    this.lineTd150 = document.getElementById('td150');
    this.lineTd160 = document.getElementById('td160');
    this.lineTd170 = document.getElementById('td170');
    this.lineCoeffInput = document.getElementById('coeff_input0');

    this.lineTotalNom = document.getElementById('total_nom0');
    this.lineTd360 = document.getElementById('td360');
    this.lineTotalFirstAtt = document.getElementById('total_att0');
    this.lineTd400 = document.getElementById('td400');
}

InitViewMainTable.prototype.newElement = function(valueOne, valueTwo){
    return document.getElementById(valueOne+valueTwo);
}

InitViewMainTable.prototype.rightClick = function(){
    this.rightClickToolbar = document.getElementById('right_click');
}

InitViewMainTable.prototype.initDragAndDrop = function(){
    this.heaAders.forEach((th) => {
        th.addEventListener('dragstart', (event) => {
            this.dragIndex = this.vmMainTable.getVisualIndex(th);
            event.dataTransfer.effectAllowed = 'move';
        });

        th.addEventListener('dragover', (event) => {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        });

        th.addEventListener('drop', (event) => {
            event.preventDefault();
            const dropIndex = this.vmMainTable.getVisualIndex(th);
            const rows = this.taBle.querySelectorAll('tr');
            this.vmMainTable.swapColumns(this.dragIndex, dropIndex, rows);
        });
    });
}

InitViewMainTable.prototype.tableHeaderOrder = function(){
    const tableHeader = document.querySelectorAll('thead tr:last-child th');
    const columnOrder = Array.from(tableHeader).map((th, index) => ({index, key: th.dataset.key}));
    this.keysAsNumbers = columnOrder.map(obj => parseInt(obj.key, 10));
}

InitViewMainTable.prototype.initResizableColumns = function(){
    this.handleMouseMove = this.handleMouseMove.bind(this);
    this.stopResize = this.stopResize.bind(this);
    this.isResizing = false;
    this.startX = null;
    this.startWidth = null;
    this.resizer = null;

    this.allThs.forEach(th => {
        this.grip = th.querySelector('.resizer');
        if (!this.grip){
            return;
        }

        this.grip.addEventListener('mousedown', (event) => {
            event.preventDefault();
            this.isResizing = true;
            this.startX = event.pageX;
            this.startWidth = th.offsetWidth;
            this.resizer = th;

            document.addEventListener('mousemove', this.handleMouseMove);
            document.addEventListener('mouseup', this.stopResize);
        });
    });
}

InitViewMainTable.prototype.handleMouseMove = function(event){
    if (!this.isResizing){
        return;
    }

    this.event = event;
    this.allTrs = this.taBle.querySelectorAll('tr');
    this.viewModelProt = Object.create(ViewModelMainTable.prototype);
    this.viewModelProt.resizeColumn(
        this.event, 
        this.startX, 
        this.startWidth, 
        this.resizer, 
        this.allThs, 
        this.allTrs
    );
}

InitViewMainTable.prototype.stopResize = function(){
    this.isResizing = false;
    this.resizer = null;
    document.removeEventListener('mousemove', this.handleMouseMove);
    document.removeEventListener('mouseup', this.stopResize);
    console.log('mouse event listeners were deleted');
}

InitViewMainTable.prototype.getDataTypes = function(th){
    this.thsDataTypes = document.querySelectorAll('th[data-type$="_up"], th[data-type$="_down"]');
    this.iconArrowDiv = document.querySelector('.sort-icon[data-icon="arrow"]');
    this.sortIconDiv = th.querySelector('.sort-icon');
}