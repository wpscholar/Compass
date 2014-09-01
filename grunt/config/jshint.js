module.exports = {
	assets: {
		src: ['<%= paths.authorAssets %>js/{,*/}*.js'],
		options: {
			jshintrc: '.jshintrc'
		}
	},
	grunt: {
		src: [
			'<%= files.grunt %>',
			'<%= files.config %>'
		],
		options: {
			jshintrc: '.gruntjshintrc'
		}
	}
};
