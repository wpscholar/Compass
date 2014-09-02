module.exports = {
	theme: {
		options: {
			sourceMap: true,
			sourceMapName: '<%= paths.theme %>js/theme.js.map',
			sourceMapIncludeSources: true,
			mangle: true,
			compress: true,
			report: 'gzip'
		},
		files: [
			{
				expand: true,
				cwd: '<%= paths.theme %>js/',
				src: '*.js',
				dest: '<%= paths.theme %>js/',
				ext: '.min.js'
			}
		]
	}
};
