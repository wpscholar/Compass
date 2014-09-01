module.exports = {
	options: {
		clean: true
	},
	scss: {
		options: {
			destPrefix: '<%= paths.bower %>'
		},
		files: {
			bourbon: 'bourbon/dist',
			neat: 'neat/app/assets/stylesheets'
		}
	}
};
