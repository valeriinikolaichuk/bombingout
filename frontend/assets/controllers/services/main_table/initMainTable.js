import { ViewModelMainTable } from "./viewModelMainTable.js";
import { ViewMainTable } from './viewMainTable.js';
import { db } from "../../../db.js";

export async function initMainTable(controller) {
    const formElement = controller.element.querySelector("#formElem");
    if (!formElement) return;

    if (controller.view) {
        controller.view.destroy?.();
    }

    controller.vmMainTable = new ViewModelMainTable();
    controller.view = new ViewMainTable(controller.vmMainTable, formElement);

    controller.vmMainTable.tableLoadingFailed(
        controller.view.tableErrorMessage,
        controller.view.tableErrorButton,
        window.appData.lang
    );

    const rows = await db.main_table
        .where('comp_id')
        .equals(controller.compID)
        .toArray();

    controller.vmMainTable.fillTable(rows);
}