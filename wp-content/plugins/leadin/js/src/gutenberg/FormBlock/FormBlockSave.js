import React, { Fragment } from 'react';
import { formsScript, formsScriptPayload } from '../../constants/leadinConfig';

export default function FormSaveBlock({ attributes }) {
  const { portalId, formId } = attributes;

  if (portalId && formId) {
    return (
      <Fragment>
        <script charset="utf-8" type="text/javascript" src={formsScript} />
        <script>
          {`hbspt.forms.create({ portalId: '${portalId}', formId: '${formId}', ${formsScriptPayload} })`}
        </script>
      </Fragment>
    );
  }
  return null;
}
