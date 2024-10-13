import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'

window.axios = import('axios');

window._ = import('lodash');
window.Popper = import('popper.js').default;
window.$ = import('jquery');
window.jQuery = import('jquery');

window.trix = import('trix');

Alpine.plugin(intersect)
