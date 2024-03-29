module.exports = {
    parserOptions: {
        ecmaVersion: 6,
        sourceType: 'module',
        ecmaFeatures: {
            'js': true
        }
	},
    rules: {
		'semi': 'error',
/* 		'one-var': ['error', 'always'], */
		'object-shorthand': ['error', 'always'],
		'no-array-constructor': 'error',
		'prefer-destructuring': ['error', {
			'array': true,
			'object': true
		}, {
			'enforceForRenamedProperties': false
}]		,
		'quotes': ['error', 'single'],
		'func-names': ['off', 'never'],
		'linebreak-style': ['off', 'none'],
		'indent': ['error', 'tab'],
		'space-before-blocks': 'error',
		'nonblock-statement-body-position': ['error', 'beside'],
		'camelcase': ['error']
    }
}
