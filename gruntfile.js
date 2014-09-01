/* global require, process */
module.exports = function( grunt ) {
	'use strict';

	// Load grunt plugins
	require( 'time-grunt' )(grunt);
	require( 'load-grunt-tasks' )(grunt);

	// Define project configuration
	var project = {
		paths: {
			get authorAssets() {
				return this.assets + 'flagship/';
			},
			get bower() {
				return this.assets + 'bower/';
			},
			get composer() {
				return this.assets + 'composer/';
			},
			get config() {
				return this.grunt + 'config/';
			},
			get hybridCore() {
				return this.theme + 'hybrid-core/';
			},
			get tasks() {
				return this.grunt + 'tasks/';
			},
			assets: 'assets/',
			dist: 'dist/',
			docs: 'docs/',
			grunt: 'grunt/',
			languages: 'languages/',
			logs: 'logs/',
			theme: 'theme/',
			tmp: 'tmp/'
		},
		files: {
			get php() {
				return project.paths.theme + '**/*.php';
			},
			get js() {
				return project.paths.assets + '{,*/}js/*.js';
			},
			get config() {
				return project.paths.config + '*.js';
			},
			get changelog() {
				return project.paths.theme + 'CHANGELOG.md';
			},
			grunt: 'Gruntfile.js'
		},
		pkg: grunt.file.readJSON( 'package.json' )
	};

	// Load Grunt plugin configurations
	require( 'load-grunt-config' )(grunt, {
		configPath: require( 'path' ).join( process.cwd(), project.paths.config ),
		data: project,
		loadGruntTasks: false
	});

	// Register Tasks
	grunt.loadTasks( project.paths.tasks );
};
