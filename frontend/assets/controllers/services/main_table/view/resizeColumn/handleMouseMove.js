import { ViewModelMainTable } from "../../viewModelMainTable.js";

export function handleMouseMove(event){
    if (!this.isResizing){
        return;
    }

    const allTrs = this.taBle.querySelectorAll('tr');

    this.viewModel = new ViewModelMainTable;
    this.viewModel.resizeColumn(
        event, 
        this.startX, 
        this.startWidth, 
        this.resizer, 
        this.allThs, 
        allTrs
    );
}