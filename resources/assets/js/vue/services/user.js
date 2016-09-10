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
            self.http.get(self.router.route('api.v1.users.index')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    store: function(params) {
        var self = this;
        
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.users.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.users.edit', {user: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    update: function(params, id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.patch(self.router.route('api.v1.users.update', {user: id}), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },
    
    destroy: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            try {
                self.http.delete(self.router.route('api.v1.users.destroy', {user: id})).then(function (response) {
                    resolve(response.data);
                }, function (response) {
                    reject(response.data);
                });
            } catch(e) {
                console.log(e);
            }
        });
    },

    changePassword: function (params) {
        var self = this;
        
        return new Promise( function(resolve, reject) {
            self.http.patch(self.router.route('api.v1.users.update.password'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        })
    }
}
