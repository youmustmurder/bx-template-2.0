'use strict';

window.addEventListener('load', function () {
  var settingsPanel = function () {
    function clickOutSettings(e) {
      var target = e.target;

      if (target != settingsPanel && !settingsPanel.contains(target) && openSettings) {
        toggleShowSettingsPanel();
      }
    }

    function toggleShowSettingsPanel() {
      settingsPanel.classList.toggle('settings-panel_show');
      openSettings = settingsPanel.classList.contains('settings-panel_show');
      openSettings ? lockScroll() : unlockScroll();
    }

    var togglePanel = document.querySelector('.settings-panel__btn_toggle'),
        settingsPanel = document.querySelector('.settings-panel'),
        settingApply = document.querySelector('.settings-panel__btn_apply'),
        settingReset = document.querySelector('.settings-panel__btn_reset'),
        settingForm = document.querySelector('.settings-panel__inner'),
        uri = window.location.href;
    var openSettings = settingsPanel.classList.contains('settings-panel_show');
    openSettings ? lockScroll(false) : unlockScroll();
    document.querySelector('body').addEventListener('click', clickOutSettings);
    togglePanel.addEventListener('click', function () {
      toggleShowSettingsPanel();
    });
    settingApply.addEventListener('click', function () {
      var data = serialize(settingForm);
      data['SET_SETTING'] = 'Y';
      fetch(uri, {
        method: 'POST',
        body: JSON.stringify(data)
      }).then(function (res) {
        console.log(res);
      })["catch"](function (err) {
        console.log(err);
      });
    });
    settingReset.addEventListener('click', function () {
      fetch(uri, {
        method: 'GET',
        params: {
          reset: 'Y'
        }
      }).then(function (res) {
        console.log(res);
      })["catch"](function (err) {
        console.log(err);
      });
    });
    var settingsTabs = new Tabs(document.querySelector('.settings-panel__inner'));
    settingsTabs.init();
    var cartSelect = new customSelect({
      elem: 'selectMainfont'
    });
  }(); // var sizeSelect = new customSelect({
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