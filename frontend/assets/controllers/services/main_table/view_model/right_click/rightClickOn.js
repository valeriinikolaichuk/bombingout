import { rightClick } from "../../view/rightClick.js";

export function rightClickOn(){
    const rightClickToolbar = rightClick();

    rightClickToolbar.classList.remove("right_click");
    rightClickToolbar.classList.add("right_click_active");
    rightClickToolbar.style.top = `${event.pageY}px`;
    rightClickToolbar.style.left = `${event.pageX}px`;
}