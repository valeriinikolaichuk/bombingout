export function GetDataTypes(th){
    this.thsDataTypes = document.querySelectorAll('th[data-type$="_up"], th[data-type$="_down"]');
    this.iconArrowDiv = document.querySelector('.sort-icon[data-icon="arrow"]');
    this.sortIconDiv = th.querySelector('.sort-icon');
}