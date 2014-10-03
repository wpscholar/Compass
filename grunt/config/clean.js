module.exports = {
	bower: {
		src: [
			'<%= paths.bower %>'
		]
	},
	composer: {
		src: [
			'<%= paths.composer %>'
		]
	},
	css: {
		src: [
			'<%= paths.theme %>css'
		]
	},
	dist: {
		src: [
			'<%= paths.dist %>'
		]
	},
	docs: {
		src: [
			'<%= paths.docs %>'
		]
	},
	font: {
		src: [
			'<%= paths.theme %>font'
		]
	},
	hybridcore: {
		src: [
			'<%= paths.hybridCore %>'
		]
	},
	themehookalliance: {
		src: [
			'<%= paths.theme %>includes/vendor/tha-theme-hooks.php'
		]
	},
	logs: {
		src: [
			'<%= paths.logs %>'
		]
	},
	tmp: {
		src: [
			'<%= paths.tmp %>'
		]
	},
	js: {
		src: [
			'<%= paths.theme %>js'
		]
	},
	images: {
		src: [
			'<%= paths.theme %>images'
		]
	},
	languages: {
		src: [
			'<%= paths.theme %>languages'
		]
	},
	style: {
		src: [
			'<%= paths.theme %>style*.*',
			'<%= paths.tmp %>style*.*'
		]
	},
	screenshot: {
		src: [
			'<%= paths.theme %>screenshot.png'
		]
	}

};
