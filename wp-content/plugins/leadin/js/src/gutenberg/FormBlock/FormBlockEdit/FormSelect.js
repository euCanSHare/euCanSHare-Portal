import React from 'react';
import debounce from 'lodash/debounce';
import GutenbergWrapper from '../../Common/GutenbergWrapper';
import UISelect from '../../UIComponents/UISelect';
import { searchForms } from '../../../api/hubspotPluginApi';
import Raven from '../../../lib/Raven';
import useForm from './useForm';
import LoadingBlock from '../../Common/LoadingBlock';
import { i18n } from '../../../constants/leadinConfig';

const mapForm = form => ({
  label: form.name,
  value: form.guid,
});

export default function FormSelect({ formId, handleChange }) {
  const { form, loading } = useForm(formId);

  const loadOptions = debounce(
    (search, callback) =>
      searchForms(search)
        .then(forms => callback(forms.map(mapForm)))
        .catch(error => Raven.captureException(error)),
    300,
    { trailing: true }
  );

  const defaultOptions = form ? [mapForm(form)] : true;
  const value = form ? mapForm(form) : null;

  return loading ? (
    <LoadingBlock />
  ) : (
    <GutenbergWrapper>
      <p>
        <b>{i18n.selectExistingForm}</b>
      </p>
      <UISelect
        defaultOptions={defaultOptions}
        cacheOptions={true}
        loadOptions={loadOptions}
        onChange={handleChange}
        placeholder={i18n.selectForm}
        value={value}
      />
    </GutenbergWrapper>
  );
}
