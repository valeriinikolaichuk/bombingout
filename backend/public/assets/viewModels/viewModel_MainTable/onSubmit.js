ViewModelMainTable.prototype.onSubmit = async function(formElem){
    this.formElemFunctions = Object.create(ViewModelMainPage.prototype);
    let dataArray = this.formElemFunctions.formData(formElem);
    let arrayLength = dataArray.length;
    dataArray[arrayLength] = compID;

    let formDataJson = JSON.stringify(dataArray);
    let url = "assets/models_js/main_models/mainTableData_json.php";
    let serverResponce = this.formElemFunctions.sendData(url, formDataJson);
    console.log(serverResponce);
}