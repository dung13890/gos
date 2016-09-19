var plugins = {
  bower: [
    {
      in: 'bootstrap/dist',
      out: 'bootstrap'
    },
    {
      in: 'jquery/dist',
      out: 'jquery'
    },
    {
      in: 'components-font-awesome/css',
      out: 'font-awesome/css'
    },
    {
      in: 'components-font-awesome/fonts',
      out: 'font-awesome/fonts'
    },
    {
      in: 'datatables.net/js',
      out: 'datatables/js'
    },
    {
      in: 'datatables.net-bs/css',
      out: 'datatables-bs/css'
    },
    {
      in: 'datatables.net-bs/js',
      out: 'datatables-bs/js'
    },
    {
      in: 'jasny-bootstrap/dist',
      out: 'jasny-bootstrap'
    },
    {
      in: 'summernote/dist',
      out: 'summernote'
    },
    {
      in: 'select2/dist',
      out: 'select2'
    },
    {
      in: 'bootstrap-switch/dist',
      out: 'bootstrap-switch'
    },
    {
      in: 'jQueryAutocomplete/dist',
      out: 'jQueryAutocomplete'
    }
  ],
  vue: [
    {
      name: 'app.js',
      in: '',
      out: ''
    },
    {
      name: 'positions/position.js',
      in: '',
      out: 'positions'
    },
    {
      name: 'branches/branch.js',
      in: '',
      out: 'branches'
    },
    {
      name: 'units/unit.js',
      in: '',
      out: 'units'
    },
    {
      name: 'rooms/room.js',
      in: '',
      out: 'rooms'
    },
    {
      name: 'users/setting.js',
      in: '',
      out: 'users'
    },
    {
      name: 'users/resset_password.js',
      in: '',
      out: 'users'
    },
    {
      name: 'users/user.js',
      in: '',
      out: 'users'
    },
    {
      name: 'permissions/permission.js',
      in: '',
      out: 'permissions'
    },
    {
      name: 'roles/role.js',
      in: '',
      out: 'roles'
    },
    {
      name: 'locations/location.js',
      in: '',
      out: 'locations'
    },
    {
      name: 'warehouses/warehouse.js',
      in: '',
      out: 'warehouses'
    },
    {
      name: 'customergroups/customergroup.js',
      in: '',
      out: 'customergroups'
    },
  ]
}
module.exports = plugins;
