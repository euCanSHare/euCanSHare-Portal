import $ from 'jquery';

import Raven, { configureRaven } from '../lib/Raven';
import { domElements } from '../constants/selectors';
import ThickBoxModal from './ThickBoxModal';
import { submitFeedbackForm } from './feedbackFormApi';

function deactivatePlugin() {
  window.location.href = $(domElements.deactivatePluginButton).attr('href');
}

function setLoadingState() {
  $(domElements.deactivateFeedbackSubmit).addClass('loading');
}

function submitAndDeactivate(e) {
  e.preventDefault();
  setLoadingState();

  submitFeedbackForm(domElements.deactivateFeedbackForm)
    .then(deactivatePlugin)
    .catch(err => {
      Raven.captureException(err);
      deactivatePlugin();
    });
}

function init() {
  // eslint-disable-next-line no-unused-vars
  const feedbackModal = new ThickBoxModal(
    domElements.deactivatePluginButton,
    'leadin-feedback-container',
    'leadin-feedback-window',
    'leadin-feedback-content'
  );

  $(domElements.deactivateFeedbackForm)
    .unbind('submit')
    .submit(submitAndDeactivate);
  $(domElements.deactivateFeedbackSkip)
    .unbind('click')
    .click(deactivatePlugin);
}

$(document).ready(() => {
  configureRaven();
  Raven.context(init);
});
