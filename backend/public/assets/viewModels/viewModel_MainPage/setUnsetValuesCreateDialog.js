ViewModelMainPage.prototype.setValuesCreateDialog = function(){
    this.dialogsValues.createPopupName.innerHTML = '<h3 style="text-align: center;" data-en="CREATE A COMPETITION" data-uk="СТВОРИТИ ЗМАГАННЯ" data-pl="UTWÓRZ ZAWODY">CREATE A COMPETITION</h3>';
    this.dialogsValues.btnClose.innerHTML = '<div id="closeXCreateDialog" class="btn-close">&times;</div>'; 
    this.dialogsValues.competitionsName.value = '';
    this.dialogsValues.countryName.value = '';
    this.dialogsValues.cityName.value = '';

    this.dialogsValues.setStart_date.valueAsDate = new Date();
    this.dialogsValues.setEnd_date.valueAsDate = new Date();

    this.dialogsValues.divisionSelect.innerHTML = this.createOptions(this.dialogsValues.divisions);
    this.dialogsValues.sexSelect.innerHTML = this.createOptions(this.dialogsValues.sexes);
    this.dialogsValues.agegroupSelect.innerHTML = this.createOptions(this.dialogsValues.ages);
    this.dialogsValues.typeSelect.innerHTML = this.createOptions(this.dialogsValues.types);
    this.dialogsValues.categoriesSelect.innerHTML = this.createOptions(this.dialogsValues.categories);

    this.dialogsValues.inputHiddenId.innerHTML = '';

    this.dialogsValues.buttonCreate.innerHTML = '';
    let newButtonOk = document.createElement('button');
    newButtonOk.id = "createACompetition";
    newButtonOk.style = "margin-right: 5px;";
    newButtonOk.type = "button";
    newButtonOk.textContent = "OK";

    let newButtonCancel = document.createElement('button');
    newButtonCancel.id = "closeCreateDialog";
    newButtonCancel.type = "button";
    if (lang === 'en'){
        newButtonCancel.textContent = "Cancel";
    } else if (lang === 'uk'){
        newButtonCancel.textContent = "Відміна";
    } else if (lang === 'pl'){
        newButtonCancel.textContent = "Anuluj";
    }

    this.dialogsValues.buttonCreate.appendChild(newButtonOk);
    this.dialogsValues.buttonCreate.appendChild(newButtonCancel);

    this.initPopup = new InitPopupCreate(this.closeModal, this.create_a_competition, this.submitCreateChange);
}

ViewModelMainPage.prototype.createOptions = function(options){
    return options.map(opt => {
        return `<option value="${opt.value}" 
                        data-en="${opt.en}" 
                        data-uk="${opt.uk}" 
                        data-pl="${opt.pl}">
                    ${opt.en}
                </option>`;
    }).join("");
};

ViewModelMainPage.prototype.unsetValuesCreateDialog = function(){
    this.dialogsValues.createPopupName.innerHTML = '';
    this.dialogsValues.btnClose.innerHTML = '';
    this.dialogsValues.competitionsName.value = '';
    this.dialogsValues.countryName.value = '';
    this.dialogsValues.cityName.value = '';
    this.dialogsValues.divisionSelect.innerHTML = '';
    this.dialogsValues.agegroupSelect.innerHTML = '';
    this.dialogsValues.sexSelect.innerHTML = '';
    this.dialogsValues.typeSelect.innerHTML = '';
    this.dialogsValues.categoriesSelect.innerHTML = '';
    this.dialogsValues.inputHiddenId.innerHTML = '<div></div>';
    this.dialogsValues.buttonCreate.innerHTML = '';
}