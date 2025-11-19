function switchLanguage(lang){
    document.documentElement.lang = lang;
    const elements = document.querySelectorAll('[data-en]', '[data-uk]', '[data-pl]');
    elements.forEach(element => {
        if (lang === 'en'){
            element.textContent = element.dataset.en;
        } else if (lang === 'uk'){
            element.textContent = element.dataset.uk;
        } else if (lang === 'pl'){
            element.textContent = element.dataset.pl;
        }
    });
}