InitView.prototype.viewPopupsValues = function(){
    this.dialogCreate = document.getElementById('create-dialog');
    this.createPopupName = document.getElementById('popupCreateName');
    this.btnClose = document.getElementById('btnClose');
    this.competitionsName = document.getElementById('competitionsName');
    this.countryName = document.getElementById('countryName');
    this.cityName = document.getElementById('cityName');
    this.setStart_date = document.getElementById('start_date');
    this.setEnd_date = document.getElementById('end_date');

    this.divisionSelect = document.getElementById('divisionName');
    this.sexSelect = document.getElementById('sex');
    this.agegroupSelect = document.getElementById('ageGroup');
    this.typeSelect = document.getElementById('typeName');
    this.categoriesSelect = document.getElementById('categoriesName');
    this.inputHiddenId = document.getElementById('inputHidden');
    this.buttonCreate = document.getElementById('button_create');

    this.divisions = [
        { value: "classic", en: "raw", uk: "класичний", pl: "klasyczny" }
    ];

    this.sexes = [
        { value: "men", en: "men", uk: "чоловіки", pl: "mężczyźni" },
        { value: "women", en: "women", uk: "жінки", pl: "kobiety" }
    ];

    this.sexeMen = [
        { value: "men", en: "men", uk: "чоловіки", pl: "mężczyźni" }
    ];

    this.sexeWomen = [
        { value: "women", en: "women", uk: "жінки", pl: "kobiety" }
    ];

    this.ages = [
        { value: "open", en: "open", uk: "відкриті", pl: "seniorzy" },
        { value: "sub-junior", en: "sub-juniors", uk: "юнаки", pl: "juniorzy do 18" },
        { value: "junior", en: "juniors", uk: "юніори", pl: "juniorzy do 23" },
        { value: "master", en: "masters", uk: "ветерани", pl: "weterani" }
    ];

    this.agesWomen = [
        { value: "open", en: "open", uk: "відкриті", pl: "seniorki" },
        { value: "sub-junior", en: "sub-juniors", uk: "дівчата", pl: "juniorki do 18" },
        { value: "junior", en: "juniors", uk: "юніорки", pl: "juniorki do 23" },
        { value: "master", en: "masters", uk: "ветерани", pl: "weteranki" }
    ];

    this.types = [
        { value: "powerlifting", en: "powerlifting", uk: "пауерліфтинг", pl: "trójbój" },
        { value: "bench_press", en: "bench press", uk: "жим лежачи", pl: "wyciskanie" }
    ];

    this.typePowerlifting = [
        { value: "powerlifting", en: "powerlifting", uk: "пауерліфтинг", pl: "trójbój" },
    ];

    this.typeBenchPress = [
        { value: "bench_press", en: "bench press", uk: "жим лежачи", pl: "wyciskanie" },
    ];

    this.categories = [
        { value: "IBSA", en: "IBSA", uk: "IBSA", pl: "IBSA" }
    ];

    this.dialogOpen = document.getElementById('open-dialog');
    this.compInfoDiv = document.getElementById('width_2');

    this.dialogAddNom = document.getElementById("nomination-dialog");
    this.competitionNameOnline = document.getElementById('competitionNameOnline');
    this.countryOnline = document.getElementById('countryOnline');
    this.cityOnline = document.getElementById('cityOnline');
    this.start_dateOnline = document.getElementById('start_dateOnline');
    this.end_dateOnline = document.getElementById('end_dateOnline');
    this.divisionOnline = document.getElementById('divisionOnline');
    this.age_groupOnline = document.getElementById('age_groupOnline');
    this.sexOnline = document.getElementById('sexOnline');
    this.typeOnline = document.getElementById('typeOnline');
    this.preLiminary = document.getElementById('preliminary');
    this.finAl = document.getElementById('final');
    this.nominId = document.getElementById('nominId');
}

InitView.prototype.popupsObjects = function(){
    this.genderSelect = document.getElementById('sex');
    this.ageGroupSelectOptions = document.getElementById('ageGroup');
}