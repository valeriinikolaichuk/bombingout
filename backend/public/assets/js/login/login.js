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

    await response.json();

    if (!json.success) {
        let mess;
        if (lang === 'uk'){
            mess = 'невірний логін a6o пароль';
        } else if (lang === 'pl'){
            mess = 'невірний логін a6o пароль';
        } else {
            mess = json.message;
        }

        document.getElementById("login").value = '';
        document.getElementById("password").value = '';
        alert(mess);

        return;
    }

    window.location.href = "/";
});