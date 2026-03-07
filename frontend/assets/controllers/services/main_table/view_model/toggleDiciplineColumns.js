export function toggleDiciplineColumns(compTypeColumns){
    compTypeColumns.forEach(el => {
        if (el.dataset.discipline !== compType) {
            el.style.display = 'none';
        }
    });
}