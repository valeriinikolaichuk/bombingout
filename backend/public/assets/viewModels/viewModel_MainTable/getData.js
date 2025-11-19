ViewModelMainTable.prototype.getData = function(serverResponce){
    this.viewPrototype = Object.create(InitViewMainTable.prototype);
    this.viewPrototype.getTbody();

    let athlete = new Array();
    let objectLine;
    let countRow;
    let responceArrays;
    let trRowsId;

    let rowsArray = Array.from(this.viewPrototype.tboby.rows);
    let lenght = rowsArray.length;
    let rowsId = Array();

    for (let a=0; a < lenght; a++){
        trRowsId = rowsArray[a].id;
        rowsId[a] = trRowsId.slice(2);
    }

    let elIsInTable;
    let newTr;
    let countObj = Object.keys(serverResponce).length;
    let a=0;
    while (a < countObj){
        countRow = Object.keys(serverResponce[a]).length;
        if (countRow > 0){
            for (let data of serverResponce[a]){
                objectLine = data;
            }    
              
            responceArrays = Object.entries(objectLine);
            for (let c=0; c < 45; c++){
                athlete[responceArrays[c][0]] = responceArrays[c][1];
            }

            elIsInTable = 0;
            for (let a=0; a < lenght; a++){
                if (athlete["main_id"] == rowsId[a]){
                    ++elIsInTable;
                }
            }

            if (elIsInTable == 0){
                newTr = document.createElement('tr');
                newTr.id = 'tr'+athlete["main_id"];
                newTr.className = 'main_table';
                newTr.dataset.type = 'html';

                const parent = this.viewPrototype.tableRows;
                const secondChild = parent.children[1];
                parent.insertBefore(newTr, secondChild);

                this.cleanInputLine();
            }

            this.viewPrototype.tableHeaderOrder();
            this.inputLine = this.showNewRow(athlete, this.viewPrototype.keysAsNumbers);
            this.viewPrototype.newElement('tr', athlete["main_id"]).innerHTML = this.inputLine;
            this.viewPrototype.newElement('tr', athlete["main_id"]).dataset.type = 'html';

            this.vTableLinesPrototype = Object.create(ViewTableLines.prototype);
            this.langUk = this.vTableLinesPrototype.initDatasetColumn('[data-lang-show]');
            this.toggleLangColumns(this.langUk);
            this.dataDiscipline = this.vTableLinesPrototype.initDatasetColumn('[data-discipline]');
            this.toggleDiciplineColumns(this.dataDiscipline);
        }

        ++a;
        this.newNumber(this.viewPrototype.tableNumber);
    }
}