const Encore = require('@symfony/webpack-encore');



Encore
	.setOutputPath('assets')
	.setPublicPath('my-project/assets')


	.addEntry('app', './src/js/app.js')



	.splitEntryChunks()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSingleRuntimeChunk()
    .enableSassLoader()
    .autoProvidejQuery();


module.exports = Encore.getWebpackConfig();