ViewModelMainPage.prototype.create_a_competition = async function(formCreate){
    let dataArray = this.formData(formCreate);
    let formDataJson = JSON.stringify(dataArray);
    let url = "assets/models_js/main_models/createACompetition_json.php";
    this.sendData(url, formDataJson);
}

ViewModelMainPage.prototype.change_a_competition = async function(formCreate){
    let dataArray = this.formData(formCreate);
    let formDataJson = JSON.stringify(dataArray);
    let url = "assets/models_js/main_models/changeACompetition_json.php";
    this.sendData(url, formDataJson);
}

ViewModelMainPage.prototype.formData = function(formElem){
    let formData = new FormData(formElem);
    let dataArray = Array();
    let a = 0;
    for (let data of formData){
        dataArray[a] = data;
        ++a; 
    }

    return dataArray;
}

ViewModelMainPage.prototype.checkAddNomDialog = async function(){
    let idCheck = new Array();
    let idOfCurrCompCheck = this.dialogsValues.nominId.value;
    idCheck[0] = idOfCurrCompCheck;
    let dataJson = JSON.stringify(idCheck);
    let url = "assets/models_js/main_models/newNomination_json.php";
    this.sendData(url, dataJson);
}

ViewModelMainPage.prototype.create_a_nomination = function(){
    let foolDatePreliminary = this.viewNomin.newPreliminaryDate.textContent;
    let foolDateFinal = this.viewNomin.newFinalDate.textContent;
    let addNomin = new Array();
    if (foolDatePreliminary == ''){
        addNomin[0] = null;
    } else {
        addNomin[0] = this.dateString_XXXX_XX_XX(foolDatePreliminary);
    }
    
    if (foolDateFinal == ''){
        addNomin[1] = null;
    } else {
        addNomin[1] = this.dateString_XXXX_XX_XX(foolDateFinal);
    }

    addNomin[2] = this.dialogsValues.nominId.value;

    let dataJson = JSON.stringify(addNomin);
    let url = "assets/models_js/main_models/newNomination_json.php";
    this.sendData(url, dataJson);
}

ViewModelMainPage.prototype.dateString_XXXX_XX_XX = function(foolDate){
    let day = foolDate.slice(0, 2);
    let month = foolDate.slice(3, 5);
    let year = foolDate.slice(6);
    return year+'-'+month+'-'+day;        
}

ViewModelMainPage.prototype.deleteComp = function(event){
    event.preventDefault();
    let masage;
    if (lang === 'uk'){
        masage = 'Bидaлити ';
    } else if (lang === 'pl'){
        masage = 'Czy chcesz usunąć ';
    } else {
        masage = 'Do you want to delete ';
    }

    if (confirm(masage+this.currentCompName+' ?')){
        this.delete_a_competition();
    } else {
        console.log('no');       
    }
}

ViewModelMainPage.prototype.delete_a_competition = async function(){
    let dataJson = JSON.stringify(this.currentCompId);
    let url = "assets/models_js/main_models/deleteACompetition_json.php";
    this.sendData(url, dataJson);
}