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
				src: ['<%= paths.bower %>normalize.css/normalize.css'],
				dest: '<%= paths.bower %>normalize.css/_normalize.scss'
			}
		]
	}
};
