import Alpine from 'alpinejs'

window._ = require('lodash');

window.axios = require('axios');

try {
    window.Popper = require('popper.js').default;
    window.$ = require('jquery');
    window.jQuery = require('jquery');
    window.trix =  require('trix');

    window.Alpine = Alpine
} catch (e) {

}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
