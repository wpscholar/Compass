module.exports = {
	css: {
		files: [
			{
				cwd: '<%= paths.tmp %>',
				expand: true,
				flatten: true,
				src: ['style*.css'],
				dest: '<%= paths.theme %>',
				filter: 'isFile'
			}
		]
	},
	fonts: {
		files: [
			{
				expand: true,
				flatten: true,
				src: [
					'<%= paths.assets %>genericons/font/*'
				],
				dest: '<%= paths.theme %>font/',
				filter: 'isFile'
			}
		]
	},
	hybridcore: {
		files: [
			{
				cwd: '<%= paths.composer %>justintadlock/hybrid-core',
				expand: true,
				src: ['**/*'],
				dest: '<%= paths.hybridCore %>'
			}
		]
	},
	themehookalliance: {
		files: [
			{
				cwd: '<%= paths.composer %>zamoose/themehookalliance',
				expand: true,
				src: ['tha-theme-hooks.php'],
				dest: '<%= paths.theme %>includes/vendor/'
			}
		]
	},
	images: {
		files: [
			{
				cwd: '<%= paths.tmp %>images',
				expand: true,
				flatten: true,
				src: ['*', '!screenshot.png'],
				dest: '<%= paths.theme %>images',
				filter: 'isFile'
			}
		]
	},
	screenshot: {
		files: [
			{
				cwd: '<%= paths.tmp %>images',
				expand: true,
				flatten: true,
				src: ['screenshot.png'],
				dest: '<%= paths.theme %>',
				filter: 'isFile'
			}
		]
	}
};
