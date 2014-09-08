module.exports = {
	js: {
		src: [
			'<%= paths.bower %>fitvids/js/jquery.fitvids.js',
			'<%= paths.bower %>accessible-menu/js/jquery.accessible-menu.js',
			'<%= paths.bower %>sidr/js/jquery.sidr.min.js',
			'<%= paths.authorAssets %>js/theme.js'
		],
		dest: '<%= paths.theme %>js/theme.js'
	}
};
