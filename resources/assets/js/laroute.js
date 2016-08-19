(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"image\/{path}","name":"image","action":"App\Http\Controllers\Backend\DashboardController@getReponseImage"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\Backend\AuthController@getLogin"},{"host":null,"methods":["POST"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\Backend\AuthController@postLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":null,"action":"App\Http\Controllers\Auth\Backend\AuthController@logout"},{"host":null,"methods":["POST"],"uri":"password\/email","name":null,"action":"App\Http\Controllers\Auth\Backend\PasswordController@postEmail"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\Backend\PasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token?}","name":null,"action":"App\Http\Controllers\Auth\Backend\PasswordController@showResetForm"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/user\/profile","name":"api.user.profile","action":"App\Http\Controllers\Api\UserController@profile"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"App\Http\Controllers\Backend\DashboardController@index"},{"host":null,"methods":["POST"],"uri":"summernote\/image","name":"summernote.image","action":"App\Http\Controllers\Backend\DashboardController@summernoteImage"},{"host":null,"methods":["PATCH"],"uri":"notification\/{notification}","name":"notification.read","action":"App\Http\Controllers\Backend\DashboardController@readNotification"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/ajax\/profile","name":"user.ajax.profile","action":"App\Http\Controllers\Backend\UserController@ajaxProfile"},{"host":null,"methods":["POST"],"uri":"user\/update\/profile","name":"user.update.profile","action":"App\Http\Controllers\Backend\UserController@updateProfile"},{"host":null,"methods":["POST"],"uri":"user\/update\/password","name":"user.update.password","action":"App\Http\Controllers\Backend\UserController@updatePassword"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/data\/room\/{room}","name":"user.data.room","action":"App\Http\Controllers\Backend\UserController@getDataWithRoom"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/data","name":"user.data","action":"App\Http\Controllers\Backend\UserController@getData"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/room\/{room}","name":"user.room","action":"App\Http\Controllers\Backend\UserController@room"},{"host":null,"methods":["GET","HEAD"],"uri":"user","name":"user.index","action":"App\Http\Controllers\Backend\UserController@index"},{"host":null,"methods":["POST"],"uri":"user","name":"user.store","action":"App\Http\Controllers\Backend\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/{user}","name":"user.show","action":"App\Http\Controllers\Backend\UserController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/{user}\/edit","name":"user.edit","action":"App\Http\Controllers\Backend\UserController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"user\/{user}","name":"user.update","action":"App\Http\Controllers\Backend\UserController@update"},{"host":null,"methods":["DELETE"],"uri":"user\/{user}","name":"user.destroy","action":"App\Http\Controllers\Backend\UserController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"products","name":"products.index","action":"App\Http\Controllers\Backend\ProductsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/create","name":"products.create","action":"App\Http\Controllers\Backend\ProductsController@create"},{"host":null,"methods":["POST"],"uri":"products","name":"products.store","action":"App\Http\Controllers\Backend\ProductsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/{products}","name":"products.show","action":"App\Http\Controllers\Backend\ProductsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/{products}\/edit","name":"products.edit","action":"App\Http\Controllers\Backend\ProductsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"products\/{products}","name":"products.update","action":"App\Http\Controllers\Backend\ProductsController@update"},{"host":null,"methods":["DELETE"],"uri":"products\/{products}","name":"products.destroy","action":"App\Http\Controllers\Backend\ProductsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"customers","name":"customers.index","action":"App\Http\Controllers\Backend\CustomersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/create","name":"customers.create","action":"App\Http\Controllers\Backend\CustomersController@create"},{"host":null,"methods":["POST"],"uri":"customers","name":"customers.store","action":"App\Http\Controllers\Backend\CustomersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/{customers}","name":"customers.show","action":"App\Http\Controllers\Backend\CustomersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/{customers}\/edit","name":"customers.edit","action":"App\Http\Controllers\Backend\CustomersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"customers\/{customers}","name":"customers.update","action":"App\Http\Controllers\Backend\CustomersController@update"},{"host":null,"methods":["DELETE"],"uri":"customers\/{customers}","name":"customers.destroy","action":"App\Http\Controllers\Backend\CustomersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"providers","name":"providers.index","action":"App\Http\Controllers\Backend\ProvidersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/create","name":"providers.create","action":"App\Http\Controllers\Backend\ProvidersController@create"},{"host":null,"methods":["POST"],"uri":"providers","name":"providers.store","action":"App\Http\Controllers\Backend\ProvidersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/{providers}","name":"providers.show","action":"App\Http\Controllers\Backend\ProvidersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/{providers}\/edit","name":"providers.edit","action":"App\Http\Controllers\Backend\ProvidersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"providers\/{providers}","name":"providers.update","action":"App\Http\Controllers\Backend\ProvidersController@update"},{"host":null,"methods":["DELETE"],"uri":"providers\/{providers}","name":"providers.destroy","action":"App\Http\Controllers\Backend\ProvidersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms","name":"rooms.index","action":"App\Http\Controllers\Backend\RoomsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/create","name":"rooms.create","action":"App\Http\Controllers\Backend\RoomsController@create"},{"host":null,"methods":["POST"],"uri":"rooms","name":"rooms.store","action":"App\Http\Controllers\Backend\RoomsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/{rooms}","name":"rooms.show","action":"App\Http\Controllers\Backend\RoomsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/{rooms}\/edit","name":"rooms.edit","action":"App\Http\Controllers\Backend\RoomsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"rooms\/{rooms}","name":"rooms.update","action":"App\Http\Controllers\Backend\RoomsController@update"},{"host":null,"methods":["DELETE"],"uri":"rooms\/{rooms}","name":"rooms.destroy","action":"App\Http\Controllers\Backend\RoomsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/data","name":"rooms.data","action":"App\Http\Controllers\Backend\UnitsController@getData"},{"host":null,"methods":["GET","HEAD"],"uri":"units","name":"units.index","action":"App\Http\Controllers\Backend\UnitsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/create","name":"units.create","action":"App\Http\Controllers\Backend\UnitsController@create"},{"host":null,"methods":["POST"],"uri":"units","name":"units.store","action":"App\Http\Controllers\Backend\UnitsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/{units}","name":"units.show","action":"App\Http\Controllers\Backend\UnitsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/{units}\/edit","name":"units.edit","action":"App\Http\Controllers\Backend\UnitsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"units\/{units}","name":"units.update","action":"App\Http\Controllers\Backend\UnitsController@update"},{"host":null,"methods":["DELETE"],"uri":"units\/{units}","name":"units.destroy","action":"App\Http\Controllers\Backend\UnitsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"roles","name":"roles.index","action":"App\Http\Controllers\Backend\RolesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/create","name":"roles.create","action":"App\Http\Controllers\Backend\RolesController@create"},{"host":null,"methods":["POST"],"uri":"roles","name":"roles.store","action":"App\Http\Controllers\Backend\RolesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{roles}","name":"roles.show","action":"App\Http\Controllers\Backend\RolesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{roles}\/edit","name":"roles.edit","action":"App\Http\Controllers\Backend\RolesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"roles\/{roles}","name":"roles.update","action":"App\Http\Controllers\Backend\RolesController@update"},{"host":null,"methods":["DELETE"],"uri":"roles\/{roles}","name":"roles.destroy","action":"App\Http\Controllers\Backend\RolesController@destroy"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                return this.getCorrectUrl(uri + qs);
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if(!this.absolute)
                    return url;

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

