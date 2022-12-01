import { carousel } from './carousel.js';
import { Product } from './product.js';
import { cart } from './cart.js';

async function main() {
    // request products
    const products = await Product.getAll();
    // console.log(products)
    const productsCarousel = products.map(e => ({
        text: e.description,
        img: e.image,
    }));

    // start corousel with products
    carousel.init({
        parent: document.querySelector('#carousel-container'),
        createPlayer: true,
        time: 6000,
    }).add( productsCarousel ).start();
    
    // print product list
    products.forEach(e => {
        const item = document.createElement('div');
        item.classList.add('item');
        item.innerHTML = `
            <img src="${ e.image }">
            <div class="info">
                <div class="name">Nome: <span>${ e.name }</span></div>
                <div class="description">Descrição: <span>${ e.description }</span></div>
                <div class="price">Preço: <span>R$ ${ e.price.toFixed(2) }</span></div>
            </div>
        `;
        item.addEventListener('click', () => {
            cart.add(e, 1);
            cart.show();
        });
        document.querySelector('#list-container').appendChild(item);
    });

    document.querySelector('header #cart-button').addEventListener('click', () => cart.show());
}
main();