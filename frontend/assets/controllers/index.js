import { Application } from '@hotwired/stimulus';
import TablesController from './tables_controller';

const application = Application.start();

application.register('table', TablesController);
// application.register('popup', PopupController);
// application.register('form', FormController);

export default application;