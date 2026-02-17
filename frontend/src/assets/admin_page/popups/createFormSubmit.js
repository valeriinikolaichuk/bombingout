import { validateForm } from "./validateForm";
import { db } from '../../../db';
//import { updateCompetitionData } from "./updateCompetitionData";
import { competitionCreated } from "./i18n/resultMessages";

export async function createFormSubmit(payLoad, lang, onClose){
  const isValid = validateForm(payLoad.competition_name, payLoad.country, payLoad.city, lang);
  if (!isValid) return;
  console.log('FORM OK');

  await db.competitions.put({
    comp_id: 0,
    users_id: payLoad.usersId,
    competition_name: payLoad.competition_name,
    country: payLoad.country,
    city: payLoad.city,
    start_date: payLoad.start_date,
    end_date: payLoad.end_date,
    division: payLoad.division,
    sex: payLoad.sex,
    age_group: payLoad.age_group,
    type: payLoad.type,
    categories: payLoad.version,
    updatedAt: Date.now()
  });

  const actionId = crypto.randomUUID();

  await db.syncQueue.add({
    actionId: actionId,
    actionType: payLoad.popupType,
    payload: payLoad,
    createdAt: Date.now()
  });  

  try {
//    await updateCompetitionData();

    alert(competitionCreated[lang]);
    onClose();

  } catch (error) {
    console.warn('Saved locally. Will sync later.');
  }

//  updateCompetitionData(payLoad, lang, onClose);
  

/*  window.dispatchEvent(
    new CustomEvent('popup:createCompetition:success', {
      detail: { competitionName } 
    })
  );*/

//  window.dispatchEvent(new Event('table:reload'));
}