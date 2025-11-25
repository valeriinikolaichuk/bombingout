import { errorLoginMessage } from './modules/errorLoginMessage.js';

const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", async function(e) {
    e.preventDefault();

    let data = {
        login: document.getElementById("login").value,
        password: document.getElementById("password").value,
        language: document.getElementById("language").value
    };

    let response = await fetch("/api/login", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    if (!response.ok){
        throw new Error('error by path: /api/login');
    }

    let json = await response.json();

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
});