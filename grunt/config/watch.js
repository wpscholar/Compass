module.exports = {
	grunt: {
		files: [
			'<%= files.grunt %>',
			'<%= files.config %>'
		],
		tasks: [
			'jshint:grunt',
			'jsvalidate:grunt',
			'jscs:grunt'
		]
	},
	php: {
		files: [
			'<%= files.php %>'
		],
		tasks: [
			'phplint',
			'phpcs'
		]
	},
	js: {
		files: [
			'<%= files.js %>'
		],
		tasks: [
			'build:js',
			'jshint:assets',
			'jsvalidate:assets',
			'jscs:assets'
		]
	},
	scss: {
		files: [
			'<%= files.scss %>'
		],
		tasks: [
			'sass',
			'autoprefixer',
			'wpcss:css',
			'cssjanus',
			'copy:css',
			'cssmin',
			'replace:style',
			'replace:stylecomments'
		]
	}
};
