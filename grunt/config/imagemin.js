module.exports = {
	assets: {
		files: [
			{
				expand: true,
				cwd: '<%= paths.authorAssets %>images',
				src: ['*.*'],
				dest: '<%= paths.tmp %>images'
			}
		]
	}
};
