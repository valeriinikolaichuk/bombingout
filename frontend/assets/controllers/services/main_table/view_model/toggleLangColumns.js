export function toggleLangColumns(langUkColumns){
    langUkColumns.forEach(el => {
        if (el.dataset.langShow === lang) {
            el.style = 'text-align: center; width: 70px;';
        } else {
            el.style.display = 'none';
        }
    });
}