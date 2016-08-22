export default {
    setHttp (http) {
        this.http = http;
    },

    setRouter (router) {
        this.router = router;
    },

    store: function(formData) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('rooms.store'), formData).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        })
    },

    edit: function(id) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.get(self.router.route('rooms.edit', {rooms: id})).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            })
        })
    },

    update: function(formData) {
        var self = this;
        return new Promise(function(resolve, reject) {
            self.http.post(self.router.route('rooms.update'), formData).then(function () {
                resolve(response.data);
            }, function(response) {
                reject(response.data);
            });
        });
    }
}
