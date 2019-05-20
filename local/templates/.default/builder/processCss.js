const
	path = require('path'),
	fs = require('fs'),
	postcss = require('postcss'),
	precss = require('precss'),
	cssnano = require('cssnano'),
	autoprefixer = require('autoprefixer')({ grid: 'autoplace' }),
	stylelint = require('stylelint')({
		configFile: path.join(path.dirname(__dirname), '.stylelintrc'),
		files: '**/*.scss',
		failOnError: false,
		quiet: false,
		fix: true
	}),
	reporter = require('postcss-reporter')({
		clearReportedMessages: true
	}),
	prettier = require('prettier'),
	logger = require('./modules/logger'),
	findFilesInDir = require('./modules/findFilesDir'),
	settings = require('./builder_css.config.json'),
	filesSeparate = findFilesInDir(path.join(path.dirname(__dirname), settings.css.separate_folder),'.scss'),
	filesGeneral = findFilesInDir(path.join(path.dirname(__dirname), settings.css.entry_general_folder),'.scss'),
	prettierConfig = {
		parser: 'css',
		useTabs: true,
		tabWidth: 4,
	};

const transformFile = (file, output = path.join(path.dirname(file), 'style.css')) => {
	fs.readFile(file, (err, css) => {
		if (err) logger.loggerError(err);
		postcss([stylelint, reporter, precss, autoprefixer, cssnano])
			.process(css, { from: file, to: path.dirname(file) })
			.then(result => {
				fs.writeFile(output, result.css, () => true);
				logger.loggerBuild(output);
			})
			.catch(error => {
				logger.loggerError(error);
			});
	});
};

const lintAndFormatCode = (filePath) => {
	fs.readFileSync(filePath, 'utf8', (err, css) => {
		if (err) logger.loggerError(`Error: ${ err }`);
		var formatedCode = css;
		if (formatedCode != '') {
			if (!prettier.check(formatedCode, prettierConfig)) {
				formatedCode = prettier.format(formatedCode, prettierConfig);
				fs.writeFile(filePath, formatedCode, () => true);
			}
			postcss([stylelint, reporter])
				.process(formatedCode, { from: filePath })
				.then(result => {
					fs.writeFile(filePath, result.css, () => true);
				})
				.catch(err => logger.loggerError(err));
		}
	});
};

const buildCss = () => {
	filesSeparate.map(file => {
		lintAndFormatCode(file);
		transformFile(file);
	});
	filesGeneral.map(file => {
		lintAndFormatCode(file);
		transformFile(path.join(path.dirname(__dirname), settings.css.entry_general_file), path.join(path.dirname(__dirname), settings.css.output_general_file));
	});
	logger.log('Finished build css');
};

const watchNewFiles = (folderWatch) => {
	logger.loggerNewWatch(folderWatch);
	fs.watch(folderWatch, (event, filename) => {
		var filePath = path.join(folderWatch, filename);
		fs.lstat(filePath, (err, stat) => {
			if (err) logger.loggerError(err);
			if (stat.isFile()) {
				if (path.extname(filename) == '.scss') {
					lintAndFormatCode(filePath);
					transformFile(path.join(path.dirname(__dirname), settings.css.entry_general_file), path.join(path.dirname(__dirname), settings.css.output_general_file));
				}
			} else {
				watchNewFiles(filePath);
			}
		});
	});
};

const watchScss = () => {
	logger.log('Start watching css files');
	filesSeparate.map(file => {
		fs.watchFile(file, () => {
			lintAndFormatCode(file);
			transformFile(file);
		});
	});
	filesGeneral.map(file => {
		fs.watchFile(file, () => {
			lintAndFormatCode(file);
			transformFile(path.join(path.dirname(__dirname), settings.css.entry_general_file), path.join(path.dirname(__dirname), settings.css.output_general_file));
		});
	});
	//watchNewFiles(path.join(path.dirname(__dirname), settings.css.entry_general_folder));
};

module.exports = { buildCss, watchScss };