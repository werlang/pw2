const carousel = {
    time: 5000,
    list: [],
    interval: null,
    index: 0,
    paused: true,
    hasPlayer: false,

    init: function({
        parent = null,
        createPlayer = false,
        time = 5000,
    }) {
        const car = document.createElement('div');
        car.id = 'carousel';
        parent.appendChild(car);
        this.dom = car;

        if (createPlayer) {
            this.hasPlayer = true;
            const but = document.createElement('div');
            this.player = but;
            but.id = 'button-caontainer';
            parent.appendChild(but);

            but.innerHTML = `
                <button id="prev">⏮️</button>
                <button id="startstop">⏸️</button>
                <button id="next">⏭️</button>
            `;

            but.querySelector('#prev').addEventListener('click', () => {
                this.prev({ direction: 'left' });
            });
            but.querySelector('#next').addEventListener('click', () => {
                this.next({ direction: 'right' });
            });
            
            const startStopButton = but.querySelector('#startstop');
            startStopButton.addEventListener('click', () => {
                if (this.paused) {
                    this.start();
                    this.next();
                }
                else {
                    this.stop();
                }
            });
            
        }

        this.setTime(time);

        return this;
    },

    add: function(args) {
        if (!Array.isArray(args)) {
            args = [ args ];
        }
        
        args.forEach(e => {
            const obj = document.createElement('div');
            obj.classList.add('item');
            obj.innerHTML = `<img src="${ e.img }"><span>${ e.text }</span>`;

            this.list.push({ img: e.img, text: e.text, obj: obj });
        });
        
        this.dom.innerHTML = '';
        this.list.forEach(e => this.dom.insertAdjacentElement('beforeend', e.obj));
        
        this.list.forEach(e => e.obj.classList.remove('active'));
        this.index = this.list.length - 1;
        this.list[ this.index ].obj.classList.add('active');

        return this;
    },

    setTime: function(time) {
        this.time = time;
    },

    start: function({ order='asc' }={}) {
        this.stop();
        const func = order == 'asc' ? 'next' : 'prev';
        this.interval = setInterval(() => this[func](), this.time);
        this.paused = false;

        if (this.hasPlayer) {
            this.player.querySelector('#startstop').innerHTML = '⏸️';
        }
    },

    stop: function() {
        if (this.interval) {
            clearInterval(this.interval);
            this.paused = true;
        }

        if (this.hasPlayer) {
            this.player.querySelector('#startstop').innerHTML = '▶️';
        }
    },

    next: function(arg) {
        this.index++;
        if (this.index >= this.list.length) {
            this.index = 0;
        }
        this.setActive(arg);
    },

    prev: function(arg) {
        this.index--;
        if (this.index < 0) {
            this.index = this.list.length - 1;
        }
        this.setActive(arg);
    },

    setActive: function({ force=false, direction='right' }={}) {
        if (force) {
            this.index = force;
        }

        let fromDir = 'slideLeft';
        let toDir = 'slideRight';
        if (direction == 'left') {
            fromDir = 'slideRight';
            toDir = 'slideLeft';
        }

        const current = this.dom.querySelector('.item.active');
        const next = this.dom.querySelectorAll('.item')[ this.index ];
        current.classList.add(fromDir);
        setTimeout(() => {
            this.dom.querySelectorAll('.item').forEach(e => e.classList.remove('active', fromDir));
            next.classList.add('active', toDir);
            setTimeout(() => next.classList.remove(toDir), 100);
        }, 300);

    },
}

export { carousel };