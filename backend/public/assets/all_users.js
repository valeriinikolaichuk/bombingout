const diaLog = document.getElementById("create-user");

function showCreateUserDialog(){
    diaLog.showModal();
}

function closeCreateUserDialog(){
    diaLog.close();
}

const loginForm = document.getElementById("regForm");
loginForm.addEventListener("submit", async function(e) {
    e.preventDefault();

    let loginValue = document.getElementById("login").value;
    let passwordValue = document.getElementById("password").value;
    let userValue = document.getElementById("user").value;
    let teamValue = '';
    if (document.getElementById("team")){
        teamValue = document.getElementById("team").value;
    }

    if (loginValue == '' || passwordValue == ''){
        const messages = {
            en: 'Fields login & password must be completed',
            uk: 'Поля логіну та пароля повинні бути заповнені',
            pl: 'Pola login i hasło muszą być wypełnione'
        };

        document.getElementById("login").value = '';
        document.getElementById("password").value = '';
        if (document.getElementById("team")){
            document.getElementById("team").value = '';
        }

        alert(messages[lang]);
        return;
    }

    let data = {
        login: loginValue,
        password: passwordValue,
        status: userValue,
        team: teamValue,
        id_status: num
    };

    let response = await fetch("assets/models_js/registrationOfNewUser_json.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    let result = await response.json();
    if (result == 'TRUE'){
        window.location.href = "admin.php";
    } else {
        const messages = {
            en: 'User with such login or password already exists',
            uk: 'Користувач із таким логіном a6o паролем уже існує',
            pl: 'Użytkownik z takim loginem lub hasłem już istnieje'
        };

        document.getElementById("login").value = '';
        document.getElementById("password").value = '';
        if (document.getElementById("team")){
            document.getElementById("team").value = '';
        }

        alert(messages[lang]);
    }
});