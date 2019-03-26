import { CONFIG } from '../config';
import { IKeyValAny, IKeyValString } from '../interfaces';
import { session } from './session.service';

interface IOptions {
  headers: IKeyValString;
  method: string;
  body?: FormData|string;
}

export interface IFiles {
  key: string;
  files: Array<File>;
}

class HTTP {
  get(uri: string) {
    return this.buildRequest('GET', uri);
  }

  post(uri: string, body: IKeyValAny, fileObject?: IFiles) {
    return this.buildRequest('POST', uri, body, fileObject);
  }

  patch(uri: string, body: IKeyValAny, fileObject?: IFiles) {
    return this.buildRequest('PATCH', uri, body, fileObject);
  }

  buildRequest(method: string, uri: string, body?: IKeyValAny, fileObject?: IFiles): Promise<any> {
    return new Promise((resolve, reject) => {
      fetch(`${CONFIG.apiUrl}${uri}`, this.getOptions(method, body, fileObject))
        .then((res: Response) => this.onResponse(res, resolve, reject));
    });
  }

  getOptions(method: string, body?: IKeyValAny, fileObject?: IFiles): IOptions {
    const options: IOptions = {
      headers: {},
      method,
    };

    // If request has files, use FormData; else, use json
    if (fileObject && fileObject.files.length > 0) {
      const formData = new FormData();
      fileObject.files.forEach(file => formData.append(`${fileObject.key}`, file)); // Add [] to the end of the name to accept an array of files
      if (body) {
        for (let key in body) {
          formData.append(key, body[key]);
        }
      }
      options.body = formData;
    } else if (body) {
      options.body = JSON.stringify(body);
      options.headers['content-type'] = 'application/json';
    }

    const token = session.get('access_token');
    if ([undefined, null].indexOf(token) === -1) {
      options.headers.Authorization = `Bearer ${token}`;
    }

    return options;
  }

  onResponse(res: Response, resolve: Function, reject: Function) {
    // If request unauthenticated, kill session and redirect to guest route for path
    if (res.status === 401) {
      const {
        history,
        logoutPath,
        sessionKey,
      } = CONFIG;
      session.destroy(sessionKey);
      history.push(logoutPath);
      return reject(res);
    }

    // Parse and return json body or plain response
    const contentType = res.headers.get('content-type');
    const jsonResponse = contentType && contentType.indexOf('application/json') !== -1;
    if (jsonResponse) {
      try {
        res.json().then(obj => res.ok ? resolve(obj) : reject(obj));
      } catch (err) {
        return res.ok ? resolve(res) : reject(res)
      }
    } else {
      // Parse the res body if the env is test, otherwise just return res as normal
      const data: any = CONFIG.envIsTest && res.body ? JSON.parse(res.body as any) : res;
      return res.ok ? resolve(data) : reject(data);
    }
  }
}

export const http = new HTTP();
