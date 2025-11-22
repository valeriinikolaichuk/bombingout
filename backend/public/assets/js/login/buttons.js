export function buttonsColor(lang){
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
}