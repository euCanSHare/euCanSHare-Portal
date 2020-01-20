import $ from 'jquery';
import { domElements } from '../constants/selectors';

function enterFullScreen() {
  $(domElements.iframe).addClass('leadin-iframe-fullscreen');
}

function exitFullScreen() {
  $(domElements.iframe).removeClass('leadin-iframe-fullscreen');
}

const fullscreenRegex = /^\/(forms\/\d+\/(type|templates|editor)|lead-flows\/\d+\/edit)(\/|$)/;

export function checkFullScreen(path) {
  if (fullscreenRegex.test(path)) {
    enterFullScreen();
  } else {
    exitFullScreen();
  }
}
