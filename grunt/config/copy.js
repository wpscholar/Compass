module.exports = {
	css: {
		files: [
			{
				cwd: '<%= paths.tmp %>',
				expand: true,
				flatten: true,
				src: [
					'style.dev.css',
					'style.css'
				],
				dest: '<%= paths.theme %>',
				filter: 'isFile'
			}
		]
	},
	cssrtl: {
		files: [
			{
				cwd: '<%= paths.tmp %>',
				expand: true,
				flatten: true,
				src: [
					'rtl.dev.css',
					'rtl.css'
				],
				dest: '<%= paths.theme %>css/',
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
