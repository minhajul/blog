window._ = require('lodash');

window.axios = require('axios');

try {
    window.Popper = require('popper.js').default;
    window.$ = require('jquery');
    window.jQuery = require('jquery');
    window.trix =  require('trix');
} catch (e) {

}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
