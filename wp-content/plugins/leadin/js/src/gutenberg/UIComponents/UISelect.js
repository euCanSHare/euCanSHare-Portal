import React, { useState } from 'react';
import styled from 'styled-components';
import AsyncSelect from 'react-select/async';
import UISpinner from './UISpinner';
import { CALYPSO, CALYPSO_LIGHT, CALYPSO_MEDIUM } from './colors';

const customStyles = {
  input: style => ({
    ...style,
    input: {
      ...style.input,
      boxShadow: 'none!important',
    },
  }),
  placeholder: style => ({
    ...style,
    fontSize: 16,
  }),
  menu: style => ({
    ...style,
    zIndex: 1000,
  }),
};

const DropdownIndicator = styled.div`
  border-top: 8px solid ${CALYPSO};
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  width: 0px;
  height: 0px;
  margin: 10px;
`;

export default function UISelect(props) {
  const [defaultOptions] = useState(props.defaultOptions);
  return (
    <AsyncSelect
      styles={customStyles}
      components={{
        DropdownIndicator,
        IndicatorSeparator: null,
        LoadingIndicator: UISpinner,
      }}
      theme={theme => ({
        ...theme,
        colors: {
          ...theme.colors,
          primary25: CALYPSO_LIGHT,
          primary50: CALYPSO_LIGHT,
          primary75: CALYPSO_LIGHT,
          primary: CALYPSO_MEDIUM,
        },
      })}
      {...props}
      defaultOptions={defaultOptions}
    />
  );
}
