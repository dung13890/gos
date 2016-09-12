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
            self.http.get(self.router.route('api.v1.locations.data')).then(function (response) {
                resolve(response.data);
            }, function (response) {
                reject(response.data);
            });
        });
    }
}
