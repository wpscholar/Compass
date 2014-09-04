module.exports = function( grunt ) {
	'use strict';
	return {
		theme: {
			options: {
				cwd: '<%= paths.theme %>',
				domainPath: '<%= paths.languages %>',
				processPot: function( pot ) {
					pot.headers['report-msgid-bugs-to']          = grunt.config( 'pkg.pot.reportmsgidbugsto' );
					pot.headers['last-translator']               = grunt.config( 'pkg.pot.lasttranslator' );
					pot.headers['language-team']                 = grunt.config( 'pkg.pot.languageteam' );
					pot.headers['plural-forms']                  = grunt.config( 'pkg.pot.pluralforms' );
					pot.headers['x-poedit-basepath']             = grunt.config( 'pkg.pot.xpoeditbasepath' );
					pot.headers['x-poedit-language']             = grunt.config( 'pkg.pot.xpoeditlanguage' );
					pot.headers['x-poedit-country']              = grunt.config( 'pkg.pot.xpoeditcountry' );
					pot.headers['x-poedit-sourcecharset']        = grunt.config( 'pkg.pot.xpoeditsourcecharset' );
					pot.headers['x-poedit-keywordslist']         = grunt.config( 'pkg.pot.xpoeditkeywordslist' );
					pot.headers['x-poedit-bookmarks']            = grunt.config( 'pkg.pot.xpoeditbookmarks' );
					pot.headers['x-poedit-searchpath-0']         = grunt.config( 'pkg.pot.xpoeditsearchpath0' );
					pot.headers['x-poedit-searchpathexcluded-0'] = grunt.config( 'pkg.pot.xpoeditsearchpathexcluded0' );
					pot.headers['x-textdomain-support']          = grunt.config( 'pkg.pot.xtextdomainsupport' );
					return pot;
				},
				type: 'wp-theme'
			}
		}
	};
};
