export function showNewRow(athlete, keysAsNumbers){
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