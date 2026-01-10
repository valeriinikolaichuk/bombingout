export function initPopup() {
    const textDialog = document.getElementById('text-dialog');
    const returnToPage = document.getElementById('returnToPage');
    const textDialogClose = document.querySelector('.btn-close');

    returnToPage.addEventListener('click', () => {
        textDialog.close();
    });

    textDialogClose.addEventListener('click', () => {
        textDialog.close();
    });

    document.querySelectorAll('[data-popup]').forEach((btn) => {
        btn.addEventListener("click", () => {
            const type = btn.dataset.popup;

            window.dispatchEvent(
                new CustomEvent('popup:open', { detail: type })
            );

            textDialog.showModal();
        });
    });
}