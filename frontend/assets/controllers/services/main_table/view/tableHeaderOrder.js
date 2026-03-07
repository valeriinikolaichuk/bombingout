export function TableHeaderOrder(){
    const tableHeader = document.querySelectorAll('thead tr:last-child th');
    const columnOrder = Array
        .from(tableHeader)
        .map((th, index) => ({index, key: th.dataset.key}));

    this.keysAsNumbers = columnOrder.map(obj => parseInt(obj.key, 10));
}