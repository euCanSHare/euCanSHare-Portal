import React from 'react';
import { registerBlockType } from '@wordpress/blocks';
import SprocketIcon from '../Common/SprocketIcon';
import FormBlockEdit from './FormBlockEdit';
import FormBlockSave from './FormBlockSave';
import { i18n } from '../../constants/leadinConfig';

export default function registerFormBlock() {
  registerBlockType('leadin/hubspot-form-block', {
    title: i18n.formBlockTitle,
    description: i18n.formBlockDescription,
    icon: SprocketIcon,
    category: 'leadin-blocks',
    attributes: {
      portalId: {
        type: 'string',
      },
      formId: {
        type: 'string',
      },
    },
    edit: props => <FormBlockEdit {...props} />,
    save: props => <FormBlockSave {...props} />,
  });
}
