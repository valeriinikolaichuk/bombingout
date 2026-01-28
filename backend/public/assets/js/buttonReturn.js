import { actions } from './actions/actions.js';
import { handleAction } from './actions/handleAction.js';

const buttonReturn = document.querySelector('.buttonReturn');
buttonReturn.addEventListener('click',  async () => {
    const actionId = buttonReturn.id;
    handleAction(actionId, actions, window.appData);
});