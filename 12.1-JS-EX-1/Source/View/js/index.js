import { Product } from './product.js';

document.querySelector('#getall button').addEventListener('click', async () => {
    const products = await Product.getAll();
    console.log(products);
});

document.querySelector('#get button').addEventListener('click', async () => {
    const id = document.querySelector('#pid').value;
    const product = new Product(id);
    const resp = await product.get();
    console.log(resp);
});

document.querySelector('#insert button').addEventListener('click', async () => {
    const product = new Product(
        null,
        document.querySelector('#insert #name').value,
        document.querySelector('#insert #description').value,
        document.querySelector('#insert #price').value,
        document.querySelector('#insert #quantity').value,
        document.querySelector('#insert #image').value,
    );

    const resp = await product.insert();
    console.log(resp);
});

document.querySelector('#change button').addEventListener('click', async () => {
    const product = new Product(
        document.querySelector('#change #id-change').value,
        document.querySelector('#change #name').value,
        document.querySelector('#change #description').value,
        document.querySelector('#change #price').value,
        document.querySelector('#change #quantity').value,
        document.querySelector('#change #image').value,
    );

    const resp = await product.update();
    console.log(resp);
});