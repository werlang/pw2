import { request } from './utils.js';

class Product {
    #id = null;
    #name = null;
    #description = null;
    #price = null;
    #quantity = null;

    constructor(
        id = null,
        name = null,
        description = null,
        price = null,
        quantity = null,
    ) {
        this.#id = id;

        if (name && name != '') {
            this.#name = name;
        }
        if (description && description != '') {
            this.#description = description;
        }
        if (price && price != '') {
            this.#price = price;
        }
        if (quantity && quantity != '') {
            this.#quantity = quantity;
        }
    }

    static async getAll() {
        return request('products');
    }

    async get() {
        const id = this.#id;
        const resp = await request(`products/${id}`);
        return resp;
    }

    async insert() {
        const body = {
            name: this.#name,
            description: this.#description,
            price: this.#price,
            quantity: this.#quantity,
        }
        const resp = await request('products', { method: 'POST', body: body });
        if (resp.id) {
            this.#id = resp.id;
        }

        return resp;
    }

    async update() {
        const id = this.#id;
        const body = {};

        if (this.#name) {
            body.name = this.#name;
        }
        if (this.#description) {
            body.description = this.#description;
        }
        if (this.#price) {
            body.price = this.#price;
        }
        if (this.#quantity) {
            body.quantity = this.#quantity;
        }
        
        const resp = await request(`products/${id}`, { method: 'PUT', body: body });

        return resp;
    }

    getInfo() {
        return {
            id: this.#id,
            name: this.#name,
            description: this.#description,
            price: this.#price,
            quantity: this.#quantity,
        }
    }
}

export { Product };