import { Controller } from '@hotwired/stimulus';
import { ViewModelMainTable } from './services/main_table/viewModelMainTable.js';
import { ViewMainTable } from './services/main_table/viewMainTable.js';
import { db } from '../db.js';

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
    }

    async initTable() {
        const formElement = this.element.getElementById("formElem");

        if (!formElement) return;

        if (this.view) {
            this.view.destroy?.();
        }

        this.vmMainTable = new ViewModelMainTable();
        this.view = new ViewMainTable(this.vmMainTable, formElement);

        const rows = await db.main_table
            .where('comp_id')
            .equals(this.compID)
            .toArray();

        this.vmMainTable.fillTable(rows);

        console.log("MainTable connected");
    }
};