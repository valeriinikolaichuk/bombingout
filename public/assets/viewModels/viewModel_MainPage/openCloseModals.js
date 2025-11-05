ViewModelMainPage.prototype.openModal = function(event){
    this.targetId = event.target.id;
    this.isModalOpen = true;
    this.updateView();
};

ViewModelMainPage.prototype.closeModal = function(event){
    this.targetId = event.target.id;
    this.isModalOpen = false;
    this.updateView();
};

ViewModelMainPage.prototype.updateView = function(){
    this.dialogsValues = Object.create(InitView.prototype);
    this.dialogsValues.viewPopupsValues();

    if (this.isModalOpen == true){
        switch (this.targetId){
            case 'showCreateDialog':
                this.setValuesCreateDialog();
                this.dialogsValues.dialogCreate.showModal();
                break;
            case 'showOpenDialog':
                this.dialogsValues.dialogOpen.showModal();
                break;
            case 'showChangeDialog':
                this.dialogsValues.dialogCreate.showModal();
                break;
            case 'showAddNomDialog':
                this.checkAddNomDialog();
                this.dialogsValues.dialogAddNom.showModal();
                break;
        }
    } else {
        switch (this.targetId){
            case 'closeCreateDialog':
            case 'closeXCreateDialog':
                this.unsetValuesCreateDialog();
                this.dialogsValues.dialogCreate.close();
                break;                
            case 'closeOpenDialog':
            case 'closeXOpenDialog':
                this.unsetButtonsValues();
                this.dialogsValues.compInfoDiv.innerHTML = '';
                this.dialogsValues.dialogOpen.close();
                break;
            case 'closeChangeDialog':
            case 'closeXChangeDialog':
                this.unsetButtonsValues();
                this.dialogsValues.compInfoDiv.innerHTML = '';
                this.dialogsValues.dialogCreate.close();
                switchLanguage(lang);
                break;
            case 'closeAddNomDialog':
            case 'closeXAddNomDialog':
                this.unsetButtonsValues();
                this.dialogsValues.compInfoDiv.innerHTML = '';
                this.dialogsValues.dialogAddNom.close();
                switchLanguage(lang);
                break;
        }
    }
};