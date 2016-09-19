export default {
    setHttp (http) {
        this.http = http;
    },

    setRouter (router) {
        this.router = router;
    },

    create: function() {
        var self = this;
        
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.categories.create')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    store: function(params) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.categories.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.categories.edit', {category: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    update: function(params, id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            try {
                self.http.patch(self.router.route('api.v1.categories.update', {category: id}), params).then(function (response) {
                    resolve(response.data);
                }, function (response) {
                    reject(response.data);
                });
            } catch(e) {
                console.log(e);
            }
        });
    },

    destroy: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            try {
                self.http.delete(self.router.route('api.v1.categories.destroy', {category: id})).then(function (response) {
                    resolve(response.data);
                }, function (response) {
                    reject(response.data);
                });
            } catch(e) {
                console.log(e);
            }
        });
    }
}
