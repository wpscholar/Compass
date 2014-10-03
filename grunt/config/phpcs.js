module.exports = {
	options: {
		standard: 'WordPress',
		ignoreExitCode: true,
		ignore: [
			'<%= paths.hybridCore %>',
			'<%= paths.theme %>includes/vendor/'
		]
	},
	php: {
		options: {
			extensions: 'php',
			reportFile: '<%= paths.logs %>phpcs.log'
		},
		dir: [
			'<%= paths.theme %>'
		]
	}
};
