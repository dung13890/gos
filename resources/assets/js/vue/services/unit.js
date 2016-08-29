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
            self.http.get(self.router.route('api.v1.units.index')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    store: function(params) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.units.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.units.edit', {unit: id})).then(function (response) {
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
                self.http.patch(self.router.route('api.v1.units.update', {unit: id}), params).then(function (response) {
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
                self.http.delete(self.router.route('api.v1.units.destroy', {unit: id})).then(function (response) {
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
