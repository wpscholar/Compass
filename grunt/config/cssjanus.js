module.exports = {
	theme: {
		options: {
			swapLtrRtlInUrl: false
		},
		files: [
			{ // Must be done on dev, otherwise /* @noflip */ is removed
				src: '<%= paths.tmp %>style.css',
				dest: '<%= paths.tmp %>style-rtl.css'
			}
		]
	}
};
