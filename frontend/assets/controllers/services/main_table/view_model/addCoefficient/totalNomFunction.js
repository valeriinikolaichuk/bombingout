export function totalNomFunction(squatNom, benchPressNom, liftNom, totalNom, totalText){
    let squatNumber = Number(squatNom.value);
    let benchNumber = Number(benchPressNom.value);
    let liftNumber = Number(liftNom.value);
    let sum = squatNumber + benchNumber + liftNumber;
    totalNom.value = sum;
    totalText.textContent = sum;
}