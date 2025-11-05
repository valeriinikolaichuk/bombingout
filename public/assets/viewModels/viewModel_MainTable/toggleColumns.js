ViewModelMainTable.prototype.toggleLangColumns = function(langUkColumns){
    langUkColumns.forEach(el => {
        if (el.dataset.langShow === lang) {
            el.style = 'text-align: center; width: 70px;';
        } else {
            el.style.display = 'none';
        }
    });
}

ViewModelMainTable.prototype.toggleDiciplineColumns = function(compTypeColumns){
    compTypeColumns.forEach(el => {
        if (el.dataset.discipline !== compType) {
            el.style.display = 'none';
        }
    });
}