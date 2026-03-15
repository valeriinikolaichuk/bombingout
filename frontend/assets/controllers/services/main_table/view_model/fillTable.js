import { compVersions } from "../components/compVersions";

export function fillTable(rows){
    inputCategories = document.getElementById('td150');

    let cAt = new Array();
    let catLang = new Array();

    if (window.appData.compVersion == 'IBSA'){
        if (window.appData.compSex == 'men'){
            cAt = ['', ...compVersions.IBSA.open.en.men];
            if (window.appData.lang == 'uk'){
                catLang = ['', ...compVersions.IBSA.open.uk.men];
            } else {
                catLang = cAt;
            }
        } else {
            cAt = ['', ...compVersions.IBSA.open.en.women];
            if (window.appData.lang == 'uk'){
                catLang = ['', ...compVersions.IBSA.open.uk.women];
            } else {
                catLang = cAt;
            }
        }
    }

    inputCategories.innerHTML='';
    let newOption;
    for (let c = 0; c < 11; c++){
        newOption = new Option(cAt[c], catLang[c]);
        inputCategories.append(newOption);
    }

    rows.forEach(row => {
        const id = row.id;
        const x = 11;

        document.getElementById('td'+x+id).textContent = row.main_id;
        document.getElementById('td'+(x + 2)+id).textContent = row.surname_name ?? '';

        const dateStr = row.date_of_birth;
        const [year, month, day] = dateStr.split('-');
        if (year == '0000'){
            year = '';
        }

        if (month == '00'){
            month = '';            
        }

        if (day == '00'){
            day = '';
        }

        document.getElementById('tdDd'+id).textContent = day ?? '';
        document.getElementById('tdMo'+id).textContent = month ?? '';
        document.getElementById('td'+(x + 3)+id).textContent = year ?? '';

        let category = row.category;
        if (window.appData.lang == 'uk'){
            category = category.replace("kg", "кг")
        }

        document.getElementById('td'+(x + 4)+id).textContent = category ?? '';
        document.getElementById('td'+(x + 5)+id).textContent = row.bodyweight ?? '';
        document.getElementById('td'+(x + 6)+id).textContent = Number(row.coef) > 0 
                                                               ? Number(row.coef).toFixed(4) 
                                                               : '';
        document.getElementById('td'+(x + 7)+id).textContent = row.grp ?? '';
        document.getElementById('td'+(x + 8)+id).textContent = row.lot ?? '';
        document.getElementById('td'+(x + 9)+id).textContent = row.rank_class ?? '';
        document.getElementById('td'+(x + 10)+id).textContent = row.region ?? '';
        document.getElementById('td'+(x + 11)+id).textContent = row.city ?? '';
        document.getElementById('td'+(x + 12)+id).textContent = row.club ?? '';

        document.getElementById('td'+(x + 13)+id).textContent = row.trener_1 ?? '';
        document.getElementById('td'+(x + 14)+id).textContent = row.trener_2 ?? '';
        document.getElementById('td'+(x + 15)+id).textContent = row.trener_3 ?? '';
        document.getElementById('td'+(x + 16)+id).textContent = row.trener_4 ?? '';
        document.getElementById('td'+(x + 17)+id).textContent = row.titles ?? '';

        document.getElementById("td"+(x + 18)+id).checked = Number(row.personally) > 0;
        document.getElementById("td"+(x + 19)+id).checked = Number(row.out_of_comp) > 0;
        document.getElementById("td"+(x + 20)+id).checked = Number(row.md) > 0;
        document.getElementById("td"+(x + 21)+id).checked = Number(row.dbl) > 0;

        document.getElementById('td'+(x + 22)+id).textContent = Number(row.squat_nom) > 0 
                                                                ? Number(row.squat_nom).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 23)+id).textContent = Number(row.bench_press_nom) > 0 
                                                                ? Number(row.bench_press_nom).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 24)+id).textContent = Number(row.deadlift_nom) > 0 
                                                                ? Number(row.deadlift_nom).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 25)+id).textContent = Number(row.total_nom) > 0 
                                                                ? Number(row.total_nom).toFixed(1) 
                                                                : '';

        document.getElementById('td'+(x + 26)+id).textContent = Number(row.squat_1) > 0 
                                                                ? Number(row.squat_1).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 27)+id).textContent = Number(row.bench_press_1) > 0 
                                                                ? Number(row.bench_press_1).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 28)+id).textContent = Number(row.deadlift_1) > 0 
                                                                ? Number(row.deadlift_1).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 29)+id).textContent = Number(row.total_1_att) > 0 
                                                                ? Number(row.total_1_att).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 30)+id).textContent = Number(row.bench_press_fcst) > 0 
                                                                ? Number(row.bench_press_fcst).toFixed(1) 
                                                                : '';
    
        document.getElementById('td'+(x + 31)+id).textContent = Number(row.squat_res) > 0 
                                                                ? Number(row.squat_res).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 32)+id).textContent = Number(row.bench_press_res) > 0 
                                                                ? Number(row.bench_press_res).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 33)+id).textContent = Number(row.deadlift_res) > 0 
                                                                ? Number(row.deadlift_res).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 34)+id).textContent = Number(row.total_fcst) > 0 
                                                                ? Number(row.total_fcst).toFixed(1) 
                                                                : '';
        document.getElementById('td'+(x + 35)+id).textContent = Number(row.total) > 0 
                                                                ? Number(row.total).toFixed(1) 
                                                                : '';

        document.getElementById('td'+(x + 36)+id).textContent = Number(row.coef_total_fcst) > 0 
                                                                ? Number(row.coef_total_fcst).toFixed(2) 
                                                                : '';
        document.getElementById('td'+(x + 37)+id).textContent = Number(row.coef_total) > 0 
                                                                ? Number(row.coef_total).toFixed(2) 
                                                                : '';
        document.getElementById('td'+(x + 38)+id).textContent = Number(row.coef_bench_press_fcst) > 0 
                                                                ? Number(row.coef_bench_press_fcst).toFixed(2) 
                                                                : '';
        document.getElementById('td'+(x + 39)+id).textContent = Number(row.coef_bench_press) > 0 
                                                                ? Number(row.coef_bench_press).toFixed(2) 
                                                                : '';

        document.getElementById('td'+(x + 40)+id).textContent = row.rnk_fcst ?? '';
        document.getElementById('td'+(x + 41)+id).textContent = row.ranking ?? '';
        document.getElementById('td'+(x + 42)+id).textContent = row.points ?? '';
        document.getElementById('td'+(x + 43)+id).textContent = row.bench_press_rnk_fcst ?? '';
        document.getElementById('td'+(x + 44)+id).textContent = row.bench_press_rnk ?? '';
        document.getElementById('td'+(x + 45)+id).textContent = row.points_bp ?? '';
    });
};