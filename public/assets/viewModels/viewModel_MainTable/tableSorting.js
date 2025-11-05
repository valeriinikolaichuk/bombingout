ViewModelMainTable.prototype.tableSortingVM = function(event){
    if (event.target.tagName == 'TH'){
        if (event.target.dataset.index == 'sort'){
            this.viewPrototype = Object.create(InitViewMainTable.prototype);
            this.viewPrototype.getTbody();
            let rowsArray = this.tableSorting(event.target);
            this.viewPrototype.tboby.append(...rowsArray);
            this.newNumber(this.viewPrototype.tableNumber);
        }
    }
}

ViewModelMainTable.prototype.tableSorting = function(th){
    let rowsArray = Array.from(this.viewPrototype.tboby.rows).filter(row => !row.classList.contains('input_line'));
    let colNum = th.cellIndex;
    let type = th.dataset.type;
    let compare;
    let self = this;

    this.viewPrototype.getDataTypes(th);
    const ths = this.viewPrototype.thsDataTypes;
    const sortIcon = this.viewPrototype.sortIconDiv;
    if (this.viewPrototype.iconArrowDiv != null){
        this.viewPrototype.iconArrowDiv.textContent = '';
        this.viewPrototype.iconArrowDiv.removeAttribute('data-icon');
    }

    switch (type){
        case 'number':
        case 'number_down':
            th.dataset.type = 'number_up';
            sortIcon.textContent = '↑ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = function(rowA, rowB){
                return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
            }
            break;
        case 'number_up':
            th.dataset.type = 'number_down';
            sortIcon.textContent = '↓ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = function(rowA, rowB){
                return rowB.cells[colNum].innerHTML - rowA.cells[colNum].innerHTML;
            }
            break;
        case 'string':
        case 'string_down':
            th.dataset.type = 'string_up';
            sortIcon.textContent = '↑ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = function(rowA, rowB){
                return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1 ;
            }
            break;        
        case 'string_up':
            th.dataset.type = 'string_down';
            sortIcon.textContent = '↓ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = function(rowA, rowB){
                return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? -1 : 1 ;
            }
            break;
        case 'checkbox':
        case 'checkbox_down':
            th.dataset.type = 'checkbox_up';
            sortIcon.textContent = '↑ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = function(rowA, rowB) {
                const a = rowA.cells[colNum].querySelector('input[type="checkbox"]')?.checked ? 1 : 0;
                const b = rowB.cells[colNum].querySelector('input[type="checkbox"]')?.checked ? 1 : 0;
                return a - b;
            };
            break;
        case 'checkbox_up':
            th.dataset.type = 'checkbox_down';
            sortIcon.textContent = '↓ ';
            sortIcon.setAttribute('data-icon', 'arrow');
            compare = (rowA, rowB) => {
                const a = rowA.cells[colNum].querySelector('input[type="checkbox"]')?.checked ? 1 : 0;
                const b = rowB.cells[colNum].querySelector('input[type="checkbox"]')?.checked ? 1 : 0;
                return b - a;
            };
            break;
        case 'cancelSorting':
            compare = function(rowA, rowB){
                self.return_DataType(ths);
                return rowB.cells[colNum-1].innerHTML - rowA.cells[colNum-1].innerHTML;
            }
            break;
    }

    rowsArray.sort(compare);
    return rowsArray;
}

ViewModelMainTable.prototype.newNumber = function(tableNumber){
    let lenght = tableNumber.length;
    let number = 1;
    for (let a = 0; a < lenght; a++){
        tableNumber[a].textContent = number;
        ++number;
    }
}

ViewModelMainTable.prototype.return_DataType = function(ths){
    ths.forEach(th => {
        if (th.dataset.type.startsWith('number')){
            th.dataset.type = 'number';
        } else if (th.dataset.type.startsWith('string')){
            th.dataset.type = 'string';
        } else if (th.dataset.type.startsWith('checkbox')){
            th.dataset.type = 'checkbox';
        }
    });
}