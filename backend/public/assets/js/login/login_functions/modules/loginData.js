export function getLoginData() {
    return {
        login: document.getElementById("login")?.value ?? null,
        password: document.getElementById("password")?.value ?? null,
        language: document.getElementById("language")?.value ?? null,
        page: document.getElementById("page")?.value ?? null,
        type: 'check by login and password',
        loginMethod: 'default'
    };
}