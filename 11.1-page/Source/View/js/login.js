import { request } from './utils.js';

const button = document.querySelector('button');
const email = document.querySelector('#email');
const password = document.querySelector('#password');


button.addEventListener('click', async () => {
    const data = await request(`login`, {
        method: 'POST',
        body: {
            email: email.value,
            password: password.value,
        },
    });
    console.log(data);
});