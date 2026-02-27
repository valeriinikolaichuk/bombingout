export function showLoginForm(form, parentClass, btn, lang){
    if (btn.dataset.listener === 'off'){
        btn.dataset.listener = 'on';

        form.addEventListener('click', (e) => {
            e.preventDefault();

            document.getElementById('login').value = '';
            document.getElementById('password').value = '';

            this.loginDialog = document.getElementById('loginDialog');
            this.closeBtn = document.getElementById('close');
            this.cancelBtn = document.getElementById('cancel');

            this.languageValue = document.getElementById('language');
            this.languageValue.value = lang;

            this.compStatus = document.getElementById('comp_status');
            this.compStatus.textContent = parentClass;

            this.closeBtn.addEventListener('click', () => {
                btn.dataset.listener = 'off';
                this.loginDialog.close();
            });

            this.cancelBtn.addEventListener('click', () => {
                btn.dataset.listener = 'off';
                this.loginDialog.close();
            });

            this.loginDialog.showModal();
        });
    }
}