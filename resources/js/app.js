require('./bootstrap');

require('alpinejs');


window.modal = function () {
    return {
        open: false,
        trigger: {
            ['@click']() {
                this.open = !this.open
            },
        },
    }
}
