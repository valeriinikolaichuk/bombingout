function InitView(){
    this.vmMainPage = new ViewModelMainPage();

    this.showDialogCreate = document.getElementById('showCreateDialog');
    this.showDialogCreate.addEventListener('click', this.vmMainPage.openModal);

    this.endDateChange = document.getElementById('start_date');
    this.endDateCorrect = document.getElementById('end_date');

    this.endDateChange.addEventListener("input", () => {
        this.vmMainPage.validateChangeDate(this.endDateChange, this.endDateCorrect);
    });

    this.endDateCorrect.addEventListener("input", () => {
        this.vmMainPage.validateCorrectDate(this.endDateChange, this.endDateCorrect);
    });

    if (lang !== 'en'){
        this.popupsObjects();
        this.genderSelect.addEventListener('change', () => {
            let index = 0;
            this.vmMainPage.changeAgeGroups(this.genderSelect, this.ageGroupSelectOptions, index);
        });
    }

    // Open Dialog
    this.showDialogOpen = document.getElementById('showOpenDialog');
    this.closeDialogOpen = document.getElementById('closeOpenDialog');
    this.closeXDialogOpen = document.getElementById('closeXOpenDialog');

    this.showDialogOpen.addEventListener('click', this.vmMainPage.openModal);
    this.closeDialogOpen.addEventListener('click', this.vmMainPage.closeModal);
    this.closeXDialogOpen.addEventListener('click', this.vmMainPage.closeModal);

    this.openList = document.getElementById('open-list');
    if (numberOfcomp > 0){
        this.openList.addEventListener('click', this.vmMainPage.setButtonsValues);
    }

    this.preliminaryDate = document.getElementById('preliminary');
    this.finalDate = document.getElementById('final');
    this.createANomination = document.getElementById('create_a_nomination');

    this.preliminaryDate.addEventListener('input', () => {
        this.vmMainPage.setPreliminaryDate(this.preliminaryDate, this.finalDate);
    });

    this.finalDate.addEventListener('input', () => {
        this.vmMainPage.setFinalDate(this.preliminaryDate, this.finalDate);
    });

    this.createANomination.addEventListener('click', this.vmMainPage.create_a_nomination);
}