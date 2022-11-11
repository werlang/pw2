const config = {
    key: 'page-config',

    set: function(data) {
        const storage = this.get();
        for (let i in data) {
            storage[i] = data[i];
        }
        localStorage.setItem(this.key, JSON.stringify(storage));
    },

    get: function() {
        return JSON.parse(localStorage.getItem(this.key) || '{}');
    },
};

export { config };