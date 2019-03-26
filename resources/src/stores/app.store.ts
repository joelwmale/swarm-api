import {
  observable,
} from 'mobx';
import { IUser } from '../interfaces/user.interface';

class AppStore {
  @observable user: IUser;
}

export const appStore = new AppStore();
