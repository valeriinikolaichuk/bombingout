export function totalFirstFunction(squatFirst, benchFirst, liftFirst, totalFirstAtt, totalFirst){
    let squatNumber = Number(squatFirst.value);
    let benchNumber = Number(benchFirst.value);
    let liftNumber = Number(liftFirst.value);
    let sum = squatNumber + benchNumber + liftNumber;
    totalFirstAtt.value = sum;
    totalFirst.textContent = sum;
}