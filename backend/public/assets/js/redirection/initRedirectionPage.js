document.addEventListener('DOMContentLoaded', async () => {
    if (!appData.isRedirection && typeof checkSessionData === "function") {
        await checkSessionData();
    }

    switchLanguage(window.appData.lang);
    const viewRedirection = new ViewRedirection();
});
