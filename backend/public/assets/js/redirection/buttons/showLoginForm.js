export function showLoginForm(form, parentClass, btn){
    const parentDiv = btn.closest("div");
    if (parentDiv.dataset.listener === 'off'){
        parentDiv.dataset.listener = 'on';

        form.addEventListener('click', (e) => {
            e.preventDefault();

            this.loginDialog = document.getElementById('loginDialog');
            this.closeBtn = document.getElementById('close');
            this.cancelBtn = document.getElementById('cancel');

            this.compStatus = document.getElementById('language');
            this.compStatus.value = parentClass;

            this.closeBtn.addEventListener('click', () => {
                this.loginDialog.close();
            });

            this.cancelBtn.addEventListener('click', () => {
                this.loginDialog.close();
            });

            this.loginDialog.showModal();
        });
    }
}