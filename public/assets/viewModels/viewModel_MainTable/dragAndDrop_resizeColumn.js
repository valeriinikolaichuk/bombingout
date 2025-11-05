ViewModelMainTable.prototype.getVisualIndex = function(cell){
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

ViewModelMainTable.prototype.swapColumns = function(fromIndex, toIndex, rows){
    if (fromIndex === toIndex){
        return;
    }

    rows.forEach(row => {
        const fromCell = this.getCellByVisualIndex(row, fromIndex);
        const toCell = this.getCellByVisualIndex(row, toIndex);
        if (!fromCell || !toCell || fromCell === toCell){
            return;
        }

        if (toIndex > fromIndex) {
            row.insertBefore(fromCell, toCell.nextSibling);
        } else {
            row.insertBefore(fromCell, toCell);
        }
    });
}

ViewModelMainTable.prototype.getCellByVisualIndex = function(row, visualIndex){
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

ViewModelMainTable.prototype.resizeColumn = function(event, startX, startWidth, resizer, allThs, allTrs){
    const newWidth = startWidth + (event.pageX - startX);
    resizer.style.width = newWidth + 'px';
    const index = Array.from(allThs).indexOf(resizer);
    allTrs.forEach(row => {
        const cell = row.children[index];
        if (cell) {
            cell.style.width = newWidth + 'px';
        }
    });
}