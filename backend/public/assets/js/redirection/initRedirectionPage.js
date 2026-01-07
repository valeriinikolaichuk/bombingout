document.addEventListener('DOMContentLoaded', () => {
//    await checkConnectionsData();
    checkConnectionsButtons();
    switchLanguage(window.appData.lang);
    eventsListeners();
});
