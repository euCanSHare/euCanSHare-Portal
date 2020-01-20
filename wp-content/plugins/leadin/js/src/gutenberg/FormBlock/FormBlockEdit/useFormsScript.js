import $ from 'jquery';

import { useEffect, useState } from 'react';
import { formsScript } from '../../../constants/leadinConfig';

let promise;

function loadFormsScript() {
  if (!promise) {
    promise = new Promise((resolve, reject) =>
      $.getScript(formsScript)
        .done(resolve)
        .fail(reject)
    );
  }
  return promise;
}

export default function useFormScript() {
  const [ready, setReady] = useState(false);

  useEffect(() => {
    loadFormsScript().then(() => setReady(true));
  }, []);

  return ready;
}
