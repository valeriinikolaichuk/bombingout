import { switchLanguage } from '../switchLanguage.js';
import { setText } from './login_page/setText.js';
import { setLanguage } from './login_page/setLanguage.js';
import { updateVisibility } from './login_page/updateVisibility.js';

document.addEventListener('DOMContentLoaded', () => {
    updateVisibility();

    setLanguage((lang) => {
        switchLanguage(lang);
        setText(lang);
    });
});