export default {
  setHttp (http) {
    this.http = http;
  },
  
  setRouter (router) {
    this.router = router;
  },

    index: function() {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.roles.index')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    filter: function(params) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.roles.index'), {name: 'ok'}).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    permissions: function () {
        var self = this;
        
        return new Promise( function(resolve, reject) {
            self.http.get(self.router.route('api.v1.permissions.index')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
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
            self.http.post(self.router.route('api.v1.roles.index'), formData).then(function (response) {
                resolve(response.data)
            }, function (response) {
                reject(response.data)
            })
        })
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.roles.edit', {role: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    update: function (formData, id) {
        var self = this;

        return new Promise( function(resolve, reject) {
            self.http.patch(self.router.route('api.v1.roles.update', {role: id}), formData).then(function (response) {
                resolve(response.data)
            }, function (response) {
                reject(response.data)
            })
        })
    },

    destroy: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            try {
                self.http.delete(self.router.route('api.v1.roles.destroy', {role: id})).then(function (response) {
                    resolve(response.data);
                }, function (response) {
                    reject(response.data);
                });
            } catch(e) {
                console.log(e);
            }
        });
    },
}
