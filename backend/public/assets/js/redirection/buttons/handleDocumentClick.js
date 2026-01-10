export function handleDocumentClick(event){
    if (this.activeForm && !this.activeForm.contains(event.target)) {
        this.activeForm.replaceWith(this.originalBtn);
        this.activeForm = null;
        this.originalBtn = null;
    }
}