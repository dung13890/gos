export default {
  setHttp (http) {
    this.http = http;
  },
  
  setRouter (router) {
    this.router = router;
  },

  getPermission: function () {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http.get(self.router.route('roles.ajax.permission')).then(function (response) {
        resolve(response.data)
      }, function (response) {
        reject(response.data)
      })
    })
  },
  
  getRole: function (id) {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http.get(self.router.route('roles.ajax.role', {roles: id})).then(function (response) {
        resolve(response.data)
      }, function (response) {
        reject(response.data)
      })
    })
  },
  
  store: function (formData) {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http.post(self.router.route('roles.store'), formData).then(function (response) {
        resolve(response.data)
      }, function (response) {
        reject(response.data)
      })
    })
  },

  update: function (formData, id) {
    var self = this;
    return new Promise( function(resolve, reject) {
      self.http.post(self.router.route('roles.ajax.update', {roles: id}), formData).then(function (response) {
        resolve(response.data)
      }, function (response) {
        reject(response.data)
      })
    })
  }
}
