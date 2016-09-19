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
            self.http.get(self.router.route('api.v1.warehouses.start-controller')).then(function (response) {
                console.log(response.data)
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    create: function() {
        var self = this;
        
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.warehouses.create')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    },

    store: function(params) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('api.v1.warehouses.store'), params).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    edit: function(id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('api.v1.warehouses.edit', {warehouse: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        });
    },

    update: function(params, id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            self.http.patch(self.router.route('api.v1.warehouses.update', {warehouse: id}), params).then(function (response) {
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
