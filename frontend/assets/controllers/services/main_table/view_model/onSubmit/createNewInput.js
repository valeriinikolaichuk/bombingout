export function createNewInput(tdNumber, arrForId){
    const inputEl = document.createElement('input');
    inputEl.id = "td"+tdNumber;
    inputEl.className = "input";
    inputEl.type = "number";
    inputEl.min = 0;
    inputEl.max = 999;
    inputEl.step =0.5;
    inputEl.name = arrForId;

    return inputEl;
}