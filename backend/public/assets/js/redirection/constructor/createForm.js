import { RedirectionActions } from "./redirectionActions.js";

RedirectionActions.prototype.createForm = function(parentClass, btn){
    const form = document.createElement("form");
    form.method = "POST";

    const submitBtn = document.createElement("button");
    submitBtn.className = "button_comp_status";
    submitBtn.type = "submit";
    submitBtn.value = parentClass;
    submitBtn.textContent = btn.textContent;
    submitBtn.style.backgroundColor = "rgba(254, 90, 90, 1)";

    if (parentClass == "logout"){
        submitBtn.name = "logout";
    } else {
        submitBtn.name = "comp_status";
    }

    if (parentClass == "admin" || parentClass == "weighingIn"){
        submitBtn.setAttribute("data-listener", "off");
    }

    form.appendChild(submitBtn);
    btn.replaceWith(form);

    this.activeForm = form;
    this.originalBtn = btn;

    return form;
}