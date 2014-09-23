module.exports = {
	options: {
		report: 'gzip'
	},
	style: {
		expand: true,
		cwd: '<%= paths.tmp %>',
		src: [
			'*.css',
			'!*.min.css'
		],
		dest: '<%= paths.tmp %>',
		ext: '.min.css'
	},
	vendor: {
		expand: true,
		cwd: '<%= paths.theme %>css/',
		src: [
			'*.css'
		],
		dest: '<%= paths.theme %>css/',
		ext: '.min.css'
	}
};
