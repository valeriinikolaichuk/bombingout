import { TableLines } from "../../view/tableLines.js";
import { compVersions } from "../../components/compVersions.js";
import { TableHeaderOrder } from "../../view/tableHeaderOrder.js";
import { toggleLangColumns } from "../toggleLangColumns.js";
import { toggleDiciplineColumns } from "../toggleDiciplineColumns.js";
import { bodyWeightCoeff } from "../addCoefficient/bodyWeightCoeff.js";
import { totalNomFunction } from "../addCoefficient/totalNomFunction.js";
import { totalFirstFunction } from "../addCoefficient/totalFirstFunction.js";

export function showInputLine(getId){
    let mainId = getId.slice(4);
    const tableLines = new TableLines(mainId);

    if (tableLines.trId.dataset.type == 'html'){
        let cellsData = new Array();
        let x = 11;

        for (let val = 0; val < 18; val++){
            cellsData[val] = tableLines.tdElement(x).textContent;
            ++x;
        }

        let dayDate = tableLines.tdDd.textContent;
        let monthDate = tableLines.tdMo.textContent;

        if (dayDate == '00'){
            dayDate = '';
        }

        if (monthDate == '00'){
            monthDate = '';
        }

        if (cellsData[3] == '0000'){
            cellsData[3] = '';
        }

        let allDays = '';
        for (let daYs = 0; daYs <= 31; daYs++){
            allDays = allDays + '<option value="'+daYs+'">'+daYs+'</option>';
        }

        let allMonth = '';
        for (let mOnth = 0; mOnth <= 12; mOnth++){
            allMonth = allMonth + '<option value="'+mOnth+'">'+mOnth+'</option>';
        }

        let allYears = '<option value="0000">0000</option>';
        for (let yeArs = 2015; yeArs >= 1935; yeArs--){
            allYears = allYears + '<option value="'+yeArs+'">'+yeArs+'</option>';
        }

        let cAt = new Array();
        let catValue = new Array();
        let cellsDataCatVal;

        if (window.appData.compVersion == 'IBSA'){
            if (window.appData.compSex == 'men'){
                if (window.appData.lang == 'uk'){
                    catValue = compVersions.IBSA.open.uk.men;
                } else {
                    catValue = compVersions.IBSA.open.en.men;
                }
            } else {
                if (window.appData.lang == 'uk'){
                    catValue = compVersions.IBSA.open.uk.women;
                } else {
                    catValue = compVersions.IBSA.open.en.women;
                }
            }
        }

        cAt = catValue;
        cellsDataCatVal = cellsData[4];

        let cateGories = '';
        for (let c = 0; c < 10; c++){
            cateGories = cateGories + '<option value="'+catValue[c]+'">'+cAt[c]+'</option>';
        }

        const grOup = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        let grOups = '';
        for (let c = 0; c < 9; c++){
            grOups = grOups + '<option value="'+grOup[c]+'">'+grOup[c]+'</option>';
        }
    
        for (let val = 18; val < 22; val++){
            let checkBoxChecked = tableLines.tdElement(x);
            if (checkBoxChecked.checked) {
                cellsData[val] = 'checked="checked"';
            } else {
                cellsData[val] = '';
            }
            ++x;
        }
                
        for (let val = 22; val < 46; val++){
            cellsData[val] = tableLines.tdElement(x).textContent;
            ++x;                
        } 

        let xx = 11;
        let lines = ['<td style="display: none;"><input id="td'+xx+mainId+'" type="hidden" name="main_id" value="'+mainId+'">'+mainId+'</td>', 
            '<td id="td'+(++xx)+mainId+'" class="table_number sticky" style="left: 0px; background-color: white;">'+cellsData[1]+'</td>', 
            '<td class="sticky" style="left: 37px; background-color: rgb(245, 245, 245);"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="surname_name" value="'+cellsData[2]+'"><div class="table_border"></div></td>', 
            '<td class="sticky" style="left: 337px; text-align: center; background-color: rgb(245, 245, 245);"><select id="tdDd'+mainId+'" class="input yellowline" name="day"><option value="'+dayDate+'" >'+dayDate+'</option>'+allDays+'</select></td>',
            '<td class="sticky" style="left: 392px; text-align: center; background-color: rgb(245, 245, 245);"><select id="tdMo'+mainId+'" class="input yellowline" name="month"><option value="'+monthDate+'" >'+monthDate+'</option>'+allMonth+'</select></td>',
            '<td class="sticky" style="left: 447px; text-align: center; background-color: rgb(245, 245, 245);"><select id="td'+(++xx)+mainId+'" class="input yellowline" name="year"><option value="'+cellsData[3]+'" >'+cellsData[3]+'</option>'+allYears+'</select></td>',
            '<td class="sticky" style="left: 522px; background-color: rgb(245, 245, 245);"><select id="td'+(++xx)+mainId+'" class="input yellowline" name="category"><option value="'+cellsDataCatVal+'" >'+cellsData[4]+'</option>'+cateGories+'</select></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="200" step="0.01" name="bodyweight" value="'+cellsData[5]+'"></td>',
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;">'+cellsData[6]+'</td>',  
            '<td style="display: none;"><input id="coeff_input'+mainId+'" type="hidden" name="iPF_GL_Cf" value="'+cellsData[6]+'"></td>', 
            '<td><select id="td'+(++xx)+mainId+'" class="input yellowline" name="grp"><option value="'+cellsData[7]+'">'+cellsData[7]+'</option>'+grOups+'</select></td>', 
            '<td style="text-align: center;"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="1" name="lot" value="'+cellsData[8]+'"></td>',
            '<td data-lang-show="uk"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="rank_class" value="'+cellsData[9]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="region" value="'+cellsData[10]+'"></td>',  
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="city" value="'+cellsData[11]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="club" value="'+cellsData[12]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="trener_1" value="'+cellsData[13]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="trener_2" value="'+cellsData[14]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="trener_3" value="'+cellsData[15]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="trener_4" value="'+cellsData[16]+'"></td>', 
            '<td><input id="td'+(++xx)+mainId+'" class="input yellowline" type="text" name="titles" value="'+cellsData[17]+'"></td>', /** */
            '<td class="yellowline"><input id="td'+(++xx)+mainId+'" class="input" type="checkbox" name="personally" value="'+mainId+'" '+cellsData[18]+'></td>', 
            '<td class="yellowline"><input id="td'+(++xx)+mainId+'" class="input" type="checkbox" name="out_of_comp" value="'+mainId+'" '+cellsData[19]+'></td>', 
            '<td class="yellowline"><input id="td'+(++xx)+mainId+'" class="input" type="checkbox" name="md" value="'+mainId+'" '+cellsData[20]+'></td>', 
            '<td class="yellowline"><input id="td'+(++xx)+mainId+'" class="input" type="checkbox" name="dbl" value="'+mainId+'" '+cellsData[21]+'></td>', 
            '<td style="font-size: 17px;" data-discipline="powerlifting"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="squat_nom" value="'+cellsData[22]+'"></td>', 
            '<td style="font-size: 17px;"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="bench_press_nom" value="'+cellsData[23]+'"></td>', 
            '<td style="font-size: 17px;" data-discipline="powerlifting"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="deadlift_nom" value="'+cellsData[24]+'"></td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[25]+'</td>', 
            '<td style="display: none;"><input id="total_nom'+mainId+'" type="hidden" min="0" max="9999" step="0.5" name="total_nom" value="'+cellsData[25]+'"></td>', 
            '<td style="font-size: 17px;" data-discipline="powerlifting"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="squat_1" value="'+cellsData[26]+'"></td>', 
            '<td style="font-size: 17px;"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="bench_press_1" value="'+cellsData[27]+'"></td>', 
            '<td style="font-size: 17px;" data-discipline="powerlifting"><input id="td'+(++xx)+mainId+'" class="input yellowline" type="number" min="0" max="999" step="0.5" name="deadlift_1" value="'+cellsData[28]+'"></td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[29]+'</td>', 
            '<td style="display: none;"><input id="total_att'+mainId+'" type="hidden" min="0" max="9999" step="0.5" name="total_1_att" value="'+cellsData[29]+'"></td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[30]+'</td>',  
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[31]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;">'+cellsData[32]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[33]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[34]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[35]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[36]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[37]+'</td>',
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[38]+'</td>',
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[39]+'</td>',
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[40]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[41]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="powerlifting">'+cellsData[42]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[43]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[44]+'</td>', 
            '<td id="td'+(++xx)+mainId+'" style="font-size: 17px;" data-discipline="bench_press">'+cellsData[45]+'</td>'
        ];

        const tableHeaderOrder = new TableHeaderOrder();

        let allLines = lines.length;
        let inputLine ='';
        let a = 0;

        for (let x = tableHeaderOrder.keysAsNumbers[a]; x < allLines; x = tableHeaderOrder.keysAsNumbers[++a]){ 
            inputLine = inputLine + lines[x];
        }

        tableLines.trId.innerHTML = inputLine;
        tableLines.trId.dataset.type = 'input';

        let langUkCol = tableLines.initDatasetColumn('[data-lang-show]');
        toggleLangColumns(langUkCol);

        let dataDiscipline = tableLines.initDatasetColumn('[data-discipline]');
        toggleDiciplineColumns(dataDiscipline);

        this.bodyWeightCoeff = bodyWeightCoeff.bind(this);
        this.totalNomFunction = totalNomFunction.bind(this);
        this.totalFirstFunction = totalFirstFunction.bind(this);

        tableLines.initCoeff(this.bodyWeightCoeff, this.totalNomFunction, this.totalFirstFunction);
    }
}