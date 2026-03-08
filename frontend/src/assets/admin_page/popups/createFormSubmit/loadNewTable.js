import { competitionCreated } from "../i18n/resultMessages";

export function loadNewTable(rows, lang, onClose){
    alert(competitionCreated[lang]);

    onClose();

    document.dispatchEvent(
        new CustomEvent("main-table:reload", {
            detail: { rows }
        })
    );
}