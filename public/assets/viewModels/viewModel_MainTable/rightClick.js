ViewModelMainTable.prototype.eventRightClick = function(getId, deleteParticipant){
    let mainId = getId.slice(4);
    this.rightClickOff();
    this.rightClickOn();
    deleteParticipant.value = mainId;
}

ViewModelMainTable.prototype.rightClickOn = function(){
    this.viewRightClick = Object.create(InitViewMainTable.prototype);
    this.viewRightClick.rightClick();
    this.viewRightClick.rightClickToolbar.classList.remove("right_click");
    this.viewRightClick.rightClickToolbar.classList.add("right_click_active");
    this.viewRightClick.rightClickToolbar.style.top = `${event.pageY}px`;
    this.viewRightClick.rightClickToolbar.style.left = `${event.pageX}px`;
}

ViewModelMainTable.prototype.rightClickOff = function(){
    this.viewRightClick = Object.create(InitViewMainTable.prototype);
    this.viewRightClick.rightClick();
    let classSet = this.viewRightClick.rightClickToolbar.classList.contains("right_click_active");
    if (classSet == true){
        this.viewRightClick.rightClickToolbar.classList.remove("right_click_active");
        this.viewRightClick.rightClickToolbar.classList.add("right_click");
    }
}

ViewModelMainTable.prototype.deleteThisParticipant = async function(deleteParticipant){
    this.deleteParticipant = deleteParticipant;
    let mainId = this.deleteParticipant.value;

    this.viewPrototype = Object.create(InitViewMainTable.prototype);

    if (this.viewPrototype.newElement('td13', mainId) != null){
        let partIcipant = this.viewPrototype.newElement('td13', mainId).textContent;
        let queStion = confirm('delete '+partIcipant+' ?');
        if (queStion == true){
            let dataArray = {
                category: this.viewPrototype.newElement('td15', mainId).textContent,
                mainId: mainId,
                compID: compID
            };

            let dataIdJson = JSON.stringify(dataArray);
            let url = "assets/models_js/main_models/deleteAParticipant_json.php";

            this.vmMainPageProt = Object.create(ViewModelMainPage.prototype);
            let serverResponce = this.vmMainPageProt.sendData(url, dataIdJson);

            this.deleteParticipant.value ='';
            console.log(serverResponce);
        } else {
            this.rightClickOff();
            this.deleteParticipant.value ='';       
        }
    }
}