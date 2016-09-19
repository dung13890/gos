export default {
    setHttp (http) {
        this.http = http;
    },

    setRouter (router) {
        this.router = router;
    },
  
    store: function(params) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.customergroups.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.customergroups.edit', {customergroup: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    update: function(params, id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.patch(self.router.route('api.v1.customergroups.update', {customergroup: id}), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    destroy: function(id) {
        var self = this;
        
        return new Promise(function(resolve, reject) {
            self.http.delete(self.router.route('api.v1.customergroups.destroy', {customergroup: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    }
}
