import { switchLanguage } from '../switchLanguage.js';
import { retryQueuedRequests } from './retryQueue.js';

document.addEventListener('DOMContentLoaded', () => {
    switchLanguage(window.appData.lang);
    retryQueuedRequests();

    //    const initView = new InitView();
});