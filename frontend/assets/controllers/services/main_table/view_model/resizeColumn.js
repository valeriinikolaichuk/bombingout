export function resizeColumn(event, startX, startWidth, resizer, allThs, allTrs){
    const newWidth = startWidth + (event.pageX - startX);
    resizer.style.width = newWidth + 'px';
    const index = Array.from(allThs).indexOf(resizer);

    allTrs.forEach(row => {
        const cell = row.children[index];
        if (cell) {
            cell.style.width = newWidth + 'px';
        }
    });
};