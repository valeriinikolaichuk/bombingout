import { Controller } from '@hotwired/stimulus';
import { initMainTable } from './services/main_table/initMainTable';

export default class extends Controller {
    connect() {
        console.log("Stimulus MainTableController connected");

        document.addEventListener(
            "main-table:reload",
            this.reloadTable
        );
    }

    disconnect() {
        document.removeEventListener(
            "main-table:reload",
            this.reloadTable
        );
    }

    reloadTable = async (event) => {
        const rows = event.detail?.rows ?? [];

        const response = await fetch('/tableController', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                rows: rows,
                type: 'main_table'
            })
        });

        const html = await response.text();

        this.element.innerHTML = html;

        await initMainTable(this);
    }
};