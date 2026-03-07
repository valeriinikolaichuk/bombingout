import { db } from '../../../../assets/db.js';

export async function getRowsCountForCompetition(compId) {
    const rowsFromDb = await db.main_table
        .where('comp_id')
        .equals(compId)
        .toArray();

    const result = rowsFromDb.map((row, index) => ({
        rowNumber: index + 1,
        main_id: row.main_id
    }));

    return result;
}