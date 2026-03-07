export function getCellByVisualIndex(row, visualIndex){
    let currentIndex = 0;
    for (let cell of row.children){
        const colspan = parseInt(cell.getAttribute('colspan')) || 1;
        if (visualIndex >= currentIndex && visualIndex < currentIndex + colspan){
            return cell;
        }

        currentIndex += colspan;
    }

    return null;
}