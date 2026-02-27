import { createForm } from './createForm.js';
import { showLoginForm } from './showLoginForm.js';
import { handleClick } from './handleClick.js';
import { handleDocumentClick } from './handleDocumentClick.js';

export function RedirectionActions(){
    this.activeForm = null;
    this.originalBtn = null;

    this.createForm = createForm.bind(this);
    this.showLoginForm = showLoginForm.bind(this);
    this.handleClick = handleClick.bind(this);
    this.handleDocumentClick = handleDocumentClick.bind(this);
}