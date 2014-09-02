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
				dest: '<%= pkg.name %>-<%= pkg.version %>' // ...put it into this, then zip that up as ^^^
			}
		]
	}
};
