import { buttonsColor } from './buttons.js';
import { messages } from './content.js';

window.setText = function(lang){
    document.getElementById('language').value = lang;
    
    buttonsColor(lang);

    document.getElementById('head').innerHTML = messages[lang].head;
    document.getElementById('lineOne').innerHTML = messages[lang].lineOne;
    document.getElementById('lineTwo').innerHTML = messages[lang].lineTwo;
    document.getElementById('access').innerHTML = messages[lang].access;
}