'use strict';

window.addEventListener('load', function () {
  var settingsPanel = function () {
    var togglePanel = document.querySelector('.settings-panel__btn_toggle'),
        settingsPanel = document.querySelector('.settings-panel'),
        buttonsPanel = document.querySelector('.settings-panel__buttons'),
        settingApply = document.querySelector('.settings-panel__btn_apply'),
        settingReset = document.querySelector('.settings-panel__btn_reset'),
        settingForm = document.querySelector('.settings-panel__inner'),
        uri = window.location.href;
    var openSettings = settingsPanel.classList.contains('settings-panel_show');

    function clickOutSettings(e) {
      var target = e.target;

      if (target != settingsPanel && !settingsPanel.contains(target) && openSettings) {
        toggleShowSettingsPanel();
      }
    }

    function toggleShowSettingsPanel() {
      openSettings = !openSettings;
      panelTransform();
    }

    function showButtons(x) {
      x.matches ? buttonsPanel.style.display = 'flex' : buttonsPanel.style.display = 'none';
    }

    function panelTransform() {
      openSettings ? settingsPanel.classList.add('settings-panel_show') : settingsPanel.classList.remove('settings-panel_show');
      var styleButtons = buttonsPanel.style,
          panelWidth = settingForm.getBoundingClientRect().width;

      if (openSettings) {
        lockScroll();
        styleButtons.transform = 'none';
      } else {
        unlockScroll();
        styleButtons.transform = "translate(-".concat(panelWidth, "px)");
      }
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
        return res.json();
      }).then(function (body) {
        if ('success' in body && body.success) {
          location.reload();
        }
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
        return res.json();
      }).then(function (body) {
        if ('success' in body && body.success) {
          location.reload();
        }
      })["catch"](function (err) {
        console.log(err);
      });
    }

    panelTransform();
    var mediaButton = window.matchMedia('(min-width: 1200px)');
    showButtons(mediaButton);
    mediaButton.addListener(showButtons);
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