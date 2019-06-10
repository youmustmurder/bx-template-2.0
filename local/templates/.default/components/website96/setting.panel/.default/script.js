'use strict';

window.addEventListener('load', function () {
  var settingsPanel = function () {
    var togglePanel = document.querySelector('.settings-panel__btn_toggle'),
        settingsPanel = document.querySelector('.settings-panel'),
        settingApply = document.querySelector('.settings-panel__btn_apply'),
        settingReset = document.querySelector('.settings-panel__btn_reset'),
        settingForm = document.querySelector('.settings-panel__inner'),
        uri = window.location.href;

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

    function handlerApplySettings() {
      var data = serialize(settingForm);
      var body = new FormData();

      for (var i in data) {
        body.append(i, data[i]);
      }

      body.append('SET_SETTING', 'Y');
      fetch(uri, {
        method: 'POST',
        body: body
      }).then(function (res) {
        console.log(res);
      })["catch"](function (err) {
        console.log(err);
      });
    }

    function handlerResetSettings() {
      var body = new FormData();
      body.append('RESET', 'Y');
      fetch(uri, {
        method: 'GET',
        body: body
      }).then(function (res) {
        console.log(res);
      })["catch"](function (err) {
        console.log(err);
      });
    }

    var openSettings = settingsPanel.classList.contains('settings-panel_show');
    openSettings ? lockScroll(false) : unlockScroll();
    document.querySelector('body').addEventListener('click', clickOutSettings);
    togglePanel.addEventListener('click', toggleShowSettingsPanel);
    settingApply.addEventListener('click', handlerApplySettings);
    settingReset.addEventListener('click', handlerResetSettings);
    var settingsTabs = new Tabs(document.querySelector('.settings-panel__inner'));
    settingsTabs.init();
    var selects = settingsPanel.querySelectorAll('select');
    Array.prototype.forEach.call(selects, function (select) {
      new customSelect({
        elem: select
      });
    });
  }();
});