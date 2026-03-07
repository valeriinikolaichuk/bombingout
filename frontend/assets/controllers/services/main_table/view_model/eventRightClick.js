import { rightClickOff } from "./right_click/rightClickOff.js";
import { rightClickOn } from "./right_click/rightClickOn.js";

export function eventRightClick(getId, deleteParticipant){
    let mainId = getId.slice(4);
    rightClickOff();
    rightClickOn();
    deleteParticipant.value = mainId;
}