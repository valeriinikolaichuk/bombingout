import { Controller } from '@hotwired/stimulus';
import { ViewMainTable } from './services/main_table/viewMainTable.js';

export default class extends Controller {
    connect() {
        document.addEventListener(
            "main-table:reload",
            this.reloadTable
        );

        this.element.addEventListener(
            "turbo:frame-load",
            this.initTable
        );
    }

    disconnect() {
        document.removeEventListener(
            "main-table:reload",
            this.reloadTable
        );

        this.element.removeEventListener(
            "turbo:frame-load",
            this.initTable
        );
    }

    reloadTable = async (event) => {
        const rows = event.detail?.rows ?? [];

        const response = await fetch('/mainTable', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ rows })
        });

        const html = await response.text();

        this.element.innerHTML = html;
    }

    initTable() {
        const formElement = this.element.getElementById("formElem");

        if (!formElement) return;

        if (this.view) {
            this.view.destroy?.();
        }

        this.view = new ViewMainTable(formElement);

        console.log("MainTable connected");
    }
}