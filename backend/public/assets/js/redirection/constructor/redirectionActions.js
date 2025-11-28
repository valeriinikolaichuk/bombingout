export function RedirectionActions(){
    this.activeForm = null;
    this.originalBtn = null;
    this.createForm = this.createForm.bind(this);
    this.showLoginForm = this.showLoginForm.bind(this);
    this.handleClick = this.handleClick.bind(this);
    this.handleDocumentClick = this.handleDocumentClick.bind(this);
}