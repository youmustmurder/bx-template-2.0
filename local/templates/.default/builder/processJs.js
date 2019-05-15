const
	path = require('path'),
	fs = require('fs'),
	rollup = require('rollup'),
	babel = require('@babel/core'),
	Eslinter = require('eslint').Linter,
	prettier = require('prettier'),
	findFilesInDir = require('./modules/findFilesDir'),
	settings = require('./builder_css.config.json'),
	configEslinter = require('../.eslintrc'),
	logger = require('./modules/logger'),
	filesSeparate = findFilesInDir(path.join(path.dirname(__dirname), settings.js.separate_folder),'index.js'),
	filesGeneral = findFilesInDir(path.join(path.dirname(__dirname), settings.js.entry_general_folder),'.js'),
	linter = new Eslinter(),
	prettierConfig = {
		parser: 'babel',
		singleQuote: true,
		trailingComma: 'all',
		bracketSpacing: true,
		jsxBracketSameLine: false,
		useTabs: true,
		tabWidth: 4,
		semi: true
	};

const logLinter = (errors, filename) => {
	errors.map(({ message, line, column }) => {
		logger.loggerError(`File: ${ filename } Message: ${ message } Line: ${ line }. Column: ${ column }`);
	});
};

const lintAndFormatCode = (filename) => {
	fs.readFile(filename, 'utf8', (err, code) => {
		if (err) logger.loggerError(err);
		var formatedCode = code;
		if (formatedCode != '' && !prettier.check(formatedCode, prettierConfig)) {
			formatedCode = prettier.format(formatedCode, prettierConfig);
			fs.writeFile(filename, formatedCode, () => true);
		}
		var message = linter.verify(formatedCode, configEslinter, {
			filename
		});
		logLinter(message, filename);
	});
};

const transformFile = async (filename, output = path.join(path.dirname(filename), 'bundle.js')) => {
	const bundle = await rollup.rollup({
		input: filename
	});
	const { output: outputSplit } = await bundle.generate({
		format: 'cjs'
	});
	for (const chunkOrAsset of outputSplit) {
		if (chunkOrAsset.isAsset) {
			const courceCode = chunkOrAsset.code;
			// const parseAst= babel.parse(courceCode, {});
			// babel.transformFromAst(parseAst, courceCode, {}, (err, result) => {
			// 	if (err) logger.loggerError(err);
			// 	fs.writeFile(output, result.code, () => true);
			// 	logger.loggerBuild(output);
			// });
		} else {
			const courceCode = chunkOrAsset.code;
			const parseAst= babel.parse(courceCode, {});
			babel.transformFromAst(parseAst, courceCode, {}, (err, result) => {
				if (err) logger.loggerError(err);
				fs.writeFile(output, result.code, () => true);
				logger.loggerBuild(output);
			});
			// babel.transformFile(filename, {}, (err, result) => {
			// 	if (err) logger.loggerError(err);
			// 	fs.writeFile(output, result.code, () => true);
			// 	logger.loggerBuild(output);
			// });
		}
	}
};

const buildJs = () => {
	filesSeparate.map(file => {
		lintAndFormatCode(file);
		transformFile(file);
	});
	filesGeneral.map(file => {
		lintAndFormatCode(file);
		transformFile(path.join(path.dirname(__dirname), settings.js.entry_general_file), path.join(path.dirname(__dirname), settings.js.output_general_file));
	});
	logger.log('Finished build Js');
};

const watchNewFiles = (folderWatch) => {
	logger.loggerNewWatch(folderWatch);
	fs.watch(folderWatch, (event, filename) => {
		var filePath = path.join(folderWatch, filename);
		fs.lstat(filePath, (err, stat) => {
			if (err) logger.loggerError(err);
			if (stat.isFile()) {
				if (path.extname(filename) == '.js') {
					lintAndFormatCode(filePath);
					transformFile(path.join(path.dirname(__dirname), settings.js.entry_general_file), path.join(path.dirname(__dirname), settings.js.output_general_file));
				}
			} else {
				watchNewFiles(filePath);
			}
		});
	});
};

const watchJs = () => {
	logger.log('Start watching js files');
	filesSeparate.map(file => {
		fs.watchFile(file, () => {
			lintAndFormatCode(file);
			transformFile(file);
		});
	});
	filesGeneral.map(file => {
		fs.watchFile(file, () => {
			lintAndFormatCode(file);
			transformFile(path.join(path.dirname(__dirname), settings.js.entry_general_file), path.join(path.dirname(__dirname), settings.js.output_general_file));
		});
	});
	watchNewFiles(path.join(path.dirname(__dirname), settings.js.entry_general_folder));
};

module.exports = { buildJs, watchJs };