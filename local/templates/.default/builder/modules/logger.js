const getTime = () => {
	return new Date().toLocaleTimeString('ru-RU');
};

const log = (message) => {
	console.log('\x1b[0m', `[${ getTime() }]: ${ message }`);
};

const loggerBuild = (output) => {
	console.log('\x1b[32m', `[${ getTime() }]: Build file (${ output })`);
};

const loggerNewWatch = (path) => {
	console.log('\x1b[0m', `[${ getTime() }] New watch (${ path })`);
};

const loggerError = (message) => {
	console.error('\x1b[31m', `[${ getTime() }] ${ message }`);
};

module.exports = {
	log,
	loggerBuild,
	loggerNewWatch,
	loggerError
};