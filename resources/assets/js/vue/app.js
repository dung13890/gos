import Vue from 'vue'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import ModalProfile from './components/partials/profile.vue'
import ModalPassword from './components/partials/password.vue'
import ModalRole from './components/role/modal.vue'
import UserService from './services/user'
import RoleService from './services/role'

var router = window.router || laroute || window.laroute;
require('es6-promise').polyfill()
Vue.use(VueResource)
Vue.use(VueValidator)
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content')

new Vue({
  el : 'body',
  data: function () {
    return {
        itemProfile: {},
        UserService: UserService,
        RoleService: RoleService,
    };
  },
  created: function () {
    UserService.setRouter(window.laroute);
    UserService.setHttp(this.$http);
    RoleService.setRouter(window.laroute);
    RoleService.setHttp(this.$http);
  },
  methods: {
    profile: function () {
      var self = this;
      UserService.profile().then((itemProfile) => {
        self.itemProfile = itemProfile;
      });
    },
  },
  ready: function () {
    this.profile();
  },
  components : { ModalProfile, ModalPassword, ModalRole },
});