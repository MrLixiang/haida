// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './app.vue'
import router from './config/router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import qs from 'querystring'
import Vuex from 'vuex'
import 'es6-promise/auto'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    user: 'qqqq'
  }
});


Vue.use(VueAxios, axios);

import MyPlugins from './js/componentPlugins.js'
import 'lib-flexible/flexible.js'

Vue.use(MyPlugins);
Vue.config.productionTip = false;

Vue.prototype.$qs = qs;
Vue.prototype.$api = '/api';

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: {App},
  template: '<App/>'
});


