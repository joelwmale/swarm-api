import * as React from 'react';
import { Router as ReactRouter, Route, Switch } from 'react-router-dom';
import { RenderRoute } from './components';
import { CONFIG } from './config';
import { IRoute } from './interfaces';
import { sharedRoutes } from './routes';
import { routerStore } from './stores';
import { NotFound } from './views';

export class Router extends React.Component {
  private routes: IRoute[] = [...sharedRoutes];

  componentDidCatch() {
    // @ODO does this log out?
    if (process.env.NODE_ENV !== 'development') {
      routerStore.logout();
    }
  }

  render() {
    return (
      <ReactRouter history={CONFIG.history}>
        <Switch>
          {this.routes.map(route => (
            <RenderRoute key={route.path} {...route} />
          ))}
          <Route component={NotFound} />
        </Switch>
      </ReactRouter>
    );
  }
}
