import { History } from 'history';
import { action, observable } from 'mobx';
import { CONFIG } from '../config';
import { authService, session } from '../services';

class RouterStore {
  @observable loggedIn: boolean = session && session.has('access_token') || false;
  // @observable loggedIn: boolean = false;
  history: History = CONFIG.history;

  /**
   * Redirect to path.
   *
   * @param path string
   * @return {void}
   */
  @action
  redirect(path: string): void {
    this.history.push(path);
  }

  /**
   * Log in/out functions.
   *
   * @return {void}
   */
  @action
  login(): void {
    this.loggedIn = true;
    this.history.push(CONFIG.loginPath);
  }

  @action
  logout(): void {
    this.loggedIn = false;
    authService
      .logout()
      .then(() => {
        session.destroy(CONFIG.sessionKey);
        this.history.push(CONFIG.logoutPath);
      });
  }
}

export const routerStore = new RouterStore();
