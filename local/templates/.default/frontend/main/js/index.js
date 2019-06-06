import tns from './tiny-slider';
import itemCounter from './itemCounter';
import customSelect from './customSelect';
import debounce from './debounce';
import MictoModal from './micromodal';
import axios from './axios';
import modalFromAjax from './modalFromAjax';
import { lockScroll, unlockScroll } from './bodyBlock';
import HeaderMenu from './headerMenu';
import collectorAttributes from './collector-attributes';

window.addEventListener('load', () => {
	const modalCallbackButtons = document.querySelectorAll('.js-init-modal__form');
	Array.prototype.forEach.call(modalCallbackButtons, (btn) => {
		btn.addEventListener('click', () => {
			var settings = {
				modalName: 'callback_modal',
				dataAjax: collectorAttributes(btn)
			};
			console.log(settings);
			modalFromAjax(settings);
		});
	});
	// var counterStroke = itemCounter('.form-stroke__fieldCount'),
	// 	counterUnderline = itemCounter('.form-underline__fieldCount'),
	// 	// customSelectExample = new customSelect({
	// 	// 	elem: 'form-stroke__select',
	// 	// }),
	// 	// customSelectExample2 = new customSelect({
	// 	// 	elem: 'form-underline__select',
	// 	// });
});