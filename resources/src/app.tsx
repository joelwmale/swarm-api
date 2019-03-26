import 'promise-polyfill/src/polyfill';

if (!!(window as any).MSInputMethodContext && !!(document as any).documentMode) {
  console.log('Please use a newer browser, such as Chrome or Firefox, for a better experience.');
  import('./polyfills/ie11-polyfills.js' as any).then(() => import('./index'));
} else {
  import('./index');
}
