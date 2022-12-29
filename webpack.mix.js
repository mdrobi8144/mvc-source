// webpack.mix.js
let mix = require('laravel-mix');
mix.webpackConfig({
	stats: {
		children: true,
	},
});
mix.js('public/assets/src/js/app.js', 'public/assets/dist/js')
	// .js('assets/src/js/charts.js', 'assets/dist/js')
	// .js('assets/src/js/alpine.js', 'assets/dist/js')
	.postCss('public/assets/src/css/app.css', 'public/assets/dist/css/app.css'
    // , [
	// 	require('tailwindcss'),
	// ]
    )
	//.less('assets/src/css/fontawesome.less', 'assets/dist/css/fontawesome.css')
	.sourceMaps();
	// .copy(
	// 	'node_modules/@fortawesome/fontawesome-free/webfonts','assets/dist/webfonts'
	// );