// const templateVars = {};
// document.querySelectorAll('.template-vars').forEach(e => {
//     templateVars[e.id] = e.value;
//     e.remove();
// });


// document.querySelector('#name').innerHTML = templateVars.name;
// document.querySelector('#email').innerHTML = templateVars.email;

import { request } from './utils.js';

document.querySelector('button').addEventListener('click', () => {
    request('logout', { method: "DELETE" });
    window.location.reload();
});