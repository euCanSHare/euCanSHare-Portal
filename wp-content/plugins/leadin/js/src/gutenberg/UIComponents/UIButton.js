import styled from 'styled-components';
import { LORAX, OLAF } from './colors';

export default styled.button`
  background-color: ${LORAX};
  border: 3px solid ${LORAX};
  border-radius: 3px;
  color: ${OLAF};
  font-size: 14px;
  line-height: 14px;
  padding: 12px 24px;
  font-family: Avenir Next W02, Helvetica, Arial, sans-serif;
  font-weight: 500;
`;
