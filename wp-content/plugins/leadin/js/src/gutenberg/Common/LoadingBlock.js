import React from 'react';
import GutenbergWrapper from './GutenbergWrapper';
import UISpinner from '../UIComponents/UISpinner';

export default function LoadingBlock() {
  return (
    <GutenbergWrapper>
      <UISpinner size={50} />
    </GutenbergWrapper>
  );
}
