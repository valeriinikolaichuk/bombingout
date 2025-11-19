ViewModelAttemptsPage.prototype.getInputs = async function(allInputs, result, footerButtonValue){
    const dataArr = {};
    let dataToSend = {};

    allInputs.forEach(input => {
        const name = input.name;
        const value = input.value;

        if (dataArr[name]){
            if (!Array.isArray(dataArr[name])){
                dataArr[name] = [dataArr[name]];
            }

            dataArr[name].push(value);
        } else {
            dataArr[name] = value;
        }
    });

    for (const key in dataArr) {
        if (dataArr[key] === '' || dataArr[key] == null || key === '') {
            delete dataArr[key];
        }
    }

    if (result !== 'score_data'){
        const allAttemptColors = dataArr[`${discipline}_${attempt}_CSS`];
        const allLift_scores = dataArr[`${discipline}_${attempt}`];
        const allMain_ids = dataArr['main_id_score'];
        const allCategories = dataArr['category_num'];

        let attemptColor = '';
        let lift_score = '';
        let main_id_score = '';
        let category = '';
           
        if (result === 'cancel_att'){
            for (let x = 0; x < allAttemptColors.length; x++){
                if (allAttemptColors[x] !== 'color: #000000;'){
                    attemptColor = allAttemptColors[x];
                    lift_score = allLift_scores[x];
                    main_id_score = allMain_ids[x];
                    category = allCategories[x];
                    break;
                }
            }
        } else {
            for (let x = 0; x < allAttemptColors.length; x++){
                if (allAttemptColors[x] === 'color: #000000;'){
                    attemptColor = allAttemptColors[x];
                    lift_score = allLift_scores[x];
                    main_id_score = allMain_ids[x];
                    category = allCategories[x];
                    break;
                }
            }
        }

        if (attemptColor === '' || lift_score === '' || main_id_score === '' || category === ''){
            return;
        }

        dataToSend[`${discipline}_${attempt}_CSS`] = attemptColor;
        dataToSend[`${discipline}_${attempt}`] = lift_score;
        dataToSend['main_id_score'] = main_id_score;
        dataToSend['category_num'] = category;
    } else {
        dataToSend = dataArr;
    }

    dataToSend['compID'] = compID;
    dataToSend['discipline'] = discipline;
    dataToSend['attempt'] = attempt;
    dataToSend['good_no_lift'] = result;
    dataToSend['sessions_name'] = footerButtonValue;

    if ((`${discipline}_1` in dataToSend) && !(`${discipline}_2` in dataToSend) && 
        !(`${discipline}_3` in dataToSend) && !(`${discipline}_4` in dataToSend) && attempt > 1 ){
        dataToSend['attempt'] = 1;
        dataToSend['current_attempt'] = attempt;
    }

    const jsonData = JSON.stringify(dataToSend);
    let url = "assets/models_js/attempts_models/goodLift_json.php";

    let values = await this.sendInputs(url, jsonData);
    this.createTableRows(values);

    if (attempt > 2){
        url = "assets/models_js/attempts_models/addSessionsDataAttempts_json.php";
        let valuesNext = await this.sendJson(url, footerButtonValue);

        if (Array.isArray(valuesNext)){
            this.createNextTableRows(valuesNext);
        } else if (typeof valuesNext === "string" && valuesNext === "no groups found") {
            console.log(valuesNext);
        }
    }
}

ViewModelAttemptsPage.prototype.sendInputs = async function(url, jsonData){
    const responce = await fetch(url, {
        method: 'POST',
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
           },
        body: jsonData
    });

    if (!responce.ok){
        throw new Error('error by path: '+url);
    }

    let serverResponce = await responce.json();
    return serverResponce;
}