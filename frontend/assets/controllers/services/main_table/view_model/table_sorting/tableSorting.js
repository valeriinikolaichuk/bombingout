import { GetDataTypes } from "../../view/table_sorting/getDataTypes.js";
import { return_DataType } from "./return_DataType.js";

export function tableSorting(th, tbody){
    let rowsArray = Array
        .from(tbody.rows)
        .filter(row => !row.classList.contains('input_line'));
    let colNum = th.cellIndex;
    let type = th.dataset.type;
    let compare;

    const dataTypes = new GetDataTypes(th);
    const ths = dataTypes.thsDataTypes;
    const sortIcon = dataTypes.sortIconDiv;
    if (dataTypes.iconArrowDiv != null){
        dataTypes.iconArrowDiv.textContent = '';
        dataTypes.iconArrowDiv.removeAttribute('data-icon');
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
                return_DataType(ths);
                return rowB.cells[colNum-1].innerHTML - rowA.cells[colNum-1].innerHTML;
            }
            break;
    }

    rowsArray.sort(compare);
    return rowsArray;
}