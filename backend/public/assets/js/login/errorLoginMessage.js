export function errorLoginMessage(id, ip, agent){
    const errorMess = {
        en: {
            messOne: "<p>The program prevents repeated login from the same browser.</p>",
            messTwo: "<p>Press CONTINUE to close the message.</p>",
            messThree: "<p>If you cannot log in for another reason,</p>",
            messFour: "<p>press DELETE to remove previous registration entries and try again.</p>"
        },
        uk: {
            messOne: "<p>Програма виключає можливість повторного логування з того самого браузера.</p>",
            messTwo: "<p>Натисніть CONTINUE щоб закрити повідомлення.</p>",
            messThree: "<p>Якщо Ви не можете залогуватись з іншої причини,</p>",
            messFour: "<p>натисніть DELETE для видалення попередніх записів про реєстрацію та повторіть спробу.</p>"
        },
        pl: {
            messOne: "<p>Program wyklucza możliwość ponownego logowania z tej samej przeglądarki.</p>",
            messTwo: "<p>Naciśnij CONTINUE, aby zamknąć komunikat.</p>",
            messThree: "<p>Jeśli nie możesz się zalogować z innego powodu,</p>",
            messFour: "<p>naciśnij DELETE, aby usunąć wcześniejsze wpisy rejestracji i spróbować ponownie.</p>"
        }
    }

    document.getElementById('messOne').innerHTML = errorMess[lang].messOne;
    document.getElementById('messTwo').innerHTML = errorMess[lang].messTwo;
    document.getElementById('messThree').innerHTML = errorMess[lang].messThree;
    document.getElementById('messFour').innerHTML = errorMess[lang].messFour;

    document.getElementById('usersId').value = id;
    document.getElementById('usersIp').value = ip;
    document.getElementById('usersAgent').value = agent;

    const dialog = document.getElementById("errorLoginDialog");
    dialog.showModal();    
}