export default {
    setHttp (http) {
        this.http = http;
    },
  
    setRouter (router) {
        this.router = router;
    },

    update: function(params, id) {
        var self = this;

        return new Promise(function(resolve, reject) {
            try {
                self.http.patch(self.router.route('api.v1.users.update', {user: id}), params).then(function (response) {
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
