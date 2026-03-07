import { GetTbody } from "../../view/table_sorting/getTbody.js";
import { cleanInputLine } from "./cleanInputLine.js";
import { TableHeaderOrder } from "../../view/tableHeaderOrder.js";
import { showNewRow } from "./showNewRow.js";
import { TableLines } from "../../view/tableLines.js";
import { toggleLangColumns } from "../toggleLangColumns.js";
import { toggleDiciplineColumns } from "../toggleDiciplineColumns.js";
import { newNumber } from "../table_sorting/newNumber.js";

export  function getData(tableData){
    const tbodyObj = new GetTbody();

    let athlete = new Array();
    let objectLine;
    let countRow;
    let responceArrays;
    let trRowsId;

    let rowsArray = Array.from(tbodyObj.tbody.rows);
    let lenght = rowsArray.length;
    let rowsId = Array();

    for (let a=0; a < lenght; a++){
        trRowsId = rowsArray[a].id;
        rowsId[a] = trRowsId.slice(2);
    }

    let elIsInTable;
    let newTr;
    let countObj = Object.keys(tableData).length;
    let a=0;

    while (a < countObj){
        countRow = Object.keys(tableData[a]).length;

        if (countRow > 0){
            for (let data of tableData[a]){
                objectLine = data;
            }    
              
            responceArrays = Object.entries(objectLine);
            for (let c=0; c < 45; c++){
                athlete[responceArrays[c][0]] = responceArrays[c][1];
            }

            elIsInTable = 0;
            for (let a=0; a < lenght; a++){
                if (athlete["main_id"] == rowsId[a]){
                    ++elIsInTable;
                }
            }

            if (elIsInTable == 0){
                newTr = document.createElement('tr');
                newTr.id = 'tr'+athlete["main_id"];
                newTr.className = 'main_table';
                newTr.dataset.type = 'html';

                const parent = tbodyObj.tableRows;
                const secondChild = parent.children[1];
                parent.insertBefore(newTr, secondChild);

                cleanInputLine();
            }

            const tableHeaderOrder = new TableHeaderOrder();
            let inputLine = showNewRow(athlete, tableHeaderOrder.keysAsNumbers);

            const tableLines = new TableLines();
            tableLines.newElement('tr'+athlete["main_id"]).innerHTML = inputLine;
            tableLines.newElement('tr'+athlete["main_id"]).dataset.type = 'html';

            let langUk = tableLines.initDatasetColumn('[data-lang-show]');
            toggleLangColumns(langUk);

            let dataDiscipline = tableLines.initDatasetColumn('[data-discipline]');
            toggleDiciplineColumns(dataDiscipline);
        }

        ++a;
        newNumber(tbodyObj.tableNumber);
    }
}