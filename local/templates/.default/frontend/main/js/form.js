import serialize from './serialize';

class Form {
	constructor(form, submit, { uriAction, method }, classNames, cbSuccess) {
		this.form = form;
		this.submit = (submit != null) ? submit : form.querySelector('button[type="submit"]');
		this.uriAction = uriAction;
		this.method = method;
		this.classNames = classNames;
		this.cbSuccess = cbSuccess;
	}
	init() {
		this.form.addEventListener('submit', (e) => this.handerSubmit(e));
		this.submit.addEventListener('click', (e) => this.handerSubmit(e));
	}
	handerSubmit(e) {
		this.clearBodyAlerts();
		this.clearErrorsForm();
		this.removeErrorOnFocusInput();

		e.preventDefault();
		var data = serialize(this.form);
		var body = new FormData();
		for (var i in data) {
			body.append(i, data[i]);
		}

		fetch(this.uriAction, {
			method: this.method,
			body,
		}).then(res => {
			return res.json();
		}).then(res => {
			if ('error' in res) {
				this.showFormErrors(res.error);
			} else {
				this.form.reset();
				if (typeof this.cbSuccess === 'function') {
					this.cbSuccess();
				}
			}
		}).catch(err => {
			console.log(err);
		});
	}
	showFormErrors(errors) {
		for (var i in errors) {
			var element = this.form.querySelector('input[name="'+i+'"]') || this.form.querySelector('textarea[name="'+i+'"]');
			if (element != null) {
				(this.classNames.inputError != '') ? element.classList.add(this.classNames.inputError) : null;
				element.setAttribute('aria-describedby', 'error-' + i);
				var parent = element.closest('.form-field');
				parent.classList.add(this.classNames.formError);
				var errorNode = document.createElement('div');
				errorNode.setAttribute('aria-live', 'polite');
				errorNode.setAttribute('id', 'error-' + i);
				errorNode.classList.add(this.classNames.error);
				errorNode.textContent = errors[i];
				parent.appendChild(errorNode);
			} else {
				this.removeErrorForm(element);
			}
		}
	}
	removeErrorForm(element) {
		if (element != null) {
			(this.classNames.inputError != '') ? element.classList.remove(this.classNames.inputError) : null;
			var parent = element.closest('.form-field');
			parent.querySelector('.' + this.classNames.formError).remove();
		}
	}
	clearBodyAlerts() {
		var elements = this.form.querySelectorAll('.' + this.classNames.alert);
		for (var i=0;i<elements.length;i++) {
			elements[i].remove();
		}
	}
	clearErrorsForm() {
		if (this.classNames.inputError != '') {
			var elements = this.form.querySelectorAll('.' + this.classNames.inputError);
			for (var i=0;i<elements.length;i++) {
				this.removeErrorForm(elements[i]);
			}
		}
	}
	removeErrorOnFocusInput() {
		var formGroup = this.form.querySelectorAll('.form-field');
		Array.prototype.forEach.call(formGroup, (item) => {
			if (item.querySelector('input') != null) {
				item.querySelector('input').addEventListener('focus', (e) => {
					(this.classNames.inputError != '') ? e.target.classList.remove(this.classNames.inputError) : null;
					var siblingError = e.target.nextSibling.nextSibling;
					if (siblingError != null && siblingError.classList.contains(this.classNames.fieldError)) {
						siblingError.remove();
					}
				});
			}
			if (item.querySelector('textarea') != null) {
				item.querySelector('textarea').addEventListener('focus', (e) => {
					(this.classNames.inputError != '') ? e.target.classList.remove(this.classNames.inputError) : null;
					var siblingError = e.target.nextSibling.nextSibling;
					if (siblingError != null && siblingError.classList.contains(this.classNames.fieldError)) {
						siblingError.remove();
					}
				});
			}
			if (item.querySelector('label') != null) {
				item.querySelector('label').addEventListener('click', (e) => {
					var siblingError = e.target.nextSibling.nextSibling;
					if (siblingError != null && siblingError.classList.contains(this.classNames.fieldError)) {
						siblingError.remove();
					}
				});
			}
		});
	}
}

export default Form;