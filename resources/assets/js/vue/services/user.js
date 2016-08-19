export default {
  setHttp (http) {
    this.http = http;
  },
  setRouter (router) {
    this.router = router;
  },

  profile: function () {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http({url: self.router.route('user.ajax.profile'), method: 'GET'}).then(function (response) {
          resolve(response.data);
      }, function (response) {
          reject(response.data);
      });
    })
  },

  updateProfile: function (formData) {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http.post(self.router.route('user.store.profile'), formData).then(function (response) {
        resolve(response.data);
      }, function (response) {
        reject(response.data);
      })
    })
  }
}
