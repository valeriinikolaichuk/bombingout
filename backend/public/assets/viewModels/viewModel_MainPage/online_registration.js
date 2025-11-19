ViewModelMainPage.prototype.setPreliminaryDate = function(preliminaryDate, finalDate){
    this.preliminaryDateValue = Number(preliminaryDate.value);
    this.finalDateValue = Number(finalDate.value);
    if (this.preliminaryDateValue < this.finalDateValue){
        finalDate.value = this.preliminaryDateValue;
    }

    this.preliminaryDateValue = Number(preliminaryDate.value);
    this.finalDateValue = Number(finalDate.value);
    let newDate = this.setDateNomination(this.preliminaryDateValue);
    this.viewNomin.newPreliminaryDate.textContent = this.dateString_XX_XX_XXXX(newDate);
    if (this.finalDateValue > 0){
        newDate = this.setDateNomination(this.finalDateValue);
        this.viewNomin.newFinalDate.textContent = this.dateString_XX_XX_XXXX(newDate);
    }
}

ViewModelMainPage.prototype.setFinalDate = function(preliminaryDate, finalDate){
    this.preliminaryDateValue = Number(preliminaryDate.value);
    this.finalDateValue = Number(finalDate.value);
    if (this.finalDateValue > this.preliminaryDateValue){
        preliminaryDate.value = this.finalDateValue;
    }

    this.preliminaryDateValue = Number(preliminaryDate.value);
    this.finalDateValue = Number(finalDate.value);
    let newDate = this.setDateNomination(this.finalDateValue);
    this.viewNomin.newFinalDate.textContent = this.dateString_XX_XX_XXXX(newDate);
    if (this.preliminaryDateValue > 0){
        newDate = this.setDateNomination(this.preliminaryDateValue); 
        this.viewNomin.newPreliminaryDate.textContent = this.dateString_XX_XX_XXXX(newDate);       
    }
}

ViewModelMainPage.prototype.setDateNomination = function(days){
    let foolDate = this.viewNomin.start_dateOnline.textContent;

    let day = foolDate.slice(0, 2);
    let month = foolDate.slice(3, 5);
    let year = foolDate.slice(6);
    foolDate = year+'-'+month+'-'+day+'T10:00:00.000Z';

    let valueStartDate = Date.parse(foolDate);
    let dateValueMs = days * 24 * 60 * 60 * 1000;
    let finalMs = valueStartDate - dateValueMs;
    let finalNominDate = new Date(finalMs).toISOString().slice(0, 10);

    return finalNominDate;
}