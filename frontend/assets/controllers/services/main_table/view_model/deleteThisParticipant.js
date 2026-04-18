import { TableLines } from "../view/tableLines.js";
import { GetTbody } from "../view/table_sorting/getTbody.js";
import { newNumber } from "./table_sorting/newNumber.js";
import { rightClickOff } from "./right_click/rightClickOff.js";

export async function deleteThisParticipant(deleteParticipant){
    const mainId = deleteParticipant.value;
    const tableLines = new TableLines(mainId);

    if (tableLines.tdElement('13') != null){
        let partIcipant = tableLines.tdElement('13').textContent;
        let queStion = confirm('delete '+partIcipant+' ?');
        if (queStion == true){
            let dataArray = {
                category: tableLines.tdElement('15').textContent,
                mainId: mainId,
                compID: compID // ??
            };
//** */
            const responce = await fetch("assets/models_js/main_models/deleteAParticipant_json.php", {
                method: 'POST',
                credentials: 'include',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dataArray)
            });

            if (!responce.ok){
                throw new Error("error by path: "+"assets/models_js/main_models/deleteAParticipant_json.php");
            }

            let serverResponce = await responce.json();

            if (lang === 'uk'){
                alert('учасника було видалено');
            } else if (lang === 'pl'){
                alert('uczestnik został usunięty');
            } else {
                alert('the participant was deleted');
            }

            tableLines.newElement('tr'+dataArray['mainId']).remove();

            const tbodyObj = new GetTbody();
            newNumber(tbodyObj.tableNumber);
        }

        rightClickOff();
        deleteParticipant.value ='';
    }
}