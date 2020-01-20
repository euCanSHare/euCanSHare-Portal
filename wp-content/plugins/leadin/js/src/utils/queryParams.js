export function leadinClearQueryParam() {
  let currentWindowLocation = window.location.toString();
  if (currentWindowLocation.indexOf('?') > 0) {
    currentWindowLocation = currentWindowLocation.substring(
      0,
      currentWindowLocation.indexOf('?')
    );
  }
  const newWindowLocation = `${currentWindowLocation}?page=leadin`;
  window.history.pushState({}, '', newWindowLocation);
}
