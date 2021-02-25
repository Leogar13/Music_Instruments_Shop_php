// vue.config.js
module.exports = {
    devServer: {
      proxy: {
        '^/ThayAn': {
            target: 'http://localhost:80',
            changeOrigin: true, // so CORS doesn't bite us. 
            secure:false,
            ws:true,
            pathRewrite: { "^/api": "/" },
            logLevel: 'debug'
          }
      }
    }
  }