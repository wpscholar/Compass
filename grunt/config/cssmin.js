module.exports = {
	options: {
		report: 'gzip'
	},
	style: {
		expand: true,
		cwd: '<%= paths.tmp %>',
		src: [
			'*.dev.css'
		],
		dest: '<%= paths.tmp %>',
		ext: '.css'
	}
};
