import { request } from './utils.js';

const button = document.querySelector('button');
const name = document.querySelector('#name');
const email = document.querySelector('#email');
const password = document.querySelector('#password');

button.addEventListener('click', async () => {
    const data = await request(`register`, {
        method: 'POST',
        body: {
            name: name.value,
            email: email.value,
            password: password.value,
        },
    });
    console.log(data);
});