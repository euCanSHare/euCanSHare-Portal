import { routes } from './leadinConfig';

const urlsMap = {};
Object.keys(routes).forEach(key => {
  urlsMap[routes[key]] = key;
});

export default urlsMap;
