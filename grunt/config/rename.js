module.exports = {
	normalize: {
		files: [
			{
				src: ['<%= paths.bower %>normalize/normalize.css'],
				dest: '<%= paths.bower %>normalize/_normalize.scss'
			}
		]
	}
};
