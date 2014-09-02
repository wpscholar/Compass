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
			'jshint:assets',
			'jsvalidate:assets',
			'jscs:assets'
		]
	}
};
