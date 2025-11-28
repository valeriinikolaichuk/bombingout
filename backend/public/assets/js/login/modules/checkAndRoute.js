import { errorLoginMessage } from './errorLoginMessage.js';

export function checkAndRoute(json){
    if (!json.success) {
        document.getElementById("login").value = '';
        document.getElementById("password").value = '';

        if (json.message === 'login or password is not correct'){
            let mess;
            if (lang === 'uk'){
                mess = 'невірний логін a6o пароль';
            } else if (lang === 'pl'){
                mess = 'nieprawidłowy login lub hasło';
            } else {
                mess = json.message;
            }

            alert(mess);
        } else {
            errorLoginMessage(json.id, json.ip, json.agent);
        }

        return;
    }

    window.location.href = "/";
}