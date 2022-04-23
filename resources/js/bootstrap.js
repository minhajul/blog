import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'

window._ = require('lodash');

window.axios = require('axios');

window.Popper = require('popper.js').default;
window.$ = require('jquery');
window.jQuery = require('jquery');

window.trix = require('trix');

window.Alpine = Alpine
Alpine.plugin(intersect)
Alpine.start();

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
