import MicroModal from './micromodal';

/*
	@param modalName: String
	@param url: String
	@param method: String
	@param dataAjax: Object
	@param modalSettings: Object
	@param before: Function
	@param after: Function
*/

function modalFromAjax ({ modalName, url='/local/tools/ajax_form.php', method='POST', dataAjax = {}, modalSettings = {}, before, after }) {
	if (typeof before === 'function') {
		before();
	}
	var body = new FormData();
	for (var i in dataAjax) {
		body.append(i, dataAjax[i]);
	}
	fetch(url, {
		method,
		body,
		responseType: 'text'
	}).then((res) => {
		if (res.data != '') {
			if (typeof after === 'function') {
				after();
			}
			console.log(res.data.trim());
			//document.querySelector('body').insertAdjacentHTML('beforeend', res.data.trim());
			//MicroModal.show(modalName, modalSettings);
		}
	}).catch(err => {
		console.log(err);
	});
};

export default modalFromAjax;