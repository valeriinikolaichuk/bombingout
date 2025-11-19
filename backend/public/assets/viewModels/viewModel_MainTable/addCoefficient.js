ViewModelMainTable.prototype.addCoeffInputLine = function(){
    this.viewInputLine = new ViewTableLines('0');
    this.addCoefficient();
    this.viewInputLine.initCoeff(this.bodyWeightCoeff, this.totalNomFunction, this.totalFirstFunction);
}

ViewModelMainTable.prototype.addCoefficient = function(){
    this.bodyWeightCoeff = this.bodyWeightCoeff.bind(this);
    this.totalNomFunction = this.totalNomFunction.bind(this);
    this.totalFirstFunction = this.totalFirstFunction.bind(this);
}

ViewModelMainTable.prototype.bodyWeightCoeff = function(bodyWeight, coeFf, coeffInput){
    let bodyweightNum = Number(bodyWeight.value);
    let wilks = wilksFormula(bodyweightNum);
    coeFf.textContent = wilks;
    coeffInput.value = wilks;
}

ViewModelMainTable.prototype.totalNomFunction = function(squatNom, benchPressNom, liftNom, totalNom, totalText){
    let squatNumber = Number(squatNom.value);
    let benchNumber = Number(benchPressNom.value);
    let liftNumber = Number(liftNom.value);
    let sum = squatNumber + benchNumber + liftNumber;
    totalNom.value = sum;
    totalText.textContent = sum;
}

ViewModelMainTable.prototype.totalFirstFunction = function(squatFirst, benchFirst, liftFirst, totalFirstAtt, totalFirst){
    let squatNumber = Number(squatFirst.value);
    let benchNumber = Number(benchFirst.value);
    let liftNumber = Number(liftFirst.value);
    let sum = squatNumber + benchNumber + liftNumber;
    totalFirstAtt.value = sum;
    totalFirst.textContent = sum;
}