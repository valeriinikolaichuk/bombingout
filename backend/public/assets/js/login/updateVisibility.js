function updateVisibility() {
    if (window.innerWidth < 768) {
        const index = document.querySelector('.index');
        index.style.height = 'auto';
        index.style.alignItems = 'flex-start';

        const inputEl = document.querySelectorAll('input');
        inputEl.forEach(el => el.style.width = '70px');

        const login = document.querySelector('.login');
        login.style.height = '300px';
        login.style.marginTop = '100px';

        const buttonsBoxes = document.querySelectorAll('.buttons_box');
        buttonsBoxes.forEach(el => el.style.height = '300px');

        const buttonsIn = document.querySelectorAll('.buttonStyle');
        buttonsIn.forEach(el => el.style.marginTop ='25px');
    }
}

updateVisibility();