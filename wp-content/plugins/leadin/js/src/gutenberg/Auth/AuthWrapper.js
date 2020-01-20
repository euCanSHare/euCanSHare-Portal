import React, { Fragment } from 'react';
import useAuth from './useAuth';
import LoginBlock from './LoginBlock';
import LoadingBlock from '../Common/LoadingBlock';

export default function AuthWrapper({ children }) {
  const { auth, loading } = useAuth();

  return loading ? (
    <LoadingBlock />
  ) : auth ? (
    <Fragment>{children}</Fragment>
  ) : (
    <LoginBlock />
  );
}
