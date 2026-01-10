import { RedirectionActions } from './redirectionActions.js';

export function initButtons(){
    const redirectionAction = new RedirectionActions();

    document.querySelectorAll('.button_comp_status').forEach((btn) => {
        btn.addEventListener("click", (event) => {
            event.stopPropagation();

            const parentDiv = btn.closest("div");
            if (parentDiv){
                if (parentDiv.style.backgroundColor === "rgb(200,200,200)"){
                    return;
                }

                const parentClass = parentDiv.className;
                redirectionAction.handleClick(btn, parentClass);
            }
        });
    });

    document.addEventListener("click", redirectionAction.handleDocumentClick);
}