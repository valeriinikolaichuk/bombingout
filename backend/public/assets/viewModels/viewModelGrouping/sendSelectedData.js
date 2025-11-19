ViewModelGroupingPage.prototype.sendSelectedData = async function(url, dataJson){
    const responce = await fetch(url, {
        method: 'POST',
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
           },
        body: dataJson
    });

    if (!responce.ok){
        throw new Error('error by path: '+url);
    }

    let serverResponce = await responce.json();
    if (url == "assets/models_js/grouping_models/sendGroupsAuto_json.php"){
        this.setNewValues(serverResponce, '.editable');
    } else if (url == "assets/models_js/grouping_models/lotNumber_json.php"){
        this.setNewValues(serverResponce, '.editlot');
    } else if (url == "assets/models_js/grouping_models/newSessionDate_json.php"){
        this.setNewTime(serverResponce);
    }

    return serverResponce;
}

ViewModelGroupingPage.prototype.setNewValues = function(serverResponce, condition){
    const newData = JSON.stringify(serverResponce);
    serverResponce.forEach(item => {
        const row = this.viewGroupingPage.getRow(item.id);
        if (row) {
            const changeCell = this.viewGroupingPage.getCell(row, condition);
            if (changeCell) {
                changeCell.textContent = item.newValue;
            }
        }
    });

    this.highlightEvenGroups();
}

ViewModelGroupingPage.prototype.setNewTime = function(date){
    const dateObj = new Date(date);

    const hours = String(dateObj.getHours()).padStart(2, '0');
    const minutes = String(dateObj.getMinutes()).padStart(2, '0');
    const year = dateObj.getFullYear();
    const month = String(dateObj.getMonth() + 1).padStart(2, '0');
    const day = String(dateObj.getDate()).padStart(2, '0');

    const formatted = `${hours}:${minutes}&nbsp;&nbsp;&nbsp;(${year}-${month}-${day})`;

    const datetimeEl = this.viewGroupingPage.setNewDatetime();
    datetimeEl.innerHTML = formatted;
}