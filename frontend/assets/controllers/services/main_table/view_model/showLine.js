import { rightClickOff } from "./right_click/rightClickOff.js";
import { showInputLine } from "./show_line/showInputLine.js";

export function showLine(element){
    rightClickOff();

    if (!element.target.id) return;

    showInputLine(element.target.id);
}