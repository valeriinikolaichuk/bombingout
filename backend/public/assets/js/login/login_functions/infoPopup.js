const textDialog = document.getElementById('text-dialog');
const returnToPage = document.getElementById('returnToPage');
const textDialogClose = document.querySelector('.btn-close');

returnToPage.addEventListener('click', () => {
    textDialog.close();
});

textDialogClose.addEventListener('click', () => {
    textDialog.close();
});

document.querySelectorAll('.buttonStyle').forEach((btn) => {
    btn.addEventListener("click", () => {
        textDialog.showModal();
    });
});