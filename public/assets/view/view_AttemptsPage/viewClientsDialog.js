function ViewClientsDialog(){
    this.showDialogClients = document.getElementById('userDialog');
    this.openBtn = document.getElementById('openDialog');
    this.closeBtn = document.getElementById('closeDialog');
    this.clientsTbody = document.getElementById('clientsTbody');

    this.vmClientsDialog = new ViewModelClientsDialog(this);

    this.openBtn.addEventListener('click', () => {
        this.vmClientsDialog.getClientsData();
        this.showDialogClients.showModal();
    });

    this.closeBtn.addEventListener('click', () => {
        this.clientsTbody.innerHTML = "";
        this.showDialogClients.close();
    });
}