import tns from './tiny-slider';
import itemCounter from './itemCounter';
import customSelect from './customSelect';
import debounce from './debounce';
import fetch from './fetch';
import modalFromAjax from './modalFromAjax';
import { lockScroll, unlockScroll } from './bodyBlock';
import HeaderMenu from './headerMenu';
import collectorAttributes from './collector-attributes';
import Tabs from './tabs';
import serialize from './serialize';
import lazyLoad from './lazyLoad';
import Form from './form';
import smoothscroll from './smoothscroll';

const clickAnchorLink = (e) => {
	e.preventDefault();
	const target = e.target.getAttribute('href');
	document.querySelector(target).scrollIntoView({ behavior: 'smooth' });
};

window.addEventListener('load', () => {
	smoothscroll();
	const modalCallbackButtons = document.querySelectorAll('.js-init-modal__form');
	Array.prototype.forEach.call(modalCallbackButtons, (btn) => {
		btn.addEventListener('click', () => {
			var settings = {
				modalName: 'callback_modal',
				dataAjax: collectorAttributes(btn)
			};
			modalFromAjax(settings);
		});
	});

	const anchorLinks = document.querySelectorAll('.anchor');
	Array.prototype.forEach.call(anchorLinks, (link) => {
		link.addEventListener('click', clickAnchorLink);
	});
	// const classNames = {
	// 	inputError: '',
	// 	formError: 'form-field_error',
	// 	error: 'form-field__error',
	// };
	// var callbackForm = new Form(document.querySelector('.callback-form'), null, { uriAction: '', method: 'POST' }, classNames, null);
	// callbackForm.init();
	// var counterStroke = itemCounter('.form-stroke__fieldCount'),
	// 	counterUnderline = itemCounter('.form-underline__fieldCount'),
	// 	// customSelectExample = new customSelect({
	// 	// 	elem: 'form-stroke__select',
	// 	// }),
	// 	// customSelectExample2 = new customSelect({
	// 	// 	elem: 'form-underline__select',
	// 	// });
});