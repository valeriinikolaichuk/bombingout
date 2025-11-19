ViewModelMainTable.prototype.showNewRow = function(athlete, keysAsNumbers){
    let year;
    let month;
    let day;

    for (let key in athlete) {
        if (athlete[key] === null) {
            athlete[key] = '';
        }
    }

    if (athlete["date_of_birth"] != ''){
        year = athlete["date_of_birth"].slice(0, 4);
        month = athlete["date_of_birth"].slice(5, 7);
        day = athlete["date_of_birth"].slice(8, 10);
        if (year == '0000'){
            year = '';
        }

        if (month == '00'){
        month = '';
        }

        if (day == '00'){
            day = '';
        }

    } else {
        year = '';
        month = '';
        day = '';
    }

    if (lang == 'uk'){
        catUK = athlete["category"].replace(/\s?kg$/, " кг");
        athlete["category"] = catUK;
    }

    if (athlete["rnk_fcst"] == 0){
        athlete["rnk_fcst"] = '';
    }

    if (athlete["ranking"] == 0){
        athlete["ranking"] = '';
    }

    if (athlete["points"] == 0){
        athlete["points"] = '';
    }

    let personally = '';
    let out_of_comp = '';
    let md = '';
    let dbl = '';

    if (athlete["personally"] > 0){
        personally = 'checked="checked"';
    }            

    if (athlete["out_of_comp"] > 0){
        out_of_comp = 'checked="checked"';
    }

    if (athlete["MD"] > 0){
        md = 'checked="checked"';
    }

    if (athlete["dbl"] > 0){
        dbl = 'checked="checked"';
    }

    const keyName = ["rnk_fcst", "ranking", "points", "bench_press_rnk_fcst", "bench_press_rnk", "points_bp"];
    for (let index = 0; index < 6; index++){
        if (athlete[keyName[index]] == 0){
            athlete[keyName[index]] = '';
        }
    }

    let xx = 11;
    let lines = ['<td id="td'+xx+athlete["main_id"]+'" style="display: none;">'+athlete["main_id"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" class="table_number sticky" style="left: 0px; background-color: white;"></td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" class="sticky" style="left: 37px; background-color: rgb(245, 245, 245);">'+athlete["surname_name"]+'<div class="table_border"></td>',
        '<td id="tdDd'+athlete["main_id"]+'" class="sticky" style="left: 337px; text-align: center; background-color: rgb(245, 245, 245);">'+day+'</td>',
        '<td id="tdMo'+athlete["main_id"]+'" class="sticky" style="left: 392px; text-align: center; background-color: rgb(245, 245, 245);">'+month+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" class="sticky" style="left: 447px; text-align: center; background-color: rgb(245, 245, 245);">'+year+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" class="sticky" style="left: 522px; background-color: rgb(245, 245, 245);">'+athlete["category"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["bodyweight"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;">'+athlete["iPF_GL_Cf"]+'</td>', 
        '<td style="display: none;"></td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="text-align: center;">'+athlete["grp"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="text-align: center;">'+athlete["lot"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="text-align: center;" data-lang-show="uk">'+athlete["rank_class"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["region"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["city"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["club"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["trener_1"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["trener_2"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["trener_3"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["trener_4"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'">'+athlete["titles"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'"><input class="input" type="checkbox" '+personally+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'"><input class="input" type="checkbox" '+out_of_comp+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'"><input class="input" type="checkbox" '+md+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'"><input class="input" type="checkbox" '+dbl+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["squat_nom"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;">'+athlete["bench_press_nom"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["deadlift_nom"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["total_nom"]+'</td>',
        '<td style="display: none;"></td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["squat_1"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;">'+athlete["bench_press_1"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["deadlift_1"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["total_1_att"]+'</td>', 
        '<td style="display: none;"></td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="bench_press">'+athlete["bench_press_fcst"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["squat_res"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;">'+athlete["bench_press_res"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["deadlift_res"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["total_fcst"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["total"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["iPF_GL_fcst"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="powerlifting">'+athlete["iPF_GL"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="bench_press">'+athlete["wilks_fcst_bench_press"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px;" data-discipline="bench_press">'+athlete["wilks_bench_press"]+'</td>', 
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="powerlifting">'+athlete["rnk_fcst"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="powerlifting">'+athlete["ranking"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="powerlifting">'+athlete["points"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="bench_press">'+athlete["bench_press_rnk_fcst"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="bench_press">'+athlete["bench_press_rnk"]+'</td>',
        '<td id="td'+(++xx)+athlete["main_id"]+'" style="font-size: 17px; text-align: center;" data-discipline="bench_press">'+athlete["points_bp"]+'</td>'
    ];

    let allLines = lines.length;
    let inputLine = '';
    let a = 0;
    for (let x = keysAsNumbers[a]; x < allLines; x = keysAsNumbers[++a]){ 
        inputLine = inputLine + lines[x];
    }

    return inputLine;
}

ViewModelMainTable.prototype.cleanInputLine = function(){
    let tdNumber;
    let inputElement;
    let arrForId = ['personally', 'out_of_comp', 'md', 'dbl', 'squat_nom', 'bench_press_nom', 'deadlift_nom', 'squat_1', 'bench_press_1', 'deadlift_1'];

    let cAt = new Array();
    let catLang = new Array();
    if (compVersion == 'IBSA'){
        if (compSex == 'men'){
            cAt = ['', '56 kg', '60 kg', '67,5 kg', '75 kg', '82,5 kg', '90 kg', '100 kg', '110 kg', '125 kg', '125+ kg'];
            if (lang == 'uk'){
                catLang = ['', '56 кг', '60 кг', '67,5 кг', '75 кг', '82,5 кг', '90 кг', '100 кг', '110 кг', '125 кг', '125+ кг'];
            } else {
                catLang = cAt;
            }
        } else {
            cAt = ['', '48 kg', '52 kg', '56 kg', '60 kg', '67,5 kg', '75 kg', '82,5 kg', '90 kg', '100 kg', '100+ kg'];
            if (lang == 'uk'){
                catLang = ['', '48 кг', '52 кг', '56 кг', '60 кг', '67,5 кг', '75 кг', '82,5 кг', '90 кг', '100 кг', '100+ кг'];
            } else {
                catLang = cAt;
            }
        }
    }

    let newOption;

    this.viewPrototype.viewInputLine();

    this.viewPrototype.lineTd130.value = null;
    this.viewPrototype.lineTdDd0.value = '0';
    this.viewPrototype.lineTdMo0.value = '0';
    this.viewPrototype.lineTd140.value = '0000';
    
    this.viewPrototype.lineTd150.innerHTML='';
    for (let c = 0; c < 11; c++){
        newOption = new Option(cAt[c], catLang[c]);
        this.viewPrototype.lineTd150.append(newOption);
    }

    this.viewPrototype.lineTd160.value = null;
    this.viewPrototype.lineTd170.textContent = '';
    this.viewPrototype.lineCoeffInput.value = null;

    tdNumber = 190;
    while (tdNumber <= 280){
        this.viewPrototype.newElement('td', tdNumber).value = null;
        tdNumber = tdNumber + 10;
    }

    tdNumber = 290;
    for (let a=0; a < 4; a++){
        this.viewPrototype.newElement(arrForId[a], tdNumber).innerHTML='';

        inputElement = document.createElement('input');
        inputElement.id = "td"+tdNumber;
        inputElement.className = "input";
        inputElement.type = "checkbox";
        inputElement.name = arrForId[a];
        inputElement.value = "-1";

        this.viewPrototype.newElement(arrForId[a], tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    tdNumber = 330;
    for (let a=4; a < 7; a++){
        this.viewPrototype.newElement(arrForId[a], tdNumber).innerHTML='';
        inputElement = this.createNewInput(tdNumber, arrForId[a]);
        this.viewPrototype.newElement(arrForId[a], tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    this.viewPrototype.lineTotalNom.value = '';
    this.viewPrototype.lineTd360.textContent = '';

    tdNumber = 370;
    for (let a=7; a < 10; a++){
        this.viewPrototype.newElement(arrForId[a], tdNumber).innerHTML='';
        inputElement = this.createNewInput(tdNumber, arrForId[a]);
        this.viewPrototype.newElement(arrForId[a], tdNumber).appendChild(inputElement);
        tdNumber = tdNumber + 10;
    }

    this.viewPrototype.lineTotalFirstAtt.value = '';
    this.viewPrototype.lineTd400.textContent = '';
}

ViewModelMainTable.prototype.createNewInput = function(tdNumber, arrForId){
    this.inputEl = document.createElement('input');
    this.inputEl.id = "td"+tdNumber;
    this.inputEl.className = "input";
    this.inputEl.type = "number";
    this.inputEl.min = 0;
    this.inputEl.max = 999;
    this.inputEl.step =0.5;
    this.inputEl.name = arrForId;

    return this.inputEl;
}