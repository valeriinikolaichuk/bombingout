import { validateForm } from "./validateForm";
import { db } from '../../../../assets/db';
import { writeCompDataToIndexed } from "./createFormSubmit/writeCompDataToIndexed";
import { getRowsCountForCompetition } from "./getRowsCountForCompetition";

export async function createFormSubmit(payLoad, lang, onClose){
    const isValid = validateForm(payLoad.competition_name, payLoad.country, payLoad.city, lang);
    if (!isValid) return;
    console.log('FORM OK');

    onClose();

    const compId = crypto.randomUUID();

    try {
        let response = await fetch('/api/updateCompetitionData', {
            method: "POST",
            credentials: "include",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                comp_id: compId,
                ...payLoad
            })
        });

        if (!response.ok){
            throw new Error('error by path: /api/updateCompetitionData');
        }

        let updateResult = await response.json();

        if (!updateResult.success || !updateResult.session || !updateResult.status){
            throw new Error('Server failed to update competition data');
        }

        writeCompDataToIndexed(compId, payLoad);
        const rows = getRowsCountForCompetition(compId);

        document.dispatchEvent(
            new CustomEvent("main-table:reload", {
                detail: { rows }
            })
        );

    } catch (error) {

        writeCompDataToIndexed(compId, payLoad);

        console.warn('Server unavailable. Saving to syncQueue.', error);

        const actionId = crypto.randomUUID();

        await db.syncQueue.add({
            actionId: actionId,
            actionType: payLoad.popupType,
            endpoint: '/api/updateCompetitionData',
            method: 'POST',
            payload: {
                comp_id: compId,
                ...payLoad
            },
            status: 'pending',
            retries: 0,
            createdAt: Date.now()
        });

        const rows = getRowsCountForCompetition(compId);

        document.dispatchEvent(
            new CustomEvent("main-table:reload", {
                detail: { rows }
            })
        );
    }
}