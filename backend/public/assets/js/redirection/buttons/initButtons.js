import { RedirectionActions } from './redirectionActions.js';

export function initButtons(lang){
    const redirectionAction = new RedirectionActions();

    document.querySelectorAll('.button_comp_status').forEach((btn) => {
        btn.addEventListener("click", (event) => {
            event.stopPropagation();

            const parentDiv = btn.closest("div");

            if (btn){
                if (btn.style.backgroundColor === "rgb(200, 200, 200)"){
                   console.log(btn.style.backgroundColor); 
                    return;
                }

                const parentClass = parentDiv.className;
                redirectionAction.handleClick(btn, parentClass, lang);
            }
        });
    });

    document.addEventListener("click", redirectionAction.handleDocumentClick);
}