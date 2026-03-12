import { db } from "../db";

export const eventRouter = {

    async competition_created(payload) {
        await db.competitions.put(payload);

    },
/*
    async table_updated(payload) {
        console.log("table updated", payload);
    }
*/
};