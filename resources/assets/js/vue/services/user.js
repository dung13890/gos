export default {
    setHttp (http) {
        this.http = http;
    },
  
    setRouter (router) {
        this.router = router;
    },

    profile: function () {
        var self = this;

        return new Promise( function(resolve, reject) {
            self.http({url: self.router.route('user.ajax.profile'), method: 'GET'}).then(function (response) {
                resolve(response.data)
            }, function (response) {
                reject(response.data)
            })
        })
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
  
    updatePassword: function (formData) {
        var self = this;

        return new Promise( function(resolve, reject) {
            self.http.post(self.router.route('user.update.password'), formData).then(function (response) {
                resolve(response.data)
            }, function (response) {
                reject(response.data)
            })
        })
    }
}
