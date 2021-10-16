import Alpine from 'alpinejs'

window._ = require('lodash');

window.axios = require('axios');

window.Popper = require('popper.js').default;
window.$ = require('jquery');
window.jQuery = require('jquery');

window.Alpine = Alpine
Alpine.start();

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
