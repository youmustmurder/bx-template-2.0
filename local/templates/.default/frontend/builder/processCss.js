const   path = require('path'),
        fs = require('fs'),
        postcss = require('postcss'),
        precss = require('precss'),
        cssnano = require('cssnano'),
        autoprefixer = require('autoprefixer'),
        stylelint = require('stylelint')({
            configFile: '.stylelintrc',
			context: 'src/scss',
			files: '**/*.scss',
			failOnError: false,
      		quiet: false,
        }),
        reporter = require('postcss-reporter')({
            clearReportedMessages: true
        }),
        findFilesInDir = require('./findFilesDir'),
        settings = require('./builder_css.config.json');

const   filesSeparate = findFilesInDir(path.join(path.dirname(__dirname), settings.css.separate_folder),'.scss'),
        filesGeneral = findFilesInDir(path.join(path.dirname(__dirname), settings.css.entry_general_folder),'.scss');

const transformFile = (file, output = path.join(path.dirname(file), 'style.css')) => {
    fs.readFile(file, (err, css) => {
        postcss([stylelint, reporter, precss, autoprefixer, cssnano])
            .process(css, { from: file, to: path.dirname(file) })
            .then(result => {
                fs.writeFile(output, result.css, () => true);
                console.log('\x1b[32m', `build file: ${output}`);
            });
    });
}

const buildCss = () => {
    filesSeparate.map(file => {
        transformFile(file);
    });
    filesGeneral.map(file => {
        transformFile(path.join(path.dirname(__dirname), settings.css.entry_general_file), path.join(path.dirname(__dirname), settings.css.output_general_file));
    });
    console.log('Finished build css');
}

const watchScss = () => {
    console.log('Start watching css files');
    filesSeparate.map(file => {
        fs.watchFile(file, () => {
            transformFile(file);
        });
    });
    filesGeneral.map(file => {
        fs.watchFile(file, () => {
            transformFile(path.join(path.dirname(__dirname), settings.css.entry_general_file), path.join(path.dirname(__dirname), settings.css.output_general_file));
        });
    });
}

module.exports = { buildCss, watchScss };