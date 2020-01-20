import Raven from 'raven-js';
import {
  env,
  phpVersion,
  wpVersion,
  leadinPluginVersion,
  portalId,
  plugins,
} from '../constants/leadinConfig';

export function configureRaven() {
  if (env !== 'prod') {
    return;
  }

  Raven.config(
    'https://e9b8f382cdd130c0d415cd977d2be56f@exceptions.hubspot.com/1',
    {
      instrument: {
        tryCatch: false,
      },
    }
  ).install();

  Raven.setTagsContext({
    v: leadinPluginVersion,
    php: phpVersion,
    wordpress: wpVersion,
  });

  Raven.setUserContext({
    hub: portalId,
    plugins: Object.keys(plugins)
      .map(name => `${name}#${plugins[name].Version}`)
      .join(','),
  });
}

export default Raven;
