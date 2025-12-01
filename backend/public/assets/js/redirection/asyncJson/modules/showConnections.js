export function showConnections(json){
    const countElem = document.getElementById('userCount');
    const tableBody = document.querySelector('#connectionsTable tbody');

    countElem.textContent = json.count;
    tableBody.innerHTML = "";

    json.connections.forEach((item, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `<td>${index + 1}</td><td>💻</td><td>${item.ipAddress}</td><td>${item.userAgent}</td><td>${item.users_status}</td>`;

        tableBody.appendChild(row);
    }); 
}