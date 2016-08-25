var path = require('path');
require('es6-promise').polyfill()

module.exports = {
    module: {
        loaders: [
        {
            test: /\.vue$/,
            include: [path.resolve(__dirname, './src')],
            loader: 'vue'
        },
        {
            test: /\.js$/,
            loader: 'babel',
            include: [path.resolve(__dirname, './src')],
            query: {
                presets: ['es2015'],
                plugins: ['transform-runtime'],
                compact: false
            }
        }]
    }
}