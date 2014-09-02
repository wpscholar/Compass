module.exports = {
	genericons: {
		files: [
			{
				src: ['<%= paths.assets %>genericons/css/genericons.css'],
				dest: '<%= paths.assets %>genericons/css/_genericons.scss'
			}
		]
	},
	normalize: {
		files: [
			{
				src: ['<%= paths.bower %>normalize/normalize.css'],
				dest: '<%= paths.bower %>normalize/_normalize.scss'
			}
		]
	}
};
