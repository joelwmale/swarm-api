import { createBrowserHistory, History } from 'history';

interface IConfig {
  environment: Environments;
  envIsProduction: boolean;
  envIsTest: boolean;
  appName: string;
  apiUrl: string;

  history: History;
  loginPath: string;
  logoutPath: string;

  sentryPublicDsn: string;
  sessionKey: string;
}

export enum Environments {
  PRODUCTION = 'production',
  DEVELOPMENT = 'development',
  TEST = 'test',
};

// Environment
const environment: Environments = (process.env.APP_ENV as Environments);
const envIsProduction: boolean = environment === Environments.PRODUCTION;
const envIsTest: boolean = environment === Environments.TEST;

// Session
const sessionKey: string = 'swarm';

export const CONFIG: IConfig = {
  environment,
  envIsProduction,
  envIsTest,
  appName: process.env.APP_NAME || 'Swarm',
  apiUrl: process.env.API_URL || '',
  history: createBrowserHistory(),
  loginPath: '/users/login',
  logoutPath: '/',
  sentryPublicDsn: process.env.SENTRY_PUBLIC_DSN || '',
  sessionKey,
};
