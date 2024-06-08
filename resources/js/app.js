import './bootstrap';
import './themes.js';
import flatpickr from 'flatpickr';
import {Italian} from 'flatpickr/dist/l10n/it';
import '@nextapps-be/livewire-sortablejs';

flatpickr.localize(Italian);

/**
 * @param {...string} keys
 */
function removeFromQueryString(...keys) {
  const searchParams = new URLSearchParams(window.location.search);
  if (!searchParams.size) return;
  keys.forEach(key => searchParams.delete(key));

  history.replaceState(null, '', `${window.location.pathname}?${searchParams.toString()}`);
}

window.flatpickr = flatpickr;
window.removeFromQueryString = removeFromQueryString;
