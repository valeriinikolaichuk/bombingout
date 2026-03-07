export function TableLines(mainId){
    this.mainId = mainId;
    this.trId = document.getElementById('tr'+this.mainId);
    this.tdDd = document.getElementById('tdDd'+this.mainId);
    this.tdMo = document.getElementById('tdMo'+this.mainId);

    this.tdElement = new Proxy({}, {
        get: (_, prop) => {
            return document.getElementById('td'+prop+this.mainId);
        }
    });

    this.initDatasetColumn = new Proxy({}, {
        get: (_, prop) => {
            return document.querySelectorAll(prop);
        }
    });

    this.newElement = new Proxy({}, {
        get: (_, prefix) => {
            return document.getElementById(prefix);
        }
    });  
}