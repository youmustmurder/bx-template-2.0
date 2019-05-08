const   path = require('path'),
        fs = require('fs'),
        babel = require('@babel/core'),
        findFilesInDir = require('./findFilesDir'),
        settings = require('./builder_css.config.json');

const   filesSeparate = findFilesInDir(path.join(path.dirname(__dirname), settings.js.separate_folder),'index.js'),
        filesGeneral = findFilesInDir(path.join(path.dirname(__dirname), settings.js.entry_general_folder),'.js');

const transformFile = (filename, output = path.join(path.dirname(filename), 'bundle.js')) => {
    babel.transformFile(filename, {}, (err, result) => {
        console.log(err);
        fs.writeFile(output, result.code, () => true);
        console.log('\x1b[32m', `build file: ${output}`);
    });
}

const buildJs = () => {
    filesSeparate.map(file => {
        transformFile(file);
    });
    filesGeneral.map(file => {
        transformFile(path.join(path.dirname(__dirname), settings.js.entry_general_file), path.join(path.dirname(__dirname), settings.js.output_general_file));
    });
    console.log('Finished build Js');
}

const watchJs = () => {
    console.log('Start watching js files');
    filesSeparate.map(file => {
        fs.watchFile(file, () => {
            transformFile(file);
        });
    });
    filesGeneral.map(file => {
        fs.watchFile(file, () => {
            transformFile(path.join(path.dirname(__dirname), settings.js.entry_general_file), path.join(path.dirname(__dirname), settings.js.output_general_file));
        });
    });
}

module.exports = { buildJs, watchJs };