function resizeRows(){
    const taBle = document.querySelector(".table_header_title");
    const roWs = taBle.querySelectorAll("tr");
    if (roWs.length > 23){
        const heAder = document.querySelector(".table_header");
        const windowHeight = window.innerHeight;
        const headerHeight = heAder.offsetHeight;
        const availableHeight = windowHeight - headerHeight;
        const rowHeight = Math.floor(availableHeight / roWs.length);
        roWs.forEach(row => {
            row.style.height = rowHeight+'px';
            const cells = row.querySelectorAll("td");
            cells.forEach(cell => {
                cell.style.fontSize = rowHeight*0.6+'px';
                cell.style.padding = rowHeight*0.08+'px';
            });
        });
    }
}

window.addEventListener("load", resizeRows);
window.addEventListener("resize", resizeRows);