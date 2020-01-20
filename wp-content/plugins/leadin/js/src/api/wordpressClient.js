import $ from 'jquery';

import Raven from '../lib/Raven';
import { ajaxUrl, nonce } from '../constants/leadinConfig';

function makeRequest(action, method, payload) {
  const url = `${ajaxUrl}?action=${action}&_ajax_nonce=${nonce}`;
  return new Promise((resolve, reject) => {
    const ajaxPayload = {
      url,
      method,
      contentType: 'application/json',
      success: data => resolve(data),
      error: error => reject(error),
    };

    if (payload) {
      ajaxPayload.data = JSON.stringify(payload);
    }
    $.ajax(ajaxPayload);
  });
}

export function post(action, payload) {
  const request = makeRequest(action, 'post', payload);
  request.catch(error =>
    Raven.captureMessage(
      `HTTP request failed with code ${error.status}: ${error.message}`
    )
  );
  return request;
}
