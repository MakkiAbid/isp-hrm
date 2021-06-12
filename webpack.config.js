const Encore = require('@symfony/webpack-encore');



Encore
	.setOutputPath('assets')
	.setPublicPath('/assets')


	.addEntry('app', './src/js/app.js')

	.copyFiles({
		from: './src/images',
		to: './images/[path][name].[ext]'
	})



	.splitEntryChunks()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSingleRuntimeChunk()
    .enableSassLoader()
    .autoProvidejQuery();


module.exports = Encore.getWebpackConfig();