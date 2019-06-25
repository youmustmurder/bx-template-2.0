import MicroModal from './micromodal';
import { lockScroll, unlockScroll } from './bodyBlock';

/*
	@param modalName: String
	@param url: String
	@param method: String
	@param dataAjax: Object
	@param modalSettings: Object
	@param before: Function
	@param after: Function
*/

const htmlPreload = `
	<div class='preload'>
		<div class="preload__dots">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
`;

function modalFromAjax ({ modalName, url='/local/tools/ajax_form.php', method='POST', dataAjax = {}, modalSettings = {}, before, after }) {
	const bodyNode = document.querySelector('body');
	bodyNode.insertAdjacentHTML('beforeend', htmlPreload);
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
		document.querySelector('.preload').remove();
		if (res.data != '') {
			if (typeof after === 'function') {
				after();
			}
			console.log(res.data.trim());
			//bodyNode.insertAdjacentHTML('beforeend', res.data.trim());
			//MicroModal.show(modalName, modalSettings);
		}
	}).catch(err => {
		console.log(err);
	});
};

export default modalFromAjax;