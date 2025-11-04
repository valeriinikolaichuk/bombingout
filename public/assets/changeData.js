function changeData(lang){
    document.getElementById('language').value = lang;
    const enButton = document.getElementById('en');
    const ukButton = document.getElementById('uk');
    const plButton = document.getElementById('pl');
    if (lang === 'en'){
        enButton.style="background-color: rgb(252, 78, 78);";
        ukButton.style="background-color: white;";
        plButton.style="background-color: white;";
    } else if (lang === 'uk'){
        enButton.style="background-color: white;";
        ukButton.style="background-color: rgb(252, 78, 78);";
        plButton.style="background-color: white;";
    } else if (lang === 'pl'){
        enButton.style="background-color: white;";
        ukButton.style="background-color: white;";
        plButton.style="background-color: rgb(252, 78, 78);";
    }

    const messages = {
        en: {
            head: "<p><b>Online Platform for Managing Powerlifting Competitions</b></p>",
            lineOne: "<p>This project is built to manage powerlifting competitions. It enables full control over athlete attempts,</p>",
            lineTwo: "<p>weight selection, and real-time result display. The interface is optimized for use on the competition platform.</p>",
            access: "<p>🔒 Access is restricted to authorized users only. 📩 Please contact us to request access or technical support: 📧 powerlift.rv@gmail.com</p>"
        },
        uk: {
            head: "<p><b>Онлайн-система для проведення змагань з пауерліфтингу</b></p>",
            lineOne: "<p>Цей проект розроблено для організації змагань з пауерліфтингу. Він дозволяє керувати виступами учасників, вагами,</p>",
            lineTwo: "<p>спробами, a також відображати результати в реальному часі. Інтерфейс адаптовано для роботи на змагальному помості.</p>",
            access: "<p>🔒 Доступ до системи лише для авторизованих користувачів. 📩 Звертайтесь для отримання доступу a6o технічної підтримки: 📧 powerlift.rv@gmail.com</p>"
        },
        pl: {
            head: "<p><b>System online do przeprowadzania zawodów w trójboju siłowym</b></p>",
            lineOne: "<p>Projekt przeznaczony do organizacji zawodów w trójboju siłowym. Umożliwia zarządzanie występami zawodników,</p>",
            lineTwo: "<p>wyborem ciężaru i prezentacją wyników na żywo. Interfejs jest zoptymalizowany do pracy na pomoście sędziowskim.</p>",
            access: "<p>🔒 Dostęp tylko dla autoryzowanych użytkowników. 📩 Skontaktuj się z nami, aby uzyskać dostęp lub pomoc techniczną: 📧 powerlift.rv@gmail.com</p>"
        }
    }

    document.getElementById('head').innerHTML = messages[lang].head;
    document.getElementById('lineOne').innerHTML = messages[lang].lineOne;
    document.getElementById('lineTwo').innerHTML = messages[lang].lineTwo;
    document.getElementById('access').innerHTML = messages[lang].access;
}