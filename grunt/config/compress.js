module.exports = {
	dist: {
		options: {
			archive: '<%= paths.dist %><%= pkg.name %>-<%= pkg.version %>.zip'
		},
		files: [
			{
				expand: true,
				cwd: '<%= paths.theme %>',
				src: ['**/*'], // Take this...
				dest: '<%= pkg.name %>' // ...put it into this, then zip that up as ^^^
			}
		]
	}
};
