import { checkAndRoute } from './modules/checkAndRoute.js';
import { redirectToPage } from './modules/redirectToPage.js';
import { getLoginData } from './modules/loginData.js';

export function login(){
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const loginData = getLoginData();

        let response = await fetch("/api/login", {
            method: "POST",
            credentials: "include",
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
}
