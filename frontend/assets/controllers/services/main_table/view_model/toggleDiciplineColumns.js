export function toggleDiciplineColumns(compTypeColumns){
    compTypeColumns.forEach(el => {
        if (el.dataset.discipline !== window.appData.compType) {
            el.style.display = 'none';
        }
    });
}