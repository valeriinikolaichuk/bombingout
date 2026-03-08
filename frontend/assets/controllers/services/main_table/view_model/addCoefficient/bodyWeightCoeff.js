import { wilksFormula } from "../../model/wilksFormula";

export function bodyWeightCoeff(bodyWeight, coeFf, coeffInput){
    let bodyweightNum = Number(bodyWeight.value);
    let wilks = wilksFormula(bodyweightNum);
    coeFf.textContent = wilks;
    coeffInput.value = wilks;
}