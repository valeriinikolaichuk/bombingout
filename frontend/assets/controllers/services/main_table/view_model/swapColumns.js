import { getCellByVisualIndex } from "./drag_and_drop/getCellByVisualIndex.js";

export function swapColumns(fromIndex, toIndex, rows){
    if (fromIndex === toIndex){
        return;
    }

    rows.forEach(row => {
        const fromCell = getCellByVisualIndex(row, fromIndex);
        const toCell = getCellByVisualIndex(row, toIndex);
        if (!fromCell || !toCell || fromCell === toCell){
            return;
        }

        if (toIndex > fromIndex) {
            row.insertBefore(fromCell, toCell.nextSibling);
        } else {
            row.insertBefore(fromCell, toCell);
        }
    });
};