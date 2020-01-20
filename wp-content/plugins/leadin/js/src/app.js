import $ from 'jquery';

import { domElements } from './constants/selectors';
import Raven, { configureRaven } from './lib/Raven';
import { addExternalLinks } from './menu';
import { initInterframe } from './lib/Interframe';

function main() {
  initInterframe($(domElements.iframe)[0]);

  $(document).ready(() => {
    addExternalLinks();
  });
}

configureRaven();
Raven.context(main);
