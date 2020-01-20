import $ from 'jquery';

import {
  hubspotBaseUrl,
  portalId,
  i18n,
  pricingQuery,
} from './constants/leadinConfig';

const PRICING_MENU_CLASS = 'hubspot-menu-pricing';

function addMenuItem(text, href, addLast = false, className = '') {
  const link = $(
    `<li><a class="${className}" href="${href}" target="_blank">${text}</a></li>`
  );

  const lastLink = $('#toplevel_page_leadin')
    .find('li')
    .last();

  if (addLast) {
    $(lastLink).after(link);
  } else {
    $(lastLink).before(link);
  }
}

export function addExternalLinks() {
  const chatflowsUrl = `${hubspotBaseUrl}/chatflows/${portalId}`;
  const emailUrl = `${hubspotBaseUrl}/email/${portalId}`;
  const pricingUrl = `${hubspotBaseUrl}/pricing/${portalId}/marketing?${pricingQuery}`;
  addMenuItem(i18n.chatflows, chatflowsUrl);
  addMenuItem(i18n.email, emailUrl);
  addMenuItem(i18n.pricing, pricingUrl, true, PRICING_MENU_CLASS);
}
