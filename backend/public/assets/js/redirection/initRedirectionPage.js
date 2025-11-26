document.addEventListener('DOMContentLoaded', async () => {
    await checkConnectionsData();
    checkConnectionsButtons();
    switchLanguage(window.appData.lang);
    const viewRedirection = new ViewRedirection();
});
