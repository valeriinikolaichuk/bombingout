export function handleClick(btn, parentClass){
    if (this.activeForm) {
        this.activeForm.replaceWith(this.originalBtn);
        this.activeForm = null;
        this.originalBtn = null;
    }

    let form = this.createForm(parentClass, btn);

    if (parentClass == "admin" || parentClass == "weighingIn"){
        this.showLoginForm(form, parentClass, btn);
    }   
}