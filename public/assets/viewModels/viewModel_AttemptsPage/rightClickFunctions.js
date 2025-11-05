ViewModelAttemptsPage.prototype.getAttemptsData = function(event){
    let trId = event.target.closest("tr").id;
    if (trId == '' || event.target.tagName == 'TD'){
        return;
    } 

    let tdId = event.target.id;
    let match = tdId.match(/_(\d)/);
    let currAttempt = match ? match[1] : null;

    match = tdId.match(/(squat|bench_press|deadlift)_\d/);
    let elementId = match[0];

    this.setToolBarValues(trId, elementId, currAttempt, event);
}

ViewModelAttemptsPage.prototype.setToolBarValues = function(trId, elementId, currAttempt, event){
    this.viewPrototype = Object.create(ViewAttemptsPage.prototype);
    this.viewPrototype.rightClickClasses();
    this.viewPrototype.rightClickElement();

    let trNr = trId.slice(2);
    let idScore = this.viewPrototype.getElement("id_score", trNr).value;
    let attemptColor = this.viewPrototype.getElement("attemptColor_", currAttempt+trNr).value;
    let catNum = this.viewPrototype.getElement("num", trNr).value;

    if (attemptColor == "color: #000000;"){
        let goodLiftWeight = this.viewPrototype.getElement(discipline+"_", currAttempt+trNr).value;

        this.viewPrototype.idGoodLiftEl.value = idScore;
        this.viewPrototype.attemptGoodLiftEl.value = currAttempt;
        this.viewPrototype.goodLiftWeightEl.name = elementId;
        this.viewPrototype.goodLiftWeightEl.value = goodLiftWeight;
        this.viewPrototype.attemptColorGoodEl.name = elementId+'_CSS';
        this.viewPrototype.attemptColorGoodEl.value = attemptColor;
        this.viewPrototype.categoryGoodLiftEl.value = catNum;

        this.viewPrototype.idNoLiftEl.value = idScore;
        this.viewPrototype.attemptNoLiftEl.value = currAttempt;
        this.viewPrototype.noLiftWeightEl.name = elementId;
        this.viewPrototype.noLiftWeightEl.value = goodLiftWeight;
        this.viewPrototype.attemptColorNoEl.name = elementId+'_CSS';
        this.viewPrototype.attemptColorNoEl.value = attemptColor;
        this.viewPrototype.categoryNoLiftEl.value = catNum;

        this.rightClickCancelOff(this.viewPrototype.rightClickToolbarCancel);
        this.rightClick(this.viewPrototype.rightClickToolbar, event);
    } else {
        let goodLiftWeight = this.viewPrototype.getElement(discipline+"_", currAttempt+trNr).textContent;

        this.viewPrototype.idCancelEl.value = idScore;
        this.viewPrototype.attemptCancelEl.value = currAttempt;
        this.viewPrototype.cancelAttWeightEl.name = elementId;
        this.viewPrototype.cancelAttWeightEl.value = goodLiftWeight;
        this.viewPrototype.attemptColorEl.name = elementId+'_CSS';
        this.viewPrototype.attemptColorEl.value = attemptColor;
        this.viewPrototype.categoryCanAttEl.value = catNum;

        this.rightClickOff(this.viewPrototype.rightClickToolbar);
        this.rightClickCancel(this.viewPrototype.rightClickToolbarCancel, event);
    }
}

ViewModelAttemptsPage.prototype.rightClickOff = function(rightClickToolbar){
    let classRightClick = rightClickToolbar.classList.contains("right_click_active");
    if (classRightClick == true){
        rightClickToolbar.classList.remove("right_click_active");
        rightClickToolbar.classList.add("right_click");
    }
}

ViewModelAttemptsPage.prototype.rightClick = function(rightClickToolbar, event){
    this.rightClickOff(rightClickToolbar);
    rightClickToolbar.classList.remove("right_click");
    rightClickToolbar.classList.add("right_click_active");
    rightClickToolbar.style.top = `${event.pageY}px`;
    rightClickToolbar.style.left = `${event.pageX}px`;
}

ViewModelAttemptsPage.prototype.rightClickCancelOff = function(rightClickToolbarCancel){
    let classRightClick = rightClickToolbarCancel.classList.contains("right_click_cancel_active");
    if (classRightClick == true){
        rightClickToolbarCancel.classList.remove("right_click_cancel_active");
        rightClickToolbarCancel.classList.add("right_click_cancel");    
    }
}

ViewModelAttemptsPage.prototype.rightClickCancel = function(rightClickToolbarCancel, event){
    this.rightClickCancelOff(rightClickToolbarCancel);
    rightClickToolbarCancel.classList.remove("right_click_cancel");
    rightClickToolbarCancel.classList.add("right_click_cancel_active");
    rightClickToolbarCancel.style.top = `${event.pageY}px`;
    rightClickToolbarCancel.style.left = `${event.pageX}px`;
}

ViewModelAttemptsPage.prototype.getRightClickValues = async function(form, footerButtonValue){
    const dataToSend = {};
    form.querySelectorAll('input').forEach(input => {
        dataToSend[input.name] = input.value;
    });

    dataToSend['compID'] = compID;
    dataToSend['discipline'] = discipline;
    dataToSend['sessions_name'] = footerButtonValue;
    dataToSend['current_attempt'] = attempt;

    this.rightClickOff(this.viewPrototype.rightClickToolbar);
    this.rightClickCancelOff(this.viewPrototype.rightClickToolbarCancel);

    const jsonData = JSON.stringify(dataToSend);
    let url = "assets/models_js/attempts_models/goodLift_json.php";

    let values = await this.sendInputs(url, jsonData);
    this.createTableRows(values);

    if (attempt > 2){
        url = "assets/models_js/attempts_models/addSessionsDataAttempts_json.php";
        let valuesNext = await this.sendJson(url, footerButtonValue);

        if (Array.isArray(valuesNext)){
            this.createNextTableRows(valuesNext);
        } else if (typeof valuesNext === "string" && valuesNext === "no groups found") {
            console.log(valuesNext);
        }
    }
}