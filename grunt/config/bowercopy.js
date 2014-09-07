module.exports = {
	options: {
		clean: true
	},
	css: {
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
			destPrefix: '<%= paths.bower %>'
		},
		files: {
			'fitvids/js': 'fitvids/jquery.fitvids.js'
		}
	}
};
