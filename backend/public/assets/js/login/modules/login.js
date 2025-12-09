import { checkAndRoute } from './checkAndRoute.js';
import { redirectToPage } from '../../redirection/redirectToPage.js';

export async function login(url){
    let data = {
        login: document.getElementById("login")?.value ?? null,
        password: document.getElementById("password")?.value ?? null,
        language: document.getElementById("language")?.value ?? null,
        page: document.getElementById("page")?.value ?? null,
        type: 'check by login and password'
    };

    let response = await fetch(url, {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    if (!response.ok){
        throw new Error('error by path: '+url);
    }

    let json = await response.json();

    if (url === "/api/login"){
        checkAndRoute(json);
    } else {
        redirectToPage(json);
    }
}