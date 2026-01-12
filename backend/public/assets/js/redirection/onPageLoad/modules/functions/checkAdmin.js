export async function checkAdmin(){
    let data = {
        id_user: window.appData.num
    };

    let response = await fetch("/api/check_admin", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    let statusValue = await response.json();

    if (statusValue.status !== 'not found'){
        const admin = document.getElementById('admin');
        admin.style.backgroundColor = "rgb(200,200,200)";
   }
}