import { buttonsColor } from './modules/buttons.js';
import { messages } from './modules/content.js';

export function setText(lang){
    document.getElementById('language').value = lang;
    
    buttonsColor(lang);

    document.getElementById('head').innerHTML = messages[lang].head;
    document.getElementById('lineOne').innerHTML = messages[lang].lineOne;
    document.getElementById('lineTwo').innerHTML = messages[lang].lineTwo;
    document.getElementById('access').innerHTML = messages[lang].access;
}