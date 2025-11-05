function ViewTableLines(mainId){
    this.mainId = mainId;
    this.trId = document.getElementById('tr'+this.mainId);
    this.tdDd = document.getElementById('tdDd'+this.mainId);
    this.tdMo = document.getElementById('tdMo'+this.mainId);
}

ViewTableLines.prototype.tdElement = function(x){
    let tdEl = document.getElementById('td'+x+this.mainId);
    return tdEl;
}

ViewTableLines.prototype.initCoeff = function(bodyWeightCoeff, totalNomFunction, totalFirstFunction){
    this.bodyWeight = document.getElementById('td16'+this.mainId);
    this.coeFf = document.getElementById('td17'+this.mainId);
    this.coeffInput = document.getElementById('coeff_input'+this.mainId);

    this.bodyWeight.addEventListener('input', () => {
        bodyWeightCoeff(this.bodyWeight, this.coeFf, this.coeffInput);
    });

    this.squatNom = document.getElementById('td33'+this.mainId);
    this.benchPressNom = document.getElementById('td34'+this.mainId);
    this.liftNom = document.getElementById('td35'+this.mainId);
    this.totalNom = document.getElementById('total_nom'+this.mainId);
    this.totalText = document.getElementById('td36'+this.mainId);

    this.squatNom.addEventListener('input', () => {
        totalNomFunction(this.squatNom, this.benchPressNom, this.liftNom, this.totalNom, this.totalText);
    });

    this.benchPressNom.addEventListener('input', () => {
        totalNomFunction(this.squatNom, this.benchPressNom, this.liftNom, this.totalNom, this.totalText);
    });

    this.liftNom.addEventListener('input',  () => {
        totalNomFunction(this.squatNom, this.benchPressNom, this.liftNom, this.totalNom, this.totalText);
    });

    this.squatFirst = document.getElementById('td37'+this.mainId);
    this.benchFirst = document.getElementById('td38'+this.mainId);
    this.liftFirst = document.getElementById('td39'+this.mainId);
    this.totalFirstAtt = document.getElementById('total_att'+this.mainId);
    this.totalFirst = document.getElementById('td40'+this.mainId);

    this.squatFirst.addEventListener('input', () => {
        totalFirstFunction(this.squatFirst, this.benchFirst, this.liftFirst, this.totalFirstAtt, this.totalFirst);
    });

    this.benchFirst.addEventListener('input', () => {
        totalFirstFunction(this.squatFirst, this.benchFirst, this.liftFirst, this.totalFirstAtt, this.totalFirst);
    });

    this.liftFirst.addEventListener('input', () => {
        totalFirstFunction(this.squatFirst, this.benchFirst, this.liftFirst, this.totalFirstAtt, this.totalFirst);
    });
}

ViewTableLines.prototype.initDatasetColumn = function(dataSetValue){
    return document.querySelectorAll(dataSetValue);
}