function ViewModelRedirection(){
    this.activeForm = null;
    this.originalBtn = null;
    this.handleClick = this.handleClick.bind(this);
    this.handleDocumentClick = this.handleDocumentClick.bind(this);
}

ViewModelRedirection.prototype.handleDocumentClick = function(event){
    if (this.activeForm && !this.activeForm.contains(event.target)) {
        this.activeForm.replaceWith(this.originalBtn);
        this.activeForm = null;
        this.originalBtn = null;
    }
}

ViewModelRedirection.prototype.handleClick = function(btn, parentClass){
    if (this.activeForm) {
        this.activeForm.replaceWith(this.originalBtn);
        this.activeForm = null;
        this.originalBtn = null;
    }

    if (parentClass == 'admin'){
        this.checkAdmin(parentClass, btn);
    } else {
        this.createForm(parentClass, btn);
    }
}

ViewModelRedirection.prototype.checkAdmin = async function(parentClass, btn) {
    let response = await fetch("assets/models_js/redirection_models/checkStatusAdmin_json.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(num)
    });

    let statusValue = await response.json();

    if (statusValue == 'not found'){
        this.createForm(parentClass, btn);
    } else {
        btn.style="background-color: rgb(200, 200, 200);";
    }
}

ViewModelRedirection.prototype.createForm = function(parentClass, btn){
    const form = document.createElement("form");
    form.method = "POST";

    const submitBtn = document.createElement("button");
    submitBtn.className = "button_comp_status";
    submitBtn.type = "submit";
    submitBtn.value = parentClass;
    submitBtn.textContent = btn.textContent;
    submitBtn.style = "background-color: rgba(254, 90, 90, 1);";

    if (parentClass == "logout"){
        submitBtn.name = "logout";
    } else {
        submitBtn.name = "comp_status";
    }

    form.appendChild(submitBtn);
    btn.replaceWith(form);

    this.activeForm = form;
    this.originalBtn = btn;

    if (parentClass == "admin" || parentClass == "weighingIn"){
        form.addEventListener('click', (e) => {
            e.preventDefault();
            this.viewRedPrototype = Object.create(ViewRedirection.prototype);
            this.dialog = this.viewRedPrototype.initPopup('loginDialog');
            this.closeBtn = this.viewRedPrototype.initPopup('close');
            this.cancelBtn = this.viewRedPrototype.initPopup('cancel');
            this.compStatus = this.viewRedPrototype.initPopup('comp_status');
            this.compStatus.textContent = parentClass;

            this.closeBtn.addEventListener('click', () => {
                this.dialog.close();
            });

            this.cancelBtn.addEventListener('click', () => {
                this.dialog.close();
            });

            this.dialog.addEventListener('click', (e) => {
                const rect = this.dialog.getBoundingClientRect();
                if (
                    e.clientX < rect.left ||
                    e.clientX > rect.right ||
                    e.clientY < rect.top ||
                    e.clientY > rect.bottom
                ) {
                    this.dialog.close();
                }
            });

            this.loginForm = this.viewRedPrototype.initPopup('loginForm');
            this.reLogin(this.loginForm);
            this.dialog.showModal();
        });
    }
}

ViewModelRedirection.prototype.reLogin = function(loginForm){
    loginForm.addEventListener("submit", async function(e) {
        e.preventDefault();

        let data = {
            login: document.getElementById("login").value,
            password: document.getElementById("password").value,
            compStatus: document.getElementById("comp_status").textContent
        };

        let response = await fetch("assets/models_js/redirection_models/reLogin_json.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(data)
        });

        let result = await response.json();
        if (result == 'TRUE'){
            window.location.href = "index.php";
        } else {
            const messages = {
                en: 'Login or password is incorrect',
                uk: 'Логін a6o пароль невірний',
                pl: 'Login lub hasło jest nieprawidłowe'
            };

            alert(messages[lang]);
        }
    });
}