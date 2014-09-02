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
			neat: 'neat/app/assets/stylesheets',
			normalize: 'normalize.css/normalize.css',
			fitvids: 'fitvids/jquery.fitvids.js'
		}
	}
};
