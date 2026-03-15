export function tableLoadingFailed(tableErrorMessage, tableErrorButton, lang){

    const messages = {
        en: 'Error loading table. Check if the competition exists',
        uk: 'Помилка завантаження таблиці. Перевірте, чи існує змагання',
        pl: 'Błąd ładowania tabeli. Sprawdź, czy zawody istnieją'
    };

    const buttons = {
        en: 'CLOSE',
        uk: 'ЗАКРИТИ',
        pl: 'ZAMKNĄĆ'
    };

    const message = messages[lang] || messages.en;
    const button = buttons[lang] || buttons.en;

    tableErrorMessage.textContent = message;

    tableErrorButton.textContent = button;
}