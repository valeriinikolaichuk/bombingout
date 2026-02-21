import { switchLanguage } from '../switchLanguage.js';
import { retryQueuedRequests } from '../../../../../frontend/src/retryQueue.js';
import { fetchAndSaveCompetitions } from './fetchAndSaveCompetitions.js';

document.addEventListener('DOMContentLoaded', async() => {
    switchLanguage(window.appData.lang);

    await retryQueuedRequests();
    await fetchAndSaveCompetitions(window.appData.num);

    window.addEventListener(
        'online', async() => {
            await retryQueuedRequests();
            await fetchAndSaveCompetitions(window.appData.num);
        }
    );

    
    //    const initView = new InitView();
});