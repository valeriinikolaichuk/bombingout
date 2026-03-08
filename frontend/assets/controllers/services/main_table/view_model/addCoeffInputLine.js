import { TableLines } from "../view/tableLines.js";
import { bodyWeightCoeff } from "./addCoefficient/bodyWeightCoeff.js";
import { totalNomFunction } from "./addCoefficient/totalNomFunction.js";
import { totalFirstFunction } from "./addCoefficient/totalFirstFunction.js";

export function addCoeffInputLine(){
    this.bodyWeightCoeff = bodyWeightCoeff.bind(this);
    this.totalNomFunction = totalNomFunction.bind(this);
    this.totalFirstFunction = totalFirstFunction.bind(this);

    const tableLines = new TableLines('0');
    tableLines.initCoeff(this.bodyWeightCoeff, this.totalNomFunction, this.totalFirstFunction);
}