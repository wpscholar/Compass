module.exports = {
	theme: {
		options: {
			cwd: '<%= paths.theme %>',
			domainPath: '<%= paths.languages %>',
			potHeaders: {
				poedit: true,
				'report-msgid-bugs-to': '<%= pkg.pot.reportmsgidbugsto %>',
				'last-translator': '<%= pkg.pot.lasttranslator %>',
				'language-team': '<%= pkg.pot.languageteam %>',
				'x-poedit-searchpathexcluded-0': '<%= pkg.pot.xpoeditsearchpathexcluded0 %>'
			},
			type: 'wp-theme'
		}
	}
};
