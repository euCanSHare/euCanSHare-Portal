import $ from 'jquery';

import { domElements } from './constants/selectors';
import urlsMap from './constants/urlsMap';

// Given a route like "/settings/forms", parse it into "?page=leadin_settings&leadin_route[0]=forms"
export function syncRoute(path = '') {
  const baseUrls = Object.keys(urlsMap).sort((a, b) =>
    a.length < b.length ? 1 : -1
  );
  let wpPage;
  let route;
  baseUrls.some(basePath => {
    if (path.indexOf(basePath) === 0) {
      wpPage = urlsMap[basePath];
      route = path.replace(basePath, '').substr(1);
      return true;
    }
    return false;
  });

  if (!wpPage) {
    return;
  }

  const leadinRouteParam = route
    .split('/')
    .map((r, index) => `${encodeURIComponent(`leadin_route[${index}]`)}=${r}`)
    .join('&');

  const newUrl = `?page=${wpPage}${route ? `&${leadinRouteParam}` : ''}`;

  window.history.replaceState(null, null, newUrl);
}

export function disableNavigation() {
  $(domElements.allMenuButtons).off('click');
}

export const leadinPageReload = () => window.location.reload(true);
