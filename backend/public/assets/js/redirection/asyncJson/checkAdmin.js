async function checkAdmin(){
    let data = {
        id_user: window.appData.num
    };

    let response = await fetch("/api/check_computer_status", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    let statusValue = await response.json();

    return statusValue.status;
}