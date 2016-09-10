import VueValidator from 'vue-validator'
import ModalPassword from './components/partials/password.vue'
import UserService from './services/user'

require('./bootstrap')
var router = window.router || laroute || window.laroute
Vue.use(VueResource)
Vue.use(VueValidator)

new Vue({
  el : 'body',
  data: function () {
    return {
      userProfile: {},
      formElement: {},
      errors: {},
      UserService: UserService,
    };
  },
  created: function () {
    UserService.setRouter(window.laroute)
    UserService.setHttp(this.$http)
  },
  methods: {
    profile: function () {
      var self = this;
      UserService.profile().then((userProfile) => {
        self.userProfile = userProfile;
      });
      this.formElement.modal('show');
    }
  },
  ready: function() {
    console.log(ModalProfile);
  },
  components : { ModalPassword }
});
