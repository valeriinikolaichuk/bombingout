function ViewAttemptsPage(){
    this.vmAttemptsPage = new ViewModelAttemptsPage();

    this.fooTer = document.querySelector('.footerScore');
    this.tableWrapper = document.querySelector('.table-wrapper');
    this.sidePanel = document.querySelector('.side-panel');

    this.vmAttemptsPage.applyHeight(this.fooTer, this.tableWrapper, this.sidePanel);

    this.footerButtons = document.querySelectorAll('.sessions_name');
    this.disciplineButtons = document.querySelectorAll('.discipline');
    this.attemptButtons = document.querySelectorAll('.attempt');
    this.resultButtons = document.querySelectorAll('.att_res');
    this.scoreSheet = document.getElementById('scoresheet');
    this.scoreSheetNext = document.getElementById('scoresheet_next');

    if (discipline === 'bench_press'){
        document.getElementById('squat').style.display = 'none';
        document.getElementById('deadlift').style.display = 'none';
    }

    this.footerButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const disciplineButton = document.getElementById(discipline);
            const attemptButton = document.getElementById('att_'+attempt);

            this.vmAttemptsPage.showSession(this.footerButtons, btn, this.disciplineButtons, this.attemptButtons, disciplineButton, attemptButton);
        });
    });

    this.disciplineButtons.forEach(btn => {
        btn.addEventListener('click', (event) => {
            const footerButtonOn = document.querySelector('[data-session]');
            let footerButtonValue;
            if (footerButtonOn){
                footerButtonValue = footerButtonOn.textContent;
            } else {
                return;
            }

            discipline = event.target.id;
            const disciplineButton = document.getElementById(discipline);

            this.vmAttemptsPage.showDiscAtt(disciplineButton, this.disciplineButtons, footerButtonValue);
        });
    });

    this.attemptButtons.forEach(btn => {
        btn.addEventListener('click', (event) => {
            const footerButtonOn = document.querySelector('[data-session]');
            let footerButtonValue;
            if (footerButtonOn){
                footerButtonValue = footerButtonOn.textContent;
            } else {
                return;
            }

            attempt = Number(event.target.id.replace(/\D/g, ""));
            const attemptButton = document.getElementById(event.target.id);

            this.vmAttemptsPage.showDiscAtt(attemptButton, this.attemptButtons, footerButtonValue);
        });
    });

    this.resultButtons.forEach(btn => {
        btn.addEventListener('click', (event) => {
            const allInputs = this.scoreSheet.querySelectorAll('input');
            if (allInputs.length <= 1){
                return;
            }

            const footerButtonValue = document.querySelector('[data-session]').textContent;
            this.vmAttemptsPage.getInputs(allInputs, event.target.id, footerButtonValue);
        });
    });

    this.scoreSheet.addEventListener("submit", (event) => {
        event.preventDefault();
        const allInputs = this.scoreSheet.querySelectorAll('input');
        if (allInputs.length <= 1){
            return;
        }

        const footerButtonValue = document.querySelector('[data-session]').textContent;
        this.vmAttemptsPage.getInputs(allInputs, 'score_data', footerButtonValue);
    });

    this.scoreSheetNext.addEventListener("submit", (event) => {
        event.preventDefault();
        const allInputsNext = this.scoreSheetNext.querySelectorAll('input');
        if (allInputsNext.length <= 1){
            return;
        }
    
        const footerButtonValue = document.querySelector('[data-session]').textContent;
        this.vmAttemptsPage.getInputs(allInputsNext, 'score_data', footerButtonValue);
    });

    this.scoreSheet.addEventListener("contextmenu", (event) => {
        event.preventDefault();
        this.vmAttemptsPage.getAttemptsData(event);
    });

    this.rightClickInputs = document.querySelectorAll('.rightClick');
    this.rightClickInputs.forEach(btn => {
        btn.addEventListener('click', (event) => {
            const form = event.target.closest('form');
            const footerButtonValue = document.querySelector('[data-session]').textContent;
            this.vmAttemptsPage.getRightClickValues(form, footerButtonValue);
        });
    });

    this.scorePage = document.getElementById("scorePage");
    this.rightClickClasses();
    this.scorePage.addEventListener("click", () => {
        this.vmAttemptsPage.rightClickOff(this.rightClickToolbar);
        this.vmAttemptsPage.rightClickCancelOff(this.rightClickToolbarCancel);
    });
}

ViewAttemptsPage.prototype.getTable = function(attribute){
    return document.getElementById(attribute);
}

ViewAttemptsPage.prototype.getTableValues = function(attribute){
    return document.querySelectorAll(attribute);
}

ViewAttemptsPage.prototype.getRow = function(row, data){
    return row.querySelector(data);
}

ViewAttemptsPage.prototype.getParticipantsRow = function(string){
    return document.querySelector(string);
}

ViewAttemptsPage.prototype.getHtmlElem = function(id){
    return document.getElementById(id);
}