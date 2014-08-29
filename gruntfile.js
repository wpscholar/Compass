/**
 * Flagship Gruntfile
 * http://compasswp.com
 *
 * @author Robert Neu
 */

'use strict';

/**
 * Grunt Module
 */
module.exports = function(grunt) {
	/**
	 * Load Grunt plugins
	 */
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	/**
	 * Configuration
	 */
	grunt.initConfig({
		/**
		 * Get package meta data
		 */
		pkg: grunt.file.readJSON('package.json'),
		/**
		 * Bower Copy
		 */
		bowercopy: {
			options: {
				srcPrefix: 'bower_components',
				clean: true
			},
			scss: {
				options: {
					destPrefix: 'compass/assets/scss/vendor'
				},
				files: {
					'bourbon': 'bourbon/dist',
					'neat': 'neat/app/assets/stylesheets'
				}
			}
		},
		/**
		 * Sass
		 */
		sass: {
			dist: {
				options: {
					style:       'expanded',
					lineNumbers: true,
					debugInfo:   false,
					compass:     false
				},
				files: {
					'compass/style.css' : 'compass/assets/scss/style.scss'
				}
			}
		},
		csscomb: {
			dist: {
				options: {
					config: 'csscomb.json'
				},
				files: {
					'compass/style.css': ['compass/style.css']
				}
			}
		},
		'regex-replace': {
			dist: {
				src: ['style.css'],
				actions: [
					{
						name: 'closing-brace-newline',
						search: '}\n',
						replace: '}\n\n',
						flags: 'g'
					},
					{
						name: 'remove-double-blanklines',
						search: '([ \t]*\n){3,}',
						replace: '\n\n',
						flags: 'g'
					}
				]
			}
		},
		/**
		 * Watch
		 */
		watch: {
			sass: {
				files: [
					'compass/assets/scss/*.scss',
					'compass/assets/scss/**/*.scss'
				],
				tasks: [
					'sass',
					'csscomb',
					'regex-replace'
				]
			},
		}
	});

	/**
	 * Default task
	 * Run `grunt` on the command line
	 */
	grunt.registerTask('default', [
		'bowercopy',
		'sass',
		'csscomb',
		'regex-replace',
		'watch'
	]);
};
