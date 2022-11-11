class Message {
    #text = '';
    #obj = null;
    constructor(text) {
      this.#text = text;
      const obj = document.createElement('div');
      obj.innerHTML = text;
      obj.classList.add('message');
      this.#obj = obj;
    }
    show() {
      document.body.appendChild(this.#obj);
      this.#obj.classList.remove('hidden');
      return this;
    }
    hide() {
      this.#fadeOut();
      setTimeout(() => {
        this.#obj.classList.add('hidden');
      }, 2000);
    }
    #fadeOut() {
      this.#obj.classList.add('fade');
    }
  
    getObj() {
      return this.#obj;
    }
  }
  
  
  class Window extends Message {
    constructor(text, callback) {
      super(text);
      this.getObj().classList.add('window');
      this.addButton(callback);
    }
    addButton(callback) {
      const button = document.createElement('button');
      button.innerHTML = 'OK';
      button.addEventListener('click', () => {
        callback();
        this.close();
      });
      this.getObj().appendChild(button);
    }
    close() {
      this.hide();
    }
    hide() {
      super.hide();
      setTimeout(() => {
        this.getObj().remove();
      }, 2000);
  
    }
  }

  export { Window, Message };