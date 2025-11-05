function resizeRows(){
    const roWs = document.querySelectorAll("tr");
    if (roWs.length > 20){
        const windowHeight = window.innerHeight;
        const rowHeight = Math.floor(windowHeight / roWs.length);
        roWs.forEach(row => {
            row.style.height = rowHeight+'px';
            const cells = row.querySelectorAll("td");
            cells.forEach(cell => {
                cell.style.fontSize = rowHeight*0.6+'px';
                cell.style.padding = rowHeight*0.08+'px';
            });
        });

        const headerEl = document.getElementsByClassName("table_head_td")[0];
        headerEl.style.paddingRight = "300px";
    }
}

window.addEventListener("load", resizeRows);
window.addEventListener("resize", resizeRows);