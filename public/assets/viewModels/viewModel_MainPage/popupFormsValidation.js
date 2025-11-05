ViewModelMainPage.prototype.validateChangeDate = function(endDateChange, endDateCorrect){
    this.startDateValue = endDateChange.valueAsDate;
    this.endDateValue = endDateCorrect.valueAsDate;
    if (this.startDateValue > this.endDateValue){
        endDateCorrect.valueAsDate = this.startDateValue;
    }
}

ViewModelMainPage.prototype.validateCorrectDate = function(endDateChange, endDateCorrect){
    this.startDateValue = endDateChange.valueAsDate;
    this.endDateValue = endDateCorrect.valueAsDate;
    if (this.endDateValue < this.startDateValue){
        endDateCorrect.valueAsDate = this.startDateValue;
    }
}

ViewModelMainPage.prototype.submitCreateChange = function(competitionFormValue, countryFormValue, cityFormValue){
    if (competitionFormValue ==''){
        if (lang === 'en'){
            alert('The "competition name" field must be completed');
        } else if (lang === 'uk'){
            alert('Поле «назва змагань» повинно бути заповнене');
        } else if (lang === 'pl'){
            alert('Pole "nazwa zawodów" musi być wypełnione');
        }

        return false;

    } else if (countryFormValue ==''){
        if (lang === 'en'){
            alert('The "country" field must be completed');
        } else if (lang === 'uk'){
            alert('Поле «країна» повинно бути заповнене');
        } else if (lang === 'pl'){
            alert('Pole "państwo" musi być wypełnione');
        }

        return false;

    } else if (cityFormValue ==''){
        if (lang === 'en'){
            alert('The "city" field must be completed');
        } else if (lang === 'uk'){
            alert('Поле «місто» повинно бути заповнене');
        } else if (lang === 'pl'){
            alert('Pole "miasto" musi być wypełnione');
        }

        return false;
    } else {
        return true;
    }
}

ViewModelMainPage.prototype.changeAgeGroups = function(genderSelect, ageGroups, index){
    if (lang === 'uk'){
        if (genderSelect.value === 'women'){
            ageGroups.options[index].text = 'відкриті';
            ageGroups.options[++index].text = 'дівчата';
            ageGroups.options[++index].text = 'юніорки';
            ageGroups.options[++index].text = 'ветерани';
        } else {
            ageGroups.options[index].text = 'відкриті';
            ageGroups.options[++index].text = 'юнаки';
            ageGroups.options[++index].text = 'юніори';
            ageGroups.options[++index].text = 'ветерани';
        }
        ageGroups.selectedIndex = 0;
    } else if (lang === 'pl'){
        if (genderSelect.value === 'women'){
            ageGroups.options[index].text = 'seniorki';
            ageGroups.options[++index].text = 'juniorki do lat 18';
            ageGroups.options[++index].text = 'juniorki do lat 23';
            ageGroups.options[++index].text = 'weteranki';
        } else {
            ageGroups.options[index].text = 'seniorzy';
            ageGroups.options[++index].text = 'juniorzy do 18';
            ageGroups.options[++index].text = 'juniorzy do 23';
            ageGroups.options[++index].text = 'weterani';
        }
        ageGroups.selectedIndex = 0;
    }
}