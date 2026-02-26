import { updateVisibility } from './js/login/login_page/updateVisibility.js';
import { switchLanguage } from './switchLanguage.js';
import { setText } from './js/login/login_page/setText.js';
import { setLanguage } from './js/login/login_page/setLanguage.js';
import { login } from './js/login/login_functions/login.js';
import { deletePreviousReg } from './js/login/login_functions/deletePreviousReg.js';
import { initPopup } from './js/login/login_page/initPopup.js';

document.addEventListener('DOMContentLoaded', () => {
    updateVisibility();

    window.appData = {lang: 'en' };

    setLanguage((lang) => {
        switchLanguage(lang);
        setText(lang);

        localStorage.setItem('lang', lang);
        window.appData = {lang: lang };
        window.dispatchEvent(
            new CustomEvent('lang:change', { detail: lang })
        );
    });

    login();
    deletePreviousReg();
    initPopup();

    const savedLang = localStorage.getItem('lang') || 'en';
    window.dispatchEvent(
        new CustomEvent('lang:change', { detail: savedLang })
    );
});