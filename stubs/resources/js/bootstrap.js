window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.jQuery = window.$ = require('jquery');
require('select2');
require("./Components/flatpickr");