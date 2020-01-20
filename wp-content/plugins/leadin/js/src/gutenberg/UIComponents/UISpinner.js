import React from 'react';
import styled, { css, keyframes } from 'styled-components';
import { CALYPSO_MEDIUM, CALYPSO } from './colors';

const SpinnerOuter = styled.div`
  align-items: center;
  color: #00a4bd;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  height: 100%;
  margin: '2px';
`;

const SpinnerInner = styled.div`
  align-items: center;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 100%;
`;

const dashAnimation = keyframes`
  0% {
    stroke-dasharray: 1, 150;
    stroke-dashoffset: 0;
  }

  50% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -50;
  }

  100% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -140;
  }
`;

const spinAnimation = keyframes`
  100% {
    transform: rotate(360deg)
  }
`;

const Circle = styled.circle.attrs(() => ({
  cx: 25,
  cy: 25,
  r: 22.5,
}))`
  fill: none;
  stroke: ${props => props.color};
  stroke-width: 5;
  stroke-linecap: round;
  transform-origin: center;
  animation: ${props =>
    props.animated
      ? css`${dashAnimation} 2s ease-in-out infinite, ${spinAnimation} 2s linear infinite;`
      : 'none'};
`;

export default function UISpinner({ size = 20 }) {
  return (
    <SpinnerOuter
      className="private-spinner private-spinner--link"
      data-loading={true}
    >
      <SpinnerInner>
        <svg height={size} width={size} viewBox="0 0 50 50">
          <Circle color={CALYPSO_MEDIUM} />
          <Circle animated={true} color={CALYPSO} />
        </svg>
      </SpinnerInner>
    </SpinnerOuter>
  );
}
