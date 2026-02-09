import { validationMessages } from "./i18n/validationMessages";

export function validateForm(competitionName, country, city, lang) {
  if (!competitionName) {console.log('lang =', lang);
    alert(validationMessages.competition_name[lang]);
    return false;
  }

  if (!country) {
    alert(validationMessages.country[lang]);
    return false;
  }

  if (!city) {
    alert(validationMessages.city[lang]);
    return false;
  }

  return true;
}