document.addEventListener('DOMContentLoaded', async () => {
    await checkConnectionsData();
    checkConnectionsButtons();
    switchLanguage(window.appData.lang);
    eventsListeners();
});
