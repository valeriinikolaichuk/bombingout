function ViewButtons(idOfCurrentForm, idOfPreviousComp){
    this.currentForm = document.getElementById(idOfCurrentForm);
    this.currentCompLine = document.getElementById('buttonOn'+idOfPreviousComp);
    this.getButtons();
}

ViewButtons.prototype.getButtons = function(){
    this.btnOpen = document.getElementById('btnOpen');
    this.btnChange = document.getElementById('btnChange');
    this.btnNomination = document.getElementById('btnNomination');
    this.btnDelete = document.getElementById('btnDelete');
    this.openList = document.getElementById('open-list');

    this.unsetClass = document.querySelector('.btn-in-color');
    if (this.unsetClass != undefined){
        this.unsetInput_1 = document.getElementsByName('compNumber');
        this.unsetInput_2 = document.getElementsByName('compNAME');
    }
}

ViewButtons.prototype.initButtons = function(openModal, deleteComp){
    this.openModal = openModal;
    this.openModal = this.openModal.bind(this);

    this.showDialogChange = document.getElementById('showChangeDialog');
    this.showDialogChange.addEventListener('click', this.openModal);
    this.showDialogAddNom = document.getElementById('showAddNomDialog');
    this.showDialogAddNom.addEventListener('click', this.openModal);

    if (this.openList.dataset.type == 'listeners_off'){
        this.deleteComp = deleteComp;
        this.deleteComp = this.deleteComp.bind(this);
        this.btnDelete.addEventListener('submit', this.deleteComp);

        this.openList.dataset.type = 'listeners_on';
    }
}

ViewButtons.prototype.initOpenList = function(setButtonsValues){
    this.openList = document.getElementById('open-list');
    this.openList.addEventListener("click", setButtonsValues);
}

ViewButtons.prototype.deleteCurrentComp = function(currCompId){
    this.deleteCurrComp = document.getElementById('buttonOn'+currCompId);
}