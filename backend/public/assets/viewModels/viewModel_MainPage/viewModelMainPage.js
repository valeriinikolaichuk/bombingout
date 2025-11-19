function ViewModelMainPage(){
    this.isModalOpen = false;
    this.targetId = '';
    this.openModal = this.openModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
    this.updateView = this.updateView.bind(this);

    this.startDateValue = '';
    this.endDateValue = '';
    this.validateChangeDate = this.validateChangeDate.bind(this);
    this.validateCorrectDate = this.validateCorrectDate.bind(this);
    this.changeAgeGroups = this.changeAgeGroups.bind(this);

    this.newCompetition = '';
    this.newCountry = '';
    this.newCity = '';

    this.idOfPreviousComp = 0;
    this.previousCompName = '';
    this.setButtonsValues = this.setButtonsValues.bind(this);

    this.create_a_competition = this.create_a_competition.bind(this);
    this.change_a_competition = this.change_a_competition.bind(this);

    this.preliminaryDateValue = '';
    this.finalDateValue = '';
    this.setPreliminaryDate = this.setPreliminaryDate.bind(this);
    this.setFinalDate = this.setFinalDate.bind(this);
    this.create_a_nomination = this.create_a_nomination.bind(this);

    this.currentCompName = '';
    this.currentCompId = '';
    this.deleteComp = this.deleteComp.bind(this);

    this.viewNomin = new ViewNomin();
}