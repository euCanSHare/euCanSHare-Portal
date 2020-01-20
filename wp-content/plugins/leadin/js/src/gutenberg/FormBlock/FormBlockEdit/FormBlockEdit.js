import React, { Fragment } from 'react';
import { portalId } from '../../../constants/leadinConfig';
import UISpacer from '../../UIComponents/UISpacer';
import AuthWrapper from '../../Auth/AuthWrapper';
import PreviewForm from './PreviewForm';
import FormSelect from './FormSelect';

export default function FormBlockEdit({
  attributes,
  isSelected,
  setAttributes,
}) {
  const { formId } = attributes;
  const formSelected = portalId && formId;

  const handleChange = selectedForm => {
    setAttributes({
      portalId,
      formId: selectedForm.value,
    });
  };

  return (
    <Fragment>
      {(isSelected || !formSelected) && (
        <AuthWrapper>
          <FormSelect formId={formId} handleChange={handleChange} />
        </AuthWrapper>
      )}
      {formSelected && (
        <Fragment>
          {isSelected && <UISpacer />}
          <PreviewForm portalId={portalId} formId={formId} />
        </Fragment>
      )}
    </Fragment>
  );
}
