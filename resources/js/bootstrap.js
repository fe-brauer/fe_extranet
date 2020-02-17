window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');
    require('@fancyapps/fancybox');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
