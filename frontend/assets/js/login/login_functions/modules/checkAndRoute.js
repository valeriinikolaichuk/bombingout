import { errorLoginMessage } from './errorLoginMessage.js';

export function checkAndRoute(json){
    if (!json.success) {
        document.getElementById("login").value = '';
        document.getElementById("password").value = '';

        if (json.message === 'login or password is not correct'){
            let mess = json.message;

            switch (json.language){
                case 'uk':
                    mess = 'невірний логін a6o пароль';
                    break;
                case 'pl':
                    mess = 'nieprawidłowy login lub hasło';
                    break;
            }

            alert(mess);
        } else if(json.message === 'You are already logged in from this browser'){
            errorLoginMessage(json);
            const dialog = document.getElementById("errorLoginDialog");
            dialog.showModal(); 
        }

        return;
    }

    window.location.href = "/";
}