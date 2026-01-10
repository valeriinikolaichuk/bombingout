import { updateVisibility } from './login_page/updateVisibility.js';
import { switchLanguage } from '../switchLanguage.js';
import { setText } from './login_page/setText.js';
import { setLanguage } from './login_page/setLanguage.js';
import { initPopup } from './login_page/initPopup.js';

document.addEventListener('DOMContentLoaded', () => {
    updateVisibility();

    setLanguage((lang) => {
        switchLanguage(lang);
        setText(lang);

        localStorage.setItem('lang', lang);
        window.dispatchEvent(
            new CustomEvent('lang:change', { detail: lang })
        );
    });

    initPopup();

    const savedLang = localStorage.getItem('lang') || 'en';
    window.dispatchEvent(
        new CustomEvent('lang:change', { detail: savedLang })
    );
});