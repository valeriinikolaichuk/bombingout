import { compVersions } from "../../components/compVersions.js";
import { InputLine } from "../../view/onSubmit/inputLine.js";
import { TableLines } from "../../view/tableLines.js";
import { createNewInput } from "./createNewInput.js";

export function cleanInputLine(){
    let tdNumber;
    let inputElement;
    let arrForId = ['personally', 'out_of_comp', 'md', 'dbl', 'squat_nom', 'bench_press_nom', 'deadlift_nom', 'squat_1', 'bench_press_1', 'deadlift_1'];

    let cAt = new Array();
    let catLang = new Array();
    if (window.appData.compVersion == 'IBSA'){
        if (window.appData.compSex == 'men'){
            cAt = ['', ...compVersions.IBSA.open.en.men];
            if (window.appData.lang == 'uk'){
                catLang = ['', ...compVersions.IBSA.open.uk.men];
            } else {
                catLang = cAt;
            }
        } else {
            cAt = ['', ...compVersions.IBSA.open.en.women];
            if (window.appData.lang == 'uk'){
                catLang = ['', ...compVersions.IBSA.open.uk.women];
            } else {
                catLang = cAt;
            }
        }
    }

    const inputLine = new InputLine();

    inputLine.lineTd130.value = null;
    inputLine.lineTdDd0.value = '0';
    inputLine.lineTdMo0.value = '0';
    inputLine.lineTd140.value = '0000';
    
    inputLine.lineTd150.innerHTML='';
    let newOption;
    for (let c = 0; c < 11; c++){
        newOption = new Option(cAt[c], catLang[c]);
        inputLine.lineTd150.append(newOption);
    }

    inputLine.lineTd160.value = null;
    inputLine.lineTd170.textContent = '';
    inputLine.lineCoeffInput.value = null;

    const tableLines = new TableLines();

    tdNumber = 190;
    while (tdNumber <= 280){
        tableLines.newElement('td'+tdNumber).value = null;
        tdNumber = tdNumber + 10;
    }

    tdNumber = 290;
    for (let a=0; a < 4; a++){
        tableLines.newElement(arrForId[a]+tdNumber).innerHTML='';

        inputElement = document.createElement('input');
        inputElement.id = "td"+tdNumber;
        inputElement.className = "input";
        inputElement.type = "checkbox";
        inputElement.name = arrForId[a];
        inputElement.value = "-1";

        tableLines.newElement(arrForId[a]+tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    tdNumber = 330;
    for (let a=4; a < 7; a++){
        tableLines.newElement(arrForId[a]+tdNumber).innerHTML='';
        inputElement = createNewInput(tdNumber, arrForId[a]);
        tableLines.newElement(arrForId[a]+tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    inputLine.lineTotalNom.value = '';
    inputLine.lineTd360.textContent = '';

    tdNumber = 370;
    for (let a=7; a < 10; a++){
        tableLines.newElement(arrForId[a]+tdNumber).innerHTML='';
        inputElement = createNewInput(tdNumber, arrForId[a]);
        tableLines.newElement(arrForId[a]+tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    inputLine.lineTotalFirstAtt.value = '';
    inputLine.lineTd400.textContent = '';
}