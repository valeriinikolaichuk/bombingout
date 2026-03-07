import { GetTbody } from "../view/table_sorting/getTbody.js";
import { tableSorting } from "./table_sorting/tableSorting.js";
import { newNumber } from "./table_sorting/newNumber.js";

export function tableSortingTH(event){
    if (!event.target.tagName == 'TH') return;
    if (!event.target.dataset.index == 'sort') return;
    
    const tbodyObj = new GetTbody();
    const rowsArray = tableSorting(event.target, tbodyObj.tbody);
    tbodyObj.tbody.append(...rowsArray);
    newNumber(tbodyObj.tableNumber);
}