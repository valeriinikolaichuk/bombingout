import { login } from '../login/modules/login.js';

const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const url = "/api/login_redirect";
    login(url);
});