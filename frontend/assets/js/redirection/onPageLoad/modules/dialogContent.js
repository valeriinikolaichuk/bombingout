export function dialogContent(lang){
    const title = {
        en: 'Registered users: ',
        uk: 'Зареєстровано користувачів: ',
        pl: 'Zarejestrowano użytkowników: '
    }

    document.getElementById('titleText').textContent = title[lang];

    const info = {
        en: {
            delMessageOne: '<p>In case of improper termination, the table may display incorrect data.</p>',
            delMessageTwo: '<p>If the data does not match the number of registered users, click <b>DELETE</b>.</p>',
            contMessageOne: '<p>All user data except for the most recently registered will be deleted.</p>',
            contMessageTwo: '<p>If the data is correct, click <b>CONTINUE</b>.</p>'
        },
        uk: {
            delMessageOne: '<p>B випадку некоректного завершення роботи таблиця може показувати некоректні дані.</p>',
            delMessageTwo: '<p>Якщо дані не відповідають кількості зареєстрованих користувачів натисніть <b>DELETE</b>.</p>',
            contMessageOne: '<p>Bci дані про користувачів крім останнього зареєстрованого будуть видалені.</p>',
            contMessageTwo: '<p>Якщо дані коректні натисніть <b>CONTINUE</b>.</p>'
        },
        pl: {
            delMessageOne: '<p>W przypadku nieprawidłowego zakończenia pracy tabela może wyświetlać nieprawidłowe dane.</p>',
            delMessageTwo: '<p>Jeśli dane nie odpowiadają liczbie zarejestrowanych użytkowników, naciśnij <b>DELETE</b>.</p>',
            contMessageOne: '<p>Wszystkie dane o użytkownikach, oprócz ostatnio zarejestrowanego, zostaną usunięte.</p>',
            contMessageTwo: '<p>Jeśli dane są poprawne, naciśnij <b>CONTINUE</b>.</p>'
        }
    }

    document.getElementById('delMessageOne').innerHTML = info[lang].delMessageOne;
    document.getElementById('delMessageTwo').innerHTML = info[lang].delMessageTwo;
    document.getElementById('contMessageOne').innerHTML = info[lang].contMessageOne;
    document.getElementById('contMessageTwo').innerHTML = info[lang].contMessageTwo;
}