'use strict'
const path = require('path')
function resolve(dir) {
    return path.join(__dirname, dir)
}
const name = 'Vuejs test crawler' // page title

module.exports = {
    publicPath: '/',
    outputDir: 'dist',
    assetsDir: 'assets',
    // lintOnSave: process.env.NODE_ENV === 'development',
    productionSourceMap: false,
    lintOnSave: false,
    configureWebpack: {
        // provide the app's title in webpack's name field, so that
        // it can be accessed in index.html to inject the correct title.
        name: name,
        resolve: {
            alias: {
                '@': resolve('src')
            }
        }

    }
}
