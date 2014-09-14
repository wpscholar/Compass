module.exports = {
	options: {
		textdomain: '<%= pkg.theme.textdomain %>',
		updateDomains: ['compass'] // Hard-coded by default
	},
	php: {
		files: {
			src: [
				'<%= files.php %>',
				'!<%= paths.hybridCore %>**/*.php'
			]
		}
	}
};
