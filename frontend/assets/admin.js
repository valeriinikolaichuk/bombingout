import { switchLanguage } from './js/components/switchLanguage.js';
import { retryQueuedRequests } from './js/components/retryQueue.js';
import { actions } from './js/components/actions/actions.js';
import { buttonReturn } from './js/components/buttonReturn.js';

document.addEventListener('DOMContentLoaded', async() => {
    await retryQueuedRequests();

    switchLanguage(window.appData.lang);
    buttonReturn(actions, window.appData);

    window.addEventListener(
        'online', async() => {
            await retryQueuedRequests();
        }
    );

    
    //    const initView = new InitView();
});