import { checkAndRoute } from './modules/checkAndRoute.js';
import { redirectToPage } from '../../redirection/redirectToPage.js';
import { getLoginData } from './modules/loginData.js';

const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const loginData = getLoginData();

    let response = await fetch("/api/login", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(loginData)
    });

    if (!response.ok){
        throw new Error('error by path: /api/login');
    }

    let json = await response.json();

    if (json.page){
        redirectToPage(json);
    }

    checkAndRoute(json);
});