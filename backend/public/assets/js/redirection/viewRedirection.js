function ViewRedirection(){
    this.viewModelRedir = new ViewModelRedirection();
    this.init();
}

ViewRedirection.prototype.init = function(){
    document.querySelectorAll('.button_comp_status').forEach((btn) => {
        btn.addEventListener("click", (event) => {
            event.stopPropagation();

            const parentDiv = btn.closest("div");
            if (parentDiv){
                const parentClass = parentDiv.className;
                this.viewModelRedir.handleClick(btn, parentClass);
            }
        });
    });

    document.addEventListener("click", this.viewModelRedir.handleDocumentClick);
}

ViewRedirection.prototype.initPopup = function(id){
    return document.getElementById(id);
}