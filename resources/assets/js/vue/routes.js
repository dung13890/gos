var routes = {
  // '/': {
  //   name: 'index',
  //   //component: require('./components/index.vue')
  // }
} 

export default {
  route: function (router) {
    router.map(routes);
  },
  routes : function () {
    return routes;
  }
}

