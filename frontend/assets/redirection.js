import { retryQueuedRequests } from './retryQueue.js';
import { fetchAndSaveData } from './js/redirection/fetchAndSaveData.js';
import { checkConnectionsData } from './js/redirection/onPageLoad/checkConnectionsData.js';
import { switchLanguage } from './js/components/switchLanguage.js';
import { initButtons } from './js/redirection/buttons/initButtons.js';
import { login } from './js/login/login_functions/login.js';

document.addEventListener('DOMContentLoaded', async() => {
    await retryQueuedRequests();
    await fetchAndSaveData(window.appData.num);
 
    window.addEventListener(
        'online', async() => {
            await retryQueuedRequests();
            await fetchAndSaveData(window.appData.num);
        }
    );

    await checkConnectionsData();
    switchLanguage(window.appData.lang);
    initButtons(window.appData.lang);
    login();
});
