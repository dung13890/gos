export default {
  setHttp (http) {
    this.http = http;
  },

  setRouter (router) {
    this.router = router;
  },

  storeRoom: function(formData) {
    var self = this;
    return new Promise(function(resolve, reject) {
      self.http.post(self.router.route('rooms.store'), formData).then(function (response) {
        resolve(response.data);
      }, function (response) {
        reject(response.data);
      })
    })
  }
}
