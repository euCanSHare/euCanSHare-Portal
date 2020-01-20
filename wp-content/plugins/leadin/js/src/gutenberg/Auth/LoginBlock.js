import React from 'react';
import GutenbergWrapper from '../Common/GutenbergWrapper';
import UIButton from '../UIComponents/UIButton';
import UIContainer from '../UIComponents/UIContainer';
import loginThroughPopup from '../../utils/loginThroughPopup';
import { i18n } from '../../constants/leadinConfig';

export default function LoginBlock() {
  return (
    <GutenbergWrapper>
      <UIContainer textAlign="center">
        <UIButton onClick={loginThroughPopup}>{i18n.signIn}</UIButton>
      </UIContainer>
    </GutenbergWrapper>
  );
}
