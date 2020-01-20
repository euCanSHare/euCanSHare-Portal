import { post } from './wordpressClient';

export function leadinConnectPortal(portalInfo) {
  return post('leadin_registration_ajax', portalInfo);
}

export function leadinDisconnectPortal() {
  return post('leadin_disconnect_ajax', {});
}
