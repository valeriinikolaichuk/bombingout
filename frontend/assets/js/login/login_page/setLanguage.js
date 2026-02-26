export function setLanguage(onChange) {
    document.querySelectorAll('.languageButton').forEach(btn => {
        btn.addEventListener('click', () => {
            onChange(btn.id);
        });
    });
}