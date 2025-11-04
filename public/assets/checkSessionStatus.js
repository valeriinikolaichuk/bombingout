const postForm = document.getElementById("postForm");
postForm.addEventListener("submit", (e) => {
    e.preventDefault();
});

function checkSessionStatus(){
    fetch("assets/models_js/keepalive.php", { method: "POST" })
        .then(res => res.json())
        .then(data => {
            if (data.status === "alive"){
                const messages = {
                    en: "Session is kept alive",
                    uk: "Сесія підтримується",
                    pl: "Sesja jest podtrzymywana"
                };

                console.log(messages[lang]);
            } else {
                postForm.submit();
                }
        }).catch(err => console.error("Keepalive error:", err));
}