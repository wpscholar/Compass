module.exports = {
	js: {
		src: [
			'<%= paths.assets %>gamajo/js/jquery.accessible-menu.js',
			'<%= paths.authorAssets %>js/theme.js'
		],
		dest: '<%= paths.theme %>js/theme.js'
	}
};
