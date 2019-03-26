import 'babel-polyfill';
import 'whatwg-fetch';

const setFixedHeight = (selector: string) => {
  const elements: NodeListOf<HTMLElement> = document.querySelectorAll(selector);
  for (let i = 0; i < elements.length; i++) {
    elements[i].style.height = `${elements[i].offsetHeight}px`;
  }
}

if (window.navigator.userAgent.indexOf('Trident/') > 0 || window.navigator.userAgent.indexOf('MSIE/') > 0) {
  window.addEventListener('load', () => {
    setFixedHeight('.campaign-step .index span');
    setFixedHeight('.tile.justify-center');
  });
}
