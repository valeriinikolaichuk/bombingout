import { validateForm } from "./validateForm";
import { sendDataAsync } from "./sendDataAsync";
import { competitionCreated } from "./i18n/resultMessages";

export function createFormSubmit(competitionName, country, city, lang, onClose){
  const isValid = validateForm(competitionName, country, city, lang);

  if (!isValid) return;
  console.log('FORM OK');

  const data = { competitionName, country, city, lang };

//  sendDataAsync('/api/createCompetition', data);
  alert(competitionCreated[lang]);
  onClose();

  window.dispatchEvent(
    new CustomEvent('popup:createCompetition:success', {
      detail: { competitionName } 
    })
  );
}