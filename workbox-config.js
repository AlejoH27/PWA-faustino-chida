module.exports = {
	globDirectory: '.',
	globPatterns: [
		'**/*.{html,json,js}'
	],
	swDest: 'sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};