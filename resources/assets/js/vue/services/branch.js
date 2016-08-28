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
            self.http.get(self.router.route('api.v1.branches.index')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    store: function(params) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.branches.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.branches.edit', {branch: id})).then(function (response) {
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
                self.http.patch(self.router.route('api.v1.branches.update', {branch: id}), params).then(function (response) {
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
                self.http.delete(self.router.route('api.v1.branches.destroy', {branch: id})).then(function (response) {
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
