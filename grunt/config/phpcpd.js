module.exports = {
	options: {
		ignoreExitCode: true,
		reportFile: '<%= paths.logs %>phpcpd.txt',
		exclude: 'hybrid-core',
		quiet: false,
		minTokens: 20
	},
	theme: {
		dir: '<%= paths.theme %>'
	}
};
