const
	path = require('path'),
	fs = require('fs'),
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
		if (err) logger.loggerError(`Error: ${ err }`);
		var formatedCode = code;
		// if (formatedCode != '' && !prettier.check(formatedCode, prettierConfig)) {
		// 	formatedCode = prettier.format(formatedCode, prettierConfig);
		// 	fs.writeFile(filename, formatedCode, () => true);
		// }
		var message = linter.verify(formatedCode, configEslinter, {
			filename
		});
		logLinter(message, filename);
	});
};

const transformFile = (filename, output = path.join(path.dirname(filename), 'bundle.js')) => {
	babel.transformFile(filename, {}, (err, result) => {
		if (err) throw err;
		fs.writeFile(output, result.code, () => true);
		logger.loggerBuild(output);
	});
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
			if (err) throw err;
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