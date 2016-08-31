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
      in: 'bootstrap-datepicker/dist',
      out: 'datepicker'
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
      name: 'room.js',
      in: '',
      out: ''
    },
    {
      name: 'bill.js',
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
    }
  ]
}
module.exports = plugins;
