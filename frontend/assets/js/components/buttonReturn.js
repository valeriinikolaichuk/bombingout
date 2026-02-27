import { handleAction } from './actions/handleAction.js';

export function buttonReturn(actions, appData){
    const button = document.querySelector('.buttonReturn');
    button.addEventListener('click',  async () => {
        const actionId = button.id;
        handleAction(actionId, actions, appData);
    });
}