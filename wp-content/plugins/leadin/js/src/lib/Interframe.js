import connectToChild from 'penpal/lib/connectToChild';
import Raven from './Raven';
import { syncRoute, leadinPageReload } from '../navigation';
import { checkFullScreen } from '../utils/fullscreen';
import { hubspotBaseUrl } from '../constants/leadinConfig';
import { leadinClearQueryParam } from '../utils/queryParams';
import { leadinGetPortalInfo } from '../utils/portalInfo';
import {
  leadinConnectPortal,
  leadinDisconnectPortal,
} from '../api/wordpressApi';

const methods = {
  leadinClearQueryParam,
  leadinPageReload,
  leadinGetPortalInfo,
  leadinConnectPortal,
  leadinDisconnectPortal,
};

function createConnectionToiFrame(iframe) {
  return connectToChild({
    // The iframe to which a connection should be made
    iframe,
    childOrigin: hubspotBaseUrl, // the plugin will reject all connections not coming from the iframe
    // Methods the parent is exposing to the child
    methods,
  });
}

export function initInterframe(iframe) {
  if (!iframe) return;
  window.addEventListener('message', event => {
    if (event.origin !== hubspotBaseUrl) return;
    try {
      const data = JSON.parse(event.data);
      if (data['interframe_ready']) {
        window.childFrameConnection = createConnectionToiFrame(iframe);
        window.childFrameConnection.promise.catch(error =>
          Raven.captureException(error, {
            fingerprint: ['INTERFRAME_CONNECTION_ERROR'],
          })
        );
        // Complete the handshake with the iframe
        iframe.contentWindow.postMessage(
          JSON.stringify({ iframe_connection_ready: true }),
          hubspotBaseUrl
        );
      } else if (data['leadin_sync_route']) {
        const route = data['leadin_sync_route'];
        checkFullScreen(route);
        syncRoute(route);
      }
    } catch (e) {
      // Error in parsing message
    }
  });
}
