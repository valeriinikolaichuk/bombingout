import { getData } from "./onSubmit/getData.js";

export async function onSubmit(formElem){
    const formData = new FormData(formElem);
    let dataArray = Array();
    let a = 0;
    for (let data of formData){
        dataArray[a] = data;
        ++a; 
    }

// ??    dataArray[dataArray.length] = compID;

    const responce = await fetch("assets/models_js/main_models/mainTableData_json.php", {
        method: 'POST',
        credentials: 'include',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dataArray)
    });

    if (!responce.ok){
        throw new Error("error by path: "+"assets/models_js/main_models/mainTableData_json.php");
    }

    let serverResponce = await responce.json();
    
// no longer process the server response
    getData(serverResponce);

    console.log(serverResponce);
}