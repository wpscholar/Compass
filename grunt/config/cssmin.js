module.exports = {
	options: {
		report: 'gzip'
	},
	style: {
		expand: true,
		cwd: '<%= paths.theme %>',
		src: [
			'style*.dev.css'
		],
		dest: '<%= paths.theme %>',
		ext: '.css'
	}
};
