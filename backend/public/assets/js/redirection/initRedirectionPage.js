import { checkConnectionsData } from './onPageLoad/checkConnectionsData.js';
import { switchLanguage } from '../switchLanguage.js';
import { initButtons } from './buttons/initButtons.js';
import { login } from '../login/login_functions/login.js';

document.addEventListener('DOMContentLoaded', async() => {
    await checkConnectionsData();
    switchLanguage(window.appData.lang);
    initButtons(window.appData.lang);
    login();
});
