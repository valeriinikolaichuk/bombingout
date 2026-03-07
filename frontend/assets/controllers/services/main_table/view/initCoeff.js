export function initCoeff(bodyWeightCoeff, totalNomFunction, totalFirstFunction){
    const bodyWeight = document.getElementById('td16'+this.mainId);
    const coeFf = document.getElementById('td17'+this.mainId);
    const coeffInput = document.getElementById('coeff_input'+this.mainId);

    bodyWeight.addEventListener('input', () => {
        bodyWeightCoeff(bodyWeight, coeFf, coeffInput);
    });

    const squatNom = document.getElementById('td33'+this.mainId);
    const benchPressNom = document.getElementById('td34'+this.mainId);
    const liftNom = document.getElementById('td35'+this.mainId);
    const totalNom = document.getElementById('total_nom'+this.mainId);
    const totalText = document.getElementById('td36'+this.mainId);

    squatNom.addEventListener('input', () => {
        totalNomFunction(squatNom, benchPressNom, liftNom, totalNom, totalText);
    });

    benchPressNom.addEventListener('input', () => {
        totalNomFunction(squatNom, benchPressNom, liftNom, totalNom, totalText);
    });

    liftNom.addEventListener('input',  () => {
        totalNomFunction(squatNom, benchPressNom, liftNom, totalNom, totalText);
    });

    const squatFirst = document.getElementById('td37'+this.mainId);
    const benchFirst = document.getElementById('td38'+this.mainId);
    const liftFirst = document.getElementById('td39'+this.mainId);
    const totalFirstAtt = document.getElementById('total_att'+this.mainId);
    const totalFirst = document.getElementById('td40'+this.mainId);

    squatFirst.addEventListener('input', () => {
        totalFirstFunction(squatFirst, benchFirst, liftFirst, totalFirstAtt, totalFirst);
    });

    benchFirst.addEventListener('input', () => {
        totalFirstFunction(squatFirst, benchFirst, liftFirst, totalFirstAtt, totalFirst);
    });

    liftFirst.addEventListener('input', () => {
        totalFirstFunction(squatFirst, benchFirst, liftFirst, totalFirstAtt, totalFirst);
    });
}