import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueValidator from 'vue-validator'
import Routes from './routes'
require('es6-promise').polyfill()
Vue.use(VueResource)
Vue.use(VueRouter)
Vue.use(VueValidator)
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content')

var transition = {
  fade: {
    afterEnter: function (el) {
      this.$broadcast('fade:afterEnter', el)
    }
  }
}
Vue.transition('fade', transition.fade);

const router = new VueRouter({
  history: true,
  saveScrollPosition: false,
  transitionOnLoad: true
})

router.beforeEach(function (transition) {
  window.scrollTo(0, 0)
  transition.next()
})


Routes.route(router)

const App = Vue.extend(require('./app.vue'))

router.start(App, '#vue-content')

window.$router = router