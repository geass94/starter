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


window.mediaSelected = function () {
    return {
        checked: false,
        trigger: {
            ['@click']() {
                this.checked = !this.checked
            },
        },
    }
}
