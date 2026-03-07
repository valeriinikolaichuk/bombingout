import { ViewModelMainTable } from './viewModelMainTable.js';
import { rightClick } from './view/rightClick.js';
import { handleMouseMove } from './view/resizeColumn/handleMouseMove.js';
import { stopResize } from './view/resizeColumn/stopResize.js';

export function ViewMainTable(formElement){
    this.vmMainTable = new ViewModelMainTable();

    this.langUkColumns = document.querySelectorAll('[data-lang-show]');
    this.vmMainTable.toggleLangColumns(this.langUkColumns);

    this.powerliftingColumns = document.querySelectorAll('[data-discipline]');
    this.vmMainTable.toggleDiciplineColumns(this.powerliftingColumns);

//    this.secondToolbar = document.querySelector('.hd_btns');
//    this.syncToolbarWidth();

    this.taBle = document.querySelector('.main_table');
    this.tableBody = document.getElementById('table_body');
    this.formElem = formElement;

    if (this.taBle.dataset.listenerset == "false"){

        this.taBle.addEventListener('click', this.vmMainTable.tableSortingTH);

        this.tableBody.addEventListener('click', (event) => {
            this.vmMainTable.showLine(event);
        });

        this.formElem.addEventListener('submit', (event) => {
            event.preventDefault();
            this.vmMainTable.onSubmit(this.formElem);
        });

        this.tableBody.addEventListener('contextmenu', (evRightClick) => {
            if (evRightClick.target.parentElement.id == 'tr0' || 
                evRightClick.target.parentElement.parentElement.id == 'tr0'){
                return;
            }

            evRightClick.preventDefault();
            this.deleteParticipant = document.getElementById('id_delete');
            this.vmMainTable.eventRightClick(evRightClick.target.id, this.deleteParticipant);
        });

        this.rightClickToolbar = rightClick();
        this.rightClickToolbar.addEventListener('click', (event) => {
            event.preventDefault();
            this.deleteParticipant = document.getElementById('id_delete');
            this.vmMainTable.deleteThisParticipant(this.deleteParticipant);
        });

        this.taBle.dataset.listenerset = "true";
    }

    this.heaAders = this.taBle.querySelectorAll('thead tr:nth-child(2) th[draggable="true"]');
    this.dragIndex = null;

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

    this.allThs = this.taBle.querySelectorAll('thead tr:last-child th');

    this.isResizing = false;
    this.startX = null;
    this.startWidth = null;
    this.resizer = null;

    this.handleMouseMove = handleMouseMove.bind(this);
    this.stopResize = stopResize.bind(this);

    this.allThs.forEach(th => {
        const grip = th.querySelector('.resizer');
        if (!grip){
            return;
        }

        grip.addEventListener('mousedown', (event) => {
            event.preventDefault();
            this.isResizing = true;
            this.startX = event.pageX;
            this.startWidth = th.offsetWidth;
            this.resizer = th;

            document.addEventListener('mousemove', this.handleMouseMove);
            document.addEventListener('mouseup', this.stopResize);
        });
    });







    this.headInputLine = document.getElementById('tr0');
    this.headInputLine.addEventListener('input', this.vmMainTable.addCoeffInputLine);

    this.initView = new InitView();
}