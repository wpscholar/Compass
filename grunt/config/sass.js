module.exports = {
	options: {
		force: true,
		style: 'expanded',
		trace: true,
		lineNumbers: true,
		banner:
			'/*!\n' +
			'Theme Name: <%= pkg.theme.name %>\n' +
			'Version: <%= pkg.version %>\n' +
			'Author: <%= pkg.theme.author %>\n' +
			'Author URI: <%= pkg.theme.authoruri %>\n' +
			'Theme URI: <%= pkg.theme.uri %>\n' +
			'Description: <%= pkg.theme.description %>\n' +
			'Tags: <%= pkg.theme.tags %>\n' +
			'Text Domain: <%= pkg.theme.textdomain %>\n' +
			'Domain Path: <%= pkg.theme.domainpath %>\n' +
			'License: <%= pkg.theme.license %>\n' +
			'License URI: <%= pkg.theme.licenseuri %>\n' +
			'*/\n'
	},
	theme: {
		files: [
			{
				expand: true,
				cwd: '<%= paths.authorAssets %>scss/',
				src: '*.scss',
				dest: '<%= paths.tmp %>',
				ext: '.css'
			}
		]
	}
};
