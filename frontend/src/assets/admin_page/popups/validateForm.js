import { validationMessages } from "./i18n/validationMessages";

export function validateForm(competitionName, country, city, lang) {
  if (!competitionName.trim()) {
    alert(validationMessages.competition_name[lang]);
    return false;
  }

  if (!country.trim()) {
    alert(validationMessages.country[lang]);
    return false;
  }

  if (!city.trim()) {
    alert(validationMessages.city[lang]);
    return false;
  }

  return true;
}