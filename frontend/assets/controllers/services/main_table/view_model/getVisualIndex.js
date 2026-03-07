export function getVisualIndex(cell){
    const cells = Array.from(cell.parentNode.children);
    let index = 0;

    for (let i = 0; i < cells.length; i++){
        const colspan = parseInt(cells[i].getAttribute('colspan')) || 1;
        if (cells[i] === cell){
            return index;
        }

        index += colspan;
    }

    return -1;
}