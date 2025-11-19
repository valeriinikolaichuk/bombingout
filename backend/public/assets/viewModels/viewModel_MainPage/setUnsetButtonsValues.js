ViewModelMainPage.prototype.setButtonsValues = function(event){
    if (event.target.tagName === "BUTTON" && event.target.type === "submit") {
        return;
    }

    let target = event.target.closest('button');
    if (!target){
        return;
    }

    this.idOfCurrButton = target.id;  // ---- id of the current button
    let idOfCurrentForm = this.idOfCurrButton.replace("x", "");  // ---- id of the current form
    let idOfCurrentComp = idOfCurrentForm.replace("buttonOn", "");
    let competitionName = target.textContent;

    this.viewButtons = new ViewButtons(idOfCurrentForm, this.idOfPreviousComp);

    if (this.viewButtons.currentForm){
        this.viewButtons.currentForm.innerHTML = "";
        let inputOne = document.createElement("input");
        inputOne.type = "hidden";
        inputOne.name = "compNumber";
        inputOne.value = idOfCurrentComp;

        let inputTwo = document.createElement("input");
        inputTwo.type = "hidden";
        inputTwo.name = "compNAME";
        inputTwo.value = competitionName;

        let buttonSubmit = document.createElement("button");
        buttonSubmit.type = "submit";
        buttonSubmit.className = "btn-in-color";
        buttonSubmit.textContent = competitionName;

        this.viewButtons.currentForm.appendChild(inputOne);
        this.viewButtons.currentForm.appendChild(inputTwo);
        this.viewButtons.currentForm.appendChild(buttonSubmit);
    } else {
        console.error("Form with id " + idOfCurrentForm + " not found!");
    }

    if (this.idOfPreviousComp > 0){  // ---- returning previous changes
        if (this.idOfPreviousComp != idOfCurrentComp){        
            if (this.viewButtons.currentCompLine){
                this.viewButtons.currentCompLine.innerHTML = "";
                let btnPrev = document.createElement("button");
                btnPrev.type = "button";
                btnPrev.className = "btn-block";
                btnPrev.id = "xbuttonOn" + this.idOfPreviousComp;
                btnPrev.textContent = this.previousCompName;
                this.viewButtons.currentCompLine.appendChild(btnPrev);
            }
        }
    }

    // ----- OPEN button
    this.viewButtons.btnOpen.innerHTML = "";
    let btnOpen = document.createElement("button");
    btnOpen.className = "buttonstyle_2";
    btnOpen.type = "submit";
    btnOpen.setAttribute("form", idOfCurrentForm);
    btnOpen.dataset.en = "OPEN";
    btnOpen.dataset.uk = "ВІДКРИТИ";
    btnOpen.dataset.pl = "OTWÓRZ";
    btnOpen.textContent = "OPEN";
    this.viewButtons.btnOpen.appendChild(btnOpen);

    // ----- CHANGE button
    this.viewButtons.btnChange.innerHTML = "";
    let btnChange = document.createElement("button");
    btnChange.id = "showChangeDialog";
    btnChange.className = "buttonstyle_2";
    btnChange.type = "button";
    btnChange.dataset.en = "CHANGE";
    btnChange.dataset.uk = "ЗМІНИТИ";
    btnChange.dataset.pl = "ZMIEŃ";
    btnChange.textContent = "CHANGE";
    this.viewButtons.btnChange.appendChild(btnChange);

    // ----- ONLINE REG button
    this.viewButtons.btnNomination.innerHTML = "";
    let btnNom = document.createElement("button");
    btnNom.id = "showAddNomDialog";
    btnNom.className = "buttonstyle_2";
    btnNom.type = "button";
    btnNom.dataset.en = "ONLINE REG";
    btnNom.dataset.uk = "ОНЛАЙН РЕГ";
    btnNom.dataset.pl = "ONLINE REJ";
    btnNom.textContent = "ONLINE REG";
    this.viewButtons.btnNomination.appendChild(btnNom);

    // ----- DELETE button + hidden input
    this.viewButtons.btnDelete.innerHTML = "";
    let inputDelete = document.createElement("input");
    inputDelete.type = "hidden";
    inputDelete.name = "compIdDelete";
    inputDelete.value = idOfCurrentComp;

    let btnDelete = document.createElement("button");
    btnDelete.className = "buttonstyle_2";
    btnDelete.type = "submit";
    btnDelete.dataset.en = "DELETE";
    btnDelete.dataset.uk = "ВИДАЛИТИ";
    btnDelete.dataset.pl = "USUŃ";
    btnDelete.textContent = "DELETE";

    this.viewButtons.btnDelete.appendChild(inputDelete);
    this.viewButtons.btnDelete.appendChild(btnDelete);

    this.viewButtons.initButtons(this.openModal, this.deleteComp);

    this.idOfPreviousComp = idOfCurrentComp;
    this.previousCompName = competitionName;

    for (let a=0; a < numberOfcomp; a++){
        if (comp_Id[a] == idOfCurrentComp){
            this.index = a;
            this.compInfoAndPopupsValues(idOfCurrentComp, competition_Name[a], coUntry[a], cIty[a], start_Date[a], end_Date[a], diVision[a], sEx[a], age_Group[a], tYpe[a], categorIes[a]);
            this.currentCompName = competition_Name[a];
            this.currentCompId = idOfCurrentComp;
        }
    }
}

ViewModelMainPage.prototype.compInfoAndPopupsValues = function(idOfCurrentComp, competition_Name, coUntry, cIty, start_Date, end_Date, diVision, sEx, age_Group, tYpe, version){
    let countryVal = '<p style="margin: 3px 0;">'+coUntry+'</p>';
    let CityVal = '<p style="margin: 3px 0;">'+cIty+'</p>';
    let partsStart = start_Date.split("-");
    let formattedStart = `${partsStart[2]}.${partsStart[1]}.${partsStart[0].slice(2)}`;
    let partsEnd = end_Date.split("-");
    let formattedEnd = `${partsEnd[2]}.${partsEnd[1]}.${partsEnd[0].slice(2)}`;
    let startEndDateValue = '<p style="margin: 3px 0;">'+formattedStart+' - '+formattedEnd+'</p>';

    const divisionValue = this.makePPtags(this.findItem(this.dialogsValues.divisions, diVision));
    const sexValue = this.makePPtags(this.findItem(this.dialogsValues.sexes, sEx));

    const ageList = sEx === "men" ? this.dialogsValues.ages : this.dialogsValues.agesWomen;
    const ageGroupValue = this.makePPtags(this.findItem(ageList, age_Group));
    const typeValue = this.makePPtags(this.findItem(this.dialogsValues.types, tYpe));

    let compInfo = countryVal + CityVal + startEndDateValue + divisionValue + ageGroupValue + sexValue + typeValue;
    this.dialogsValues.compInfoDiv.innerHTML = compInfo;

    // CHANGE A COMPETITION
    this.dialogsValues.createPopupName.innerHTML = '<h3 style="text-align: center;" data-en="CHANGE A COMPETITION" data-uk="ЗМІНИТИ ЗМАГАННЯ" data-pl="ZMIEŃ ZAWODY">CHANGE A COMPETITION</h3>';
    this.dialogsValues.btnClose.innerHTML = '<div id="closeXChangeDialog" class="btn-close">&times;</div>';
    this.dialogsValues.competitionsName.value = competition_Name;
    this.dialogsValues.countryName.value = coUntry;
    this.dialogsValues.cityName.value = cIty;

    this.dialogsValues.setStart_date.value = start_Date;
    this.dialogsValues.setEnd_date.value = end_Date;

    this.dialogsValues.divisionSelect.innerHTML = this.changeOptions(this.dialogsValues.divisions, diVision);

    let ageOptions;
    if (sEx === 'men'){
        this.dialogsValues.sexSelect.innerHTML = this.changeOptions(this.dialogsValues.sexeMen, sEx);
        ageOptions = this.dialogsValues.ages;
    } else {
        this.dialogsValues.sexSelect.innerHTML = this.changeOptions(this.dialogsValues.sexeWomen, sEx);
        ageOptions = this.dialogsValues.agesWomen;
    }

    this.dialogsValues.agegroupSelect.innerHTML = this.changeOptions(ageOptions, age_Group);

    if (tYpe === 'powerlifting'){
        this.dialogsValues.typeSelect.innerHTML = this.changeOptions(this.dialogsValues.typePowerlifting, tYpe);
    } else {
        this.dialogsValues.typeSelect.innerHTML = this.changeOptions(this.dialogsValues.typeBenchPress, tYpe);
    }

    this.dialogsValues.categoriesSelect.innerHTML = this.changeOptions(this.dialogsValues.categories, version);

    this.dialogsValues.inputHiddenId.innerHTML = '';
    let inputIdCurrComp = document.createElement('input');
    inputIdCurrComp.type = "hidden";
    inputIdCurrComp.name = "inputChangeId";
    inputIdCurrComp.value = idOfCurrentComp;

    this.dialogsValues.buttonCreate.innerHTML = '';
    let newButtonOk = document.createElement('button');
    newButtonOk.id = "changeACompetition";
    newButtonOk.style = "margin-right: 5px;";
    newButtonOk.type = "button";
    newButtonOk.textContent = "OK";

    let newButtonCancel = document.createElement('button');
    newButtonCancel.id = "closeChangeDialog";
    newButtonCancel.type = "button";
    newButtonCancel.textContent = "Cancel";

    this.dialogsValues.inputHiddenId.appendChild(inputIdCurrComp);
    this.dialogsValues.buttonCreate.appendChild(newButtonOk);
    this.dialogsValues.buttonCreate.appendChild(newButtonCancel);

    if (lang === 'en'){
        newButtonCancel.textContent = "Cancel";
    } else if (lang === 'uk'){
        newButtonCancel.textContent = "Відміна";
    } else if (lang === 'pl'){
        newButtonCancel.textContent = "Anuluj";
    }

    // ONLINE REG
    this.dialogsValues.competitionNameOnline.textContent = competition_Name;
    this.dialogsValues.countryOnline.textContent = coUntry;
    this.dialogsValues.cityOnline.textContent = cIty;

    this.dialogsValues.start_dateOnline.textContent = this.dateString_XX_XX_XXXX(start_Date);
    this.dialogsValues.end_dateOnline.textContent = this.dateString_XX_XX_XXXX(end_Date);

    this.dialogsValues.divisionOnline.textContent = diVision;
    this.dialogsValues.age_groupOnline.textContent = age_Group;
    this.dialogsValues.sexOnline.textContent = sEx;
    this.dialogsValues.typeOnline.textContent = tYpe;
    this.dialogsValues.preLiminary.value = null;
    this.dialogsValues.finAl.value = null;
    this.dialogsValues.nominId.value = idOfCurrentComp;

    this.initPopups = new InitPopups(this.closeModal, this.change_a_competition, this.submitCreateChange);
}

ViewModelMainPage.prototype.makePPtags = function(item){
    if (!item){
        return '<p style="margin: 3px 0;"></p>';
    }

    const base = 'style="margin: 3px 0;"';
    const data = Object.entries(item)
        .filter(([key]) => key !== "value")
        .map(([key, val]) => `data-${key}="${val}"`)
        .join(" ");

    return `<p ${base} ${data}></p>`;
}

ViewModelMainPage.prototype.findItem = function(arr, value){
    return arr.find((el) => el.value === value);
}

ViewModelMainPage.prototype.changeOptions = function(optionsArray, selectedValue){
    return optionsArray.map(opt => {
        const isSelected = opt.value === selectedValue ? 'selected' : '';
        return `<option value="${opt.value}" 
                        data-en="${opt.en}" 
                        data-uk="${opt.uk}" 
                        data-pl="${opt.pl}" 
                        ${isSelected}>
                    ${opt.en}
                </option>`;
    }).join("");
}

ViewModelMainPage.prototype.dateString_XX_XX_XXXX = function(start_Date){
    let year = start_Date.slice(0, 4);
    let month = start_Date.slice(5, 7);
    let day = start_Date.slice(8);
    return day+'.'+month+'.'+year;
}

ViewModelMainPage.prototype.unsetButtonsValues = function(){
    this.buttOn = Object.create(ViewButtons.prototype);
    this.buttOn.getButtons();

    if (this.buttOn.unsetClass != undefined){
        this.buttOn.unsetInput_1[0].remove();
        this.buttOn.unsetInput_2[0].remove();

        this.buttOn.unsetClass.setAttribute('class', 'btn-block');
        this.buttOn.unsetClass.setAttribute('type', 'button');
        this.buttOn.unsetClass.setAttribute('id', this.idOfCurrButton);

        this.createBtn(this.buttOn.btnOpen, "OPEN", "ВІДКРИТИ", "OTWÓRZ", "OPEN");
        this.createBtn(this.buttOn.btnChange, "CHANGE", "ЗМІНИТИ", "ZMIEŃ", "CHANGE");
        this.createBtn(this.buttOn.btnNomination, "ONLINE REG", "ОНЛАЙН РЕГ", "ONLINE REJ", "ONLINE REG");
        this.createBtn(this.buttOn.btnDelete, "DELETE", "ВИДАЛИТИ", "USUŃ", "DELETE");
    }

    if (numberOfcomp > 0){
        this.buttOn.initOpenList(this.setButtonsValues);
    }

    this.viewNomin.newPreliminaryDate.textContent = '';
    this.viewNomin.newFinalDate.textContent = '';
}

ViewModelMainPage.prototype.createBtn = (container, en, uk, pl, text, type = "button") => {
    container.innerHTML = "";

    const btn = document.createElement("button");
    btn.className = "buttonstyle_2";
    btn.type = type;
    btn.dataset.en = en;
    btn.dataset.uk = uk;
    btn.dataset.pl = pl;
    btn.textContent = text;
    container.appendChild(btn);
};