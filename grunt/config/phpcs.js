module.exports = {
	options: {
		standard: 'WordPress',
		ignoreExitCode: true
	},
	php: {
		options: {
			extensions: 'php',
			reportFile: '<%= paths.logs %>phpcs.log'
		},
		dir: [
			'<%= paths.theme %>'
		],
		ignore: '<%= paths.hybridCore %>'
	}
};
