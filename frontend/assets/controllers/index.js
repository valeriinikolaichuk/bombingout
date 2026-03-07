import { Application } from '@hotwired/stimulus';
import MainTableController from './main_table_controller.js';

const application = Application.start();

application.register('main_table', MainTableController);
// application.register('popup', PopupController);

export default application;