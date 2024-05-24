import './bootstrap';
import './themes.js';
import flatpickr from 'flatpickr';
import {Italian} from 'flatpickr/dist/l10n/it';

flatpickr.localize(Italian);

window.flatpickr = flatpickr;
