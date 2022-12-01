const cart = {
    list: [],

    add: function(item, amount=0) {
        if (!this.list[ item.id ]) {
            this.list[ item.id ] = {};
            this.list[ item.id ].item = item;
            this.list[ item.id ].quantity = this.setQuantity(item.id, amount);
            return true;
        }
        return false;
    },

    remove: function(id) {
        if (this.list[ id ]) {
            delete this.list[ id ];
            return true;
        }
        return false;
    },

    getList: function() {
        return this.list;
    },

    setQuantity: function(id, amount=0) {
        if (!this.list[ id ]) return false;

        let quantity = Math.max(0, amount);
        quantity = Math.min(quantity, this.list[id].item.quantity);

        this.list[ id ].quantity = quantity;
        if (quantity == 0) {
            this.remove(id);
        }
        return quantity;
    },

    increase: function(id) {
        const quantity = this.list[id].quantity;
        this.setQuantity(id, quantity + 1);
    },

    decrease: function(id) {
        const quantity = this.list[id].quantity;
        this.setQuantity(id, quantity - 1);
    },

    show: function() {
        // console.log(this.getList())
        const list = Object.values(this.getList()).map(e => {
            const product = document.createElement('div');
            product.classList.add('product');
            product.innerHTML = `
                <div class="row">
                    <img src="${ e.item.image }">
                    <span class="name">${ e.item.name }</span>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Quantidade</span>
                        <span class="decrease">➖</span>
                        <span class="quantity">${ parseInt(e.quantity) }</span>
                        <span class="increase">➕</span>
                    </div>
                    <div class="col">
                        Preço: <span class="price">R$ ${ (e.quantity * e.item.price).toFixed(2) }</span>
                    </div>
                </div>
            `;

            function update() {
                const qtd = parseInt(e.quantity);
                if (qtd == 0) {
                    product.remove();
                }
                product.querySelector('.quantity').innerHTML = qtd;
                product.querySelector('.price').innerHTML = 'R$ '+ (e.quantity * e.item.price).toFixed(2);
            }
            product.querySelector('.decrease').addEventListener('click', () => {
                this.decrease(e.item.id);
                update();
            });
            product.querySelector('.increase').addEventListener('click', () => {
                this.increase(e.item.id);
                update();
            });

            return product;
        })

        const fog = document.createElement('div');
        fog.id = 'fog';
        fog.innerHTML = `
            <div id="window">
                <h2>Carrinho</h2>
            </div>
        `;
        const window = fog.querySelector('#window');
        window.addEventListener('click', e => e.stopPropagation());
        list.forEach(e => window.appendChild(e));
        fog.addEventListener('click', () => fog.remove());
        document.body.appendChild(fog);
    },
}

export { cart };