export function deleteMessage(json){
    let mess = json.message;
    let lang = document.getElementById("usersLang").value;

    if (json.success){
        switch (lang){
            case 'uk':
                mess = 'запис видалено';
                break;
            case 'pl':
                mess = 'wpis został usunięty';
                break;
        }
    } else {
        switch (lang){
            case 'uk':
                mess = 'помилка видалення';
                break;
            case 'pl':
                mess = 'błąd usuwania';
                break;
        }
    }

    return mess;
}