function InitPopupCreate(closeModal, create_a_competition, submitCreateChange){
    switchLanguage(lang);

    this.closeDialogCreate = document.getElementById('closeCreateDialog');
    this.closeDialogCreate.addEventListener('click', closeModal);

    this.closeXDialogCreate = document.getElementById('closeXCreateDialog');
    this.closeXDialogCreate.addEventListener('click', closeModal);

    this.formCreate = document.getElementById('formCreate');
    this.createACompetition = document.getElementById('createACompetition');
    this.createACompetition.addEventListener('click', (event) => {
        event.preventDefault();

        this.competitionFormValue = document.getElementById('competitionsName').value;
        this.countryFormValue = document.getElementById('countryName').value;
        this.cityFormValue = document.getElementById('cityName').value;

        if (submitCreateChange(this.competitionFormValue, this.countryFormValue, this.cityFormValue)){
            create_a_competition(this.formCreate);
        }
    });
}

function InitPopups(closeModal, change_a_competition, submitCreateChange){
    switchLanguage(lang);

    this.closeDialogChange = document.getElementById('closeChangeDialog');
    this.closeDialogChange.addEventListener('click', closeModal);

    this.closeXDialogChange = document.getElementById('closeXChangeDialog');
    this.closeXDialogChange.addEventListener('click', closeModal);

    this.formChange = document.getElementById('formCreate');
    this.changeACompetition = document.getElementById('changeACompetition');
    this.changeACompetition.addEventListener('click', (event) => {
        event.preventDefault();

        this.competitionFormValue = document.getElementById('competitionsName').value;
        this.countryFormValue = document.getElementById('countryName').value;
        this.cityFormValue = document.getElementById('cityName').value;

        if (submitCreateChange(this.competitionFormValue, this.countryFormValue, this.cityFormValue)){
            change_a_competition(this.formChange);
        }
    });

    this.closeAddNomDialog = document.getElementById('closeAddNomDialog');
    this.closeAddNomDialog.addEventListener('click', closeModal);

    this.closeXAddNomDialog = document.getElementById('closeXAddNomDialog');
    this.closeXAddNomDialog.addEventListener('click', closeModal);
}