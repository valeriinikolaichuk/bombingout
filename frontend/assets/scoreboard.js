import { switchLanguage } from './js/components/switchLanguage.js';
import { resizeRows } from './js/clients/resizeRowsScoreboard.js';
import './socket/websocket.js';

document.addEventListener('DOMContentLoaded', () => {
    switchLanguage(window.appData.lang);
    resizeRows();

/*
            checkSessionStatus();
            setInterval(checkSessionStatus, 20 * 60 * 1000);
            let lastCheck = Date.now();
            setInterval(() => {
                const now = Date.now();
                if (now - lastCheck > 120 * 1000){
                    console.log('waking up');
                    checkSessionStatus();
                }
                lastCheck = now;
            }, 10000);
*/

});

window.addEventListener("load", resizeRows);
window.addEventListener("resize", resizeRows);