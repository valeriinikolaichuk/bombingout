import { db } from "../../../../../assets/db";

export async function writeCompDataToIndexed(compId, payLoad){
   await db.competitions.put({
        comp_id: compId,
        users_id: payLoad.usersId,
        competition_name: payLoad.competition_name,
        country: payLoad.country,
        city: payLoad.city,
        start_date: payLoad.start_date,
        end_date: payLoad.end_date,
        division: payLoad.division,
        age_group: payLoad.age_group,
        sex: payLoad.sex,
        type: payLoad.type,
        categories: payLoad.version,
        nomination: null,
        preliminary: null,
        final: null,
        updatedAt: Date.now(),
        event_id: crypto.randomUUID()
    });
}