const loginForm = document.getElementById("loginForm");
loginForm.addEventListener("submit", async function(e) {
    e.preventDefault();

    let data = {
        login: document.getElementById("login").value,
        password: document.getElementById("password").value,
        language: document.getElementById("language").value
    };

    let response = await fetch("assets/models_js/login_json.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    await response.json();
    window.location.href = "index.php";
});