window.addEventListener('load', () => {
	var settingsPanel = (() => {
		function clickOutSettings(e) {
			let target = e.target;
			if (target != settingsPanel && !settingsPanel.contains(target) && openSettings) {
				toggleShowSettingsPanel();
			}
		}

		function toggleShowSettingsPanel() {
			settingsPanel.classList.toggle('settings-panel_show');
			openSettings = settingsPanel.classList.contains('settings-panel_show');
			(openSettings) ? lockScroll() : unlockScroll();
		}

		const togglePanel = document.querySelector('.settings-panel__btn_toggle'),
			settingsPanel = document.querySelector('.settings-panel'),
			settingApply = document.querySelector('.settings-panel__btn_apply'),
			settingReset = document.querySelector('.settings-panel__btn_reset'),
			settingForm = document.querySelector('.settings-panel__inner'),
			uri = window.location.href;

		var openSettings = settingsPanel.classList.contains('settings-panel_show');
		(openSettings) ? lockScroll(false) : unlockScroll();

		document.querySelector('body').addEventListener('click', clickOutSettings);

		togglePanel.addEventListener('click', () => {
			toggleShowSettingsPanel();
		});

		settingApply.addEventListener('click', () => {
			var data = serialize(settingForm);
			var body = new FormData();
			for (var i in data) {
				body.append(i, data[i]);
			}
			body.append('SET_SETTING', 'Y');
			fetch(uri, {
				method: 'POST',
				body,
			}).then(res => {
				console.log(res);
			}).catch(err => {
				console.log(err);
			});
		});

		settingReset.addEventListener('click', () => {
			var body = new FormData();
			body.append('RESET', 'Y');
			fetch(uri, {
				method: 'GET',
				body,
			}).then(res => {
				console.log(res);
			}).catch(err => {
				console.log(err);
			});
		});

		var settingsTabs = new Tabs(document.querySelector('.settings-panel__inner'));
		settingsTabs.init();

		var cartSelect = new customSelect({
			elem: 'selectMainfont'
		});
	})();

    // var sizeSelect = new customSelect({
    //     elem: 'selectSizefont'
    // });
    // var titleSelect = new customSelect({
    //     elem: 'selectTitlefont'
	// });

    // var tabsBtns = document.querySelectorAll('.js-tab-trigger');

    // function tabSelection(e) {
    //     var id = e.getAttribute('data-tab'),
    //         tab = document.querySelectorAll('.js-tab-trigger.active'),
    //         content = document.querySelectorAll('.js-tab-content'),
	// 		contentData = document.querySelector('.js-tab-content[data-tab="'+ id +'"]');

    //     Array.prototype.forEach.call(tab, (preview) => {
    //         preview.classList.remove('active');
	// 	});

    //     e.classList.add('active');

    //     Array.prototype.forEach.call(content, (preview) => {
    //         preview.classList.remove('active');
    //     });

    //     contentData.classList.add('active');
    // }

    // Array.prototype.forEach.call(tabsBtns, (preview) => {
    //     preview.addEventListener('click', function() {
    //         tabSelection(this);
    //     });
    // });
});










/*document.querySelectorAll('.js-tab-trigger').addEventListener('click', function() {
        alert(123);
        var id = this.getAttribute('data-tab'),
            content = document.querySelector('.js-tab-content[data-tab="'+ id +'"]');
        
        conslole.log(id, content);
        
        document.querySelector('.js-tab-trigger.active').classList.remove('active');
        this.classList.add('active');
        
        document.querySelector('.js-tab-trigger.active').classList.remove('active');
        content.classList.add('active');
        
    });*/


