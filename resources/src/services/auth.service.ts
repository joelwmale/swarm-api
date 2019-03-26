import { http } from './http.service';
import { session } from '../services';
import { routerStore } from '../stores';

interface ILogin {
  email?: string;
  password?: string;
}

interface IRegister {
  first_name: string;
  last_name: string;
  email: string;
  phone: string;
  password: string;
  password_confirm: string;
  abn: string;
  trading_name: string;
  promotionCode?: string;
}

class AuthService {
  login(body: ILogin) {
    return http.post('/auth/login', body);
  }

  logout() {
    return http.get('/auth/logout');
  }

  register(body: IRegister) {
    return http.post('/auth/register', body);
  }

  resetPassword(token: string) {
    return http.post(`/auth/password-reset/${token}`, {});
  }

  sendResetPasswordEmail() {
    return http.post('/auth/password-reset', {});
  }

  authenticate(access_token: string, profile: any) {
    session.populate({
      access_token,
      profile
    });

    routerStore.login();
  }
}

export const authService = new AuthService();
