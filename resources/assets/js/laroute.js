(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["GET","HEAD"],"uri":"image\/{path}","name":"image","action":"App\Http\Controllers\Backend\DashboardController@getReponseImage"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\Backend\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\Backend\LoginController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":null,"action":"App\Http\Controllers\Auth\Backend\LoginController@logout"},{"host":null,"methods":["POST"],"uri":"password\/email","name":null,"action":"App\Http\Controllers\Auth\Backend\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\Backend\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token?}","name":null,"action":"App\Http\Controllers\Auth\Backend\ResetPasswordController@showResetForm"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"App\Http\Controllers\Backend\DashboardController@index"},{"host":null,"methods":["POST"],"uri":"summernote\/image","name":"summernote.image","action":"App\Http\Controllers\Backend\DashboardController@summernoteImage"},{"host":null,"methods":["PATCH"],"uri":"notification\/{notification}","name":"notification.read","action":"App\Http\Controllers\Backend\DashboardController@readNotification"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/ajax\/profile","name":"user.ajax.profile","action":"App\Http\Controllers\Backend\UserController@ajaxProfile"},{"host":null,"methods":["POST"],"uri":"user\/update\/profile","name":"user.update.profile","action":"App\Http\Controllers\Backend\UserController@updateProfile"},{"host":null,"methods":["POST"],"uri":"user\/update\/password","name":"user.update.password","action":"App\Http\Controllers\Backend\UserController@updatePassword"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/data\/room\/{room}","name":"user.data.room","action":"App\Http\Controllers\Backend\UserController@getDataWithRoom"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/data","name":"user.data","action":"App\Http\Controllers\Backend\UserController@getData"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/room\/{room}","name":"user.room","action":"App\Http\Controllers\Backend\UserController@room"},{"host":null,"methods":["GET","HEAD"],"uri":"user","name":"user.index","action":"App\Http\Controllers\Backend\UserController@index"},{"host":null,"methods":["POST"],"uri":"user","name":"user.store","action":"App\Http\Controllers\Backend\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/{user}","name":"user.show","action":"App\Http\Controllers\Backend\UserController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/{user}\/edit","name":"user.edit","action":"App\Http\Controllers\Backend\UserController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"user\/{user}","name":"user.update","action":"App\Http\Controllers\Backend\UserController@update"},{"host":null,"methods":["DELETE"],"uri":"user\/{user}","name":"user.destroy","action":"App\Http\Controllers\Backend\UserController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"products","name":"products.index","action":"App\Http\Controllers\Backend\ProductsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/create","name":"products.create","action":"App\Http\Controllers\Backend\ProductsController@create"},{"host":null,"methods":["POST"],"uri":"products","name":"products.store","action":"App\Http\Controllers\Backend\ProductsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/{product}","name":"products.show","action":"App\Http\Controllers\Backend\ProductsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/{product}\/edit","name":"products.edit","action":"App\Http\Controllers\Backend\ProductsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"products\/{product}","name":"products.update","action":"App\Http\Controllers\Backend\ProductsController@update"},{"host":null,"methods":["DELETE"],"uri":"products\/{product}","name":"products.destroy","action":"App\Http\Controllers\Backend\ProductsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"customers","name":"customers.index","action":"App\Http\Controllers\Backend\CustomersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/create","name":"customers.create","action":"App\Http\Controllers\Backend\CustomersController@create"},{"host":null,"methods":["POST"],"uri":"customers","name":"customers.store","action":"App\Http\Controllers\Backend\CustomersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/{customer}","name":"customers.show","action":"App\Http\Controllers\Backend\CustomersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"customers\/{customer}\/edit","name":"customers.edit","action":"App\Http\Controllers\Backend\CustomersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"customers\/{customer}","name":"customers.update","action":"App\Http\Controllers\Backend\CustomersController@update"},{"host":null,"methods":["DELETE"],"uri":"customers\/{customer}","name":"customers.destroy","action":"App\Http\Controllers\Backend\CustomersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"providers","name":"providers.index","action":"App\Http\Controllers\Backend\ProvidersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/create","name":"providers.create","action":"App\Http\Controllers\Backend\ProvidersController@create"},{"host":null,"methods":["POST"],"uri":"providers","name":"providers.store","action":"App\Http\Controllers\Backend\ProvidersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/{provider}","name":"providers.show","action":"App\Http\Controllers\Backend\ProvidersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"providers\/{provider}\/edit","name":"providers.edit","action":"App\Http\Controllers\Backend\ProvidersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"providers\/{provider}","name":"providers.update","action":"App\Http\Controllers\Backend\ProvidersController@update"},{"host":null,"methods":["DELETE"],"uri":"providers\/{provider}","name":"providers.destroy","action":"App\Http\Controllers\Backend\ProvidersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms","name":"rooms.index","action":"App\Http\Controllers\Backend\RoomsController@index"},{"host":null,"methods":["POST"],"uri":"rooms","name":"rooms.store","action":"App\Http\Controllers\Backend\RoomsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/{room}","name":"rooms.show","action":"App\Http\Controllers\Backend\RoomsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"rooms\/{room}\/edit","name":"rooms.edit","action":"App\Http\Controllers\Backend\RoomsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"rooms\/{room}","name":"rooms.update","action":"App\Http\Controllers\Backend\RoomsController@update"},{"host":null,"methods":["DELETE"],"uri":"rooms\/{room}","name":"rooms.destroy","action":"App\Http\Controllers\Backend\RoomsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"units","name":"units.index","action":"App\Http\Controllers\Backend\UnitsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/create","name":"units.create","action":"App\Http\Controllers\Backend\UnitsController@create"},{"host":null,"methods":["POST"],"uri":"units","name":"units.store","action":"App\Http\Controllers\Backend\UnitsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/{unit}","name":"units.show","action":"App\Http\Controllers\Backend\UnitsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"units\/{unit}\/edit","name":"units.edit","action":"App\Http\Controllers\Backend\UnitsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"units\/{unit}","name":"units.update","action":"App\Http\Controllers\Backend\UnitsController@update"},{"host":null,"methods":["DELETE"],"uri":"units\/{unit}","name":"units.destroy","action":"App\Http\Controllers\Backend\UnitsController@destroy"},{"host":null,"methods":["POST"],"uri":"roles\/ajax\/update\/{roles}","name":"roles.ajax.update","action":"App\Http\Controllers\Backend\RolesController@ajaxUpdate"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/ajax\/permission","name":"roles.ajax.permission","action":"App\Http\Controllers\Backend\RolesController@ajaxPermission"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/ajax\/{roles}","name":"roles.ajax.role","action":"App\Http\Controllers\Backend\RolesController@ajaxRole"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/data","name":"roles.data","action":"App\Http\Controllers\Backend\RolesController@getData"},{"host":null,"methods":["GET","HEAD"],"uri":"roles","name":"roles.index","action":"App\Http\Controllers\Backend\RolesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/create","name":"roles.create","action":"App\Http\Controllers\Backend\RolesController@create"},{"host":null,"methods":["POST"],"uri":"roles","name":"roles.store","action":"App\Http\Controllers\Backend\RolesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{role}","name":"roles.show","action":"App\Http\Controllers\Backend\RolesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{role}\/edit","name":"roles.edit","action":"App\Http\Controllers\Backend\RolesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"roles\/{role}","name":"roles.update","action":"App\Http\Controllers\Backend\RolesController@update"},{"host":null,"methods":["DELETE"],"uri":"roles\/{role}","name":"roles.destroy","action":"App\Http\Controllers\Backend\RolesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"groupproducts","name":"groupproducts.index","action":"App\Http\Controllers\Backend\GroupProductsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"groupproducts\/create","name":"groupproducts.create","action":"App\Http\Controllers\Backend\GroupProductsController@create"},{"host":null,"methods":["POST"],"uri":"groupproducts","name":"groupproducts.store","action":"App\Http\Controllers\Backend\GroupProductsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"groupproducts\/{groupproduct}","name":"groupproducts.show","action":"App\Http\Controllers\Backend\GroupProductsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"groupproducts\/{groupproduct}\/edit","name":"groupproducts.edit","action":"App\Http\Controllers\Backend\GroupProductsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"groupproducts\/{groupproduct}","name":"groupproducts.update","action":"App\Http\Controllers\Backend\GroupProductsController@update"},{"host":null,"methods":["DELETE"],"uri":"groupproducts\/{groupproduct}","name":"groupproducts.destroy","action":"App\Http\Controllers\Backend\GroupProductsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"groupcustomers","name":"groupcustomers.index","action":"App\Http\Controllers\Backend\GroupCustomersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"groupcustomers\/create","name":"groupcustomers.create","action":"App\Http\Controllers\Backend\GroupCustomersController@create"},{"host":null,"methods":["POST"],"uri":"groupcustomers","name":"groupcustomers.store","action":"App\Http\Controllers\Backend\GroupCustomersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"groupcustomers\/{groupcustomer}","name":"groupcustomers.show","action":"App\Http\Controllers\Backend\GroupCustomersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"groupcustomers\/{groupcustomer}\/edit","name":"groupcustomers.edit","action":"App\Http\Controllers\Backend\GroupCustomersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"groupcustomers\/{groupcustomer}","name":"groupcustomers.update","action":"App\Http\Controllers\Backend\GroupCustomersController@update"},{"host":null,"methods":["DELETE"],"uri":"groupcustomers\/{groupcustomer}","name":"groupcustomers.destroy","action":"App\Http\Controllers\Backend\GroupCustomersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"manufacturers","name":"manufacturers.index","action":"App\Http\Controllers\Backend\ManufacturersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"manufacturers\/create","name":"manufacturers.create","action":"App\Http\Controllers\Backend\ManufacturersController@create"},{"host":null,"methods":["POST"],"uri":"manufacturers","name":"manufacturers.store","action":"App\Http\Controllers\Backend\ManufacturersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"manufacturers\/{manufacturer}","name":"manufacturers.show","action":"App\Http\Controllers\Backend\ManufacturersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"manufacturers\/{manufacturer}\/edit","name":"manufacturers.edit","action":"App\Http\Controllers\Backend\ManufacturersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"manufacturers\/{manufacturer}","name":"manufacturers.update","action":"App\Http\Controllers\Backend\ManufacturersController@update"},{"host":null,"methods":["DELETE"],"uri":"manufacturers\/{manufacturer}","name":"manufacturers.destroy","action":"App\Http\Controllers\Backend\ManufacturersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"warehouses","name":"warehouses.index","action":"App\Http\Controllers\Backend\WarehousesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"warehouses\/create","name":"warehouses.create","action":"App\Http\Controllers\Backend\WarehousesController@create"},{"host":null,"methods":["POST"],"uri":"warehouses","name":"warehouses.store","action":"App\Http\Controllers\Backend\WarehousesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"warehouses\/{warehouse}","name":"warehouses.show","action":"App\Http\Controllers\Backend\WarehousesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"warehouses\/{warehouse}\/edit","name":"warehouses.edit","action":"App\Http\Controllers\Backend\WarehousesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"warehouses\/{warehouse}","name":"warehouses.update","action":"App\Http\Controllers\Backend\WarehousesController@update"},{"host":null,"methods":["DELETE"],"uri":"warehouses\/{warehouse}","name":"warehouses.destroy","action":"App\Http\Controllers\Backend\WarehousesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"branches","name":"branches.index","action":"App\Http\Controllers\Backend\BranchesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"branches\/create","name":"branches.create","action":"App\Http\Controllers\Backend\BranchesController@create"},{"host":null,"methods":["POST"],"uri":"branches","name":"branches.store","action":"App\Http\Controllers\Backend\BranchesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"branches\/{branch}","name":"branches.show","action":"App\Http\Controllers\Backend\BranchesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"branches\/{branch}\/edit","name":"branches.edit","action":"App\Http\Controllers\Backend\BranchesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"branches\/{branch}","name":"branches.update","action":"App\Http\Controllers\Backend\BranchesController@update"},{"host":null,"methods":["DELETE"],"uri":"branches\/{branch}","name":"branches.destroy","action":"App\Http\Controllers\Backend\BranchesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"positions","name":"positions.index","action":"App\Http\Controllers\Backend\PositionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"positions\/create","name":"positions.create","action":"App\Http\Controllers\Backend\PositionsController@create"},{"host":null,"methods":["POST"],"uri":"positions","name":"positions.store","action":"App\Http\Controllers\Backend\PositionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"positions\/{position}","name":"positions.show","action":"App\Http\Controllers\Backend\PositionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"positions\/{position}\/edit","name":"positions.edit","action":"App\Http\Controllers\Backend\PositionsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"positions\/{position}","name":"positions.update","action":"App\Http\Controllers\Backend\PositionsController@update"},{"host":null,"methods":["DELETE"],"uri":"positions\/{position}","name":"positions.destroy","action":"App\Http\Controllers\Backend\PositionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"bills","name":"bills.index","action":"App\Http\Controllers\Backend\BillsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/sale","name":null,"action":"App\Http\Controllers\Backend\BillsController@sale"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/wholesale","name":null,"action":"App\Http\Controllers\Backend\BillsController@wholesale"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/buy","name":null,"action":"App\Http\Controllers\Backend\BillsController@buy"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/warehousetransfer","name":null,"action":"App\Http\Controllers\Backend\BillsController@warehouseTransfer"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/destroystock","name":null,"action":"App\Http\Controllers\Backend\BillsController@destroyStock"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/exportstock","name":null,"action":"App\Http\Controllers\Backend\BillsController@exportStock"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/importstock","name":null,"action":"App\Http\Controllers\Backend\BillsController@importstock"},{"host":null,"methods":["GET","HEAD"],"uri":"bills\/symmetrical","name":null,"action":"App\Http\Controllers\Backend\BillsController@symmetrical"},{"host":null,"methods":["GET","HEAD"],"uri":"quotations\/create","name":"quotations.create","action":"App\Http\Controllers\Backend\QuotationsController@create"},{"host":null,"methods":["POST"],"uri":"quotations","name":"quotations.store","action":"App\Http\Controllers\Backend\QuotationsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"promotions","name":"promotions.index","action":"App\Http\Controllers\Backend\PromotionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"promotions\/create","name":"promotions.create","action":"App\Http\Controllers\Backend\PromotionsController@create"},{"host":null,"methods":["POST"],"uri":"promotions","name":"promotions.store","action":"App\Http\Controllers\Backend\PromotionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"promotions\/{promotion}","name":"promotions.show","action":"App\Http\Controllers\Backend\PromotionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"promotions\/{promotion}\/edit","name":"promotions.edit","action":"App\Http\Controllers\Backend\PromotionsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"promotions\/{promotion}","name":"promotions.update","action":"App\Http\Controllers\Backend\PromotionsController@update"},{"host":null,"methods":["DELETE"],"uri":"promotions\/{promotion}","name":"promotions.destroy","action":"App\Http\Controllers\Backend\PromotionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"reports","name":"reports.index","action":"App\Http\Controllers\Backend\ReportsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"reports\/create","name":"reports.create","action":"App\Http\Controllers\Backend\ReportsController@create"},{"host":null,"methods":["POST"],"uri":"reports","name":"reports.store","action":"App\Http\Controllers\Backend\ReportsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"reports\/{report}\/edit","name":"reports.edit","action":"App\Http\Controllers\Backend\ReportsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"reports\/{report}","name":"reports.update","action":"App\Http\Controllers\Backend\ReportsController@update"},{"host":null,"methods":["DELETE"],"uri":"reports\/{report}","name":"reports.destroy","action":"App\Http\Controllers\Backend\ReportsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"reports\/importexport","name":null,"action":"App\Http\Controllers\Backend\ReportsController@reportInportExport"},{"host":null,"methods":["GET","HEAD"],"uri":"permissions","name":"permissions.index","action":"App\Http\Controllers\Backend\PermissionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/positions","name":"api.v1.positions.index","action":"App\Http\Controllers\Api\PositionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/positions\/create","name":"api.v1.positions.create","action":"App\Http\Controllers\Api\PositionsController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/positions","name":"api.v1.positions.store","action":"App\Http\Controllers\Api\PositionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/positions\/{position}","name":"api.v1.positions.show","action":"App\Http\Controllers\Api\PositionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/positions\/{position}\/edit","name":"api.v1.positions.edit","action":"App\Http\Controllers\Api\PositionsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/positions\/{position}","name":"api.v1.positions.update","action":"App\Http\Controllers\Api\PositionsController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/positions\/{position}","name":"api.v1.positions.destroy","action":"App\Http\Controllers\Api\PositionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/branches","name":"api.v1.branches.index","action":"App\Http\Controllers\Api\BranchesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/branches\/create","name":"api.v1.branches.create","action":"App\Http\Controllers\Api\BranchesController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/branches","name":"api.v1.branches.store","action":"App\Http\Controllers\Api\BranchesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/branches\/{branch}","name":"api.v1.branches.show","action":"App\Http\Controllers\Api\BranchesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/branches\/{branch}\/edit","name":"api.v1.branches.edit","action":"App\Http\Controllers\Api\BranchesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/branches\/{branch}","name":"api.v1.branches.update","action":"App\Http\Controllers\Api\BranchesController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/branches\/{branch}","name":"api.v1.branches.destroy","action":"App\Http\Controllers\Api\BranchesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/units","name":"api.v1.units.index","action":"App\Http\Controllers\Api\UnitsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/units\/create","name":"api.v1.units.create","action":"App\Http\Controllers\Api\UnitsController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/units","name":"api.v1.units.store","action":"App\Http\Controllers\Api\UnitsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/units\/{unit}","name":"api.v1.units.show","action":"App\Http\Controllers\Api\UnitsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/units\/{unit}\/edit","name":"api.v1.units.edit","action":"App\Http\Controllers\Api\UnitsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/units\/{unit}","name":"api.v1.units.update","action":"App\Http\Controllers\Api\UnitsController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/units\/{unit}","name":"api.v1.units.destroy","action":"App\Http\Controllers\Api\UnitsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/rooms","name":"api.v1.rooms.index","action":"App\Http\Controllers\Api\RoomsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/rooms\/create","name":"api.v1.rooms.create","action":"App\Http\Controllers\Api\RoomsController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/rooms","name":"api.v1.rooms.store","action":"App\Http\Controllers\Api\RoomsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/rooms\/{room}","name":"api.v1.rooms.show","action":"App\Http\Controllers\Api\RoomsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/rooms\/{room}\/edit","name":"api.v1.rooms.edit","action":"App\Http\Controllers\Api\RoomsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/rooms\/{room}","name":"api.v1.rooms.update","action":"App\Http\Controllers\Api\RoomsController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/rooms\/{room}","name":"api.v1.rooms.destroy","action":"App\Http\Controllers\Api\RoomsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/data","name":"api.v1.users.data","action":"App\Http\Controllers\Api\UsersController@getData"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users","name":"api.v1.users.index","action":"App\Http\Controllers\Api\UsersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/create","name":"api.v1.users.create","action":"App\Http\Controllers\Api\UsersController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/users","name":"api.v1.users.store","action":"App\Http\Controllers\Api\UsersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/{user}","name":"api.v1.users.show","action":"App\Http\Controllers\Api\UsersController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/users\/{user}\/edit","name":"api.v1.users.edit","action":"App\Http\Controllers\Api\UsersController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/users\/{user}","name":"api.v1.users.update","action":"App\Http\Controllers\Api\UsersController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/users\/{user}","name":"api.v1.users.destroy","action":"App\Http\Controllers\Api\UsersController@destroy"},{"host":null,"methods":["POST"],"uri":"api\/v1\/users\/update\/password","name":"api.v1.users.update.password","action":"App\Http\Controllers\Api\UsersController@changePassword"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/permissions","name":"api.v1.permissions.index","action":"App\Http\Controllers\Api\PermissionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/permissions\/create","name":"api.v1.permissions.create","action":"App\Http\Controllers\Api\PermissionsController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/permissions","name":"api.v1.permissions.store","action":"App\Http\Controllers\Api\PermissionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/permissions\/{permission}","name":"api.v1.permissions.show","action":"App\Http\Controllers\Api\PermissionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/permissions\/{permission}\/edit","name":"api.v1.permissions.edit","action":"App\Http\Controllers\Api\PermissionsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/permissions\/{permission}","name":"api.v1.permissions.update","action":"App\Http\Controllers\Api\PermissionsController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/permissions\/{permission}","name":"api.v1.permissions.destroy","action":"App\Http\Controllers\Api\PermissionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/roles","name":"api.v1.roles.index","action":"App\Http\Controllers\Api\RolesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/roles\/create","name":"api.v1.roles.create","action":"App\Http\Controllers\Api\RolesController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/roles","name":"api.v1.roles.store","action":"App\Http\Controllers\Api\RolesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/roles\/{role}","name":"api.v1.roles.show","action":"App\Http\Controllers\Api\RolesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/roles\/{role}\/edit","name":"api.v1.roles.edit","action":"App\Http\Controllers\Api\RolesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"api\/v1\/roles\/{role}","name":"api.v1.roles.update","action":"App\Http\Controllers\Api\RolesController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/roles\/{role}","name":"api.v1.roles.destroy","action":"App\Http\Controllers\Api\RolesController@destroy"}],
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

