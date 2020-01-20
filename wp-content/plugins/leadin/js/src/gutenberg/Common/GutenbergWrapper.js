import styled from 'styled-components';
import { pluginPath } from '../../constants/leadinConfig';

export default styled.div`
  background-image: url(${pluginPath}/assets/images/hubspot.svg);
  background-color: #f5f8fa;
  background-repeat: no-repeat;
  background-position: center 25px;
  background-size: 120px;
  color: #33475b;
  font-family: Avenir Next, Helvetica, Arial, sans-serif;
  font-size: 14px;
  padding: 90px 20% 25px;

  p {
    font-size: inherit !important;
    line-height: 24px;
    margin: 4px 0;
  }
`;
