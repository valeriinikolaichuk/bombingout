const dialogContinue = document.getElementById("dialogContinue");
dialogContinue.addEventListener('click', () => {
    document.getElementById("loginDialog").close();
});

const dialogDelete = document.getElementById("dialogDelete");
dialogDelete.addEventListener('click', async  function() {
    let data = {
        usersId: document.getElementById("usersId").value,
        usersIp: document.getElementById("usersIp").value,
        usersAgent: document.getElementById("usersAgent").value
    };

    let response = await fetch("/api/delPreviousReg", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    if (!response.ok){
        throw new Error('error by path: /api/delPreviousReg');
    }

    let json = await response.json();

    document.getElementById("loginDialog").close();

    let mess;
    if (json.success){
        if (lang === 'uk'){
            mess = 'запис видалено';
        } else if (lang === 'pl'){
            mess = 'wpis został usunięty';
        } else {
            mess = json.message;
        }
    } else {
        if (lang === 'uk'){
            mess = 'помилка видалення';
        } else if (lang === 'pl'){
            mess = 'błąd usuwania';
        } else {
            mess = json.message;
        } 
    }

    alert(mess);
});