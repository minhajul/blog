import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'

window._ = import('lodash');

window.axios = import('axios');

window.Popper = import('popper.js').default;
window.$ = import('jquery');
window.jQuery = import('jquery');

window.trix = import('trix');

window.Alpine = Alpine
Alpine.plugin(intersect)
Alpine.start();
