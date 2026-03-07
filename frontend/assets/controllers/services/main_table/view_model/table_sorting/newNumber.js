export function newNumber(tableNumber){
    let lenght = tableNumber.length;
    let number = 1;
    for (let a = 0; a < lenght; a++){
        tableNumber[a].textContent = number;
        ++number;
    }
}