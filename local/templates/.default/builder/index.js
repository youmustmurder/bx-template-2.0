const   processJs = require('./processJs'),
	processCss = require('./processCss');

processCss.buildCss();
processCss.watchScss();
processJs.buildJs();
processJs.watchJs();