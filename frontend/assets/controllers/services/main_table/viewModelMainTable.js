import { toggleLangColumns } from './view_model/toggleLangColumns.js';
import { toggleDiciplineColumns } from './view_model/toggleDiciplineColumns.js';
import { tableSortingTH } from './view_model/tableSortingTH.js';
import { showLine } from './view_model/showLine.js';
import { onSubmit } from './view_model/onSubmit.js';
import { eventRightClick } from './view_model/eventRightClick.js';
import { deleteThisParticipant } from './view_model/deleteThisParticipant.js';
import { getVisualIndex } from './view_model/getVisualIndex.js';
import { swapColumns } from './view_model/swapColumns.js';
import { resizeColumn } from "../../view_model/resizeColumn.js";
import { addCoeffInputLine } from './view_model/addCoeffInputLine.js';

export function ViewModelMainTable(){
    this.toggleLangColumns = toggleLangColumns.bind(this);
    this.toggleDiciplineColumns = toggleDiciplineColumns.bind(this);
    this.tableSortingTH = tableSortingTH.bind(this);
    this.showLine = showLine.bind(this);
    this.onSubmit = onSubmit.bind(this);
    this.eventRightClick = eventRightClick.bind(this);
    this.deleteThisParticipant = deleteThisParticipant.bind(this);
    this.getVisualIndex = getVisualIndex.bind(this);
    this.swapColumns = swapColumns.bind(this);
    this.resizeColumn = resizeColumn.bind(this);
    this.addCoeffInputLine = addCoeffInputLine.bind(this);
}