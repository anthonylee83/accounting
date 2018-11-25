
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';
import Dropdown from 'vue-simple-search-dropdown';
Vue.use(BootstrapVue);
Vue.component('dropdown', Dropdown);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('journal-row', require('./components/JournalRow.vue'));
Vue.component('journalizer', require('./components/Journalizer.vue'));
Vue.component('dropdown-navigation', require('./components/DropDownNavigation.vue'));
Vue.component('journal-entry-navigation', require('./components/DropDownJournalEntries.vue'));
Vue.component('search', require('./components/Search.vue'));
const app = new Vue({
    el: '#app'
});

$(function () {
    $('.picker-wrap').on('change', '.date-picker-adjusted', function(){
            $('#date-setter-adjusted').attr('href', '/trial/adjusted/' + $('.date-picker-adjusted').val());
        });
        $('.picker-wrap').on('change', '.date-picker-unadjusted', function(){
            $('#date-setter-unadjusted').attr('href', '/trial/unadjusted/' + $('.date-picker-unadjusted').val());
        });
   });