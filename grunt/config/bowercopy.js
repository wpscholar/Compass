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
			normalize: 'normalize.css/normalize.css'
		}
	},
	js: {
		options: {
			destPrefix: '<%= paths.bower %>/js/'
		},
		files: {
			fitvids: 'fitvids/jquery.fitvids.js'
		}
	}
};
