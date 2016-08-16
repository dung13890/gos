var config = {
  paths: {
    plugins: {
      styles: {
        in: 'resources/assets/css',
        out: 'public/assets/css'
      },
      scripts: {
        out: 'public/asset/js'
      },
      img: {
        in: 'resources/assets/img',
        out: 'public/assets/img'
      },
      bower: {
        in: 'resources/assets/bower',
        out: 'public/vendor'
      },
      vue: {
        in: 'resources/assets/js/vue',
        out: 'public/assets/vue'
      }
    }
  }
}
module.exports = config;
