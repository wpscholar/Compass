module.exports = {
	theme: {
		options: {
			swapLtrRtlInUrl: false
		},
		files: [
			{ // Must be done on dev, otherwise /* @noflip */ is removed
				src: '<%= paths.tmp %>style.dev.css',
				dest: '<%= paths.tmp %>rtl.dev.css'
			}
		]
	}
};
