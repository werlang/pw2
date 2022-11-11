import { Message, Window } from './class.js';
import { config } from './singleton.js';

const win = new Window('My window', () => {
  const message = new Message('Clicked').show();
  setTimeout(() => message.hide(), 5000);
});
win.show();


// console.log(config.get());
// config.set({
//   foo: 'bar',
//   num: 10,
// });

