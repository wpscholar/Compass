module.exports = {
	style: {
		options: {
			patterns: [
				{
					// Add clear linespace between banner and minified
					match: /\*\/(?=\S)/g,
					replacement: '*/\n'
				}
			]
		},
		files: [{
			expand: true,
			src: [
				'<%= paths.theme %>style.css',
				'<%= paths.theme %>style-rtl.css'
			]
		}]
	},
	stylecomments: {
		options: {
			patterns: [
				{
					// Change normalize.css === comment headings to ---
					match: /==/g,
					replacement: '--'
				}
			]
		},
		files: [
			{
				expand: true,
				src: [
					'<%= paths.theme %>style.dev.css',
					'<%= paths.theme %>style-rtl.dev.css'
				]
			}
		]
	},
	release: {
		options: {
			patterns: [{
				match: 'release',
				replacement: '<%= pkg.version %>'
			}]
		},
		files: [{
			expand: true,
			src: [
				'<%= paths.theme %>**/*'
			]
		}]
	},
	// Useful when forking this project into a new project
	packagename: {
		options: {
			patterns: [
				{
					match: /compass/g,
					replacement: '<%= pkg.name %>'
				},
				{
					match: /Compass/g,
					replacement: '<%= pkg.capitalname %>'
				}
			]
		},
		files: [
			{
				expand: true,
				src: [
					'**/*.*',
					'!node_modules/**/*',
					'!<%= paths.bower %>**/*',
					'!<%= paths.compass %>**/*',
					'!**/*.{png,ico,jpg,gif}'
				]
			}
		]
	}
};
