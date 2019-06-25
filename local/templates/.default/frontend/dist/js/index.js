'use strict';

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _toConsumableArray2(arr) { return _arrayWithoutHoles2(arr) || _iterableToArray2(arr) || _nonIterableSpread2(); }

function _nonIterableSpread2() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray2(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles2(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var tns = function () {
  // Object.keys
  if (!Object.keys) {
    Object.keys = function (object) {
      var keys = [];

      for (var name in object) {
        if (Object.prototype.hasOwnProperty.call(object, name)) {
          keys.push(name);
        }
      }

      return keys;
    };
  } // ChildNode.remove


  if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function () {
      if (this.parentNode) {
        this.parentNode.removeChild(this);
      }
    };
  }

  var win = window;

  var raf = win.requestAnimationFrame || win.webkitRequestAnimationFrame || win.mozRequestAnimationFrame || win.msRequestAnimationFrame || function (cb) {
    return setTimeout(cb, 16);
  };

  var win$1 = window;

  var caf = win$1.cancelAnimationFrame || win$1.mozCancelAnimationFrame || function (id) {
    clearTimeout(id);
  };

  function extend() {
    var obj,
        name,
        copy,
        target = arguments[0] || {},
        i = 1,
        length = arguments.length;

    for (; i < length; i++) {
      if ((obj = arguments[i]) !== null) {
        for (name in obj) {
          copy = obj[name];

          if (target === copy) {
            continue;
          } else if (copy !== undefined) {
            target[name] = copy;
          }
        }
      }
    }

    return target;
  }

  function checkStorageValue(value) {
    return ['true', 'false'].indexOf(value) >= 0 ? JSON.parse(value) : value;
  }

  function setLocalStorage(storage, key, value, access) {
    if (access) {
      try {
        storage.setItem(key, value);
      } catch (e) {}
    }

    return value;
  }

  function getSlideId() {
    var id = window.tnsId;
    window.tnsId = !id ? 1 : id + 1;
    return 'tns' + window.tnsId;
  }

  function getBody() {
    var doc = document,
        body = doc.body;

    if (!body) {
      body = doc.createElement('body');
      body.fake = true;
    }

    return body;
  }

  var docElement = document.documentElement;

  function setFakeBody(body) {
    var docOverflow = '';

    if (body.fake) {
      docOverflow = docElement.style.overflow; //avoid crashing IE8, if background image is used

      body.style.background = ''; //Safari 5.13/5.1.4 OSX stops loading if ::-webkit-scrollbar is used and scrollbars are visible

      body.style.overflow = docElement.style.overflow = 'hidden';
      docElement.appendChild(body);
    }

    return docOverflow;
  }

  function resetFakeBody(body, docOverflow) {
    if (body.fake) {
      body.remove();
      docElement.style.overflow = docOverflow; // Trigger layout so kinetic scrolling isn't disabled in iOS6+
      // eslint-disable-next-line

      docElement.offsetHeight;
    }
  } // get css-calc


  function calc() {
    var doc = document,
        body = getBody(),
        docOverflow = setFakeBody(body),
        div = doc.createElement('div'),
        result = false;
    body.appendChild(div);

    try {
      var str = '(10px * 10)',
          vals = ['calc' + str, '-moz-calc' + str, '-webkit-calc' + str],
          val;

      for (var i = 0; i < 3; i++) {
        val = vals[i];
        div.style.width = val;

        if (div.offsetWidth === 100) {
          result = val.replace(str, '');
          break;
        }
      }
    } catch (e) {}

    body.fake ? resetFakeBody(body, docOverflow) : div.remove();
    return result;
  } // get subpixel support value


  function percentageLayout() {
    // check subpixel layout supporting
    var doc = document,
        body = getBody(),
        docOverflow = setFakeBody(body),
        wrapper = doc.createElement('div'),
        outer = doc.createElement('div'),
        str = '',
        count = 70,
        perPage = 3,
        supported = false;
    wrapper.className = 'tns-t-subp2';
    outer.className = 'tns-t-ct';

    for (var i = 0; i < count; i++) {
      str += '<div></div>';
    }

    outer.innerHTML = str;
    wrapper.appendChild(outer);
    body.appendChild(wrapper);
    supported = Math.abs(wrapper.getBoundingClientRect().left - outer.children[count - perPage].getBoundingClientRect().left) < 2;
    body.fake ? resetFakeBody(body, docOverflow) : wrapper.remove();
    return supported;
  }

  function mediaquerySupport() {
    var doc = document,
        body = getBody(),
        docOverflow = setFakeBody(body),
        div = doc.createElement('div'),
        style = doc.createElement('style'),
        rule = '@media all and (min-width:1px){.tns-mq-test{position:absolute}}',
        position;
    style.type = 'text/css';
    div.className = 'tns-mq-test';
    body.appendChild(style);
    body.appendChild(div);

    if (style.styleSheet) {
      style.styleSheet.cssText = rule;
    } else {
      style.appendChild(doc.createTextNode(rule));
    }

    position = window.getComputedStyle ? window.getComputedStyle(div).position : div.currentStyle['position'];
    body.fake ? resetFakeBody(body, docOverflow) : div.remove();
    return position === 'absolute';
  } // create and append style sheet


  function createStyleSheet(media) {
    // Create the <style> tag
    var style = document.createElement('style'); // style.setAttribute("type", "text/css");
    // Add a media (and/or media query) here if you'd like!
    // style.setAttribute("media", "screen")
    // style.setAttribute("media", "only screen and (max-width : 1024px)")

    if (media) {
      style.setAttribute('media', media);
    } // WebKit hack :(
    // style.appendChild(document.createTextNode(""));
    // Add the <style> element to the page


    document.querySelector('head').appendChild(style);
    return style.sheet ? style.sheet : style.styleSheet;
  } // cross browsers addRule method


  function addCSSRule(sheet, selector, rules, index) {
    // return raf(function() {
    'insertRule' in sheet ? sheet.insertRule(selector + '{' + rules + '}', index) : sheet.addRule(selector, rules, index); // });
  } // cross browsers addRule method


  function removeCSSRule(sheet, index) {
    // return raf(function() {
    'deleteRule' in sheet ? sheet.deleteRule(index) : sheet.removeRule(index); // });
  }

  function getCssRulesLength(sheet) {
    var rule = 'insertRule' in sheet ? sheet.cssRules : sheet.rules;
    return rule.length;
  }

  function toDegree(y, x) {
    return Math.atan2(y, x) * (180 / Math.PI);
  }

  function getTouchDirection(angle, range) {
    var direction = false,
        gap = Math.abs(90 - Math.abs(angle));

    if (gap >= 90 - range) {
      direction = 'horizontal';
    } else if (gap <= range) {
      direction = 'vertical';
    }

    return direction;
  } // https://toddmotto.com/ditch-the-array-foreach-call-nodelist-hack/


  function forEach(arr, callback, scope) {
    for (var i = 0, l = arr.length; i < l; i++) {
      callback.call(scope, arr[i], i);
    }
  }

  var classListSupport = 'classList' in document.createElement('_');
  var hasClass = classListSupport ? function (el, str) {
    return el.classList.contains(str);
  } : function (el, str) {
    return el.className.indexOf(str) >= 0;
  };
  var addClass = classListSupport ? function (el, str) {
    if (!hasClass(el, str)) {
      el.classList.add(str);
    }
  } : function (el, str) {
    if (!hasClass(el, str)) {
      el.className += ' ' + str;
    }
  };
  var removeClass = classListSupport ? function (el, str) {
    if (hasClass(el, str)) {
      el.classList.remove(str);
    }
  } : function (el, str) {
    if (hasClass(el, str)) {
      el.className = el.className.replace(str, '');
    }
  };

  function hasAttr(el, attr) {
    return el.hasAttribute(attr);
  }

  function getAttr(el, attr) {
    return el.getAttribute(attr);
  }

  function isNodeList(el) {
    // Only NodeList has the "item()" function
    return typeof el.item !== 'undefined';
  }

  function setAttrs(els, attrs) {
    els = isNodeList(els) || els instanceof Array ? els : [els];

    if (Object.prototype.toString.call(attrs) !== '[object Object]') {
      return;
    }

    for (var i = els.length; i--;) {
      for (var key in attrs) {
        els[i].setAttribute(key, attrs[key]);
      }
    }
  }

  function removeAttrs(els, attrs) {
    els = isNodeList(els) || els instanceof Array ? els : [els];
    attrs = attrs instanceof Array ? attrs : [attrs];
    var attrLength = attrs.length;

    for (var i = els.length; i--;) {
      for (var j = attrLength; j--;) {
        els[i].removeAttribute(attrs[j]);
      }
    }
  }

  function arrayFromNodeList(nl) {
    var arr = [];

    for (var i = 0, l = nl.length; i < l; i++) {
      arr.push(nl[i]);
    }

    return arr;
  }

  function hideElement(el, forceHide) {
    if (el.style.display !== 'none') {
      el.style.display = 'none';
    }
  }

  function showElement(el, forceHide) {
    if (el.style.display === 'none') {
      el.style.display = '';
    }
  }

  function isVisible(el) {
    return window.getComputedStyle(el).display !== 'none';
  }

  function whichProperty(props) {
    if (typeof props === 'string') {
      var arr = [props],
          Props = props.charAt(0).toUpperCase() + props.substr(1),
          prefixes = ['Webkit', 'Moz', 'ms', 'O'];
      prefixes.forEach(function (prefix) {
        if (prefix !== 'ms' || props === 'transform') {
          arr.push(prefix + Props);
        }
      });
      props = arr;
    }

    var el = document.createElement('fakeelement'),
        len = props.length;

    for (var i = 0; i < props.length; i++) {
      var prop = props[i];

      if (el.style[prop] !== undefined) {
        return prop;
      }
    }

    return false; // explicit for ie9-
  }

  function has3DTransforms(tf) {
    if (!tf) {
      return false;
    }

    if (!window.getComputedStyle) {
      return false;
    }

    var doc = document,
        body = getBody(),
        docOverflow = setFakeBody(body),
        el = doc.createElement('p'),
        has3d,
        cssTF = tf.length > 9 ? '-' + tf.slice(0, -9).toLowerCase() + '-' : '';
    cssTF += 'transform'; // Add it to the body to get the computed style

    body.insertBefore(el, null);
    el.style[tf] = 'translate3d(1px,1px,1px)';
    has3d = window.getComputedStyle(el).getPropertyValue(cssTF);
    body.fake ? resetFakeBody(body, docOverflow) : el.remove();
    return has3d !== undefined && has3d.length > 0 && has3d !== 'none';
  } // get transitionend, animationend based on transitionDuration
  // @propin: string
  // @propOut: string, first-letter uppercase
  // Usage: getEndProperty('WebkitTransitionDuration', 'Transition') => webkitTransitionEnd


  function getEndProperty(propIn, propOut) {
    var endProp = false;

    if (/^Webkit/.test(propIn)) {
      endProp = 'webkit' + propOut + 'End';
    } else if (/^O/.test(propIn)) {
      endProp = 'o' + propOut + 'End';
    } else if (propIn) {
      endProp = propOut.toLowerCase() + 'end';
    }

    return endProp;
  } // Test via a getter in the options object to see if the passive property is accessed


  var supportsPassive = false;

  try {
    var opts = Object.defineProperty({}, 'passive', {
      get: function get() {
        supportsPassive = true;
      }
    });
    window.addEventListener('test', null, opts);
  } catch (e) {}

  var passiveOption = supportsPassive ? {
    passive: true
  } : false;

  function addEvents(el, obj, preventScrolling) {
    for (var prop in obj) {
      var option = ['touchstart', 'touchmove'].indexOf(prop) >= 0 && !preventScrolling ? passiveOption : false;
      el.addEventListener(prop, obj[prop], option);
    }
  }

  function removeEvents(el, obj) {
    for (var prop in obj) {
      var option = ['touchstart', 'touchmove'].indexOf(prop) >= 0 ? passiveOption : false;
      el.removeEventListener(prop, obj[prop], option);
    }
  }

  function Events() {
    return {
      topics: {},
      on: function on(eventName, fn) {
        this.topics[eventName] = this.topics[eventName] || [];
        this.topics[eventName].push(fn);
      },
      off: function off(eventName, fn) {
        if (this.topics[eventName]) {
          for (var i = 0; i < this.topics[eventName].length; i++) {
            if (this.topics[eventName][i] === fn) {
              this.topics[eventName].splice(i, 1);
              break;
            }
          }
        }
      },
      emit: function emit(eventName, data) {
        data.type = eventName;

        if (this.topics[eventName]) {
          this.topics[eventName].forEach(function (fn) {
            fn(data, eventName);
          });
        }
      }
    };
  }

  function jsTransform(element, attr, prefix, postfix, to, duration, callback) {
    var tick = Math.min(duration, 10),
        unit = to.indexOf('%') >= 0 ? '%' : 'px',
        to = to.replace(unit, ''),
        from = Number(element.style[attr].replace(prefix, '').replace(postfix, '').replace(unit, '')),
        positionTick = (to - from) / duration * tick,
        running;
    setTimeout(moveElement, tick);

    function moveElement() {
      duration -= tick;
      from += positionTick;
      element.style[attr] = prefix + from + unit + postfix;

      if (duration > 0) {
        setTimeout(moveElement, tick);
      } else {
        callback();
      }
    }
  }

  var tns = function tns(options) {
    options = extend({
      container: '.slider',
      mode: 'carousel',
      axis: 'horizontal',
      items: 1,
      gutter: 0,
      edgePadding: 0,
      fixedWidth: false,
      autoWidth: false,
      viewportMax: false,
      slideBy: 1,
      center: false,
      controls: true,
      controlsPosition: 'top',
      controlsText: ['prev', 'next'],
      controlsContainer: false,
      prevButton: false,
      nextButton: false,
      nav: true,
      navPosition: 'top',
      navContainer: false,
      navAsThumbnails: false,
      arrowKeys: false,
      speed: 300,
      autoplay: false,
      autoplayPosition: 'top',
      autoplayTimeout: 5000,
      autoplayDirection: 'forward',
      autoplayText: ['start', 'stop'],
      autoplayHoverPause: false,
      autoplayButton: false,
      autoplayButtonOutput: true,
      autoplayResetOnVisibility: true,
      animateIn: 'tns-fadeIn',
      animateOut: 'tns-fadeOut',
      animateNormal: 'tns-normal',
      animateDelay: false,
      loop: true,
      rewind: false,
      autoHeight: false,
      responsive: false,
      lazyload: false,
      lazyloadSelector: '.tns-lazy-img',
      touch: true,
      mouseDrag: false,
      swipeAngle: 15,
      nested: false,
      preventActionWhenRunning: false,
      preventScrollOnTouch: false,
      freezable: true,
      onInit: false,
      useLocalStorage: true
    }, options || {});
    var doc = document,
        win = window,
        KEYS = {
      ENTER: 13,
      SPACE: 32,
      LEFT: 37,
      RIGHT: 39
    },
        tnsStorage = {},
        localStorageAccess = options.useLocalStorage;

    if (localStorageAccess) {
      // check browser version and local storage access
      var browserInfo = navigator.userAgent;
      var uid = new Date();

      try {
        tnsStorage = win.localStorage;

        if (tnsStorage) {
          tnsStorage.setItem(uid, uid);
          localStorageAccess = tnsStorage.getItem(uid) == uid;
          tnsStorage.removeItem(uid);
        } else {
          localStorageAccess = false;
        }

        if (!localStorageAccess) {
          tnsStorage = {};
        }
      } catch (e) {
        localStorageAccess = false;
      }

      if (localStorageAccess) {
        // remove storage when browser version changes
        if (tnsStorage['tnsApp'] && tnsStorage['tnsApp'] !== browserInfo) {
          ['tC', 'tPL', 'tMQ', 'tTf', 't3D', 'tTDu', 'tTDe', 'tADu', 'tADe', 'tTE', 'tAE'].forEach(function (item) {
            tnsStorage.removeItem(item);
          });
        } // update browserInfo


        localStorage['tnsApp'] = browserInfo;
      }
    }

    var CALC = tnsStorage['tC'] ? checkStorageValue(tnsStorage['tC']) : setLocalStorage(tnsStorage, 'tC', calc(), localStorageAccess),
        PERCENTAGELAYOUT = tnsStorage['tPL'] ? checkStorageValue(tnsStorage['tPL']) : setLocalStorage(tnsStorage, 'tPL', percentageLayout(), localStorageAccess),
        CSSMQ = tnsStorage['tMQ'] ? checkStorageValue(tnsStorage['tMQ']) : setLocalStorage(tnsStorage, 'tMQ', mediaquerySupport(), localStorageAccess),
        TRANSFORM = tnsStorage['tTf'] ? checkStorageValue(tnsStorage['tTf']) : setLocalStorage(tnsStorage, 'tTf', whichProperty('transform'), localStorageAccess),
        HAS3DTRANSFORMS = tnsStorage['t3D'] ? checkStorageValue(tnsStorage['t3D']) : setLocalStorage(tnsStorage, 't3D', has3DTransforms(TRANSFORM), localStorageAccess),
        TRANSITIONDURATION = tnsStorage['tTDu'] ? checkStorageValue(tnsStorage['tTDu']) : setLocalStorage(tnsStorage, 'tTDu', whichProperty('transitionDuration'), localStorageAccess),
        TRANSITIONDELAY = tnsStorage['tTDe'] ? checkStorageValue(tnsStorage['tTDe']) : setLocalStorage(tnsStorage, 'tTDe', whichProperty('transitionDelay'), localStorageAccess),
        ANIMATIONDURATION = tnsStorage['tADu'] ? checkStorageValue(tnsStorage['tADu']) : setLocalStorage(tnsStorage, 'tADu', whichProperty('animationDuration'), localStorageAccess),
        ANIMATIONDELAY = tnsStorage['tADe'] ? checkStorageValue(tnsStorage['tADe']) : setLocalStorage(tnsStorage, 'tADe', whichProperty('animationDelay'), localStorageAccess),
        TRANSITIONEND = tnsStorage['tTE'] ? checkStorageValue(tnsStorage['tTE']) : setLocalStorage(tnsStorage, 'tTE', getEndProperty(TRANSITIONDURATION, 'Transition'), localStorageAccess),
        ANIMATIONEND = tnsStorage['tAE'] ? checkStorageValue(tnsStorage['tAE']) : setLocalStorage(tnsStorage, 'tAE', getEndProperty(ANIMATIONDURATION, 'Animation'), localStorageAccess); // get element nodes from selectors

    var supportConsoleWarn = win.console && typeof win.console.warn === 'function',
        tnsList = ['container', 'controlsContainer', 'prevButton', 'nextButton', 'navContainer', 'autoplayButton'],
        optionsElements = {};
    tnsList.forEach(function (item) {
      if (typeof options[item] === 'string') {
        var str = options[item],
            el = doc.querySelector(str);
        optionsElements[item] = str;

        if (el && el.nodeName) {
          options[item] = el;
        } else {
          if (supportConsoleWarn) {
            console.warn("Can't find", options[item]);
          }

          return;
        }
      }
    }); // make sure at least 1 slide

    if (options.container.children.length < 1) {
      if (supportConsoleWarn) {
        console.warn('No slides found in', options.container);
      }

      return;
    } // update options


    var responsive = options.responsive,
        nested = options.nested,
        carousel = options.mode === 'carousel' ? true : false;

    if (responsive) {
      // apply responsive[0] to options and remove it
      if (0 in responsive) {
        options = extend(options, responsive[0]);
        delete responsive[0];
      }

      var responsiveTem = {};

      for (var key in responsive) {
        var val = responsive[key]; // update responsive
        // from: 300: 2
        // to:
        //   300: {
        //     items: 2
        //   }

        val = typeof val === 'number' ? {
          items: val
        } : val;
        responsiveTem[key] = val;
      }

      responsive = responsiveTem;
      responsiveTem = null;
    } // update options


    function updateOptions(obj) {
      for (var key in obj) {
        if (!carousel) {
          if (key === 'slideBy') {
            obj[key] = 'page';
          }

          if (key === 'edgePadding') {
            obj[key] = false;
          }

          if (key === 'autoHeight') {
            obj[key] = false;
          }
        } // update responsive options


        if (key === 'responsive') {
          updateOptions(obj[key]);
        }
      }
    }

    if (!carousel) {
      updateOptions(options);
    } // === define and set variables ===


    if (!carousel) {
      options.axis = 'horizontal';
      options.slideBy = 'page';
      options.edgePadding = false;
      var animateIn = options.animateIn,
          animateOut = options.animateOut,
          animateDelay = options.animateDelay,
          animateNormal = options.animateNormal;
    }

    var horizontal = options.axis === 'horizontal' ? true : false,
        outerWrapper = doc.createElement('div'),
        innerWrapper = doc.createElement('div'),
        middleWrapper,
        container = options.container,
        containerParent = container.parentNode,
        containerHTML = container.outerHTML,
        slideItems = container.children,
        slideCount = slideItems.length,
        breakpointZone,
        windowWidth = getWindowWidth(),
        isOn = false;

    if (responsive) {
      setBreakpointZone();
    }

    if (carousel) {
      container.className += ' tns-vpfix';
    } // fixedWidth: viewport > rightBoundary > indexMax


    var autoWidth = options.autoWidth,
        fixedWidth = getOption('fixedWidth'),
        edgePadding = getOption('edgePadding'),
        gutter = getOption('gutter'),
        viewport = getViewportWidth(),
        center = getOption('center'),
        items = !autoWidth ? Math.floor(getOption('items')) : 1,
        slideBy = getOption('slideBy'),
        viewportMax = options.viewportMax || options.fixedWidthViewportWidth,
        arrowKeys = getOption('arrowKeys'),
        speed = getOption('speed'),
        rewind = options.rewind,
        loop = rewind ? false : options.loop,
        autoHeight = getOption('autoHeight'),
        controls = getOption('controls'),
        controlsText = getOption('controlsText'),
        nav = getOption('nav'),
        touch = getOption('touch'),
        mouseDrag = getOption('mouseDrag'),
        autoplay = getOption('autoplay'),
        autoplayTimeout = getOption('autoplayTimeout'),
        autoplayText = getOption('autoplayText'),
        autoplayHoverPause = getOption('autoplayHoverPause'),
        autoplayResetOnVisibility = getOption('autoplayResetOnVisibility'),
        sheet = createStyleSheet(),
        lazyload = options.lazyload,
        lazyloadSelector = options.lazyloadSelector,
        slidePositions,
        // collection of slide positions
    slideItemsOut = [],
        cloneCount = loop ? getCloneCountForLoop() : 0,
        slideCountNew = !carousel ? slideCount + cloneCount : slideCount + cloneCount * 2,
        hasRightDeadZone = (fixedWidth || autoWidth) && !loop ? true : false,
        rightBoundary = fixedWidth ? getRightBoundary() : null,
        updateIndexBeforeTransform = !carousel || !loop ? true : false,
        // transform
    transformAttr = horizontal ? 'left' : 'top',
        transformPrefix = '',
        transformPostfix = '',
        // index
    getIndexMax = function () {
      if (fixedWidth) {
        return function () {
          return center && !loop ? slideCount - 1 : Math.ceil(-rightBoundary / (fixedWidth + gutter));
        };
      } else if (autoWidth) {
        return function () {
          for (var i = slideCountNew; i--;) {
            if (slidePositions[i] >= -rightBoundary) {
              return i;
            }
          }
        };
      } else {
        return function () {
          if (center && carousel && !loop) {
            return slideCount - 1;
          } else {
            return loop || carousel ? Math.max(0, slideCountNew - Math.ceil(items)) : slideCountNew - 1;
          }
        };
      }
    }(),
        index = getStartIndex(getOption('startIndex')),
        indexCached = index,
        displayIndex = getCurrentSlide(),
        indexMin = 0,
        indexMax = !autoWidth ? getIndexMax() : null,
        // resize
    resizeTimer,
        preventActionWhenRunning = options.preventActionWhenRunning,
        swipeAngle = options.swipeAngle,
        moveDirectionExpected = swipeAngle ? '?' : true,
        running = false,
        onInit = options.onInit,
        events = new Events(),
        // id, class
    newContainerClasses = ' tns-slider tns-' + options.mode,
        slideId = container.id || getSlideId(),
        disable = getOption('disable'),
        disabled = false,
        freezable = options.freezable,
        freeze = freezable && !autoWidth ? getFreeze() : false,
        frozen = false,
        controlsEvents = {
      click: onControlsClick,
      keydown: onControlsKeydown
    },
        navEvents = {
      click: onNavClick,
      keydown: onNavKeydown
    },
        hoverEvents = {
      mouseover: mouseoverPause,
      mouseout: mouseoutRestart
    },
        visibilityEvent = {
      visibilitychange: onVisibilityChange
    },
        docmentKeydownEvent = {
      keydown: onDocumentKeydown
    },
        touchEvents = {
      touchstart: onPanStart,
      touchmove: onPanMove,
      touchend: onPanEnd,
      touchcancel: onPanEnd
    },
        dragEvents = {
      mousedown: onPanStart,
      mousemove: onPanMove,
      mouseup: onPanEnd,
      mouseleave: onPanEnd
    },
        hasControls = hasOption('controls'),
        hasNav = hasOption('nav'),
        navAsThumbnails = autoWidth ? true : options.navAsThumbnails,
        hasAutoplay = hasOption('autoplay'),
        hasTouch = hasOption('touch'),
        hasMouseDrag = hasOption('mouseDrag'),
        slideActiveClass = 'tns-slide-active',
        imgCompleteClass = 'tns-complete',
        imgEvents = {
      load: onImgLoaded,
      error: onImgFailed
    },
        imgsComplete,
        liveregionCurrent,
        preventScroll = options.preventScrollOnTouch === 'force' ? true : false; // controls


    if (hasControls) {
      var controlsContainer = options.controlsContainer,
          controlsContainerHTML = options.controlsContainer ? options.controlsContainer.outerHTML : '',
          prevButton = options.prevButton,
          nextButton = options.nextButton,
          prevButtonHTML = options.prevButton ? options.prevButton.outerHTML : '',
          nextButtonHTML = options.nextButton ? options.nextButton.outerHTML : '',
          prevIsButton,
          nextIsButton;
    } // nav


    if (hasNav) {
      var navContainer = options.navContainer,
          navContainerHTML = options.navContainer ? options.navContainer.outerHTML : '',
          navItems,
          pages = autoWidth ? slideCount : getPages(),
          pagesCached = 0,
          navClicked = -1,
          navCurrentIndex = getCurrentNavIndex(),
          navCurrentIndexCached = navCurrentIndex,
          navActiveClass = 'tns-nav-active',
          navStr = 'Carousel Page ',
          navStrCurrent = ' (Current Slide)';
    } // autoplay


    if (hasAutoplay) {
      var autoplayDirection = options.autoplayDirection === 'forward' ? 1 : -1,
          autoplayButton = options.autoplayButton,
          autoplayButtonHTML = options.autoplayButton ? options.autoplayButton.outerHTML : '',
          autoplayHtmlStrings = ["<span class='tns-visually-hidden'>", ' animation</span>'],
          autoplayTimer,
          animating,
          autoplayHoverPaused,
          autoplayUserPaused,
          autoplayVisibilityPaused;
    }

    if (hasTouch || hasMouseDrag) {
      var initPosition = {},
          lastPosition = {},
          translateInit,
          disX,
          disY,
          panStart = false,
          rafIndex,
          getDist = horizontal ? function (a, b) {
        return a.x - b.x;
      } : function (a, b) {
        return a.y - b.y;
      };
    } // disable slider when slidecount <= items


    if (!autoWidth) {
      resetVariblesWhenDisable(disable || freeze);
    }

    if (TRANSFORM) {
      transformAttr = TRANSFORM;
      transformPrefix = 'translate';

      if (HAS3DTRANSFORMS) {
        transformPrefix += horizontal ? '3d(' : '3d(0px, ';
        transformPostfix = horizontal ? ', 0px, 0px)' : ', 0px)';
      } else {
        transformPrefix += horizontal ? 'X(' : 'Y(';
        transformPostfix = ')';
      }
    }

    if (carousel) {
      container.className = container.className.replace('tns-vpfix', '');
    }

    initStructure();
    initSheet();
    initSliderTransform(); // === COMMON FUNCTIONS === //

    function resetVariblesWhenDisable(condition) {
      if (condition) {
        controls = nav = touch = mouseDrag = arrowKeys = autoplay = autoplayHoverPause = autoplayResetOnVisibility = false;
      }
    }

    function getCurrentSlide() {
      var tem = carousel ? index - cloneCount : index;

      while (tem < 0) {
        tem += slideCount;
      }

      return tem % slideCount + 1;
    }

    function getStartIndex(ind) {
      ind = ind ? Math.max(0, Math.min(loop ? slideCount - 1 : slideCount - items, ind)) : 0;
      return carousel ? ind + cloneCount : ind;
    }

    function getAbsIndex(i) {
      if (i == null) {
        i = index;
      }

      if (carousel) {
        i -= cloneCount;
      }

      while (i < 0) {
        i += slideCount;
      }

      return Math.floor(i % slideCount);
    }

    function getCurrentNavIndex() {
      var absIndex = getAbsIndex(),
          result;
      result = navAsThumbnails ? absIndex : fixedWidth || autoWidth ? Math.ceil((absIndex + 1) * pages / slideCount - 1) : Math.floor(absIndex / items); // set active nav to the last one when reaches the right edge

      if (!loop && carousel && index === indexMax) {
        result = pages - 1;
      }

      return result;
    }

    function getItemsMax() {
      // fixedWidth or autoWidth while viewportMax is not available
      if (autoWidth || fixedWidth && !viewportMax) {
        return slideCount - 1; // most cases
      } else {
        var str = fixedWidth ? 'fixedWidth' : 'items',
            arr = [];

        if (fixedWidth || options[str] < slideCount) {
          arr.push(options[str]);
        }

        if (responsive) {
          for (var bp in responsive) {
            var tem = responsive[bp][str];

            if (tem && (fixedWidth || tem < slideCount)) {
              arr.push(tem);
            }
          }
        }

        if (!arr.length) {
          arr.push(0);
        }

        return Math.ceil(fixedWidth ? viewportMax / Math.min.apply(null, arr) : Math.max.apply(null, arr));
      }
    }

    function getCloneCountForLoop() {
      var itemsMax = getItemsMax(),
          result = carousel ? Math.ceil((itemsMax * 5 - slideCount) / 2) : itemsMax * 4 - slideCount;
      result = Math.max(itemsMax, result);
      return hasOption('edgePadding') ? result + 1 : result;
    }

    function getWindowWidth() {
      return win.innerWidth || doc.documentElement.clientWidth || doc.body.clientWidth;
    }

    function getInsertPosition(pos) {
      return pos === 'top' ? 'afterbegin' : 'beforeend';
    }

    function getClientWidth(el) {
      var div = doc.createElement('div'),
          rect,
          width;
      el.appendChild(div);
      rect = div.getBoundingClientRect();
      width = rect.right - rect.left;
      div.remove();
      return width || getClientWidth(el.parentNode);
    }

    function getViewportWidth() {
      var gap = edgePadding ? edgePadding * 2 - gutter : 0;
      return getClientWidth(containerParent) - gap;
    }

    function hasOption(item) {
      if (options[item]) {
        return true;
      } else {
        if (responsive) {
          for (var bp in responsive) {
            if (responsive[bp][item]) {
              return true;
            }
          }
        }

        return false;
      }
    } // get option:
    // fixed width: viewport, fixedWidth, gutter => items
    // others: window width => all variables
    // all: items => slideBy


    function getOption(item, ww) {
      if (ww == null) {
        ww = windowWidth;
      }

      if (item === 'items' && fixedWidth) {
        return Math.floor((viewport + gutter) / (fixedWidth + gutter)) || 1;
      } else {
        var result = options[item];

        if (responsive) {
          for (var bp in responsive) {
            // bp: convert string to number
            if (ww >= parseInt(bp)) {
              if (item in responsive[bp]) {
                result = responsive[bp][item];
              }
            }
          }
        }

        if (item === 'slideBy' && result === 'page') {
          result = getOption('items');
        }

        if (!carousel && (item === 'slideBy' || item === 'items')) {
          result = Math.floor(result);
        }

        return result;
      }
    }

    function getSlideMarginLeft(i) {
      return CALC ? CALC + '(' + i * 100 + '% / ' + slideCountNew + ')' : i * 100 / slideCountNew + '%';
    }

    function getInnerWrapperStyles(edgePaddingTem, gutterTem, fixedWidthTem, speedTem, autoHeightBP) {
      var str = '';

      if (edgePaddingTem !== undefined) {
        var gap = edgePaddingTem;

        if (gutterTem) {
          gap -= gutterTem;
        }

        str = horizontal ? 'margin: 0 ' + gap + 'px 0 ' + edgePaddingTem + 'px;' : 'margin: ' + edgePaddingTem + 'px 0 ' + gap + 'px 0;';
      } else if (gutterTem && !fixedWidthTem) {
        var gutterTemUnit = '-' + gutterTem + 'px',
            dir = horizontal ? gutterTemUnit + ' 0 0' : '0 ' + gutterTemUnit + ' 0';
        str = 'margin: 0 ' + dir + ';';
      }

      if (!carousel && autoHeightBP && TRANSITIONDURATION && speedTem) {
        str += getTransitionDurationStyle(speedTem);
      }

      return str;
    }

    function getContainerWidth(fixedWidthTem, gutterTem, itemsTem) {
      if (fixedWidthTem) {
        return (fixedWidthTem + gutterTem) * slideCountNew + 'px';
      } else {
        return CALC ? CALC + '(' + slideCountNew * 100 + '% / ' + itemsTem + ')' : slideCountNew * 100 / itemsTem + '%';
      }
    }

    function getSlideWidthStyle(fixedWidthTem, gutterTem, itemsTem) {
      var width;

      if (fixedWidthTem) {
        width = fixedWidthTem + gutterTem + 'px';
      } else {
        if (!carousel) {
          itemsTem = Math.floor(itemsTem);
        }

        var dividend = carousel ? slideCountNew : itemsTem;
        width = CALC ? CALC + '(100% / ' + dividend + ')' : 100 / dividend + '%';
      }

      width = 'width:' + width; // inner slider: overwrite outer slider styles

      return nested !== 'inner' ? width + ';' : width + ' !important;';
    }

    function getSlideGutterStyle(gutterTem) {
      var str = ''; // gutter maybe interger || 0
      // so can't use 'if (gutter)'

      if (gutterTem !== false) {
        var prop = horizontal ? 'padding-' : 'margin-',
            dir = horizontal ? 'right' : 'bottom';
        str = prop + dir + ': ' + gutterTem + 'px;';
      }

      return str;
    }

    function getCSSPrefix(name, num) {
      var prefix = name.substring(0, name.length - num).toLowerCase();

      if (prefix) {
        prefix = '-' + prefix + '-';
      }

      return prefix;
    }

    function getTransitionDurationStyle(speed) {
      return getCSSPrefix(TRANSITIONDURATION, 18) + 'transition-duration:' + speed / 1000 + 's;';
    }

    function getAnimationDurationStyle(speed) {
      return getCSSPrefix(ANIMATIONDURATION, 17) + 'animation-duration:' + speed / 1000 + 's;';
    }

    function initStructure() {
      var classOuter = 'tns-outer',
          classInner = 'tns-inner',
          hasGutter = hasOption('gutter');
      outerWrapper.className = classOuter;
      innerWrapper.className = classInner;
      outerWrapper.id = slideId + '-ow';
      innerWrapper.id = slideId + '-iw'; // set container properties

      if (container.id === '') {
        container.id = slideId;
      }

      newContainerClasses += PERCENTAGELAYOUT || autoWidth ? ' tns-subpixel' : ' tns-no-subpixel';
      newContainerClasses += CALC ? ' tns-calc' : ' tns-no-calc';

      if (autoWidth) {
        newContainerClasses += ' tns-autowidth';
      }

      newContainerClasses += ' tns-' + options.axis;
      container.className += newContainerClasses; // add constrain layer for carousel

      if (carousel) {
        middleWrapper = doc.createElement('div');
        middleWrapper.id = slideId + '-mw';
        middleWrapper.className = 'tns-ovh';
        outerWrapper.appendChild(middleWrapper);
        middleWrapper.appendChild(innerWrapper);
      } else {
        outerWrapper.appendChild(innerWrapper);
      }

      if (autoHeight) {
        var wp = middleWrapper ? middleWrapper : innerWrapper;
        wp.className += ' tns-ah';
      }

      containerParent.insertBefore(outerWrapper, container);
      innerWrapper.appendChild(container); // add id, class, aria attributes
      // before clone slides

      forEach(slideItems, function (item, i) {
        addClass(item, 'tns-item');

        if (!item.id) {
          item.id = slideId + '-item' + i;
        }

        if (!carousel && animateNormal) {
          addClass(item, animateNormal);
        }

        setAttrs(item, {
          'aria-hidden': 'true',
          tabindex: '-1'
        });
      }); // ## clone slides
      // carousel: n + slides + n
      // gallery:      slides + n

      if (cloneCount) {
        var fragmentBefore = doc.createDocumentFragment(),
            fragmentAfter = doc.createDocumentFragment();

        for (var j = cloneCount; j--;) {
          var num = j % slideCount,
              cloneFirst = slideItems[num].cloneNode(true);
          removeAttrs(cloneFirst, 'id');
          fragmentAfter.insertBefore(cloneFirst, fragmentAfter.firstChild);

          if (carousel) {
            var cloneLast = slideItems[slideCount - 1 - num].cloneNode(true);
            removeAttrs(cloneLast, 'id');
            fragmentBefore.appendChild(cloneLast);
          }
        }

        container.insertBefore(fragmentBefore, container.firstChild);
        container.appendChild(fragmentAfter);
        slideItems = container.children;
      }
    }

    function initSliderTransform() {
      // ## images loaded/failed
      if (hasOption('autoHeight') || autoWidth || !horizontal) {
        var imgs = container.querySelectorAll('img'); // add complete class if all images are loaded/failed

        forEach(imgs, function (img) {
          var src = img.src;

          if (src && src.indexOf('data:image') < 0) {
            addEvents(img, imgEvents);
            img.src = '';
            img.src = src;
            addClass(img, 'loading');
          } else if (!lazyload) {
            imgLoaded(img);
          }
        }); // All imgs are completed

        raf(function () {
          imgsLoadedCheck(arrayFromNodeList(imgs), function () {
            imgsComplete = true;
          });
        }); // Check imgs in window only for auto height

        if (!autoWidth && horizontal) {
          imgs = getImageArray(index, Math.min(index + items - 1, slideCountNew - 1));
        }

        lazyload ? initSliderTransformStyleCheck() : raf(function () {
          imgsLoadedCheck(arrayFromNodeList(imgs), initSliderTransformStyleCheck);
        });
      } else {
        // set container transform property
        if (carousel) {
          doContainerTransformSilent();
        } // update slider tools and events


        initTools();
        initEvents();
      }
    }

    function initSliderTransformStyleCheck() {
      if (autoWidth) {
        // check styles application
        var num = loop ? index : slideCount - 1;

        (function stylesApplicationCheck() {
          slideItems[num - 1].getBoundingClientRect().right.toFixed(2) === slideItems[num].getBoundingClientRect().left.toFixed(2) ? initSliderTransformCore() : setTimeout(function () {
            stylesApplicationCheck();
          }, 16);
        })();
      } else {
        initSliderTransformCore();
      }
    }

    function initSliderTransformCore() {
      // run Fn()s which are rely on image loading
      if (!horizontal || autoWidth) {
        setSlidePositions();

        if (autoWidth) {
          rightBoundary = getRightBoundary();

          if (freezable) {
            freeze = getFreeze();
          }

          indexMax = getIndexMax(); // <= slidePositions, rightBoundary <=

          resetVariblesWhenDisable(disable || freeze);
        } else {
          updateContentWrapperHeight();
        }
      } // set container transform property


      if (carousel) {
        doContainerTransformSilent();
      } // update slider tools and events


      initTools();
      initEvents();
    }

    function initSheet() {
      // gallery:
      // set animation classes and left value for gallery slider
      if (!carousel) {
        for (var i = index, l = index + Math.min(slideCount, items); i < l; i++) {
          var item = slideItems[i];
          item.style.left = (i - index) * 100 / items + '%';
          addClass(item, animateIn);
          removeClass(item, animateNormal);
        }
      } // #### LAYOUT
      // ## INLINE-BLOCK VS FLOAT
      // ## PercentageLayout:
      // slides: inline-block
      // remove blank space between slides by set font-size: 0
      // ## Non PercentageLayout:
      // slides: float
      //         margin-right: -100%
      //         margin-left: ~
      // Resource: https://docs.google.com/spreadsheets/d/147up245wwTXeQYve3BRSAD4oVcvQmuGsFteJOeA5xNQ/edit?usp=sharing


      if (horizontal) {
        if (PERCENTAGELAYOUT || autoWidth) {
          addCSSRule(sheet, '#' + slideId + ' > .tns-item', 'font-size:' + win.getComputedStyle(slideItems[0]).fontSize + ';', getCssRulesLength(sheet));
          addCSSRule(sheet, '#' + slideId, 'font-size:0;', getCssRulesLength(sheet));
        } else if (carousel) {
          forEach(slideItems, function (slide, i) {
            slide.style.marginLeft = getSlideMarginLeft(i);
          });
        }
      } // ## BASIC STYLES


      if (CSSMQ) {
        // middle wrapper style
        if (TRANSITIONDURATION) {
          var str = middleWrapper && options.autoHeight ? getTransitionDurationStyle(options.speed) : '';
          addCSSRule(sheet, '#' + slideId + '-mw', str, getCssRulesLength(sheet));
        } // inner wrapper styles


        str = getInnerWrapperStyles(options.edgePadding, options.gutter, options.fixedWidth, options.speed, options.autoHeight);
        addCSSRule(sheet, '#' + slideId + '-iw', str, getCssRulesLength(sheet)); // container styles

        if (carousel) {
          str = horizontal && !autoWidth ? 'width:' + getContainerWidth(options.fixedWidth, options.gutter, options.items) + ';' : '';

          if (TRANSITIONDURATION) {
            str += getTransitionDurationStyle(speed);
          }

          addCSSRule(sheet, '#' + slideId, str, getCssRulesLength(sheet));
        } // slide styles


        str = horizontal && !autoWidth ? getSlideWidthStyle(options.fixedWidth, options.gutter, options.items) : '';

        if (options.gutter) {
          str += getSlideGutterStyle(options.gutter);
        } // set gallery items transition-duration


        if (!carousel) {
          if (TRANSITIONDURATION) {
            str += getTransitionDurationStyle(speed);
          }

          if (ANIMATIONDURATION) {
            str += getAnimationDurationStyle(speed);
          }
        }

        if (str) {
          addCSSRule(sheet, '#' + slideId + ' > .tns-item', str, getCssRulesLength(sheet));
        } // non CSS mediaqueries: IE8
        // ## update inner wrapper, container, slides if needed
        // set inline styles for inner wrapper & container
        // insert stylesheet (one line) for slides only (since slides are many)

      } else {
        // middle wrapper styles
        update_carousel_transition_duration(); // inner wrapper styles

        innerWrapper.style.cssText = getInnerWrapperStyles(edgePadding, gutter, fixedWidth, autoHeight); // container styles

        if (carousel && horizontal && !autoWidth) {
          container.style.width = getContainerWidth(fixedWidth, gutter, items);
        } // slide styles


        var str = horizontal && !autoWidth ? getSlideWidthStyle(fixedWidth, gutter, items) : '';

        if (gutter) {
          str += getSlideGutterStyle(gutter);
        } // append to the last line


        if (str) {
          addCSSRule(sheet, '#' + slideId + ' > .tns-item', str, getCssRulesLength(sheet));
        }
      } // ## MEDIAQUERIES


      if (responsive && CSSMQ) {
        for (var bp in responsive) {
          // bp: convert string to number
          bp = parseInt(bp);
          var opts = responsive[bp],
              str = '',
              middleWrapperStr = '',
              innerWrapperStr = '',
              containerStr = '',
              slideStr = '',
              itemsBP = !autoWidth ? getOption('items', bp) : null,
              fixedWidthBP = getOption('fixedWidth', bp),
              speedBP = getOption('speed', bp),
              edgePaddingBP = getOption('edgePadding', bp),
              autoHeightBP = getOption('autoHeight', bp),
              gutterBP = getOption('gutter', bp); // middle wrapper string

          if (TRANSITIONDURATION && middleWrapper && getOption('autoHeight', bp) && 'speed' in opts) {
            middleWrapperStr = '#' + slideId + '-mw{' + getTransitionDurationStyle(speedBP) + '}';
          } // inner wrapper string


          if ('edgePadding' in opts || 'gutter' in opts) {
            innerWrapperStr = '#' + slideId + '-iw{' + getInnerWrapperStyles(edgePaddingBP, gutterBP, fixedWidthBP, speedBP, autoHeightBP) + '}';
          } // container string


          if (carousel && horizontal && !autoWidth && ('fixedWidth' in opts || 'items' in opts || fixedWidth && 'gutter' in opts)) {
            containerStr = 'width:' + getContainerWidth(fixedWidthBP, gutterBP, itemsBP) + ';';
          }

          if (TRANSITIONDURATION && 'speed' in opts) {
            containerStr += getTransitionDurationStyle(speedBP);
          }

          if (containerStr) {
            containerStr = '#' + slideId + '{' + containerStr + '}';
          } // slide string


          if ('fixedWidth' in opts || fixedWidth && 'gutter' in opts || !carousel && 'items' in opts) {
            slideStr += getSlideWidthStyle(fixedWidthBP, gutterBP, itemsBP);
          }

          if ('gutter' in opts) {
            slideStr += getSlideGutterStyle(gutterBP);
          } // set gallery items transition-duration


          if (!carousel && 'speed' in opts) {
            if (TRANSITIONDURATION) {
              slideStr += getTransitionDurationStyle(speedBP);
            }

            if (ANIMATIONDURATION) {
              slideStr += getAnimationDurationStyle(speedBP);
            }
          }

          if (slideStr) {
            slideStr = '#' + slideId + ' > .tns-item{' + slideStr + '}';
          } // add up


          str = middleWrapperStr + innerWrapperStr + containerStr + slideStr;

          if (str) {
            sheet.insertRule('@media (min-width: ' + bp / 16 + 'em) {' + str + '}', sheet.cssRules.length);
          }
        }
      }
    }

    function initTools() {
      // == slides ==
      updateSlideStatus(); // == live region ==

      outerWrapper.insertAdjacentHTML('afterbegin', '<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">' + getLiveRegionStr() + '</span>  of ' + slideCount + '</div>');
      liveregionCurrent = outerWrapper.querySelector('.tns-liveregion .current'); // == autoplayInit ==

      if (hasAutoplay) {
        var txt = autoplay ? 'stop' : 'start';

        if (autoplayButton) {
          setAttrs(autoplayButton, {
            'data-action': txt
          });
        } else if (options.autoplayButtonOutput) {
          outerWrapper.insertAdjacentHTML(getInsertPosition(options.autoplayPosition), '<button data-action="' + txt + '">' + autoplayHtmlStrings[0] + txt + autoplayHtmlStrings[1] + autoplayText[0] + '</button>');
          autoplayButton = outerWrapper.querySelector('[data-action]');
        } // add event


        if (autoplayButton) {
          addEvents(autoplayButton, {
            click: toggleAutoplay
          });
        }

        if (autoplay) {
          startAutoplay();

          if (autoplayHoverPause) {
            addEvents(container, hoverEvents);
          }

          if (autoplayResetOnVisibility) {
            addEvents(container, visibilityEvent);
          }
        }
      } // == navInit ==


      if (hasNav) {
        var initIndex = !carousel ? 0 : cloneCount; // customized nav
        // will not hide the navs in case they're thumbnails

        if (navContainer) {
          setAttrs(navContainer, {
            'aria-label': 'Carousel Pagination'
          });
          navItems = navContainer.children;
          forEach(navItems, function (item, i) {
            setAttrs(item, {
              'data-nav': i,
              tabindex: '-1',
              'aria-label': navStr + (i + 1),
              'aria-controls': slideId
            });
          }); // generated nav
        } else {
          var navHtml = '',
              hiddenStr = navAsThumbnails ? '' : 'style="display:none"';

          for (var i = 0; i < slideCount; i++) {
            // hide nav items by default
            navHtml += '<button data-nav="' + i + '" tabindex="-1" aria-controls="' + slideId + '" ' + hiddenStr + ' aria-label="' + navStr + (i + 1) + '"></button>';
          }

          navHtml = '<div class="tns-nav" aria-label="Carousel Pagination">' + navHtml + '</div>';
          outerWrapper.insertAdjacentHTML(getInsertPosition(options.navPosition), navHtml);
          navContainer = outerWrapper.querySelector('.tns-nav');
          navItems = navContainer.children;
        }

        updateNavVisibility(); // add transition

        if (TRANSITIONDURATION) {
          var prefix = TRANSITIONDURATION.substring(0, TRANSITIONDURATION.length - 18).toLowerCase(),
              str = 'transition: all ' + speed / 1000 + 's';

          if (prefix) {
            str = '-' + prefix + '-' + str;
          }

          addCSSRule(sheet, '[aria-controls^=' + slideId + '-item]', str, getCssRulesLength(sheet));
        }

        setAttrs(navItems[navCurrentIndex], {
          'aria-label': navStr + (navCurrentIndex + 1) + navStrCurrent
        });
        removeAttrs(navItems[navCurrentIndex], 'tabindex');
        addClass(navItems[navCurrentIndex], navActiveClass); // add events

        addEvents(navContainer, navEvents);
      } // == controlsInit ==


      if (hasControls) {
        if (!controlsContainer && (!prevButton || !nextButton)) {
          outerWrapper.insertAdjacentHTML(getInsertPosition(options.controlsPosition), '<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button data-controls="prev" tabindex="-1" aria-controls="' + slideId + '">' + controlsText[0] + '</button><button data-controls="next" tabindex="-1" aria-controls="' + slideId + '">' + controlsText[1] + '</button></div>');
          controlsContainer = outerWrapper.querySelector('.tns-controls');
        }

        if (!prevButton || !nextButton) {
          prevButton = controlsContainer.children[0];
          nextButton = controlsContainer.children[1];
        }

        if (options.controlsContainer) {
          setAttrs(controlsContainer, {
            'aria-label': 'Carousel Navigation',
            tabindex: '0'
          });
        }

        if (options.controlsContainer || options.prevButton && options.nextButton) {
          setAttrs([prevButton, nextButton], {
            'aria-controls': slideId,
            tabindex: '-1'
          });
        }

        if (options.controlsContainer || options.prevButton && options.nextButton) {
          setAttrs(prevButton, {
            'data-controls': 'prev'
          });
          setAttrs(nextButton, {
            'data-controls': 'next'
          });
        }

        prevIsButton = isButton(prevButton);
        nextIsButton = isButton(nextButton);
        updateControlsStatus(); // add events

        if (controlsContainer) {
          addEvents(controlsContainer, controlsEvents);
        } else {
          addEvents(prevButton, controlsEvents);
          addEvents(nextButton, controlsEvents);
        }
      } // hide tools if needed


      disableUI();
    }

    function initEvents() {
      // add events
      if (carousel && TRANSITIONEND) {
        var eve = {};
        eve[TRANSITIONEND] = onTransitionEnd;
        addEvents(container, eve);
      }

      if (touch) {
        addEvents(container, touchEvents, options.preventScrollOnTouch);
      }

      if (mouseDrag) {
        addEvents(container, dragEvents);
      }

      if (arrowKeys) {
        addEvents(doc, docmentKeydownEvent);
      }

      if (nested === 'inner') {
        events.on('outerResized', function () {
          resizeTasks();
          events.emit('innerLoaded', info());
        });
      } else if (responsive || fixedWidth || autoWidth || autoHeight || !horizontal) {
        addEvents(win, {
          resize: onResize
        });
      }

      if (autoHeight) {
        if (nested === 'outer') {
          events.on('innerLoaded', doAutoHeight);
        } else if (!disable) {
          doAutoHeight();
        }
      }

      doLazyLoad();

      if (disable) {
        disableSlider();
      } else if (freeze) {
        freezeSlider();
      }

      events.on('indexChanged', additionalUpdates);

      if (nested === 'inner') {
        events.emit('innerLoaded', info());
      }

      if (typeof onInit === 'function') {
        onInit(info());
      }

      isOn = true;
    }

    function destroy() {
      // sheet
      sheet.disabled = true;

      if (sheet.ownerNode) {
        sheet.ownerNode.remove();
      } // remove win event listeners


      removeEvents(win, {
        resize: onResize
      }); // arrowKeys, controls, nav

      if (arrowKeys) {
        removeEvents(doc, docmentKeydownEvent);
      }

      if (controlsContainer) {
        removeEvents(controlsContainer, controlsEvents);
      }

      if (navContainer) {
        removeEvents(navContainer, navEvents);
      } // autoplay


      removeEvents(container, hoverEvents);
      removeEvents(container, visibilityEvent);

      if (autoplayButton) {
        removeEvents(autoplayButton, {
          click: toggleAutoplay
        });
      }

      if (autoplay) {
        clearInterval(autoplayTimer);
      } // container


      if (carousel && TRANSITIONEND) {
        var eve = {};
        eve[TRANSITIONEND] = onTransitionEnd;
        removeEvents(container, eve);
      }

      if (touch) {
        removeEvents(container, touchEvents);
      }

      if (mouseDrag) {
        removeEvents(container, dragEvents);
      } // cache Object values in options && reset HTML


      var htmlList = [containerHTML, controlsContainerHTML, prevButtonHTML, nextButtonHTML, navContainerHTML, autoplayButtonHTML];
      tnsList.forEach(function (item, i) {
        var el = item === 'container' ? outerWrapper : options[item];

        if (_typeof(el) === 'object') {
          var prevEl = el.previousElementSibling ? el.previousElementSibling : false,
              parentEl = el.parentNode;
          el.outerHTML = htmlList[i];
          options[item] = prevEl ? prevEl.nextElementSibling : parentEl.firstElementChild;
        }
      }); // reset variables

      tnsList = animateIn = animateOut = animateDelay = animateNormal = horizontal = outerWrapper = innerWrapper = container = containerParent = containerHTML = slideItems = slideCount = breakpointZone = windowWidth = autoWidth = fixedWidth = edgePadding = gutter = viewport = items = slideBy = viewportMax = arrowKeys = speed = rewind = loop = autoHeight = sheet = lazyload = slidePositions = slideItemsOut = cloneCount = slideCountNew = hasRightDeadZone = rightBoundary = updateIndexBeforeTransform = transformAttr = transformPrefix = transformPostfix = getIndexMax = index = indexCached = indexMin = indexMax = resizeTimer = swipeAngle = moveDirectionExpected = running = onInit = events = newContainerClasses = slideId = disable = disabled = freezable = freeze = frozen = controlsEvents = navEvents = hoverEvents = visibilityEvent = docmentKeydownEvent = touchEvents = dragEvents = hasControls = hasNav = navAsThumbnails = hasAutoplay = hasTouch = hasMouseDrag = slideActiveClass = imgCompleteClass = imgEvents = imgsComplete = controls = controlsText = controlsContainer = controlsContainerHTML = prevButton = nextButton = prevIsButton = nextIsButton = nav = navContainer = navContainerHTML = navItems = pages = pagesCached = navClicked = navCurrentIndex = navCurrentIndexCached = navActiveClass = navStr = navStrCurrent = autoplay = autoplayTimeout = autoplayDirection = autoplayText = autoplayHoverPause = autoplayButton = autoplayButtonHTML = autoplayResetOnVisibility = autoplayHtmlStrings = autoplayTimer = animating = autoplayHoverPaused = autoplayUserPaused = autoplayVisibilityPaused = initPosition = lastPosition = translateInit = disX = disY = panStart = rafIndex = getDist = touch = mouseDrag = null; // check variables
      // [animateIn, animateOut, animateDelay, animateNormal, horizontal, outerWrapper, innerWrapper, container, containerParent, containerHTML, slideItems, slideCount, breakpointZone, windowWidth, autoWidth, fixedWidth, edgePadding, gutter, viewport, items, slideBy, viewportMax, arrowKeys, speed, rewind, loop, autoHeight, sheet, lazyload, slidePositions, slideItemsOut, cloneCount, slideCountNew, hasRightDeadZone, rightBoundary, updateIndexBeforeTransform, transformAttr, transformPrefix, transformPostfix, getIndexMax, index, indexCached, indexMin, indexMax, resizeTimer, swipeAngle, moveDirectionExpected, running, onInit, events, newContainerClasses, slideId, disable, disabled, freezable, freeze, frozen, controlsEvents, navEvents, hoverEvents, visibilityEvent, docmentKeydownEvent, touchEvents, dragEvents, hasControls, hasNav, navAsThumbnails, hasAutoplay, hasTouch, hasMouseDrag, slideActiveClass, imgCompleteClass, imgEvents, imgsComplete, controls, controlsText, controlsContainer, controlsContainerHTML, prevButton, nextButton, prevIsButton, nextIsButton, nav, navContainer, navContainerHTML, navItems, pages, pagesCached, navClicked, navCurrentIndex, navCurrentIndexCached, navActiveClass, navStr, navStrCurrent, autoplay, autoplayTimeout, autoplayDirection, autoplayText, autoplayHoverPause, autoplayButton, autoplayButtonHTML, autoplayResetOnVisibility, autoplayHtmlStrings, autoplayTimer, animating, autoplayHoverPaused, autoplayUserPaused, autoplayVisibilityPaused, initPosition, lastPosition, translateInit, disX, disY, panStart, rafIndex, getDist, touch, mouseDrag ].forEach(function(item) { if (item !== null) { console.log(item); } });

      for (var a in this) {
        if (a !== 'rebuild') {
          this[a] = null;
        }
      }

      isOn = false;
    } // === ON RESIZE ===
    // responsive || fixedWidth || autoWidth || !horizontal


    function onResize(e) {
      raf(function () {
        resizeTasks(getEvent(e));
      });
    }

    function resizeTasks(e) {
      if (!isOn) {
        return;
      }

      if (nested === 'outer') {
        events.emit('outerResized', info(e));
      }

      windowWidth = getWindowWidth();
      var bpChanged,
          breakpointZoneTem = breakpointZone,
          needContainerTransform = false;

      if (responsive) {
        setBreakpointZone();
        bpChanged = breakpointZoneTem !== breakpointZone; // if (hasRightDeadZone) { needContainerTransform = true; } // *?

        if (bpChanged) {
          events.emit('newBreakpointStart', info(e));
        }
      }

      var indChanged,
          itemsChanged,
          itemsTem = items,
          disableTem = disable,
          freezeTem = freeze,
          arrowKeysTem = arrowKeys,
          controlsTem = controls,
          navTem = nav,
          touchTem = touch,
          mouseDragTem = mouseDrag,
          autoplayTem = autoplay,
          autoplayHoverPauseTem = autoplayHoverPause,
          autoplayResetOnVisibilityTem = autoplayResetOnVisibility,
          indexTem = index;

      if (bpChanged) {
        var fixedWidthTem = fixedWidth,
            autoHeightTem = autoHeight,
            controlsTextTem = controlsText,
            centerTem = center,
            autoplayTextTem = autoplayText;

        if (!CSSMQ) {
          var gutterTem = gutter,
              edgePaddingTem = edgePadding;
        }
      } // get option:
      // fixed width: viewport, fixedWidth, gutter => items
      // others: window width => all variables
      // all: items => slideBy


      arrowKeys = getOption('arrowKeys');
      controls = getOption('controls');
      nav = getOption('nav');
      touch = getOption('touch');
      center = getOption('center');
      mouseDrag = getOption('mouseDrag');
      autoplay = getOption('autoplay');
      autoplayHoverPause = getOption('autoplayHoverPause');
      autoplayResetOnVisibility = getOption('autoplayResetOnVisibility');

      if (bpChanged) {
        disable = getOption('disable');
        fixedWidth = getOption('fixedWidth');
        speed = getOption('speed');
        autoHeight = getOption('autoHeight');
        controlsText = getOption('controlsText');
        autoplayText = getOption('autoplayText');
        autoplayTimeout = getOption('autoplayTimeout');

        if (!CSSMQ) {
          edgePadding = getOption('edgePadding');
          gutter = getOption('gutter');
        }
      } // update options


      resetVariblesWhenDisable(disable);
      viewport = getViewportWidth(); // <= edgePadding, gutter

      if ((!horizontal || autoWidth) && !disable) {
        setSlidePositions();

        if (!horizontal) {
          updateContentWrapperHeight(); // <= setSlidePositions

          needContainerTransform = true;
        }
      }

      if (fixedWidth || autoWidth) {
        rightBoundary = getRightBoundary(); // autoWidth: <= viewport, slidePositions, gutter
        // fixedWidth: <= viewport, fixedWidth, gutter

        indexMax = getIndexMax(); // autoWidth: <= rightBoundary, slidePositions
        // fixedWidth: <= rightBoundary, fixedWidth, gutter
      }

      if (bpChanged || fixedWidth) {
        items = getOption('items');
        slideBy = getOption('slideBy');
        itemsChanged = items !== itemsTem;

        if (itemsChanged) {
          if (!fixedWidth && !autoWidth) {
            indexMax = getIndexMax();
          } // <= items
          // check index before transform in case
          // slider reach the right edge then items become bigger


          updateIndex();
        }
      }

      if (bpChanged) {
        if (disable !== disableTem) {
          if (disable) {
            disableSlider();
          } else {
            enableSlider(); // <= slidePositions, rightBoundary, indexMax
          }
        }
      }

      if (freezable && (bpChanged || fixedWidth || autoWidth)) {
        freeze = getFreeze(); // <= autoWidth: slidePositions, gutter, viewport, rightBoundary
        // <= fixedWidth: fixedWidth, gutter, rightBoundary
        // <= others: items

        if (freeze !== freezeTem) {
          if (freeze) {
            doContainerTransform(getContainerTransformValue(getStartIndex(0)));
            freezeSlider();
          } else {
            unfreezeSlider();
            needContainerTransform = true;
          }
        }
      }

      resetVariblesWhenDisable(disable || freeze); // controls, nav, touch, mouseDrag, arrowKeys, autoplay, autoplayHoverPause, autoplayResetOnVisibility

      if (!autoplay) {
        autoplayHoverPause = autoplayResetOnVisibility = false;
      }

      if (arrowKeys !== arrowKeysTem) {
        arrowKeys ? addEvents(doc, docmentKeydownEvent) : removeEvents(doc, docmentKeydownEvent);
      }

      if (controls !== controlsTem) {
        if (controls) {
          if (controlsContainer) {
            showElement(controlsContainer);
          } else {
            if (prevButton) {
              showElement(prevButton);
            }

            if (nextButton) {
              showElement(nextButton);
            }
          }
        } else {
          if (controlsContainer) {
            hideElement(controlsContainer);
          } else {
            if (prevButton) {
              hideElement(prevButton);
            }

            if (nextButton) {
              hideElement(nextButton);
            }
          }
        }
      }

      if (nav !== navTem) {
        nav ? showElement(navContainer) : hideElement(navContainer);
      }

      if (touch !== touchTem) {
        touch ? addEvents(container, touchEvents, options.preventScrollOnTouch) : removeEvents(container, touchEvents);
      }

      if (mouseDrag !== mouseDragTem) {
        mouseDrag ? addEvents(container, dragEvents) : removeEvents(container, dragEvents);
      }

      if (autoplay !== autoplayTem) {
        if (autoplay) {
          if (autoplayButton) {
            showElement(autoplayButton);
          }

          if (!animating && !autoplayUserPaused) {
            startAutoplay();
          }
        } else {
          if (autoplayButton) {
            hideElement(autoplayButton);
          }

          if (animating) {
            stopAutoplay();
          }
        }
      }

      if (autoplayHoverPause !== autoplayHoverPauseTem) {
        autoplayHoverPause ? addEvents(container, hoverEvents) : removeEvents(container, hoverEvents);
      }

      if (autoplayResetOnVisibility !== autoplayResetOnVisibilityTem) {
        autoplayResetOnVisibility ? addEvents(doc, visibilityEvent) : removeEvents(doc, visibilityEvent);
      }

      if (bpChanged) {
        if (fixedWidth !== fixedWidthTem || center !== centerTem) {
          needContainerTransform = true;
        }

        if (autoHeight !== autoHeightTem) {
          if (!autoHeight) {
            innerWrapper.style.height = '';
          }
        }

        if (controls && controlsText !== controlsTextTem) {
          prevButton.innerHTML = controlsText[0];
          nextButton.innerHTML = controlsText[1];
        }

        if (autoplayButton && autoplayText !== autoplayTextTem) {
          var i = autoplay ? 1 : 0,
              html = autoplayButton.innerHTML,
              len = html.length - autoplayTextTem[i].length;

          if (html.substring(len) === autoplayTextTem[i]) {
            autoplayButton.innerHTML = html.substring(0, len) + autoplayText[i];
          }
        }
      } else {
        if (center && (fixedWidth || autoWidth)) {
          needContainerTransform = true;
        }
      }

      if (itemsChanged || fixedWidth && !autoWidth) {
        pages = getPages();
        updateNavVisibility();
      }

      indChanged = index !== indexTem;

      if (indChanged) {
        events.emit('indexChanged', info());
        needContainerTransform = true;
      } else if (itemsChanged) {
        if (!indChanged) {
          additionalUpdates();
        }
      } else if (fixedWidth || autoWidth) {
        doLazyLoad();
        updateSlideStatus();
        updateLiveRegion();
      }

      if (itemsChanged && !carousel) {
        updateGallerySlidePositions();
      }

      if (!disable && !freeze) {
        // non-meduaqueries: IE8
        if (bpChanged && !CSSMQ) {
          // middle wrapper styles
          if (autoHeight !== autoheightTem || speed !== speedTem) {
            update_carousel_transition_duration();
          } // inner wrapper styles


          if (edgePadding !== edgePaddingTem || gutter !== gutterTem) {
            innerWrapper.style.cssText = getInnerWrapperStyles(edgePadding, gutter, fixedWidth, speed, autoHeight);
          }

          if (horizontal) {
            // container styles
            if (carousel) {
              container.style.width = getContainerWidth(fixedWidth, gutter, items);
            } // slide styles


            var str = getSlideWidthStyle(fixedWidth, gutter, items) + getSlideGutterStyle(gutter); // remove the last line and
            // add new styles

            removeCSSRule(sheet, getCssRulesLength(sheet) - 1);
            addCSSRule(sheet, '#' + slideId + ' > .tns-item', str, getCssRulesLength(sheet));
          }
        } // auto height


        if (autoHeight) {
          doAutoHeight();
        }

        if (needContainerTransform) {
          doContainerTransformSilent();
          indexCached = index;
        }
      }

      if (bpChanged) {
        events.emit('newBreakpointEnd', info(e));
      }
    } // === INITIALIZATION FUNCTIONS === //


    function getFreeze() {
      if (!fixedWidth && !autoWidth) {
        var a = center ? items - (items - 1) / 2 : items;
        return slideCount <= a;
      }

      var width = fixedWidth ? (fixedWidth + gutter) * slideCount : slidePositions[slideCount],
          vp = edgePadding ? viewport + edgePadding * 2 : viewport + gutter;

      if (center) {
        vp -= fixedWidth ? (viewport - fixedWidth) / 2 : (viewport - (slidePositions[index + 1] - slidePositions[index] - gutter)) / 2;
      }

      return width <= vp;
    }

    function setBreakpointZone() {
      breakpointZone = 0;

      for (var bp in responsive) {
        bp = parseInt(bp); // convert string to number

        if (windowWidth >= bp) {
          breakpointZone = bp;
        }
      }
    } // (slideBy, indexMin, indexMax) => index


    var updateIndex = function () {
      return loop ? carousel ? // loop + carousel
      function () {
        var leftEdge = indexMin,
            rightEdge = indexMax;
        leftEdge += slideBy;
        rightEdge -= slideBy; // adjust edges when has edge paddings
        // or fixed-width slider with extra space on the right side

        if (edgePadding) {
          leftEdge += 1;
          rightEdge -= 1;
        } else if (fixedWidth) {
          if ((viewport + gutter) % (fixedWidth + gutter)) {
            rightEdge -= 1;
          }
        }

        if (cloneCount) {
          if (index > rightEdge) {
            index -= slideCount;
          } else if (index < leftEdge) {
            index += slideCount;
          }
        }
      } : // loop + gallery
      function () {
        if (index > indexMax) {
          while (index >= indexMin + slideCount) {
            index -= slideCount;
          }
        } else if (index < indexMin) {
          while (index <= indexMax - slideCount) {
            index += slideCount;
          }
        }
      } : // non-loop
      function () {
        index = Math.max(indexMin, Math.min(indexMax, index));
      };
    }();

    function disableUI() {
      if (!autoplay && autoplayButton) {
        hideElement(autoplayButton);
      }

      if (!nav && navContainer) {
        hideElement(navContainer);
      }

      if (!controls) {
        if (controlsContainer) {
          hideElement(controlsContainer);
        } else {
          if (prevButton) {
            hideElement(prevButton);
          }

          if (nextButton) {
            hideElement(nextButton);
          }
        }
      }
    }

    function enableUI() {
      if (autoplay && autoplayButton) {
        showElement(autoplayButton);
      }

      if (nav && navContainer) {
        showElement(navContainer);
      }

      if (controls) {
        if (controlsContainer) {
          showElement(controlsContainer);
        } else {
          if (prevButton) {
            showElement(prevButton);
          }

          if (nextButton) {
            showElement(nextButton);
          }
        }
      }
    }

    function freezeSlider() {
      if (frozen) {
        return;
      } // remove edge padding from inner wrapper


      if (edgePadding) {
        innerWrapper.style.margin = '0px';
      } // add class tns-transparent to cloned slides


      if (cloneCount) {
        var str = 'tns-transparent';

        for (var i = cloneCount; i--;) {
          if (carousel) {
            addClass(slideItems[i], str);
          }

          addClass(slideItems[slideCountNew - i - 1], str);
        }
      } // update tools


      disableUI();
      frozen = true;
    }

    function unfreezeSlider() {
      if (!frozen) {
        return;
      } // restore edge padding for inner wrapper
      // for mordern browsers


      if (edgePadding && CSSMQ) {
        innerWrapper.style.margin = '';
      } // remove class tns-transparent to cloned slides


      if (cloneCount) {
        var str = 'tns-transparent';

        for (var i = cloneCount; i--;) {
          if (carousel) {
            removeClass(slideItems[i], str);
          }

          removeClass(slideItems[slideCountNew - i - 1], str);
        }
      } // update tools


      enableUI();
      frozen = false;
    }

    function disableSlider() {
      if (disabled) {
        return;
      }

      sheet.disabled = true;
      container.className = container.className.replace(newContainerClasses.substring(1), '');
      removeAttrs(container, ['style']);

      if (loop) {
        for (var j = cloneCount; j--;) {
          if (carousel) {
            hideElement(slideItems[j]);
          }

          hideElement(slideItems[slideCountNew - j - 1]);
        }
      } // vertical slider


      if (!horizontal || !carousel) {
        removeAttrs(innerWrapper, ['style']);
      } // gallery


      if (!carousel) {
        for (var i = index, l = index + slideCount; i < l; i++) {
          var item = slideItems[i];
          removeAttrs(item, ['style']);
          removeClass(item, animateIn);
          removeClass(item, animateNormal);
        }
      } // update tools


      disableUI();
      disabled = true;
    }

    function enableSlider() {
      if (!disabled) {
        return;
      }

      sheet.disabled = false;
      container.className += newContainerClasses;
      doContainerTransformSilent();

      if (loop) {
        for (var j = cloneCount; j--;) {
          if (carousel) {
            showElement(slideItems[j]);
          }

          showElement(slideItems[slideCountNew - j - 1]);
        }
      } // gallery


      if (!carousel) {
        for (var i = index, l = index + slideCount; i < l; i++) {
          var item = slideItems[i],
              classN = i < index + items ? animateIn : animateNormal;
          item.style.left = (i - index) * 100 / items + '%';
          addClass(item, classN);
        }
      } // update tools


      enableUI();
      disabled = false;
    }

    function updateLiveRegion() {
      var str = getLiveRegionStr();

      if (liveregionCurrent.innerHTML !== str) {
        liveregionCurrent.innerHTML = str;
      }
    }

    function getLiveRegionStr() {
      var arr = getVisibleSlideRange(),
          start = arr[0] + 1,
          end = arr[1] + 1;
      return start === end ? start + '' : start + ' to ' + end;
    }

    function getVisibleSlideRange(val) {
      if (val == null) {
        val = getContainerTransformValue();
      }

      var start = index,
          end,
          rangestart,
          rangeend; // get range start, range end for autoWidth and fixedWidth

      if (center || edgePadding) {
        if (autoWidth || fixedWidth) {
          rangestart = -(parseFloat(val) + edgePadding);
          rangeend = rangestart + viewport + edgePadding * 2;
        }
      } else {
        if (autoWidth) {
          rangestart = slidePositions[index];
          rangeend = rangestart + viewport;
        }
      } // get start, end
      // - check auto width


      if (autoWidth) {
        slidePositions.forEach(function (point, i) {
          if (i < slideCountNew) {
            if ((center || edgePadding) && point <= rangestart + 0.5) {
              start = i;
            }

            if (rangeend - point >= 0.5) {
              end = i;
            }
          }
        }); // - check percentage width, fixed width
      } else {
        if (fixedWidth) {
          var cell = fixedWidth + gutter;

          if (center || edgePadding) {
            start = Math.floor(rangestart / cell);
            end = Math.ceil(rangeend / cell - 1);
          } else {
            end = start + Math.ceil(viewport / cell) - 1;
          }
        } else {
          if (center || edgePadding) {
            var a = items - 1;

            if (center) {
              start -= a / 2;
              end = index + a / 2;
            } else {
              end = index + a;
            }

            if (edgePadding) {
              var b = edgePadding * items / viewport;
              start -= b;
              end += b;
            }

            start = Math.floor(start);
            end = Math.ceil(end);
          } else {
            end = start + items - 1;
          }
        }

        start = Math.max(start, 0);
        end = Math.min(end, slideCountNew - 1);
      }

      return [start, end];
    }

    function doLazyLoad() {
      if (lazyload && !disable) {
        getImageArray.apply(null, getVisibleSlideRange()).forEach(function (img) {
          if (!hasClass(img, imgCompleteClass)) {
            // stop propagation transitionend event to container
            var eve = {};

            eve[TRANSITIONEND] = function (e) {
              e.stopPropagation();
            };

            addEvents(img, eve);
            addEvents(img, imgEvents); // update src

            img.src = getAttr(img, 'data-src'); // update srcset

            var srcset = getAttr(img, 'data-srcset');

            if (srcset) {
              img.srcset = srcset;
            }

            addClass(img, 'loading');
          }
        });
      }
    }

    function onImgLoaded(e) {
      imgLoaded(getTarget(e));
    }

    function onImgFailed(e) {
      imgFailed(getTarget(e));
    }

    function imgLoaded(img) {
      addClass(img, 'loaded');
      imgCompleted(img);
    }

    function imgFailed(img) {
      addClass(img, 'failed');
      imgCompleted(img);
    }

    function imgCompleted(img) {
      addClass(img, 'tns-complete');
      removeClass(img, 'loading');
      removeEvents(img, imgEvents);
    }

    function getImageArray(start, end) {
      var imgs = [];

      while (start <= end) {
        forEach(slideItems[start].querySelectorAll('img'), function (img) {
          imgs.push(img);
        });
        start++;
      }

      return imgs;
    } // check if all visible images are loaded
    // and update container height if it's done


    function doAutoHeight() {
      var imgs = getImageArray.apply(null, getVisibleSlideRange());
      raf(function () {
        imgsLoadedCheck(imgs, updateInnerWrapperHeight);
      });
    }

    function imgsLoadedCheck(imgs, cb) {
      // directly execute callback function if all images are complete
      if (imgsComplete) {
        return cb();
      } // check selected image classes otherwise


      imgs.forEach(function (img, index) {
        if (hasClass(img, imgCompleteClass)) {
          imgs.splice(index, 1);
        }
      }); // execute callback function if selected images are all complete

      if (!imgs.length) {
        return cb();
      } // otherwise execute this functiona again


      raf(function () {
        imgsLoadedCheck(imgs, cb);
      });
    }

    function additionalUpdates() {
      doLazyLoad();
      updateSlideStatus();
      updateLiveRegion();
      updateControlsStatus();
      updateNavStatus();
    }

    function update_carousel_transition_duration() {
      if (carousel && autoHeight) {
        middleWrapper.style[TRANSITIONDURATION] = speed / 1000 + 's';
      }
    }

    function getMaxSlideHeight(slideStart, slideRange) {
      var heights = [];

      for (var i = slideStart, l = Math.min(slideStart + slideRange, slideCountNew); i < l; i++) {
        heights.push(slideItems[i].offsetHeight);
      }

      return Math.max.apply(null, heights);
    } // update inner wrapper height
    // 1. get the max-height of the visible slides
    // 2. set transitionDuration to speed
    // 3. update inner wrapper height to max-height
    // 4. set transitionDuration to 0s after transition done


    function updateInnerWrapperHeight() {
      var maxHeight = autoHeight ? getMaxSlideHeight(index, items) : getMaxSlideHeight(cloneCount, slideCount),
          wp = middleWrapper ? middleWrapper : innerWrapper;

      if (wp.style.height !== maxHeight) {
        wp.style.height = maxHeight + 'px';
      }
    } // get the distance from the top edge of the first slide to each slide
    // (init) => slidePositions


    function setSlidePositions() {
      slidePositions = [0];
      var attr = horizontal ? 'left' : 'top',
          attr2 = horizontal ? 'right' : 'bottom',
          base = slideItems[0].getBoundingClientRect()[attr];
      forEach(slideItems, function (item, i) {
        // skip the first slide
        if (i) {
          slidePositions.push(item.getBoundingClientRect()[attr] - base);
        } // add the end edge


        if (i === slideCountNew - 1) {
          slidePositions.push(item.getBoundingClientRect()[attr2] - base);
        }
      });
    } // update slide


    function updateSlideStatus() {
      var range = getVisibleSlideRange(),
          start = range[0],
          end = range[1];
      forEach(slideItems, function (item, i) {
        // show slides
        if (i >= start && i <= end) {
          if (hasAttr(item, 'aria-hidden')) {
            removeAttrs(item, ['aria-hidden', 'tabindex']);
            addClass(item, slideActiveClass);
          } // hide slides

        } else {
          if (!hasAttr(item, 'aria-hidden')) {
            setAttrs(item, {
              'aria-hidden': 'true',
              tabindex: '-1'
            });
            removeClass(item, slideActiveClass);
          }
        }
      });
    } // gallery: update slide position


    function updateGallerySlidePositions() {
      var l = index + Math.min(slideCount, items);

      for (var i = slideCountNew; i--;) {
        var item = slideItems[i];

        if (i >= index && i < l) {
          // add transitions to visible slides when adjusting their positions
          addClass(item, 'tns-moving');
          item.style.left = (i - index) * 100 / items + '%';
          addClass(item, animateIn);
          removeClass(item, animateNormal);
        } else if (item.style.left) {
          item.style.left = '';
          addClass(item, animateNormal);
          removeClass(item, animateIn);
        } // remove outlet animation


        removeClass(item, animateOut);
      } // removing '.tns-moving'


      setTimeout(function () {
        forEach(slideItems, function (el) {
          removeClass(el, 'tns-moving');
        });
      }, 300);
    } // set tabindex on Nav


    function updateNavStatus() {
      // get current nav
      if (nav) {
        navCurrentIndex = navClicked >= 0 ? navClicked : getCurrentNavIndex();
        navClicked = -1;

        if (navCurrentIndex !== navCurrentIndexCached) {
          var navPrev = navItems[navCurrentIndexCached],
              navCurrent = navItems[navCurrentIndex];
          setAttrs(navPrev, {
            tabindex: '-1',
            'aria-label': navStr + (navCurrentIndexCached + 1)
          });
          removeClass(navPrev, navActiveClass);
          setAttrs(navCurrent, {
            'aria-label': navStr + (navCurrentIndex + 1) + navStrCurrent
          });
          removeAttrs(navCurrent, 'tabindex');
          addClass(navCurrent, navActiveClass);
          navCurrentIndexCached = navCurrentIndex;
        }
      }
    }

    function getLowerCaseNodeName(el) {
      return el.nodeName.toLowerCase();
    }

    function isButton(el) {
      return getLowerCaseNodeName(el) === 'button';
    }

    function isAriaDisabled(el) {
      return el.getAttribute('aria-disabled') === 'true';
    }

    function disEnableElement(isButton, el, val) {
      if (isButton) {
        el.disabled = val;
      } else {
        el.setAttribute('aria-disabled', val.toString());
      }
    } // set 'disabled' to true on controls when reach the edges


    function updateControlsStatus() {
      if (!controls || rewind || loop) {
        return;
      }

      var prevDisabled = prevIsButton ? prevButton.disabled : isAriaDisabled(prevButton),
          nextDisabled = nextIsButton ? nextButton.disabled : isAriaDisabled(nextButton),
          disablePrev = index <= indexMin ? true : false,
          disableNext = !rewind && index >= indexMax ? true : false;

      if (disablePrev && !prevDisabled) {
        disEnableElement(prevIsButton, prevButton, true);
      }

      if (!disablePrev && prevDisabled) {
        disEnableElement(prevIsButton, prevButton, false);
      }

      if (disableNext && !nextDisabled) {
        disEnableElement(nextIsButton, nextButton, true);
      }

      if (!disableNext && nextDisabled) {
        disEnableElement(nextIsButton, nextButton, false);
      }
    } // set duration


    function resetDuration(el, str) {
      if (TRANSITIONDURATION) {
        el.style[TRANSITIONDURATION] = str;
      }
    }

    function getSliderWidth() {
      return fixedWidth ? (fixedWidth + gutter) * slideCountNew : slidePositions[slideCountNew];
    }

    function getCenterGap(num) {
      if (num == null) {
        num = index;
      }

      var gap = edgePadding ? gutter : 0;
      return autoWidth ? (viewport - gap - (slidePositions[num + 1] - slidePositions[num] - gutter)) / 2 : fixedWidth ? (viewport - fixedWidth) / 2 : (items - 1) / 2;
    }

    function getRightBoundary() {
      var gap = edgePadding ? gutter : 0,
          result = viewport + gap - getSliderWidth();

      if (center && !loop) {
        result = fixedWidth ? -(fixedWidth + gutter) * (slideCountNew - 1) - getCenterGap() : getCenterGap(slideCountNew - 1) - slidePositions[slideCountNew - 1];
      }

      if (result > 0) {
        result = 0;
      }

      return result;
    }

    function getContainerTransformValue(num) {
      if (num == null) {
        num = index;
      }

      var val;

      if (horizontal && !autoWidth) {
        if (fixedWidth) {
          val = -(fixedWidth + gutter) * num;

          if (center) {
            val += getCenterGap();
          }
        } else {
          var denominator = TRANSFORM ? slideCountNew : items;

          if (center) {
            num -= getCenterGap();
          }

          val = -num * 100 / denominator;
        }
      } else {
        val = -slidePositions[num];

        if (center && autoWidth) {
          val += getCenterGap();
        }
      }

      if (hasRightDeadZone) {
        val = Math.max(val, rightBoundary);
      }

      val += horizontal && !autoWidth && !fixedWidth ? '%' : 'px';
      return val;
    }

    function doContainerTransformSilent(val) {
      resetDuration(container, '0s');
      doContainerTransform(val);
    }

    function doContainerTransform(val) {
      if (val == null) {
        val = getContainerTransformValue();
      }

      container.style[transformAttr] = transformPrefix + val + transformPostfix;
    }

    function animateSlide(number, classOut, classIn, isOut) {
      var l = number + items;

      if (!loop) {
        l = Math.min(l, slideCountNew);
      }

      for (var i = number; i < l; i++) {
        var item = slideItems[i]; // set item positions

        if (!isOut) {
          item.style.left = (i - index) * 100 / items + '%';
        }

        if (animateDelay && TRANSITIONDELAY) {
          item.style[TRANSITIONDELAY] = item.style[ANIMATIONDELAY] = animateDelay * (i - number) / 1000 + 's';
        }

        removeClass(item, classOut);
        addClass(item, classIn);

        if (isOut) {
          slideItemsOut.push(item);
        }
      }
    } // make transfer after click/drag:
    // 1. change 'transform' property for mordern browsers
    // 2. change 'left' property for legacy browsers


    var transformCore = function () {
      return carousel ? function () {
        resetDuration(container, '');

        if (TRANSITIONDURATION || !speed) {
          // for morden browsers with non-zero duration or
          // zero duration for all browsers
          doContainerTransform(); // run fallback function manually
          // when duration is 0 / container is hidden

          if (!speed || !isVisible(container)) {
            onTransitionEnd();
          }
        } else {
          // for old browser with non-zero duration
          jsTransform(container, transformAttr, transformPrefix, transformPostfix, getContainerTransformValue(), speed, onTransitionEnd);
        }

        if (!horizontal) {
          updateContentWrapperHeight();
        }
      } : function () {
        slideItemsOut = [];
        var eve = {};
        eve[TRANSITIONEND] = eve[ANIMATIONEND] = onTransitionEnd;
        removeEvents(slideItems[indexCached], eve);
        addEvents(slideItems[index], eve);
        animateSlide(indexCached, animateIn, animateOut, true);
        animateSlide(index, animateNormal, animateIn); // run fallback function manually
        // when transition or animation not supported / duration is 0

        if (!TRANSITIONEND || !ANIMATIONEND || !speed || !isVisible(container)) {
          onTransitionEnd();
        }
      };
    }();

    function render(e, sliderMoved) {
      if (updateIndexBeforeTransform) {
        updateIndex();
      } // render when slider was moved (touch or drag) even though index may not change


      if (index !== indexCached || sliderMoved) {
        // events
        events.emit('indexChanged', info());
        events.emit('transitionStart', info());

        if (autoHeight) {
          doAutoHeight();
        } // pause autoplay when click or keydown from user


        if (animating && e && ['click', 'keydown'].indexOf(e.type) >= 0) {
          stopAutoplay();
        }

        running = true;
        transformCore();
      }
    }
    /*
     * Transfer prefixed properties to the same format
     * CSS: -Webkit-Transform => webkittransform
     * JS: WebkitTransform => webkittransform
     * @param {string} str - property
     *
     */


    function strTrans(str) {
      return str.toLowerCase().replace(/-/g, '');
    } // AFTER TRANSFORM
    // Things need to be done after a transfer:
    // 1. check index
    // 2. add classes to visible slide
    // 3. disable controls buttons when reach the first/last slide in non-loop slider
    // 4. update nav status
    // 5. lazyload images
    // 6. update container height


    function onTransitionEnd(event) {
      // check running on gallery mode
      // make sure trantionend/animationend events run only once
      if (carousel || running) {
        events.emit('transitionEnd', info(event));

        if (!carousel && slideItemsOut.length > 0) {
          for (var i = 0; i < slideItemsOut.length; i++) {
            var item = slideItemsOut[i]; // set item positions

            item.style.left = '';

            if (ANIMATIONDELAY && TRANSITIONDELAY) {
              item.style[ANIMATIONDELAY] = '';
              item.style[TRANSITIONDELAY] = '';
            }

            removeClass(item, animateOut);
            addClass(item, animateNormal);
          }
        }
        /* update slides, nav, controls after checking ...
         * => legacy browsers who don't support 'event'
         *    have to check event first, otherwise event.target will cause an error
         * => or 'gallery' mode:
         *   + event target is slide item
         * => or 'carousel' mode:
         *   + event target is container,
         *   + event.property is the same with transform attribute
         */


        if (!event || !carousel && event.target.parentNode === container || event.target === container && strTrans(event.propertyName) === strTrans(transformAttr)) {
          if (!updateIndexBeforeTransform) {
            var indexTem = index;
            updateIndex();

            if (index !== indexTem) {
              events.emit('indexChanged', info());
              doContainerTransformSilent();
            }
          }

          if (nested === 'inner') {
            events.emit('innerLoaded', info());
          }

          running = false;
          indexCached = index;
        }
      }
    } // # ACTIONS


    function goTo(targetIndex, e) {
      if (freeze) {
        return;
      } // prev slideBy


      if (targetIndex === 'prev') {
        onControlsClick(e, -1); // next slideBy
      } else if (targetIndex === 'next') {
        onControlsClick(e, 1); // go to exact slide
      } else {
        if (running) {
          if (preventActionWhenRunning) {
            return;
          } else {
            onTransitionEnd();
          }
        }

        var absIndex = getAbsIndex(),
            indexGap = 0;

        if (targetIndex === 'first') {
          indexGap = -absIndex;
        } else if (targetIndex === 'last') {
          indexGap = carousel ? slideCount - items - absIndex : slideCount - 1 - absIndex;
        } else {
          if (typeof targetIndex !== 'number') {
            targetIndex = parseInt(targetIndex);
          }

          if (!isNaN(targetIndex)) {
            // from directly called goTo function
            if (!e) {
              targetIndex = Math.max(0, Math.min(slideCount - 1, targetIndex));
            }

            indexGap = targetIndex - absIndex;
          }
        } // gallery: make sure new page won't overlap with current page


        if (!carousel && indexGap && Math.abs(indexGap) < items) {
          var factor = indexGap > 0 ? 1 : -1;
          indexGap += index + indexGap - slideCount >= indexMin ? slideCount * factor : slideCount * 2 * factor * -1;
        }

        index += indexGap; // make sure index is in range

        if (carousel && loop) {
          if (index < indexMin) {
            index += slideCount;
          }

          if (index > indexMax) {
            index -= slideCount;
          }
        } // if index is changed, start rendering


        if (getAbsIndex(index) !== getAbsIndex(indexCached)) {
          render(e);
        }
      }
    } // on controls click


    function onControlsClick(e, dir) {
      if (running) {
        if (preventActionWhenRunning) {
          return;
        } else {
          onTransitionEnd();
        }
      }

      var passEventObject;

      if (!dir) {
        e = getEvent(e);
        var target = getTarget(e);

        while (target !== controlsContainer && [prevButton, nextButton].indexOf(target) < 0) {
          target = target.parentNode;
        }

        var targetIn = [prevButton, nextButton].indexOf(target);

        if (targetIn >= 0) {
          passEventObject = true;
          dir = targetIn === 0 ? -1 : 1;
        }
      }

      if (rewind) {
        if (index === indexMin && dir === -1) {
          goTo('last', e);
          return;
        } else if (index === indexMax && dir === 1) {
          goTo('first', e);
          return;
        }
      }

      if (dir) {
        index += slideBy * dir;

        if (autoWidth) {
          index = Math.floor(index);
        } // pass e when click control buttons or keydown


        render(passEventObject || e && e.type === 'keydown' ? e : null);
      }
    } // on nav click


    function onNavClick(e) {
      if (running) {
        if (preventActionWhenRunning) {
          return;
        } else {
          onTransitionEnd();
        }
      }

      e = getEvent(e);
      var target = getTarget(e),
          navIndex; // find the clicked nav item

      while (target !== navContainer && !hasAttr(target, 'data-nav')) {
        target = target.parentNode;
      }

      if (hasAttr(target, 'data-nav')) {
        var navIndex = navClicked = Number(getAttr(target, 'data-nav')),
            targetIndexBase = fixedWidth || autoWidth ? navIndex * slideCount / pages : navIndex * items,
            targetIndex = navAsThumbnails ? navIndex : Math.min(Math.ceil(targetIndexBase), slideCount - 1);
        goTo(targetIndex, e);

        if (navCurrentIndex === navIndex) {
          if (animating) {
            stopAutoplay();
          }

          navClicked = -1; // reset navClicked
        }
      }
    } // autoplay functions


    function setAutoplayTimer() {
      autoplayTimer = setInterval(function () {
        onControlsClick(null, autoplayDirection);
      }, autoplayTimeout);
      animating = true;
    }

    function stopAutoplayTimer() {
      clearInterval(autoplayTimer);
      animating = false;
    }

    function updateAutoplayButton(action, txt) {
      setAttrs(autoplayButton, {
        'data-action': action
      });
      autoplayButton.innerHTML = autoplayHtmlStrings[0] + action + autoplayHtmlStrings[1] + txt;
    }

    function startAutoplay() {
      setAutoplayTimer();

      if (autoplayButton) {
        updateAutoplayButton('stop', autoplayText[1]);
      }
    }

    function stopAutoplay() {
      stopAutoplayTimer();

      if (autoplayButton) {
        updateAutoplayButton('start', autoplayText[0]);
      }
    } // programaitcally play/pause the slider


    function play() {
      if (autoplay && !animating) {
        startAutoplay();
        autoplayUserPaused = false;
      }
    }

    function pause() {
      if (animating) {
        stopAutoplay();
        autoplayUserPaused = true;
      }
    }

    function toggleAutoplay() {
      if (animating) {
        stopAutoplay();
        autoplayUserPaused = true;
      } else {
        startAutoplay();
        autoplayUserPaused = false;
      }
    }

    function onVisibilityChange() {
      if (doc.hidden) {
        if (animating) {
          stopAutoplayTimer();
          autoplayVisibilityPaused = true;
        }
      } else if (autoplayVisibilityPaused) {
        setAutoplayTimer();
        autoplayVisibilityPaused = false;
      }
    }

    function mouseoverPause() {
      if (animating) {
        stopAutoplayTimer();
        autoplayHoverPaused = true;
      }
    }

    function mouseoutRestart() {
      if (autoplayHoverPaused) {
        setAutoplayTimer();
        autoplayHoverPaused = false;
      }
    } // keydown events on document


    function onDocumentKeydown(e) {
      e = getEvent(e);
      var keyIndex = [KEYS.LEFT, KEYS.RIGHT].indexOf(e.keyCode);

      if (keyIndex >= 0) {
        onControlsClick(e, keyIndex === 0 ? -1 : 1);
      }
    } // on key control


    function onControlsKeydown(e) {
      e = getEvent(e);
      var keyIndex = [KEYS.LEFT, KEYS.RIGHT].indexOf(e.keyCode);

      if (keyIndex >= 0) {
        if (keyIndex === 0) {
          if (!prevButton.disabled) {
            onControlsClick(e, -1);
          }
        } else if (!nextButton.disabled) {
          onControlsClick(e, 1);
        }
      }
    } // set focus


    function setFocus(el) {
      el.focus();
    } // on key nav


    function onNavKeydown(e) {
      e = getEvent(e);
      var curElement = doc.activeElement;

      if (!hasAttr(curElement, 'data-nav')) {
        return;
      } // var code = e.keyCode,


      var keyIndex = [KEYS.LEFT, KEYS.RIGHT, KEYS.ENTER, KEYS.SPACE].indexOf(e.keyCode),
          navIndex = Number(getAttr(curElement, 'data-nav'));

      if (keyIndex >= 0) {
        if (keyIndex === 0) {
          if (navIndex > 0) {
            setFocus(navItems[navIndex - 1]);
          }
        } else if (keyIndex === 1) {
          if (navIndex < pages - 1) {
            setFocus(navItems[navIndex + 1]);
          }
        } else {
          navClicked = navIndex;
          goTo(navIndex, e);
        }
      }
    }

    function getEvent(e) {
      e = e || win.event;
      return isTouchEvent(e) ? e.changedTouches[0] : e;
    }

    function getTarget(e) {
      return e.target || win.event.srcElement;
    }

    function isTouchEvent(e) {
      return e.type.indexOf('touch') >= 0;
    }

    function preventDefaultBehavior(e) {
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
    }

    function getMoveDirectionExpected() {
      return getTouchDirection(toDegree(lastPosition.y - initPosition.y, lastPosition.x - initPosition.x), swipeAngle) === options.axis;
    }

    function onPanStart(e) {
      if (running) {
        if (preventActionWhenRunning) {
          return;
        } else {
          onTransitionEnd();
        }
      }

      if (autoplay && animating) {
        stopAutoplayTimer();
      }

      panStart = true;

      if (rafIndex) {
        caf(rafIndex);
        rafIndex = null;
      }

      var $ = getEvent(e);
      events.emit(isTouchEvent(e) ? 'touchStart' : 'dragStart', info(e));

      if (!isTouchEvent(e) && ['img', 'a'].indexOf(getLowerCaseNodeName(getTarget(e))) >= 0) {
        preventDefaultBehavior(e);
      }

      lastPosition.x = initPosition.x = $.clientX;
      lastPosition.y = initPosition.y = $.clientY;

      if (carousel) {
        translateInit = parseFloat(container.style[transformAttr].replace(transformPrefix, ''));
        resetDuration(container, '0s');
      }
    }

    function onPanMove(e) {
      if (panStart) {
        var $ = getEvent(e);
        lastPosition.x = $.clientX;
        lastPosition.y = $.clientY;

        if (carousel) {
          if (!rafIndex) {
            rafIndex = raf(function () {
              panUpdate(e);
            });
          }
        } else {
          if (moveDirectionExpected === '?') {
            moveDirectionExpected = getMoveDirectionExpected();
          }

          if (moveDirectionExpected) {
            preventScroll = true;
          }
        }

        if (preventScroll) {
          e.preventDefault();
        }
      }
    }

    function panUpdate(e) {
      if (!moveDirectionExpected) {
        panStart = false;
        return;
      }

      caf(rafIndex);

      if (panStart) {
        rafIndex = raf(function () {
          panUpdate(e);
        });
      }

      if (moveDirectionExpected === '?') {
        moveDirectionExpected = getMoveDirectionExpected();
      }

      if (moveDirectionExpected) {
        if (!preventScroll && isTouchEvent(e)) {
          preventScroll = true;
        }

        try {
          if (e.type) {
            events.emit(isTouchEvent(e) ? 'touchMove' : 'dragMove', info(e));
          }
        } catch (err) {}

        var x = translateInit,
            dist = getDist(lastPosition, initPosition);

        if (!horizontal || fixedWidth || autoWidth) {
          x += dist;
          x += 'px';
        } else {
          var percentageX = TRANSFORM ? dist * items * 100 / ((viewport + gutter) * slideCountNew) : dist * 100 / (viewport + gutter);
          x += percentageX;
          x += '%';
        }

        container.style[transformAttr] = transformPrefix + x + transformPostfix;
      }
    }

    function onPanEnd(e) {
      if (panStart) {
        if (rafIndex) {
          caf(rafIndex);
          rafIndex = null;
        }

        if (carousel) {
          resetDuration(container, '');
        }

        panStart = false;
        var $ = getEvent(e);
        lastPosition.x = $.clientX;
        lastPosition.y = $.clientY;
        var dist = getDist(lastPosition, initPosition);

        if (Math.abs(dist)) {
          // drag vs click
          if (!isTouchEvent(e)) {
            // prevent "click"
            var target = getTarget(e);
            addEvents(target, {
              click: function preventClick(e) {
                preventDefaultBehavior(e);
                removeEvents(target, {
                  click: preventClick
                });
              }
            });
          }

          if (carousel) {
            rafIndex = raf(function () {
              if (horizontal && !autoWidth) {
                var indexMoved = -dist * items / (viewport + gutter);
                indexMoved = dist > 0 ? Math.floor(indexMoved) : Math.ceil(indexMoved);
                index += indexMoved;
              } else {
                var moved = -(translateInit + dist);

                if (moved <= 0) {
                  index = indexMin;
                } else if (moved >= slidePositions[slideCountNew - 1]) {
                  index = indexMax;
                } else {
                  var i = 0;

                  while (i < slideCountNew && moved >= slidePositions[i]) {
                    index = i;

                    if (moved > slidePositions[i] && dist < 0) {
                      index += 1;
                    }

                    i++;
                  }
                }
              }

              render(e, dist);
              events.emit(isTouchEvent(e) ? 'touchEnd' : 'dragEnd', info(e));
            });
          } else {
            if (moveDirectionExpected) {
              onControlsClick(e, dist > 0 ? -1 : 1);
            }
          }
        }
      } // reset


      if (options.preventScrollOnTouch === 'auto') {
        preventScroll = false;
      }

      if (swipeAngle) {
        moveDirectionExpected = '?';
      }

      if (autoplay && !animating) {
        setAutoplayTimer();
      }
    } // === RESIZE FUNCTIONS === //
    // (slidePositions, index, items) => vertical_conentWrapper.height


    function updateContentWrapperHeight() {
      var wp = middleWrapper ? middleWrapper : innerWrapper;
      wp.style.height = slidePositions[index + items] - slidePositions[index] + 'px';
    }

    function getPages() {
      var rough = fixedWidth ? (fixedWidth + gutter) * slideCount / viewport : slideCount / items;
      return Math.min(Math.ceil(rough), slideCount);
    }
    /*
     * 1. update visible nav items list
     * 2. add "hidden" attributes to previous visible nav items
     * 3. remove "hidden" attrubutes to new visible nav items
     */


    function updateNavVisibility() {
      if (!nav || navAsThumbnails) {
        return;
      }

      if (pages !== pagesCached) {
        var min = pagesCached,
            max = pages,
            fn = showElement;

        if (pagesCached > pages) {
          min = pages;
          max = pagesCached;
          fn = hideElement;
        }

        while (min < max) {
          fn(navItems[min]);
          min++;
        } // cache pages


        pagesCached = pages;
      }
    }

    function info(e) {
      return {
        container: container,
        slideItems: slideItems,
        navContainer: navContainer,
        navItems: navItems,
        controlsContainer: controlsContainer,
        hasControls: hasControls,
        prevButton: prevButton,
        nextButton: nextButton,
        items: items,
        slideBy: slideBy,
        cloneCount: cloneCount,
        slideCount: slideCount,
        slideCountNew: slideCountNew,
        index: index,
        indexCached: indexCached,
        displayIndex: getCurrentSlide(),
        navCurrentIndex: navCurrentIndex,
        navCurrentIndexCached: navCurrentIndexCached,
        pages: pages,
        pagesCached: pagesCached,
        sheet: sheet,
        isOn: isOn,
        event: e || {}
      };
    }

    return {
      version: '2.9.2',
      getInfo: info,
      events: events,
      goTo: goTo,
      play: play,
      pause: pause,
      isOn: isOn,
      updateSliderHeight: updateInnerWrapperHeight,
      refresh: initSliderTransform,
      destroy: destroy,
      rebuild: function rebuild() {
        return tns(extend(options, optionsElements));
      }
    };
  };

  return tns;
}();

function itemCounter(field) {
  var fieldCount = function fieldCount(el) {
    var // Мин. значение
    min = el.data('min') || false,
        // Макс. значение
    max = el.data('max') || false,
        // Кнопка уменьшения кол-ва
    dec = el.prev('.dec'),
        // Кнопка увеличения кол-ва
    inc = el.next('.inc');

    function init(el) {
      if (!el.attr('disabled')) {
        dec.on('click', decrement);
        inc.on('click', increment);
      } // Уменьшим значение


      function decrement() {
        var value = parseInt(el[0].value);
        value--;

        if (!min || value >= min) {
          el[0].value = value;
        }
      } // Увеличим значение


      function increment() {
        var value = parseInt(el[0].value);
        value++;

        if (!max || value <= max) {
          el[0].value = value++;
        }
      }
    }

    el.each(function () {
      init($(this));
    });
  };

  $(field).each(function () {
    fieldCount($(this));
  });
}

var customSelect = function customSelect(options, cbAfter, cbChoose) {
  var elem = typeof options.elem === 'string' ? document.querySelector(options.elem) : options.elem;
  var mainClass = 'custom-dropdown',
      mainClassActive = 'custom-dropdown_active',
      buttonClass = 'custom-dropdown__button',
      buttonClass2 = 'custom-dropdown_button',
      buttonValueClass = 'custom-dropdown_button__value',
      buttonArrowClass = 'custom-dropdown_button__arrow',
      listContainerClass = 'custom-dropdown__content',
      listClass1 = 'custom-dropdown__list',
      listClass2 = 'custom-dropdown-list',
      liClass = 'custom-dropdown-list__item',
      selectedClass = 'custom-dropdown-list__item_active',
      openClass = 'custom-dropdown-list_open';
  var selectOptions = elem.querySelectorAll('option'),
      optionsLength = selectOptions.length;
  var selectContainer = document.createElement('div');
  selectContainer.className = mainClass;

  if (elem.id) {
    selectContainer.id = 'custom-dropdown-' + elem.id;
  }

  var button = document.createElement('button');
  button.classList.add(buttonClass, buttonClass2);
  var button_value = document.createElement('div');
  button_value.className = buttonValueClass;
  button_value.textContent = selectOptions[0].textContent;
  var button_arrow = document.createElement('div');
  button_arrow.className = buttonArrowClass; //button_arrow.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" viewBox="0 0 20 26"><path id="arrows_double" class="cls-1" d="M1416.98,927.02L1407.96,937,1399,927h18Zm-17.96-4.042,9.02-9.978,8.96,10h-18Z" transform="translate(-1398 -912)"/></svg>';

  button.appendChild(button_value);
  button.appendChild(button_arrow);
  var listContainer = document.createElement('div');
  listContainer.className = listContainerClass;
  var ul = document.createElement('ul');
  ul.className = listClass1;
  ul.classList.add(listClass2);

  for (var i = 0; i < optionsLength; i++) {
    var li = document.createElement('li');
    li.className = liClass;
    li.innerText = selectOptions[i].textContent;
    li.setAttribute('data-value', selectOptions[i].value);
    li.setAttribute('data-index', i);

    if (selectOptions[i].getAttribute('selected') != null) {
      li.classList.add(selectedClass);
      button_value.textContent = selectOptions[i].textContent;
    }

    ul.appendChild(li);
  }

  selectContainer.appendChild(button);
  listContainer.appendChild(ul);
  selectContainer.appendChild(listContainer);
  selectContainer.addEventListener('click', onClickSelect);
  elem.parentNode.insertBefore(selectContainer, elem);
  elem.style.display = 'none';

  if (typeof cbAfter != 'undefined') {
    cbAfter();
  }

  document.addEventListener('click', function (e) {
    if (!selectContainer.contains(e.target)) close();
  });

  function onClickSelect(e) {
    e.preventDefault();
    var t = e.target;

    if (t.className === buttonClass + ' ' + buttonClass2 || t.className === buttonValueClass) {
      toggle();
    }

    if (t.className === liClass) {
      selectContainer.querySelector('.' + buttonValueClass).innerText = t.innerText;
      elem.options.selectedIndex = t.getAttribute('data-index');
      var evt = new CustomEvent('change');
      elem.dispatchEvent(evt);

      for (var i = 0; i < optionsLength; i++) {
        ul.querySelectorAll('.' + liClass)[i].classList.remove(selectedClass);
      }

      t.classList.add(selectedClass);
      close();

      if (typeof cbChoose != 'undefined') {
        cbChoose(selectContainer, t.innerText);
      }
    }
  }

  function toggle() {
    selectContainer.classList.toggle(mainClassActive);
    ul.classList.toggle(openClass);
  }

  function open() {
    selectContainer.classList.add(mainClassActive);
    ul.classList.add(openClass);
  }

  function close() {
    selectContainer.classList.remove(mainClassActive);
    ul.classList.remove(openClass);
  }

  return {
    toggle: toggle,
    close: close,
    open: open
  };
};

function debounce(func, wait, immediate) {
  var timeout;
  return function executedFunction() {
    var context = this;
    var args = arguments;

    var later = function later() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

;
var support = {
  searchParams: 'URLSearchParams' in self,
  iterable: 'Symbol' in self && 'iterator' in Symbol,
  blob: 'FileReader' in self && 'Blob' in self && function () {
    try {
      new Blob();
      return true;
    } catch (e) {
      return false;
    }
  }(),
  formData: 'FormData' in self,
  arrayBuffer: 'ArrayBuffer' in self
};

function isDataView(obj) {
  return obj && DataView.prototype.isPrototypeOf(obj);
}

if (support.arrayBuffer) {
  var viewClasses = ['[object Int8Array]', '[object Uint8Array]', '[object Uint8ClampedArray]', '[object Int16Array]', '[object Uint16Array]', '[object Int32Array]', '[object Uint32Array]', '[object Float32Array]', '[object Float64Array]'];

  var isArrayBufferView = ArrayBuffer.isView || function (obj) {
    return obj && viewClasses.indexOf(Object.prototype.toString.call(obj)) > -1;
  };
}

function normalizeName(name) {
  if (typeof name !== 'string') {
    name = String(name);
  }

  if (/[^a-z0-9\-#$%&'*+.^_`|~]/i.test(name) || name === '') {
    throw new TypeError('Invalid character in header field name');
  }

  return name.toLowerCase();
}

function normalizeValue(value) {
  if (typeof value !== 'string') {
    value = String(value);
  }

  return value;
} // Build a destructive iterator for the value list


function iteratorFor(items) {
  var iterator = {
    next: function next() {
      var value = items.shift();
      return {
        done: value === undefined,
        value: value
      };
    }
  };

  if (support.iterable) {
    iterator[Symbol.iterator] = function () {
      return iterator;
    };
  }

  return iterator;
}

function Headers(headers) {
  this.map = {};

  if (headers instanceof Headers) {
    headers.forEach(function (value, name) {
      this.append(name, value);
    }, this);
  } else if (Array.isArray(headers)) {
    headers.forEach(function (header) {
      this.append(header[0], header[1]);
    }, this);
  } else if (headers) {
    Object.getOwnPropertyNames(headers).forEach(function (name) {
      this.append(name, headers[name]);
    }, this);
  }
}

Headers.prototype.append = function (name, value) {
  name = normalizeName(name);
  value = normalizeValue(value);
  var oldValue = this.map[name];
  this.map[name] = oldValue ? oldValue + ', ' + value : value;
};

Headers.prototype['delete'] = function (name) {
  delete this.map[normalizeName(name)];
};

Headers.prototype.get = function (name) {
  name = normalizeName(name);
  return this.has(name) ? this.map[name] : null;
};

Headers.prototype.has = function (name) {
  return this.map.hasOwnProperty(normalizeName(name));
};

Headers.prototype.set = function (name, value) {
  this.map[normalizeName(name)] = normalizeValue(value);
};

Headers.prototype.forEach = function (callback, thisArg) {
  for (var name in this.map) {
    if (this.map.hasOwnProperty(name)) {
      callback.call(thisArg, this.map[name], name, this);
    }
  }
};

Headers.prototype.keys = function () {
  var items = [];
  this.forEach(function (value, name) {
    items.push(name);
  });
  return iteratorFor(items);
};

Headers.prototype.values = function () {
  var items = [];
  this.forEach(function (value) {
    items.push(value);
  });
  return iteratorFor(items);
};

Headers.prototype.entries = function () {
  var items = [];
  this.forEach(function (value, name) {
    items.push([name, value]);
  });
  return iteratorFor(items);
};

if (support.iterable) {
  Headers.prototype[Symbol.iterator] = Headers.prototype.entries;
}

function consumed(body) {
  if (body.bodyUsed) {
    return Promise.reject(new TypeError('Already read'));
  }

  body.bodyUsed = true;
}

function fileReaderReady(reader) {
  return new Promise(function (resolve, reject) {
    reader.onload = function () {
      resolve(reader.result);
    };

    reader.onerror = function () {
      reject(reader.error);
    };
  });
}

function readBlobAsArrayBuffer(blob) {
  var reader = new FileReader();
  var promise = fileReaderReady(reader);
  reader.readAsArrayBuffer(blob);
  return promise;
}

function readBlobAsText(blob) {
  var reader = new FileReader();
  var promise = fileReaderReady(reader);
  reader.readAsText(blob);
  return promise;
}

function readArrayBufferAsText(buf) {
  var view = new Uint8Array(buf);
  var chars = new Array(view.length);

  for (var i = 0; i < view.length; i++) {
    chars[i] = String.fromCharCode(view[i]);
  }

  return chars.join('');
}

function bufferClone(buf) {
  if (buf.slice) {
    return buf.slice(0);
  } else {
    var view = new Uint8Array(buf.byteLength);
    view.set(new Uint8Array(buf));
    return view.buffer;
  }
}

function Body() {
  this.bodyUsed = false;

  this._initBody = function (body) {
    this._bodyInit = body;

    if (!body) {
      this._bodyText = '';
    } else if (typeof body === 'string') {
      this._bodyText = body;
    } else if (support.blob && Blob.prototype.isPrototypeOf(body)) {
      this._bodyBlob = body;
    } else if (support.formData && FormData.prototype.isPrototypeOf(body)) {
      this._bodyFormData = body;
    } else if (support.searchParams && URLSearchParams.prototype.isPrototypeOf(body)) {
      this._bodyText = body.toString();
    } else if (support.arrayBuffer && support.blob && isDataView(body)) {
      this._bodyArrayBuffer = bufferClone(body.buffer); // IE 10-11 can't handle a DataView body.

      this._bodyInit = new Blob([this._bodyArrayBuffer]);
    } else if (support.arrayBuffer && (ArrayBuffer.prototype.isPrototypeOf(body) || isArrayBufferView(body))) {
      this._bodyArrayBuffer = bufferClone(body);
    } else {
      this._bodyText = body = Object.prototype.toString.call(body);
    }

    if (!this.headers.get('content-type')) {
      if (typeof body === 'string') {
        this.headers.set('content-type', 'text/plain;charset=UTF-8');
      } else if (this._bodyBlob && this._bodyBlob.type) {
        this.headers.set('content-type', this._bodyBlob.type);
      } else if (support.searchParams && URLSearchParams.prototype.isPrototypeOf(body)) {
        this.headers.set('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
      }
    }
  };

  if (support.blob) {
    this.blob = function () {
      var rejected = consumed(this);

      if (rejected) {
        return rejected;
      }

      if (this._bodyBlob) {
        return Promise.resolve(this._bodyBlob);
      } else if (this._bodyArrayBuffer) {
        return Promise.resolve(new Blob([this._bodyArrayBuffer]));
      } else if (this._bodyFormData) {
        throw new Error('could not read FormData body as blob');
      } else {
        return Promise.resolve(new Blob([this._bodyText]));
      }
    };

    this.arrayBuffer = function () {
      if (this._bodyArrayBuffer) {
        return consumed(this) || Promise.resolve(this._bodyArrayBuffer);
      } else {
        return this.blob().then(readBlobAsArrayBuffer);
      }
    };
  }

  this.text = function () {
    var rejected = consumed(this);

    if (rejected) {
      return rejected;
    }

    if (this._bodyBlob) {
      return readBlobAsText(this._bodyBlob);
    } else if (this._bodyArrayBuffer) {
      return Promise.resolve(readArrayBufferAsText(this._bodyArrayBuffer));
    } else if (this._bodyFormData) {
      throw new Error('could not read FormData body as text');
    } else {
      return Promise.resolve(this._bodyText);
    }
  };

  if (support.formData) {
    this.formData = function () {
      return this.text().then(decode);
    };
  }

  this.json = function () {
    return this.text().then(JSON.parse);
  };

  return this;
} // HTTP methods whose capitalization should be normalized


var methods = ['DELETE', 'GET', 'HEAD', 'OPTIONS', 'POST', 'PUT'];

function normalizeMethod(method) {
  var upcased = method.toUpperCase();
  return methods.indexOf(upcased) > -1 ? upcased : method;
}

function Request(input, options) {
  options = options || {};
  var body = options.body;

  if (input instanceof Request) {
    if (input.bodyUsed) {
      throw new TypeError('Already read');
    }

    this.url = input.url;
    this.credentials = input.credentials;

    if (!options.headers) {
      this.headers = new Headers(input.headers);
    }

    this.method = input.method;
    this.mode = input.mode;
    this.signal = input.signal;

    if (!body && input._bodyInit != null) {
      body = input._bodyInit;
      input.bodyUsed = true;
    }
  } else {
    this.url = String(input);
  }

  this.credentials = options.credentials || this.credentials || 'same-origin';

  if (options.headers || !this.headers) {
    this.headers = new Headers(options.headers);
  }

  this.method = normalizeMethod(options.method || this.method || 'GET');
  this.mode = options.mode || this.mode || null;
  this.signal = options.signal || this.signal;
  this.referrer = null;

  if ((this.method === 'GET' || this.method === 'HEAD') && body) {
    throw new TypeError('Body not allowed for GET or HEAD requests');
  }

  this._initBody(body);
}

Request.prototype.clone = function () {
  return new Request(this, {
    body: this._bodyInit
  });
};

function decode(body) {
  var form = new FormData();
  body.trim().split('&').forEach(function (bytes) {
    if (bytes) {
      var split = bytes.split('=');
      var name = split.shift().replace(/\+/g, ' ');
      var value = split.join('=').replace(/\+/g, ' ');
      form.append(decodeURIComponent(name), decodeURIComponent(value));
    }
  });
  return form;
}

function parseHeaders(rawHeaders) {
  var headers = new Headers(); // Replace instances of \r\n and \n followed by at least one space or horizontal tab with a space
  // https://tools.ietf.org/html/rfc7230#section-3.2

  var preProcessedHeaders = rawHeaders.replace(/\r?\n[\t ]+/g, ' ');
  preProcessedHeaders.split(/\r?\n/).forEach(function (line) {
    var parts = line.split(':');
    var key = parts.shift().trim();

    if (key) {
      var value = parts.join(':').trim();
      headers.append(key, value);
    }
  });
  return headers;
}

Body.call(Request.prototype);

function Response(bodyInit, options) {
  if (!options) {
    options = {};
  }

  this.type = 'default';
  this.status = options.status === undefined ? 200 : options.status;
  this.ok = this.status >= 200 && this.status < 300;
  this.statusText = 'statusText' in options ? options.statusText : 'OK';
  this.headers = new Headers(options.headers);
  this.url = options.url || '';

  this._initBody(bodyInit);
}

Body.call(Response.prototype);

Response.prototype.clone = function () {
  return new Response(this._bodyInit, {
    status: this.status,
    statusText: this.statusText,
    headers: new Headers(this.headers),
    url: this.url
  });
};

Response.error = function () {
  var response = new Response(null, {
    status: 0,
    statusText: ''
  });
  response.type = 'error';
  return response;
};

var redirectStatuses = [301, 302, 303, 307, 308];

Response.redirect = function (url, status) {
  if (redirectStatuses.indexOf(status) === -1) {
    throw new RangeError('Invalid status code');
  }

  return new Response(null, {
    status: status,
    headers: {
      location: url
    }
  });
};

var DOMException = self.DOMException;

try {
  new DOMException();
} catch (err) {
  DOMException = function DOMException(message, name) {
    this.message = message;
    this.name = name;
    var error = Error(message);
    this.stack = error.stack;
  };

  DOMException.prototype = Object.create(Error.prototype);
  DOMException.prototype.constructor = DOMException;
}

function fetch$1(input, init) {
  return new Promise(function (resolve, reject) {
    var request = new Request(input, init);

    if (request.signal && request.signal.aborted) {
      return reject(new DOMException('Aborted', 'AbortError'));
    }

    var xhr = new XMLHttpRequest();

    function abortXhr() {
      xhr.abort();
    }

    xhr.onload = function () {
      var options = {
        status: xhr.status,
        statusText: xhr.statusText,
        headers: parseHeaders(xhr.getAllResponseHeaders() || '')
      };
      options.url = 'responseURL' in xhr ? xhr.responseURL : options.headers.get('X-Request-URL');
      var body = 'response' in xhr ? xhr.response : xhr.responseText;
      resolve(new Response(body, options));
    };

    xhr.onerror = function () {
      reject(new TypeError('Network request failed'));
    };

    xhr.ontimeout = function () {
      reject(new TypeError('Network request failed'));
    };

    xhr.onabort = function () {
      reject(new DOMException('Aborted', 'AbortError'));
    };

    xhr.open(request.method, request.url, true);

    if (request.credentials === 'include') {
      xhr.withCredentials = true;
    } else if (request.credentials === 'omit') {
      xhr.withCredentials = false;
    }

    if ('responseType' in xhr && support.blob) {
      xhr.responseType = 'blob';
    }

    request.headers.forEach(function (value, name) {
      xhr.setRequestHeader(name, value);
    });

    if (request.signal) {
      request.signal.addEventListener('abort', abortXhr);

      xhr.onreadystatechange = function () {
        // DONE (success or failure)
        if (xhr.readyState === 4) {
          request.signal.removeEventListener('abort', abortXhr);
        }
      };
    }

    xhr.send(typeof request._bodyInit === 'undefined' ? null : request._bodyInit);
  });
}

fetch$1.polyfill = true;

if (!self.fetch) {
  self.fetch = fetch$1;
  self.Headers = Headers;
  self.Request = Request;
  self.Response = Response;
}

var version = '1.0';

var MicroModal = function () {
  'use strict';

  var FOCUSABLE_ELEMENTS = ['a[href]', 'area[href]', 'input:not([disabled]):not([type="hidden"]):not([aria-hidden])', 'select:not([disabled]):not([aria-hidden])', 'textarea:not([disabled]):not([aria-hidden])', 'button:not([disabled]):not([aria-hidden])', 'iframe', 'object', 'embed', '[contenteditable]', '[tabindex]:not([tabindex^="-"])'];

  var Modal =
  /*#__PURE__*/
  function () {
    function Modal(_ref) {
      var targetModal = _ref.targetModal,
          _ref$triggers = _ref.triggers,
          triggers = _ref$triggers === void 0 ? [] : _ref$triggers,
          _ref$onShow = _ref.onShow,
          onShow = _ref$onShow === void 0 ? function () {} : _ref$onShow,
          _ref$onClose = _ref.onClose,
          onClose = _ref$onClose === void 0 ? function () {} : _ref$onClose,
          _ref$openTrigger = _ref.openTrigger,
          openTrigger = _ref$openTrigger === void 0 ? 'data-micromodal-trigger' : _ref$openTrigger,
          _ref$closeTrigger = _ref.closeTrigger,
          closeTrigger = _ref$closeTrigger === void 0 ? 'data-micromodal-close' : _ref$closeTrigger,
          _ref$disableScroll = _ref.disableScroll,
          disableScroll = _ref$disableScroll === void 0 ? false : _ref$disableScroll,
          _ref$disableFocus = _ref.disableFocus,
          disableFocus = _ref$disableFocus === void 0 ? false : _ref$disableFocus,
          _ref$awaitCloseAnimat = _ref.awaitCloseAnimation,
          awaitCloseAnimation = _ref$awaitCloseAnimat === void 0 ? false : _ref$awaitCloseAnimat,
          _ref$debugMode = _ref.debugMode,
          debugMode = _ref$debugMode === void 0 ? false : _ref$debugMode;

      _classCallCheck(this, Modal);

      // Save a reference of the modal
      this.modal = document.getElementById(targetModal); // Save a reference to the passed config

      this.config = {
        debugMode: debugMode,
        disableScroll: disableScroll,
        openTrigger: openTrigger,
        closeTrigger: closeTrigger,
        onShow: onShow,
        onClose: onClose,
        awaitCloseAnimation: awaitCloseAnimation,
        disableFocus: disableFocus
      }; // Register click events only if prebinding eventListeners

      if (triggers.length > 0) this.registerTriggers.apply(this, _toConsumableArray2(triggers)); // prebind functions for event listeners

      this.onClick = this.onClick.bind(this);
      this.onKeydown = this.onKeydown.bind(this);
    }
    /**
       * Loops through all openTriggers and binds click event
       * @param  {array} triggers [Array of node elements]
       * @return {void}
       */


    _createClass(Modal, [{
      key: "registerTriggers",
      value: function registerTriggers() {
        var _this = this;

        for (var _len2 = arguments.length, triggers = new Array(_len2), _key = 0; _key < _len2; _key++) {
          triggers[_key] = arguments[_key];
        }

        triggers.filter(Boolean).forEach(function (trigger) {
          trigger.addEventListener('click', function () {
            return _this.showModal();
          });
        });
      }
    }, {
      key: "showModal",
      value: function showModal() {
        this.activeElement = document.activeElement;
        this.modal.setAttribute('aria-hidden', 'false');
        this.modal.classList.add('is-open');
        this.setFocusToFirstNode();
        this.scrollBehaviour('disable');
        this.addEventListeners();
        this.config.onShow(this.modal);
      }
    }, {
      key: "closeModal",
      value: function closeModal() {
        var modal = this.modal;
        this.modal.setAttribute('aria-hidden', 'true');
        this.removeEventListeners();
        this.scrollBehaviour('enable');

        if (this.activeElement) {
          this.activeElement.focus();
        }

        this.config.onClose(this.modal);

        if (this.config.awaitCloseAnimation) {
          this.modal.addEventListener('animationend', function handler() {
            modal.classList.remove('is-open');
            modal.removeEventListener('animationend', handler, false);
          }, false);
        } else {
          modal.classList.remove('is-open');
        }
      }
    }, {
      key: "closeModalById",
      value: function closeModalById(targetModal) {
        this.modal = document.getElementById(targetModal);
        if (this.modal) this.closeModal();
      }
    }, {
      key: "scrollBehaviour",
      value: function scrollBehaviour(toggle) {
        if (!this.config.disableScroll) return;
        var body = document.querySelector('body');

        switch (toggle) {
          case 'enable':
            Object.assign(body.style, {
              overflow: '',
              height: ''
            });
            break;

          case 'disable':
            Object.assign(body.style, {
              overflow: 'hidden',
              height: '100vh'
            });
            break;

          default:
        }
      }
    }, {
      key: "addEventListeners",
      value: function addEventListeners() {
        this.modal.addEventListener('touchstart', this.onClick);
        this.modal.addEventListener('click', this.onClick);
        document.addEventListener('keydown', this.onKeydown);
      }
    }, {
      key: "removeEventListeners",
      value: function removeEventListeners() {
        this.modal.removeEventListener('touchstart', this.onClick);
        this.modal.removeEventListener('click', this.onClick);
        document.removeEventListener('keydown', this.onKeydown);
      }
    }, {
      key: "onClick",
      value: function onClick(event) {
        if (event.target.hasAttribute(this.config.closeTrigger)) {
          this.closeModal();
          event.preventDefault();
        }
      }
    }, {
      key: "onKeydown",
      value: function onKeydown(event) {
        if (event.keyCode === 27) this.closeModal(event);
        if (event.keyCode === 9) this.maintainFocus(event);
      }
    }, {
      key: "getFocusableNodes",
      value: function getFocusableNodes() {
        var nodes = this.modal.querySelectorAll(FOCUSABLE_ELEMENTS);
        return Array.apply(void 0, _toConsumableArray2(nodes));
      }
    }, {
      key: "setFocusToFirstNode",
      value: function setFocusToFirstNode() {
        if (this.config.disableFocus) return;
        var focusableNodes = this.getFocusableNodes();
        if (focusableNodes.length) focusableNodes[0].focus();
      }
    }, {
      key: "maintainFocus",
      value: function maintainFocus(event) {
        var focusableNodes = this.getFocusableNodes(); // if disableFocus is true

        if (!this.modal.contains(document.activeElement)) {
          focusableNodes[0].focus();
        } else {
          var focusedItemIndex = focusableNodes.indexOf(document.activeElement);

          if (event.shiftKey && focusedItemIndex === 0) {
            focusableNodes[focusableNodes.length - 1].focus();
            event.preventDefault();
          }

          if (!event.shiftKey && focusedItemIndex === focusableNodes.length - 1) {
            focusableNodes[0].focus();
            event.preventDefault();
          }
        }
      }
    }]);

    return Modal;
  }();
  /**
    * Modal prototype ends.
    * Here on code is reposible for detecting and
    * autobinding event handlers on modal triggers
    */
  // Keep a reference to the opened modal


  var activeModal = null;
  /**
    * Generates an associative array of modals and it's
    * respective triggers
    * @param  {array} triggers     An array of all triggers
    * @param  {string} triggerAttr The data-attribute which triggers the module
    * @return {array}
    */

  var generateTriggerMap = function generateTriggerMap(triggers, triggerAttr) {
    var triggerMap = [];
    triggers.forEach(function (trigger) {
      var targetModal = trigger.attributes[triggerAttr].value;
      if (triggerMap[targetModal] === undefined) triggerMap[targetModal] = [];
      triggerMap[targetModal].push(trigger);
    });
    return triggerMap;
  };
  /**
    * Validates whether a modal of the given id exists
    * in the DOM
    * @param  {number} id  The id of the modal
    * @return {boolean}
    */


  var validateModalPresence = function validateModalPresence(id) {
    if (!document.getElementById(id)) {
      console.warn("MicroModal v".concat(version, ": \u2757Seems like you have missed %c'").concat(id, "'"), 'background-color: #f8f9fa;color: #50596c;font-weight: bold;', 'ID somewhere in your code. Refer example below to resolve it.');
      console.warn('%cExample:', 'background-color: #f8f9fa;color: #50596c;font-weight: bold;', "<div class=\"modal\" id=\"".concat(id, "\"></div>"));
      return false;
    }
  };
  /**
    * Validates if there are modal triggers present
    * in the DOM
    * @param  {array} triggers An array of data-triggers
    * @return {boolean}
    */


  var validateTriggerPresence = function validateTriggerPresence(triggers) {
    if (triggers.length <= 0) {
      console.warn("MicroModal v".concat(version, ": \u2757Please specify at least one %c'micromodal-trigger'"), 'background-color: #f8f9fa;color: #50596c;font-weight: bold;', 'data attribute.');
      console.warn('%cExample:', 'background-color: #f8f9fa;color: #50596c;font-weight: bold;', '<a href="#" data-micromodal-trigger="my-modal"></a>');
      return false;
    }
  };
  /**
    * Checks if triggers and their corresponding modals
    * are present in the DOM
    * @param  {array} triggers   Array of DOM nodes which have data-triggers
    * @param  {array} triggerMap Associative array of modals and thier triggers
    * @return {boolean}
    */


  var validateArgs = function validateArgs(triggers, triggerMap) {
    validateTriggerPresence(triggers);
    if (!triggerMap) return true;

    for (var id in triggerMap) {
      validateModalPresence(id);
    }

    return true;
  };
  /**
    * Binds click handlers to all modal triggers
    * @param  {object} config [description]
    * @return void
    */


  var init = function init(config) {
    // Create an config object with default openTrigger
    var options = Object.assign({}, {
      openTrigger: 'data-micromodal-trigger'
    }, config); // Collects all the nodes with the trigger

    var triggers = _toConsumableArray2(document.querySelectorAll("[".concat(options.openTrigger, "]"))); // Makes a mappings of modals with their trigger nodes


    var triggerMap = generateTriggerMap(triggers, options.openTrigger); // Checks if modals and triggers exist in dom

    if (options.debugMode === true && validateArgs(triggers, triggerMap) === false) return; // For every target modal creates a new instance

    for (var key in triggerMap) {
      var value = triggerMap[key];
      options.targetModal = key;
      options.triggers = _toConsumableArray2(value);
      new Modal(options); // eslint-disable-line no-new
    }
  };
  /**
    * Shows a particular modal
    * @param  {string} targetModal [The id of the modal to display]
    * @param  {object} config [The configuration object to pass]
    * @return {void}
    */


  var show = function show(targetModal, config) {
    var options = config || {};
    options.targetModal = targetModal; // Checks if modals and triggers exist in dom

    if (options.debugMode === true && validateModalPresence(targetModal) === false) return; // stores reference to active modal

    activeModal = new Modal(options); // eslint-disable-line no-new

    activeModal.showModal();
  };
  /**
    * Closes the active modal
    * @param  {string} targetModal [The id of the modal to close]
    * @return {void}
    */


  var close = function close(targetModal) {
    targetModal ? activeModal.closeModalById(targetModal) : activeModal.closeModal();
  };

  return {
    init: init,
    show: show,
    close: close
  };
}();

var bodyScrollTop = null,
    bodyLocked = false;

function lockScroll() {
  var bodyFixed = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

  if (!bodyLocked) {
    var body = document.querySelector('body');
    bodyScrollTop = typeof window.pageYOffset !== 'undefined' ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    body.classList.add('body-block');
    bodyFixed ? body.style.position = 'fixed' : body.style.position = 'static';
    body.style.top = "".concat(bodyScrollTop, "px");
    bodyLocked = true;
  }
}

function unlockScroll() {
  if (bodyLocked) {
    var body = document.querySelector('body');
    body.classList.remove('body-block');
    body.style.position = 'static';
    body.style.top = null;
    window.scrollTo(0, bodyScrollTop);
    bodyLocked = false;
  }
}
/*
	@param modalName: String
	@param url: String
	@param method: String
	@param dataAjax: Object
	@param modalSettings: Object
	@param before: Function
	@param after: Function
*/


var htmlPreload = "\n\t<div class='preload'>\n\t\t<div class=\"preload__dots\">\n\t\t\t<div></div>\n\t\t\t<div></div>\n\t\t\t<div></div>\n\t\t</div>\n\t</div>\n";

function modalFromAjax(_ref2) {
  var modalName = _ref2.modalName,
      _ref2$url = _ref2.url,
      url = _ref2$url === void 0 ? '/local/tools/ajax_form.php' : _ref2$url,
      _ref2$method = _ref2.method,
      method = _ref2$method === void 0 ? 'POST' : _ref2$method,
      _ref2$dataAjax = _ref2.dataAjax,
      dataAjax = _ref2$dataAjax === void 0 ? {} : _ref2$dataAjax,
      _ref2$modalSettings = _ref2.modalSettings,
      modalSettings = _ref2$modalSettings === void 0 ? {} : _ref2$modalSettings,
      before = _ref2.before,
      after = _ref2.after;
  var bodyNode = document.querySelector('body');
  bodyNode.insertAdjacentHTML('beforeend', htmlPreload);

  if (typeof before === 'function') {
    before();
  }

  var body = new FormData();

  for (var i in dataAjax) {
    body.append(i, dataAjax[i]);
  }

  fetch(url, {
    method: method,
    body: body,
    responseType: 'text'
  }).then(function (res) {
    document.querySelector('.preload').remove();

    if (res.data != '') {
      if (typeof after === 'function') {
        after();
      }

      console.log(res.data.trim()); //bodyNode.insertAdjacentHTML('beforeend', res.data.trim());
      //MicroModal.show(modalName, modalSettings);
    }
  })["catch"](function (err) {
    console.log(err);
  });
}

;

var HeaderMenu =
/*#__PURE__*/
function () {
  function HeaderMenu(toggleSource, toggleTarget, classes) {
    _classCallCheck(this, HeaderMenu);

    this.toggleSource = toggleSource;
    this.toggleTarget = toggleTarget;
    this.classes = _objectSpread({}, classes);
    this.openMenu = false;
  }

  _createClass(HeaderMenu, [{
    key: "init",
    value: function init() {
      var _this2 = this;

      this.toggleSource.addEventListener('click', function () {
        _this2.toggleMenu();
      });
    }
  }, {
    key: "toggleMenu",
    value: function toggleMenu() {
      this.openMenu = !this.openMenu;
      this.openMenu ? lockScroll() : unlockScroll();
      this.toggleSource.classList.toggle(this.classes.toggleActive);
      this.toggleTarget.classList.toggle(this.classes.targetActive);
    }
  }]);

  return HeaderMenu;
}();

function collectorAttributes(e) {
  var attributes = null;

  if (typeof e.target == 'undefined') {
    // eslint-disable-next-line prefer-destructuring
    attributes = e.attributes;
  } else {
    // eslint-disable-next-line prefer-destructuring
    attributes = e.target.attributes;
  }

  var dataAttr = {};

  for (var i = 0; i < attributes.length; i++) {
    if (attributes[i].name.slice(0, 4) == 'data') {
      dataAttr[attributes[i].name.slice(5)] = attributes[i].value;
    }
  }

  return dataAttr;
}

var Tabs =
/*#__PURE__*/
function () {
  function Tabs(el) {
    _classCallCheck(this, Tabs);

    this.el = el;
    this.toggles = el.querySelectorAll('.tabs__toggle');
    this.contents = el.querySelectorAll('.tabs__content');
  }

  _createClass(Tabs, [{
    key: "init",
    value: function init() {
      var _this3 = this;

      Array.prototype.forEach.call(this.toggles, function (toggle) {
        toggle.addEventListener('click', function (e) {
          return _this3.toggle(e);
        });
      });
    }
  }, {
    key: "toggle",
    value: function toggle(e) {
      this.resetActive();
      var target = e.target,
          dataTarget = target.querySelector('button').getAttribute('data-target');
      target.classList.add('tabs__toggle_active');
      target.setAttribute('aria-expanded', true);
      this.el.querySelector(dataTarget).classList.add('tabs__content_active');
    }
  }, {
    key: "resetActive",
    value: function resetActive() {
      var _this4 = this;

      Array.prototype.forEach.call(this.toggles, function (toggle) {
        var activeToggle = _this4.el.querySelector('.tabs__toggle_active');

        if (activeToggle != null) {
          activeToggle.classList.remove('tabs__toggle_active');
          activeToggle.setAttribute('aria-expanded', false);
        }
      });
      Array.prototype.forEach.call(this.contents, function (content) {
        var activeContent = _this4.el.querySelector('.tabs__content_active');

        if (activeContent != null) {
          activeContent.classList.remove('tabs__content_active');
        }
      });
    }
  }]);

  return Tabs;
}();

function serialize(form) {
  if (!form || form.nodeName !== 'FORM') {
    return;
  }

  var q = {};

  for (var i = form.elements.length - 1; i >= 0; i = i - 1) {
    if (form.elements[i].name === '') {
      continue;
    }

    switch (form.elements[i].nodeName) {
      case 'INPUT':
        switch (form.elements[i].type) {
          case 'text':
          case 'tel':
          case 'email':
          case 'hidden':
          case 'password':
          case 'button':
          case 'reset':
          case 'submit':
            q[form.elements[i].name] = encodeURIComponent(form.elements[i].value);
            break;

          case 'checkbox':
          case 'radio':
            if (form.elements[i].checked) {
              q[form.elements[i].name] = encodeURIComponent(form.elements[i].value);
            }

            break;
        }

        break;

      case 'file':
        break;

      case 'TEXTAREA':
        q[form.elements[i].name] = encodeURIComponent(form.elements[i].value);
        break;

      case 'SELECT':
        q[form.elements[i].name] = encodeURIComponent(form.elements[i].value);
        break;
    }
  }

  return q;
}

var lazyLoad = function () {
  document.addEventListener('DOMContentLoaded', function () {
    var lazyImages = document.querySelectorAll('img[lazy-image]');

    function handlerLazyLoadImages() {
      Array.prototype.forEach.call(lazyImages, function (img) {
        if (img.getBoundingClientRect().top <= window.innerHeight && img.getBoundingClientRect().bottom >= 0 && getComputedStyle(img).display != 'none') {
          setImage(img);
        }
      });
      lazyImages = document.querySelectorAll('img[lazy-image]:not([data-loaded="true"])');
    }

    function setImage(img) {
      var src = img.getAttribute('lazy-image');
      img.setAttribute('data-loaded', 'true');
      fetch(src, {
        method: 'GET'
      }).then(function (res) {
        return res.blob();
      }).then(function (res) {
        var objectUrl = URL.createObjectURL(res);
        img.setAttribute('src', objectUrl);
        img.classList.remove('lazy-image');
        img.removeAttribute('lazy-image');
      })["catch"](function (err) {
        console.log(err);
      });
    }

    handlerLazyLoadImages();
    document.addEventListener('scroll', debounce(handlerLazyLoadImages, 300, false));
    window.addEventListener('resize', debounce(handlerLazyLoadImages, 300, false));
    window.addEventListener('orientationchange', debounce(handlerLazyLoadImages, 300, false));
  });
}();

var Form =
/*#__PURE__*/
function () {
  function Form(form, submit, _ref3, classNames, cbSuccess) {
    var uriAction = _ref3.uriAction,
        method = _ref3.method;

    _classCallCheck(this, Form);

    this.form = form;
    this.submit = submit != null ? submit : form.querySelector('button[type="submit"]');
    this.uriAction = uriAction;
    this.method = method;
    this.classNames = classNames;
    this.cbSuccess = cbSuccess;
  }

  _createClass(Form, [{
    key: "init",
    value: function init() {
      var _this5 = this;

      this.form.addEventListener('submit', function (e) {
        return _this5.handerSubmit(e);
      });
      this.submit.addEventListener('click', function (e) {
        return _this5.handerSubmit(e);
      });
    }
  }, {
    key: "handerSubmit",
    value: function handerSubmit(e) {
      var _this6 = this;

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
        body: body
      }).then(function (res) {
        return res.json();
      }).then(function (res) {
        if ('error' in res) {
          _this6.showFormErrors(res.error);
        } else {
          _this6.form.reset();

          if (typeof _this6.cbSuccess === 'function') {
            _this6.cbSuccess();
          }
        }
      })["catch"](function (err) {
        console.log(err);
      });
    }
  }, {
    key: "showFormErrors",
    value: function showFormErrors(errors) {
      for (var i in errors) {
        var element = this.form.querySelector('input[name="' + i + '"]') || this.form.querySelector('textarea[name="' + i + '"]');

        if (element != null) {
          this.classNames.inputError != '' ? element.classList.add(this.classNames.inputError) : null;
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
  }, {
    key: "removeErrorForm",
    value: function removeErrorForm(element) {
      if (element != null) {
        this.classNames.inputError != '' ? element.classList.remove(this.classNames.inputError) : null;
        var parent = element.closest('.form-field');
        parent.querySelector('.' + this.classNames.formError).remove();
      }
    }
  }, {
    key: "clearBodyAlerts",
    value: function clearBodyAlerts() {
      var elements = this.form.querySelectorAll('.' + this.classNames.alert);

      for (var i = 0; i < elements.length; i++) {
        elements[i].remove();
      }
    }
  }, {
    key: "clearErrorsForm",
    value: function clearErrorsForm() {
      if (this.classNames.inputError != '') {
        var elements = this.form.querySelectorAll('.' + this.classNames.inputError);

        for (var i = 0; i < elements.length; i++) {
          this.removeErrorForm(elements[i]);
        }
      }
    }
  }, {
    key: "removeErrorOnFocusInput",
    value: function removeErrorOnFocusInput() {
      var _this7 = this;

      var formGroup = this.form.querySelectorAll('.form-field');
      Array.prototype.forEach.call(formGroup, function (item) {
        if (item.querySelector('input') != null) {
          item.querySelector('input').addEventListener('focus', function (e) {
            _this7.classNames.inputError != '' ? e.target.classList.remove(_this7.classNames.inputError) : null;
            var siblingError = e.target.nextSibling.nextSibling;

            if (siblingError != null && siblingError.classList.contains(_this7.classNames.fieldError)) {
              siblingError.remove();
            }
          });
        }

        if (item.querySelector('textarea') != null) {
          item.querySelector('textarea').addEventListener('focus', function (e) {
            _this7.classNames.inputError != '' ? e.target.classList.remove(_this7.classNames.inputError) : null;
            var siblingError = e.target.nextSibling.nextSibling;

            if (siblingError != null && siblingError.classList.contains(_this7.classNames.fieldError)) {
              siblingError.remove();
            }
          });
        }

        if (item.querySelector('label') != null) {
          item.querySelector('label').addEventListener('click', function (e) {
            var siblingError = e.target.nextSibling.nextSibling;

            if (siblingError != null && siblingError.classList.contains(_this7.classNames.fieldError)) {
              siblingError.remove();
            }
          });
        }
      });
    }
  }]);

  return Form;
}();

'use strict'; // polyfill


function smoothscroll() {
  // aliases
  var w = window;
  var d = document; // return if scroll behavior is supported and polyfill is not forced

  if ('scrollBehavior' in d.documentElement.style && w.__forceSmoothScrollPolyfill__ !== true) {
    return;
  } // globals


  var Element = w.HTMLElement || w.Element;
  var SCROLL_TIME = 468; // object gathering original scroll methods

  var original = {
    scroll: w.scroll || w.scrollTo,
    scrollBy: w.scrollBy,
    elementScroll: Element.prototype.scroll || scrollElement,
    scrollIntoView: Element.prototype.scrollIntoView
  }; // define timing method

  var now = w.performance && w.performance.now ? w.performance.now.bind(w.performance) : Date.now;
  /**
    * indicates if a the current browser is made by Microsoft
    * @method isMicrosoftBrowser
    * @param {String} userAgent
    * @returns {Boolean}
    */

  function isMicrosoftBrowser(userAgent) {
    var userAgentPatterns = ['MSIE ', 'Trident/', 'Edge/'];
    return new RegExp(userAgentPatterns.join('|')).test(userAgent);
  }
  /*
    * IE has rounding bug rounding down clientHeight and clientWidth and
    * rounding up scrollHeight and scrollWidth causing false positives
    * on hasScrollableSpace
    */


  var ROUNDING_TOLERANCE = isMicrosoftBrowser(w.navigator.userAgent) ? 1 : 0;
  /**
    * changes scroll position inside an element
    * @method scrollElement
    * @param {Number} x
    * @param {Number} y
    * @returns {undefined}
    */

  function scrollElement(x, y) {
    this.scrollLeft = x;
    this.scrollTop = y;
  }
  /**
    * returns result of applying ease math function to a number
    * @method ease
    * @param {Number} k
    * @returns {Number}
    */


  function ease(k) {
    return 0.5 * (1 - Math.cos(Math.PI * k));
  }
  /**
    * indicates if a smooth behavior should be applied
    * @method shouldBailOut
    * @param {Number|Object} firstArg
    * @returns {Boolean}
    */


  function shouldBailOut(firstArg) {
    if (firstArg === null || _typeof(firstArg) !== 'object' || firstArg.behavior === undefined || firstArg.behavior === 'auto' || firstArg.behavior === 'instant') {
      // first argument is not an object/null
      // or behavior is auto, instant or undefined
      return true;
    }

    if (_typeof(firstArg) === 'object' && firstArg.behavior === 'smooth') {
      // first argument is an object and behavior is smooth
      return false;
    } // throw error when behavior is not supported


    throw new TypeError('behavior member of ScrollOptions ' + firstArg.behavior + ' is not a valid value for enumeration ScrollBehavior.');
  }
  /**
    * indicates if an element has scrollable space in the provided axis
    * @method hasScrollableSpace
    * @param {Node} el
    * @param {String} axis
    * @returns {Boolean}
    */


  function hasScrollableSpace(el, axis) {
    if (axis === 'Y') {
      return el.clientHeight + ROUNDING_TOLERANCE < el.scrollHeight;
    }

    if (axis === 'X') {
      return el.clientWidth + ROUNDING_TOLERANCE < el.scrollWidth;
    }
  }
  /**
    * indicates if an element has a scrollable overflow property in the axis
    * @method canOverflow
    * @param {Node} el
    * @param {String} axis
    * @returns {Boolean}
    */


  function canOverflow(el, axis) {
    var overflowValue = w.getComputedStyle(el, null)['overflow' + axis];
    return overflowValue === 'auto' || overflowValue === 'scroll';
  }
  /**
    * indicates if an element can be scrolled in either axis
    * @method isScrollable
    * @param {Node} el
    * @param {String} axis
    * @returns {Boolean}
    */


  function isScrollable(el) {
    var isScrollableY = hasScrollableSpace(el, 'Y') && canOverflow(el, 'Y');
    var isScrollableX = hasScrollableSpace(el, 'X') && canOverflow(el, 'X');
    return isScrollableY || isScrollableX;
  }
  /**
    * finds scrollable parent of an element
    * @method findScrollableParent
    * @param {Node} el
    * @returns {Node} el
    */


  function findScrollableParent(el) {
    while (el !== d.body && isScrollable(el) === false) {
      el = el.parentNode || el.host;
    }

    return el;
  }
  /**
    * self invoked function that, given a context, steps through scrolling
    * @method step
    * @param {Object} context
    * @returns {undefined}
    */


  function step(context) {
    var time = now();
    var value;
    var currentX;
    var currentY;
    var elapsed = (time - context.startTime) / SCROLL_TIME; // avoid elapsed times higher than one

    elapsed = elapsed > 1 ? 1 : elapsed; // apply easing to elapsed time

    value = ease(elapsed);
    currentX = context.startX + (context.x - context.startX) * value;
    currentY = context.startY + (context.y - context.startY) * value;
    context.method.call(context.scrollable, currentX, currentY); // scroll more if we have not reached our destination

    if (currentX !== context.x || currentY !== context.y) {
      w.requestAnimationFrame(step.bind(w, context));
    }
  }
  /**
    * scrolls window or element with a smooth behavior
    * @method smoothScroll
    * @param {Object|Node} el
    * @param {Number} x
    * @param {Number} y
    * @returns {undefined}
    */


  function smoothScroll(el, x, y) {
    var scrollable;
    var startX;
    var startY;
    var method;
    var startTime = now(); // define scroll context

    if (el === d.body) {
      scrollable = w;
      startX = w.scrollX || w.pageXOffset;
      startY = w.scrollY || w.pageYOffset;
      method = original.scroll;
    } else {
      scrollable = el;
      startX = el.scrollLeft;
      startY = el.scrollTop;
      method = scrollElement;
    } // scroll looping over a frame


    step({
      scrollable: scrollable,
      method: method,
      startTime: startTime,
      startX: startX,
      startY: startY,
      x: x,
      y: y
    });
  } // ORIGINAL METHODS OVERRIDES
  // w.scroll and w.scrollTo


  w.scroll = w.scrollTo = function () {
    // avoid action when no arguments are passed
    if (arguments[0] === undefined) {
      return;
    } // avoid smooth behavior if not required


    if (shouldBailOut(arguments[0]) === true) {
      original.scroll.call(w, arguments[0].left !== undefined ? arguments[0].left : _typeof(arguments[0]) !== 'object' ? arguments[0] : w.scrollX || w.pageXOffset, // use top prop, second argument if present or fallback to scrollY
      arguments[0].top !== undefined ? arguments[0].top : arguments[1] !== undefined ? arguments[1] : w.scrollY || w.pageYOffset);
      return;
    } // LET THE SMOOTHNESS BEGIN!


    smoothScroll.call(w, d.body, arguments[0].left !== undefined ? ~~arguments[0].left : w.scrollX || w.pageXOffset, arguments[0].top !== undefined ? ~~arguments[0].top : w.scrollY || w.pageYOffset);
  }; // w.scrollBy


  w.scrollBy = function () {
    // avoid action when no arguments are passed
    if (arguments[0] === undefined) {
      return;
    } // avoid smooth behavior if not required


    if (shouldBailOut(arguments[0])) {
      original.scrollBy.call(w, arguments[0].left !== undefined ? arguments[0].left : _typeof(arguments[0]) !== 'object' ? arguments[0] : 0, arguments[0].top !== undefined ? arguments[0].top : arguments[1] !== undefined ? arguments[1] : 0);
      return;
    } // LET THE SMOOTHNESS BEGIN!


    smoothScroll.call(w, d.body, ~~arguments[0].left + (w.scrollX || w.pageXOffset), ~~arguments[0].top + (w.scrollY || w.pageYOffset));
  }; // Element.prototype.scroll and Element.prototype.scrollTo


  Element.prototype.scroll = Element.prototype.scrollTo = function () {
    // avoid action when no arguments are passed
    if (arguments[0] === undefined) {
      return;
    } // avoid smooth behavior if not required


    if (shouldBailOut(arguments[0]) === true) {
      // if one number is passed, throw error to match Firefox implementation
      if (typeof arguments[0] === 'number' && arguments[1] === undefined) {
        throw new SyntaxError('Value could not be converted');
      }

      original.elementScroll.call(this, // use left prop, first number argument or fallback to scrollLeft
      arguments[0].left !== undefined ? ~~arguments[0].left : _typeof(arguments[0]) !== 'object' ? ~~arguments[0] : this.scrollLeft, // use top prop, second argument or fallback to scrollTop
      arguments[0].top !== undefined ? ~~arguments[0].top : arguments[1] !== undefined ? ~~arguments[1] : this.scrollTop);
      return;
    }

    var left = arguments[0].left;
    var top = arguments[0].top; // LET THE SMOOTHNESS BEGIN!

    smoothScroll.call(this, this, typeof left === 'undefined' ? this.scrollLeft : ~~left, typeof top === 'undefined' ? this.scrollTop : ~~top);
  }; // Element.prototype.scrollBy


  Element.prototype.scrollBy = function () {
    // avoid action when no arguments are passed
    if (arguments[0] === undefined) {
      return;
    } // avoid smooth behavior if not required


    if (shouldBailOut(arguments[0]) === true) {
      original.elementScroll.call(this, arguments[0].left !== undefined ? ~~arguments[0].left + this.scrollLeft : ~~arguments[0] + this.scrollLeft, arguments[0].top !== undefined ? ~~arguments[0].top + this.scrollTop : ~~arguments[1] + this.scrollTop);
      return;
    }

    this.scroll({
      left: ~~arguments[0].left + this.scrollLeft,
      top: ~~arguments[0].top + this.scrollTop,
      behavior: arguments[0].behavior
    });
  }; // Element.prototype.scrollIntoView


  Element.prototype.scrollIntoView = function () {
    // avoid smooth behavior if not required
    if (shouldBailOut(arguments[0]) === true) {
      original.scrollIntoView.call(this, arguments[0] === undefined ? true : arguments[0]);
      return;
    } // LET THE SMOOTHNESS BEGIN!


    var scrollableParent = findScrollableParent(this);
    var parentRects = scrollableParent.getBoundingClientRect();
    var clientRects = this.getBoundingClientRect();

    if (scrollableParent !== d.body) {
      // reveal element inside parent
      smoothScroll.call(this, scrollableParent, scrollableParent.scrollLeft + clientRects.left - parentRects.left, scrollableParent.scrollTop + clientRects.top - parentRects.top); // reveal parent in viewport unless is fixed

      if (w.getComputedStyle(scrollableParent).position !== 'fixed') {
        w.scrollBy({
          left: parentRects.left,
          top: parentRects.top,
          behavior: 'smooth'
        });
      }
    } else {
      // reveal element in viewport
      w.scrollBy({
        left: clientRects.left,
        top: clientRects.top,
        behavior: 'smooth'
      });
    }
  };
}
/*! npm.im/object-fit-images 3.2.4 */


var OFI = 'bfred-it:object-fit-images';
var propRegex = /(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g;
var testImg = typeof Image === 'undefined' ? {
  style: {
    'object-position': 1
  }
} : new Image();
var supportsObjectFit = 'object-fit' in testImg.style;
var supportsObjectPosition = 'object-position' in testImg.style;
var supportsOFI = 'background-size' in testImg.style;
var supportsCurrentSrc = typeof testImg.currentSrc === 'string';
var nativeGetAttribute = testImg.getAttribute;
var nativeSetAttribute = testImg.setAttribute;
var autoModeEnabled = false;

function createPlaceholder(w, h) {
  return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + w + "' height='" + h + "'%3E%3C/svg%3E";
}

function polyfillCurrentSrc(el) {
  if (el.srcset && !supportsCurrentSrc && window.picturefill) {
    var pf = window.picturefill._; // parse srcset with picturefill where currentSrc isn't available

    if (!el[pf.ns] || !el[pf.ns].evaled) {
      // force synchronous srcset parsing
      pf.fillImg(el, {
        reselect: true
      });
    }

    if (!el[pf.ns].curSrc) {
      // force picturefill to parse srcset
      el[pf.ns].supported = false;
      pf.fillImg(el, {
        reselect: true
      });
    } // retrieve parsed currentSrc, if any


    el.currentSrc = el[pf.ns].curSrc || el.src;
  }
}

function getStyle(el) {
  var style = getComputedStyle(el).fontFamily;
  var parsed;
  var props = {};

  while ((parsed = propRegex.exec(style)) !== null) {
    props[parsed[1]] = parsed[2];
  }

  return props;
}

function setPlaceholder(img, width, height) {
  // Default: fill width, no height
  var placeholder = createPlaceholder(width || 1, height || 0); // Only set placeholder if it's different

  if (nativeGetAttribute.call(img, 'src') !== placeholder) {
    nativeSetAttribute.call(img, 'src', placeholder);
  }
}

function onImageReady(img, callback) {
  // naturalWidth is only available when the image headers are loaded,
  // this loop will poll it every 100ms.
  if (img.naturalWidth) {
    callback(img);
  } else {
    setTimeout(onImageReady, 100, img, callback);
  }
}

function fixOne(el) {
  var style = getStyle(el);
  var ofi = el[OFI];
  style['object-fit'] = style['object-fit'] || 'fill'; // default value
  // Avoid running where unnecessary, unless OFI had already done its deed

  if (!ofi.img) {
    // fill is the default behavior so no action is necessary
    if (style['object-fit'] === 'fill') {
      return;
    } // Where object-fit is supported and object-position isn't (Safari < 10)


    if (!ofi.skipTest && // unless user wants to apply regardless of browser support
    supportsObjectFit && // if browser already supports object-fit
    !style['object-position'] // unless object-position is used
    ) {
        return;
      }
  } // keep a clone in memory while resetting the original to a blank


  if (!ofi.img) {
    ofi.img = new Image(el.width, el.height);
    ofi.img.srcset = nativeGetAttribute.call(el, "data-ofi-srcset") || el.srcset;
    ofi.img.src = nativeGetAttribute.call(el, "data-ofi-src") || el.src; // preserve for any future cloneNode calls
    // https://github.com/bfred-it/object-fit-images/issues/53

    nativeSetAttribute.call(el, "data-ofi-src", el.src);

    if (el.srcset) {
      nativeSetAttribute.call(el, "data-ofi-srcset", el.srcset);
    }

    setPlaceholder(el, el.naturalWidth || el.width, el.naturalHeight || el.height); // remove srcset because it overrides src

    if (el.srcset) {
      el.srcset = '';
    }

    try {
      keepSrcUsable(el);
    } catch (err) {
      if (window.console) {
        console.warn('https://bit.ly/ofi-old-browser');
      }
    }
  }

  polyfillCurrentSrc(ofi.img);
  el.style.backgroundImage = "url(\"" + (ofi.img.currentSrc || ofi.img.src).replace(/"/g, '\\"') + "\")";
  el.style.backgroundPosition = style['object-position'] || 'center';
  el.style.backgroundRepeat = 'no-repeat';
  el.style.backgroundOrigin = 'content-box';

  if (/scale-down/.test(style['object-fit'])) {
    onImageReady(ofi.img, function () {
      if (ofi.img.naturalWidth > el.width || ofi.img.naturalHeight > el.height) {
        el.style.backgroundSize = 'contain';
      } else {
        el.style.backgroundSize = 'auto';
      }
    });
  } else {
    el.style.backgroundSize = style['object-fit'].replace('none', 'auto').replace('fill', '100% 100%');
  }

  onImageReady(ofi.img, function (img) {
    setPlaceholder(el, img.naturalWidth, img.naturalHeight);
  });
}

function keepSrcUsable(el) {
  var descriptors = {
    get: function get(prop) {
      return el[OFI].img[prop ? prop : 'src'];
    },
    set: function set(value, prop) {
      el[OFI].img[prop ? prop : 'src'] = value;
      nativeSetAttribute.call(el, "data-ofi-" + prop, value); // preserve for any future cloneNode

      fixOne(el);
      return value;
    }
  };
  Object.defineProperty(el, 'src', descriptors);
  Object.defineProperty(el, 'currentSrc', {
    get: function get() {
      return descriptors.get('currentSrc');
    }
  });
  Object.defineProperty(el, 'srcset', {
    get: function get() {
      return descriptors.get('srcset');
    },
    set: function set(ss) {
      return descriptors.set(ss, 'srcset');
    }
  });
}

function hijackAttributes() {
  function getOfiImageMaybe(el, name) {
    return el[OFI] && el[OFI].img && (name === 'src' || name === 'srcset') ? el[OFI].img : el;
  }

  if (!supportsObjectPosition) {
    HTMLImageElement.prototype.getAttribute = function (name) {
      return nativeGetAttribute.call(getOfiImageMaybe(this, name), name);
    };

    HTMLImageElement.prototype.setAttribute = function (name, value) {
      return nativeSetAttribute.call(getOfiImageMaybe(this, name), name, String(value));
    };
  }
}

function fix(imgs, opts) {
  var startAutoMode = !autoModeEnabled && !imgs;
  opts = opts || {};
  imgs = imgs || 'img';

  if (supportsObjectPosition && !opts.skipTest || !supportsOFI) {
    return false;
  } // use imgs as a selector or just select all images


  if (imgs === 'img') {
    imgs = document.getElementsByTagName('img');
  } else if (typeof imgs === 'string') {
    imgs = document.querySelectorAll(imgs);
  } else if (!('length' in imgs)) {
    imgs = [imgs];
  } // apply fix to all


  for (var i = 0; i < imgs.length; i++) {
    imgs[i][OFI] = imgs[i][OFI] || {
      skipTest: opts.skipTest
    };
    fixOne(imgs[i]);
  }

  if (startAutoMode) {
    document.body.addEventListener('load', function (e) {
      if (e.target.tagName === 'IMG') {
        fix(e.target, {
          skipTest: opts.skipTest
        });
      }
    }, true);
    autoModeEnabled = true;
    imgs = 'img'; // reset to a generic selector for watchMQ
  } // if requested, watch media queries for object-fit change


  if (opts.watchMQ) {
    window.addEventListener('resize', fix.bind(null, imgs, {
      skipTest: opts.skipTest
    }));
  }
}

fix.supportsObjectFit = supportsObjectFit;
fix.supportsObjectPosition = supportsObjectPosition;
hijackAttributes();
/*!
 * css-vars-ponyfill
 * v2.0.2
 * https://jhildenbiddle.github.io/css-vars-ponyfill/
 * (c) 2018-2019 John Hildenbiddle <http://hildenbiddle.com>
 * MIT license
 */

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
}

function _iterableToArray(iter) {
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}
/*!
 * get-css-data
 * v1.6.3
 * https://github.com/jhildenbiddle/get-css-data
 * (c) 2018-2019 John Hildenbiddle <http://hildenbiddle.com>
 * MIT license
 */


function getUrls(urls) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var settings = {
    mimeType: options.mimeType || null,
    onBeforeSend: options.onBeforeSend || Function.prototype,
    onSuccess: options.onSuccess || Function.prototype,
    onError: options.onError || Function.prototype,
    onComplete: options.onComplete || Function.prototype
  };
  var urlArray = Array.isArray(urls) ? urls : [urls];
  var urlQueue = Array.apply(null, Array(urlArray.length)).map(function (x) {
    return null;
  });

  function isValidCss() {
    var cssText = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
    var isHTML = cssText.trim().charAt(0) === "<";
    return !isHTML;
  }

  function onError(xhr, urlIndex) {
    settings.onError(xhr, urlArray[urlIndex], urlIndex);
  }

  function onSuccess(responseText, urlIndex) {
    var returnVal = settings.onSuccess(responseText, urlArray[urlIndex], urlIndex);
    responseText = returnVal === false ? "" : returnVal || responseText;
    urlQueue[urlIndex] = responseText;

    if (urlQueue.indexOf(null) === -1) {
      settings.onComplete(urlQueue);
    }
  }

  var parser = document.createElement("a");
  urlArray.forEach(function (url, i) {
    parser.setAttribute("href", url);
    parser.href = String(parser.href);
    var isIElte9 = Boolean(document.all && !window.atob);
    var isIElte9CORS = isIElte9 && parser.host.split(":")[0] !== location.host.split(":")[0];

    if (isIElte9CORS) {
      var isSameProtocol = parser.protocol === location.protocol;

      if (isSameProtocol) {
        var xdr = new XDomainRequest();
        xdr.open("GET", url);
        xdr.timeout = 0;
        xdr.onprogress = Function.prototype;
        xdr.ontimeout = Function.prototype;

        xdr.onload = function () {
          if (isValidCss(xdr.responseText)) {
            onSuccess(xdr.responseText, i);
          } else {
            onError(xdr, i);
          }
        };

        xdr.onerror = function (err) {
          onError(xdr, i);
        };

        setTimeout(function () {
          xdr.send();
        }, 0);
      } else {
        console.warn("Internet Explorer 9 Cross-Origin (CORS) requests must use the same protocol (".concat(url, ")"));
        onError(null, i);
      }
    } else {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url);

      if (settings.mimeType && xhr.overrideMimeType) {
        xhr.overrideMimeType(settings.mimeType);
      }

      settings.onBeforeSend(xhr, url, i);

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200 && isValidCss(xhr.responseText)) {
            onSuccess(xhr.responseText, i);
          } else {
            onError(xhr, i);
          }
        }
      };

      xhr.send();
    }
  });
}
/**
 * Gets CSS data from <style> and <link> nodes (including @imports), then
 * returns data in order processed by DOM. Allows specifying nodes to
 * include/exclude and filtering CSS data using RegEx.
 *
 * @preserve
 * @param {object}   [options] The options object
 * @param {object}   [options.rootElement=document] Root element to traverse for
 *                   <link> and <style> nodes.
 * @param {string}   [options.include] CSS selector matching <link> and <style>
 *                   nodes to include
 * @param {string}   [options.exclude] CSS selector matching <link> and <style>
 *                   nodes to exclude
 * @param {object}   [options.filter] Regular expression used to filter node CSS
 *                   data. Each block of CSS data is tested against the filter,
 *                   and only matching data is included.
 * @param {object}   [options.useCSSOM=false] Determines if CSS data will be
 *                   collected from a stylesheet's runtime values instead of its
 *                   text content. This is required to get accurate CSS data
 *                   when a stylesheet has been modified using the deleteRule()
 *                   or insertRule() methods because these modifications will
 *                   not be reflected in the stylesheet's text content.
 * @param {function} [options.onBeforeSend] Callback before XHR is sent. Passes
 *                   1) the XHR object, 2) source node reference, and 3) the
 *                   source URL as arguments.
 * @param {function} [options.onSuccess] Callback on each CSS node read. Passes
 *                   1) CSS text, 2) source node reference, and 3) the source
 *                   URL as arguments.
 * @param {function} [options.onError] Callback on each error. Passes 1) the XHR
 *                   object for inspection, 2) soure node reference, and 3) the
 *                   source URL that failed (either a <link> href or an @import)
 *                   as arguments
 * @param {function} [options.onComplete] Callback after all nodes have been
 *                   processed. Passes 1) concatenated CSS text, 2) an array of
 *                   CSS text in DOM order, and 3) an array of nodes in DOM
 *                   order as arguments.
 *
 * @example
 *
 *   getCssData({
 *     rootElement: document,
 *     include    : 'style,link[rel="stylesheet"]',
 *     exclude    : '[href="skip.css"]',
 *     filter     : /red/,
 *     useCSSOM   : false,
 *     onBeforeSend(xhr, node, url) {
 *       // ...
 *     }
 *     onSuccess(cssText, node, url) {
 *       // ...
 *     }
 *     onError(xhr, node, url) {
 *       // ...
 *     },
 *     onComplete(cssText, cssArray, nodeArray) {
 *       // ...
 *     }
 *   });
 */


function getCssData(options) {
  var regex = {
    cssComments: /\/\*[\s\S]+?\*\//g,
    cssImports: /(?:@import\s*)(?:url\(\s*)?(?:['"])([^'"]*)(?:['"])(?:\s*\))?(?:[^;]*;)/g
  };
  var settings = {
    rootElement: options.rootElement || document,
    include: options.include || 'style,link[rel="stylesheet"]',
    exclude: options.exclude || null,
    filter: options.filter || null,
    useCSSOM: options.useCSSOM || false,
    onBeforeSend: options.onBeforeSend || Function.prototype,
    onSuccess: options.onSuccess || Function.prototype,
    onError: options.onError || Function.prototype,
    onComplete: options.onComplete || Function.prototype
  };
  var sourceNodes = Array.apply(null, settings.rootElement.querySelectorAll(settings.include)).filter(function (node) {
    return !matchesSelector(node, settings.exclude);
  });
  var cssArray = Array.apply(null, Array(sourceNodes.length)).map(function (x) {
    return null;
  });

  function handleComplete() {
    var isComplete = cssArray.indexOf(null) === -1;

    if (isComplete) {
      var cssText = cssArray.join("");
      settings.onComplete(cssText, cssArray, sourceNodes);
    }
  }

  function handleSuccess(cssText, cssIndex, node, sourceUrl) {
    var returnVal = settings.onSuccess(cssText, node, sourceUrl);
    cssText = returnVal !== undefined && Boolean(returnVal) === false ? "" : returnVal || cssText;
    resolveImports(cssText, node, sourceUrl, function (resolvedCssText, errorData) {
      if (cssArray[cssIndex] === null) {
        errorData.forEach(function (data) {
          return settings.onError(data.xhr, node, data.url);
        });

        if (!settings.filter || settings.filter.test(resolvedCssText)) {
          cssArray[cssIndex] = resolvedCssText;
        } else {
          cssArray[cssIndex] = "";
        }

        handleComplete();
      }
    });
  }

  function parseImportData(cssText, baseUrl) {
    var ignoreRules = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [];
    var importData = {};
    importData.rules = (cssText.replace(regex.cssComments, "").match(regex.cssImports) || []).filter(function (rule) {
      return ignoreRules.indexOf(rule) === -1;
    });
    importData.urls = importData.rules.map(function (rule) {
      return rule.replace(regex.cssImports, "$1");
    });
    importData.absoluteUrls = importData.urls.map(function (url) {
      return getFullUrl(url, baseUrl);
    });
    importData.absoluteRules = importData.rules.map(function (rule, i) {
      var oldUrl = importData.urls[i];
      var newUrl = getFullUrl(importData.absoluteUrls[i], baseUrl);
      return rule.replace(oldUrl, newUrl);
    });
    return importData;
  }

  function resolveImports(cssText, node, baseUrl, callbackFn) {
    var __errorData = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : [];

    var __errorRules = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : [];

    var importData = parseImportData(cssText, baseUrl, __errorRules);

    if (importData.rules.length) {
      getUrls(importData.absoluteUrls, {
        onBeforeSend: function onBeforeSend(xhr, url, urlIndex) {
          settings.onBeforeSend(xhr, node, url);
        },
        onSuccess: function onSuccess(cssText, url, urlIndex) {
          var returnVal = settings.onSuccess(cssText, node, url);
          cssText = returnVal === false ? "" : returnVal || cssText;
          var responseImportData = parseImportData(cssText, url, __errorRules);
          responseImportData.rules.forEach(function (rule, i) {
            cssText = cssText.replace(rule, responseImportData.absoluteRules[i]);
          });
          return cssText;
        },
        onError: function onError(xhr, url, urlIndex) {
          __errorData.push({
            xhr: xhr,
            url: url
          });

          __errorRules.push(importData.rules[urlIndex]);

          resolveImports(cssText, node, baseUrl, callbackFn, __errorData, __errorRules);
        },
        onComplete: function onComplete(responseArray) {
          responseArray.forEach(function (importText, i) {
            cssText = cssText.replace(importData.rules[i], importText);
          });
          resolveImports(cssText, node, baseUrl, callbackFn, __errorData, __errorRules);
        }
      });
    } else {
      callbackFn(cssText, __errorData);
    }
  }

  if (sourceNodes.length) {
    sourceNodes.forEach(function (node, i) {
      var linkHref = node.getAttribute("href");
      var linkRel = node.getAttribute("rel");
      var isLink = node.nodeName === "LINK" && linkHref && linkRel && linkRel.toLowerCase() === "stylesheet";
      var isStyle = node.nodeName === "STYLE";

      if (isLink) {
        getUrls(linkHref, {
          mimeType: "text/css",
          onBeforeSend: function onBeforeSend(xhr, url, urlIndex) {
            settings.onBeforeSend(xhr, node, url);
          },
          onSuccess: function onSuccess(cssText, url, urlIndex) {
            var sourceUrl = getFullUrl(linkHref, location.href);
            handleSuccess(cssText, i, node, sourceUrl);
          },
          onError: function onError(xhr, url, urlIndex) {
            cssArray[i] = "";
            settings.onError(xhr, node, url);
            handleComplete();
          }
        });
      } else if (isStyle) {
        var cssText = node.textContent;

        if (settings.useCSSOM) {
          cssText = Array.apply(null, node.sheet.cssRules).map(function (rule) {
            return rule.cssText;
          }).join("");
        }

        handleSuccess(cssText, i, node, location.href);
      } else {
        cssArray[i] = "";
        handleComplete();
      }
    });
  } else {
    settings.onComplete("", []);
  }
}

function getFullUrl(url) {
  var base = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : location.href;
  var d = document.implementation.createHTMLDocument("");
  var b = d.createElement("base");
  var a = d.createElement("a");
  d.head.appendChild(b);
  d.body.appendChild(a);
  b.href = base;
  a.href = url;
  return a.href;
}

function matchesSelector(elm, selector) {
  var matches = elm.matches || elm.matchesSelector || elm.webkitMatchesSelector || elm.mozMatchesSelector || elm.msMatchesSelector || elm.oMatchesSelector;
  return matches.call(elm, selector);
}

var balancedMatch = balanced;

function balanced(a, b, str) {
  if (a instanceof RegExp) a = maybeMatch(a, str);
  if (b instanceof RegExp) b = maybeMatch(b, str);
  var r = range(a, b, str);
  return r && {
    start: r[0],
    end: r[1],
    pre: str.slice(0, r[0]),
    body: str.slice(r[0] + a.length, r[1]),
    post: str.slice(r[1] + b.length)
  };
}

function maybeMatch(reg, str) {
  var m = str.match(reg);
  return m ? m[0] : null;
}

balanced.range = range;

function range(a, b, str) {
  var begs, beg, left, right, result;
  var ai = str.indexOf(a);
  var bi = str.indexOf(b, ai + 1);
  var i = ai;

  if (ai >= 0 && bi > 0) {
    begs = [];
    left = str.length;

    while (i >= 0 && !result) {
      if (i == ai) {
        begs.push(i);
        ai = str.indexOf(a, i + 1);
      } else if (begs.length == 1) {
        result = [begs.pop(), bi];
      } else {
        beg = begs.pop();

        if (beg < left) {
          left = beg;
          right = bi;
        }

        bi = str.indexOf(b, i + 1);
      }

      i = ai < bi && ai >= 0 ? ai : bi;
    }

    if (begs.length) {
      result = [left, right];
    }
  }

  return result;
}

function parseCss(css) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var defaults = {
    preserveStatic: true,
    removeComments: false
  };

  var settings = _extends({}, defaults, options);

  var errors = [];

  function error(msg) {
    throw new Error("CSS parse error: ".concat(msg));
  }

  function match(re) {
    var m = re.exec(css);

    if (m) {
      css = css.slice(m[0].length);
      return m;
    }
  }

  function open() {
    return match(/^{\s*/);
  }

  function close() {
    return match(/^}/);
  }

  function whitespace() {
    match(/^\s*/);
  }

  function comment() {
    whitespace();

    if (css[0] !== "/" || css[1] !== "*") {
      return;
    }

    var i = 2;

    while (css[i] && (css[i] !== "*" || css[i + 1] !== "/")) {
      i++;
    }

    if (!css[i]) {
      return error("end of comment is missing");
    }

    var str = css.slice(2, i);
    css = css.slice(i + 2);
    return {
      type: "comment",
      comment: str
    };
  }

  function comments() {
    var cmnts = [];
    var c;

    while (c = comment()) {
      cmnts.push(c);
    }

    return settings.removeComments ? [] : cmnts;
  }

  function selector() {
    whitespace();

    while (css[0] === "}") {
      error("extra closing bracket");
    }

    var m = match(/^(("(?:\\"|[^"])*"|'(?:\\'|[^'])*'|[^{])+)/);

    if (m) {
      return m[0].trim().replace(/\/\*([^*]|[\r\n]|(\*+([^*\/]|[\r\n])))*\*\/+/g, "").replace(/"(?:\\"|[^"])*"|'(?:\\'|[^'])*'/g, function (m) {
        return m.replace(/,/g, "‌");
      }).split(/\s*(?![^(]*\)),\s*/).map(function (s) {
        return s.replace(/\u200C/g, ",");
      });
    }
  }

  function declaration() {
    match(/^([;\s]*)+/);
    var comment_regexp = /\/\*[^*]*\*+([^\/*][^*]*\*+)*\//g;
    var prop = match(/^(\*?[-#\/*\\\w]+(\[[0-9a-z_-]+\])?)\s*/);

    if (!prop) {
      return;
    }

    prop = prop[0].trim();

    if (!match(/^:\s*/)) {
      return error("property missing ':'");
    }

    var val = match(/^((?:\/\*.*?\*\/|'(?:\\'|.)*?'|"(?:\\"|.)*?"|\((\s*'(?:\\'|.)*?'|"(?:\\"|.)*?"|[^)]*?)\s*\)|[^};])+)/);
    var ret = {
      type: "declaration",
      property: prop.replace(comment_regexp, ""),
      value: val ? val[0].replace(comment_regexp, "").trim() : ""
    };
    match(/^[;\s]*/);
    return ret;
  }

  function declarations() {
    if (!open()) {
      return error("missing '{'");
    }

    var d;
    var decls = comments();

    while (d = declaration()) {
      decls.push(d);
      decls = decls.concat(comments());
    }

    if (!close()) {
      return error("missing '}'");
    }

    return decls;
  }

  function keyframe() {
    whitespace();
    var vals = [];
    var m;

    while (m = match(/^((\d+\.\d+|\.\d+|\d+)%?|[a-z]+)\s*/)) {
      vals.push(m[1]);
      match(/^,\s*/);
    }

    if (vals.length) {
      return {
        type: "keyframe",
        values: vals,
        declarations: declarations()
      };
    }
  }

  function at_keyframes() {
    var m = match(/^@([-\w]+)?keyframes\s*/);

    if (!m) {
      return;
    }

    var vendor = m[1];
    m = match(/^([-\w]+)\s*/);

    if (!m) {
      return error("@keyframes missing name");
    }

    var name = m[1];

    if (!open()) {
      return error("@keyframes missing '{'");
    }

    var frame;
    var frames = comments();

    while (frame = keyframe()) {
      frames.push(frame);
      frames = frames.concat(comments());
    }

    if (!close()) {
      return error("@keyframes missing '}'");
    }

    return {
      type: "keyframes",
      name: name,
      vendor: vendor,
      keyframes: frames
    };
  }

  function at_page() {
    var m = match(/^@page */);

    if (m) {
      var sel = selector() || [];
      return {
        type: "page",
        selectors: sel,
        declarations: declarations()
      };
    }
  }

  function at_fontface() {
    var m = match(/^@font-face\s*/);

    if (m) {
      return {
        type: "font-face",
        declarations: declarations()
      };
    }
  }

  function at_supports() {
    var m = match(/^@supports *([^{]+)/);

    if (m) {
      return {
        type: "supports",
        supports: m[1].trim(),
        rules: rules()
      };
    }
  }

  function at_host() {
    var m = match(/^@host\s*/);

    if (m) {
      return {
        type: "host",
        rules: rules()
      };
    }
  }

  function at_media() {
    var m = match(/^@media *([^{]+)/);

    if (m) {
      return {
        type: "media",
        media: m[1].trim(),
        rules: rules()
      };
    }
  }

  function at_custom_m() {
    var m = match(/^@custom-media\s+(--[^\s]+)\s*([^{;]+);/);

    if (m) {
      return {
        type: "custom-media",
        name: m[1].trim(),
        media: m[2].trim()
      };
    }
  }

  function at_document() {
    var m = match(/^@([-\w]+)?document *([^{]+)/);

    if (m) {
      return {
        type: "document",
        document: m[2].trim(),
        vendor: m[1] ? m[1].trim() : null,
        rules: rules()
      };
    }
  }

  function at_x() {
    var m = match(/^@(import|charset|namespace)\s*([^;]+);/);

    if (m) {
      return {
        type: m[1],
        name: m[2].trim()
      };
    }
  }

  function at_rule() {
    whitespace();

    if (css[0] === "@") {
      var ret = at_keyframes() || at_supports() || at_host() || at_media() || at_custom_m() || at_page() || at_document() || at_fontface() || at_x();

      if (ret && !settings.preserveStatic) {
        var hasVarFunc = false;

        if (ret.declarations) {
          hasVarFunc = ret.declarations.some(function (decl) {
            return /var\(/.test(decl.value);
          });
        } else {
          var arr = ret.keyframes || ret.rules || [];
          hasVarFunc = arr.some(function (obj) {
            return (obj.declarations || []).some(function (decl) {
              return /var\(/.test(decl.value);
            });
          });
        }

        return hasVarFunc ? ret : {};
      }

      return ret;
    }
  }

  function rule() {
    if (!settings.preserveStatic) {
      var balancedMatch$1 = balancedMatch("{", "}", css);

      if (balancedMatch$1) {
        var hasVarDecl = balancedMatch$1.pre.indexOf(":root") !== -1 && /--\S*\s*:/.test(balancedMatch$1.body);
        var hasVarFunc = /var\(/.test(balancedMatch$1.body);

        if (!hasVarDecl && !hasVarFunc) {
          css = css.slice(balancedMatch$1.end + 1);
          return {};
        }
      }
    }

    var sel = selector() || [];
    var decls = settings.preserveStatic ? declarations() : declarations().filter(function (decl) {
      var hasVarDecl = sel.some(function (s) {
        return s.indexOf(":root") !== -1;
      }) && /^--\S/.test(decl.property);
      var hasVarFunc = /var\(/.test(decl.value);
      return hasVarDecl || hasVarFunc;
    });

    if (!sel.length) {
      error("selector missing");
    }

    return {
      type: "rule",
      selectors: sel,
      declarations: decls
    };
  }

  function rules(core) {
    if (!core && !open()) {
      return error("missing '{'");
    }

    var node;
    var rules = comments();

    while (css.length && (core || css[0] !== "}") && (node = at_rule() || rule())) {
      if (node.type) {
        rules.push(node);
      }

      rules = rules.concat(comments());
    }

    if (!core && !close()) {
      return error("missing '}'");
    }

    return rules;
  }

  return {
    type: "stylesheet",
    stylesheet: {
      rules: rules(true),
      errors: errors
    }
  };
}

function parseVars(cssData) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var defaults = {
    store: {},
    onWarning: function onWarning() {}
  };

  var settings = _extends({}, defaults, options);

  if (typeof cssData === "string") {
    cssData = parseCss(cssData, settings);
  }

  cssData.stylesheet.rules.forEach(function (rule) {
    if (rule.type !== "rule") {
      return;
    }

    if (rule.selectors.length !== 1 || rule.selectors[0] !== ":root") {
      return;
    }

    rule.declarations.forEach(function (decl, i) {
      var prop = decl.property;
      var value = decl.value;

      if (prop && prop.indexOf("--") === 0) {
        settings.store[prop] = value;
      }
    });
  });
  return settings.store;
}

function stringifyCss(tree) {
  var delim = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
  var cb = arguments.length > 2 ? arguments[2] : undefined;
  var renderMethods = {
    charset: function charset(node) {
      return "@charset " + node.name + ";";
    },
    comment: function comment(node) {
      return node.comment.indexOf("__CSSVARSPONYFILL") === 0 ? "/*" + node.comment + "*/" : "";
    },
    "custom-media": function customMedia(node) {
      return "@custom-media " + node.name + " " + node.media + ";";
    },
    declaration: function declaration(node) {
      return node.property + ":" + node.value + ";";
    },
    document: function document(node) {
      return "@" + (node.vendor || "") + "document " + node.document + "{" + visit(node.rules) + "}";
    },
    "font-face": function fontFace(node) {
      return "@font-face" + "{" + visit(node.declarations) + "}";
    },
    host: function host(node) {
      return "@host" + "{" + visit(node.rules) + "}";
    },
    "import": function _import(node) {
      return "@import " + node.name + ";";
    },
    keyframe: function keyframe(node) {
      return node.values.join(",") + "{" + visit(node.declarations) + "}";
    },
    keyframes: function keyframes(node) {
      return "@" + (node.vendor || "") + "keyframes " + node.name + "{" + visit(node.keyframes) + "}";
    },
    media: function media(node) {
      return "@media " + node.media + "{" + visit(node.rules) + "}";
    },
    namespace: function namespace(node) {
      return "@namespace " + node.name + ";";
    },
    page: function page(node) {
      return "@page " + (node.selectors.length ? node.selectors.join(", ") : "") + "{" + visit(node.declarations) + "}";
    },
    rule: function rule(node) {
      var decls = node.declarations;

      if (decls.length) {
        return node.selectors.join(",") + "{" + visit(decls) + "}";
      }
    },
    supports: function supports(node) {
      return "@supports " + node.supports + "{" + visit(node.rules) + "}";
    }
  };

  function visit(nodes) {
    var buf = "";

    for (var i = 0; i < nodes.length; i++) {
      var n = nodes[i];

      if (cb) {
        cb(n);
      }

      var txt = renderMethods[n.type](n);

      if (txt) {
        buf += txt;

        if (txt.length && n.selectors) {
          buf += delim;
        }
      }
    }

    return buf;
  }

  return visit(tree.stylesheet.rules);
}

function walkCss(node, fn) {
  node.rules.forEach(function (rule) {
    if (rule.rules) {
      walkCss(rule, fn);
      return;
    }

    if (rule.keyframes) {
      rule.keyframes.forEach(function (keyframe) {
        if (keyframe.type === "keyframe") {
          fn(keyframe.declarations, rule);
        }
      });
      return;
    }

    if (!rule.declarations) {
      return;
    }

    fn(rule.declarations, node);
  });
}

var VAR_PROP_IDENTIFIER = "--";
var VAR_FUNC_IDENTIFIER = "var";

function transformCss(cssData) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var defaults = {
    preserveStatic: true,
    preserveVars: false,
    variables: {},
    onWarning: function onWarning() {}
  };

  var settings = _extends({}, defaults, options);

  if (typeof cssData === "string") {
    cssData = parseCss(cssData, settings);
  }

  walkCss(cssData.stylesheet, function (declarations, node) {
    for (var i = 0; i < declarations.length; i++) {
      var decl = declarations[i];
      var type = decl.type;
      var prop = decl.property;
      var value = decl.value;

      if (type !== "declaration") {
        continue;
      }

      if (!settings.preserveVars && prop && prop.indexOf(VAR_PROP_IDENTIFIER) === 0) {
        declarations.splice(i, 1);
        i--;
        continue;
      }

      if (value.indexOf(VAR_FUNC_IDENTIFIER + "(") !== -1) {
        var resolvedValue = resolveValue(value, settings);

        if (resolvedValue !== decl.value) {
          resolvedValue = fixNestedCalc(resolvedValue);

          if (!settings.preserveVars) {
            decl.value = resolvedValue;
          } else {
            declarations.splice(i, 0, {
              type: type,
              property: prop,
              value: resolvedValue
            });
            i++;
          }
        }
      }
    }
  });
  return stringifyCss(cssData);
}

function fixNestedCalc(value) {
  var reCalcVal = /calc\(([^)]+)\)/g;
  (value.match(reCalcVal) || []).forEach(function (match) {
    var newVal = "calc".concat(match.split("calc").join(""));
    value = value.replace(match, newVal);
  });
  return value;
}

function resolveValue(value) {
  var settings = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

  var __recursiveFallback = arguments.length > 2 ? arguments[2] : undefined;

  if (value.indexOf("var(") === -1) {
    return value;
  }

  var valueData = balancedMatch("(", ")", value);

  function resolveFunc(value) {
    var name = value.split(",")[0].replace(/[\s\n\t]/g, "");
    var fallback = (value.match(/(?:\s*,\s*){1}(.*)?/) || [])[1];
    var match = settings.variables.hasOwnProperty(name) ? String(settings.variables[name]) : undefined;
    var replacement = match || (fallback ? String(fallback) : undefined);
    var unresolvedFallback = __recursiveFallback || value;

    if (!match) {
      settings.onWarning('variable "'.concat(name, '" is undefined'));
    }

    if (replacement && replacement !== "undefined" && replacement.length > 0) {
      return resolveValue(replacement, settings, unresolvedFallback);
    } else {
      return "var(".concat(unresolvedFallback, ")");
    }
  }

  if (!valueData) {
    if (value.indexOf("var(") !== -1) {
      settings.onWarning('missing closing ")" in the value "'.concat(value, '"'));
    }

    return value;
  } else if (valueData.pre.slice(-3) === "var") {
    var isEmptyVarFunc = valueData.body.trim().length === 0;

    if (isEmptyVarFunc) {
      settings.onWarning("var() must contain a non-whitespace string");
      return value;
    } else {
      return valueData.pre.slice(0, -3) + resolveFunc(valueData.body) + resolveValue(valueData.post, settings);
    }
  } else {
    return valueData.pre + "(".concat(resolveValue(valueData.body, settings), ")") + resolveValue(valueData.post, settings);
  }
}

var isBrowser = typeof window !== "undefined";
var isNativeSupport = isBrowser && window.CSS && window.CSS.supports && window.CSS.supports("(--a: 0)");
var counters = {
  group: 0,
  job: 0
};
var defaults = {
  rootElement: isBrowser ? document : null,
  shadowDOM: false,
  include: "style,link[rel=stylesheet]",
  exclude: "",
  variables: {},
  onlyLegacy: true,
  preserveStatic: true,
  preserveVars: false,
  silent: false,
  updateDOM: true,
  updateURLs: true,
  watch: null,
  onBeforeSend: function onBeforeSend() {},
  onWarning: function onWarning() {},
  onError: function onError() {},
  onSuccess: function onSuccess() {},
  onComplete: function onComplete() {}
};
var regex = {
  cssComments: /\/\*[\s\S]+?\*\//g,
  cssKeyframes: /@(?:-\w*-)?keyframes/,
  cssMediaQueries: /@media[^{]+\{([\s\S]+?})\s*}/g,
  cssRootRules: /(?::root\s*{\s*[^}]*})/g,
  cssUrls: /url\((?!['"]?(?:data|http|\/\/):)['"]?([^'")]*)['"]?\)/g,
  cssVarDecls: /(?:[\s;]*)(-{2}\w[\w-]*)(?:\s*:\s*)([^;]*);/g,
  cssVarFunc: /var\(\s*--[\w-]/,
  cssVars: /(?:(?::root\s*{\s*[^;]*;*\s*)|(?:var\(\s*))(--[^:)]+)(?:\s*[:)])/
};
var variableStore = {
  dom: {},
  job: {},
  user: {}
};
var cssVarsIsRunning = false;
var cssVarsObserver = null;
var cssVarsSrcNodeCount = 0;
var debounceTimer = null;
var isShadowDOMReady = false;
/**
 * Fetches, parses, and transforms CSS custom properties from specified
 * <style> and <link> elements into static values, then appends a new <style>
 * element with static values to the DOM to provide CSS custom property
 * compatibility for legacy browsers. Also provides a single interface for
 * live updates of runtime values in both modern and legacy browsers.
 *
 * @preserve
 * @param {object}   [options] Options object
 * @param {object}   [options.rootElement=document] Root element to traverse for
 *                   <link> and <style> nodes
 * @param {boolean}  [options.shadowDOM=false] Determines if shadow DOM <link>
 *                   and <style> nodes will be processed.
 * @param {string}   [options.include="style,link[rel=stylesheet]"] CSS selector
 *                   matching <link re="stylesheet"> and <style> nodes to
 *                   process
 * @param {string}   [options.exclude] CSS selector matching <link
 *                   rel="stylehseet"> and <style> nodes to exclude from those
 *                   matches by options.include
 * @param {object}   [options.variables] A map of custom property name/value
 *                   pairs. Property names can omit or include the leading
 *                   double-hyphen (—), and values specified will override
 *                   previous values
 * @param {boolean}  [options.onlyLegacy=true] Determines if the ponyfill will
 *                   only generate legacy-compatible CSS in browsers that lack
 *                   native support (i.e., legacy browsers)
 * @param {boolean}  [options.preserveStatic=true] Determines if CSS
 *                   declarations that do not reference a custom property will
 *                   be preserved in the transformed CSS
 * @param {boolean}  [options.preserveVars=false] Determines if CSS custom
 *                   property declarations will be preserved in the transformed
 *                   CSS
 * @param {boolean}  [options.silent=false] Determines if warning and error
 *                   messages will be displayed on the console
 * @param {boolean}  [options.updateDOM=true] Determines if the ponyfill will
 *                   update the DOM after processing CSS custom properties
 * @param {boolean}  [options.updateURLs=true] Determines if the ponyfill will
 *                   convert relative url() paths to absolute urls
 * @param {boolean}  [options.watch=false] Determines if a MutationObserver will
 *                   be created that will execute the ponyfill when a <link> or
 *                   <style> DOM mutation is observed
 * @param {function} [options.onBeforeSend] Callback before XHR is sent. Passes
 *                   1) the XHR object, 2) source node reference, and 3) the
 *                   source URL as arguments
 * @param {function} [options.onWarning] Callback after each CSS parsing warning
 *                   has occurred. Passes 1) a warning message as an argument.
 * @param {function} [options.onError] Callback after a CSS parsing error has
 *                   occurred or an XHR request has failed. Passes 1) an error
 *                   message, and 2) source node reference, 3) xhr, and 4 url as
 *                   arguments.
 * @param {function} [options.onSuccess] Callback after CSS data has been
 *                   collected from each node and before CSS custom properties
 *                   have been transformed. Allows modifying the CSS data before
 *                   it is transformed by returning any string value (or false
 *                   to skip). Passes 1) CSS text, 2) source node reference, and
 *                   3) the source URL as arguments.
 * @param {function} [options.onComplete] Callback after all CSS has been
 *                   processed, legacy-compatible CSS has been generated, and
 *                   (optionally) the DOM has been updated. Passes 1) a CSS
 *                   string with CSS variable values resolved, 2) an array of
 *                   output <style> node references that have been appended to
 *                   the DOM, 3) an object containing all custom properies names
 *                   and values, and 4) the ponyfill execution time in
 *                   milliseconds.
 *
 * @example
 *
 *   cssVars({
 *     rootElement   : document,
 *     shadowDOM     : false,
 *     include       : 'style,link[rel="stylesheet"]',
 *     exclude       : '',
 *     variables     : {},
 *     onlyLegacy    : true,
 *     preserveStatic: true,
 *     preserveVars  : false,
 *     silent        : false,
 *     updateDOM     : true,
 *     updateURLs    : true,
 *     watch         : false,
 *     onBeforeSend(xhr, node, url) {},
 *     onWarning(message) {},
 *     onError(message, node, xhr, url) {},
 *     onSuccess(cssText, node, url) {},
 *     onComplete(cssText, styleNode, cssVariables, benchmark) {}
 *   });
 */

function cssVars() {
  var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  var msgPrefix = "cssVars(): ";

  var settings = _extends({}, defaults, options);

  function handleError(message, sourceNode, xhr, url) {
    if (!settings.silent && window.console) {
      console.error("".concat(msgPrefix).concat(message, "\n"), sourceNode);
    }

    settings.onError(message, sourceNode, xhr, url);
  }

  function handleWarning(message) {
    if (!settings.silent && window.console) {
      console.warn("".concat(msgPrefix).concat(message));
    }

    settings.onWarning(message);
  }

  if (!isBrowser) {
    return;
  }

  if (settings.watch) {
    settings.watch = defaults.watch;
    addMutationObserver(settings);
    cssVars(settings);
    return;
  } else if (settings.watch === false && cssVarsObserver) {
    cssVarsObserver.disconnect();
    cssVarsObserver = null;
  }

  if (!settings.__benchmark) {
    if (cssVarsIsRunning === settings.rootElement) {
      cssVarsDebounced(options);
      return;
    }

    settings.__benchmark = getTimeStamp();
    settings.exclude = [cssVarsObserver ? '[data-cssvars]:not([data-cssvars=""])' : '[data-cssvars="out"]', settings.exclude].filter(function (selector) {
      return selector;
    }).join(",");
    settings.variables = fixVarNames(settings.variables);

    if (!cssVarsObserver) {
      var outNodes = Array.apply(null, settings.rootElement.querySelectorAll('[data-cssvars="out"]'));
      outNodes.forEach(function (outNode) {
        var dataGroup = outNode.getAttribute("data-cssvars-group");
        var srcNode = dataGroup ? settings.rootElement.querySelector('[data-cssvars="src"][data-cssvars-group="'.concat(dataGroup, '"]')) : null;

        if (!srcNode) {
          outNode.parentNode.removeChild(outNode);
        }
      });

      if (cssVarsSrcNodeCount) {
        var srcNodes = settings.rootElement.querySelectorAll('[data-cssvars]:not([data-cssvars="out"])');

        if (srcNodes.length < cssVarsSrcNodeCount) {
          cssVarsSrcNodeCount = srcNodes.length;
          variableStore.dom = {};
        }
      }
    }
  }

  if (document.readyState !== "loading") {
    var isShadowElm = settings.shadowDOM || settings.rootElement.shadowRoot || settings.rootElement.host;

    if (isNativeSupport && settings.onlyLegacy) {
      if (settings.updateDOM) {
        var targetElm = settings.rootElement.host || (settings.rootElement === document ? document.documentElement : settings.rootElement);
        Object.keys(settings.variables).forEach(function (key) {
          targetElm.style.setProperty(key, settings.variables[key]);
        });
      }
    } else if (isShadowElm && !isShadowDOMReady) {
      getCssData({
        rootElement: defaults.rootElement,
        include: defaults.include,
        exclude: settings.exclude,
        onSuccess: function onSuccess(cssText, node, url) {
          cssText = cssText.replace(regex.cssComments, "").replace(regex.cssMediaQueries, "");
          cssText = (cssText.match(regex.cssRootRules) || []).join("");
          return cssText || false;
        },
        onComplete: function onComplete(cssText, cssArray, nodeArray) {
          parseVars(cssText, {
            store: variableStore.dom,
            onWarning: handleWarning
          });
          isShadowDOMReady = true;
          cssVars(settings);
        }
      });
    } else {
      cssVarsIsRunning = settings.rootElement;
      getCssData({
        rootElement: settings.rootElement,
        include: settings.include,
        exclude: settings.exclude,
        onBeforeSend: settings.onBeforeSend,
        onError: function onError(xhr, node, url) {
          var responseUrl = xhr.responseURL || getFullUrl$1(url, location.href);
          var statusText = xhr.statusText ? "(".concat(xhr.statusText, ")") : "Unspecified Error" + (xhr.status === 0 ? " (possibly CORS related)" : "");
          var errorMsg = "CSS XHR Error: ".concat(responseUrl, " ").concat(xhr.status, " ").concat(statusText);
          handleError(errorMsg, node, xhr, responseUrl);
        },
        onSuccess: function onSuccess(cssText, node, url) {
          var returnVal = settings.onSuccess(cssText, node, url);
          cssText = returnVal !== undefined && Boolean(returnVal) === false ? "" : returnVal || cssText;

          if (settings.updateURLs) {
            cssText = fixRelativeCssUrls(cssText, url);
          }

          return cssText;
        },
        onComplete: function onComplete(cssText, cssArray) {
          var nodeArray = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [];
          var jobVars = {};
          var varStore = settings.updateDOM ? variableStore.dom : Object.keys(variableStore.job).length ? variableStore.job : variableStore.job = JSON.parse(JSON.stringify(variableStore.dom));
          var hasVarChange = false;
          nodeArray.forEach(function (node, i) {
            if (regex.cssVars.test(cssArray[i])) {
              try {
                var cssTree = parseCss(cssArray[i], {
                  preserveStatic: settings.preserveStatic,
                  removeComments: true
                });
                parseVars(cssTree, {
                  store: jobVars,
                  onWarning: handleWarning
                });
                node.__cssVars = {
                  tree: cssTree
                };
              } catch (err) {
                handleError(err.message, node);
              }
            }
          });

          if (settings.updateDOM) {
            _extends(variableStore.user, settings.variables);
          }

          _extends(jobVars, settings.variables);

          hasVarChange = Boolean((document.querySelector("[data-cssvars]") || Object.keys(variableStore.dom).length) && Object.keys(jobVars).some(function (name) {
            return jobVars[name] !== varStore[name];
          }));

          _extends(varStore, variableStore.user, jobVars);

          if (hasVarChange) {
            resetCssNodes(settings.rootElement);
            cssVars(settings);
          } else {
            var outCssArray = [];
            var outNodeArray = [];
            var hasKeyframesWithVars = false;
            variableStore.job = {};

            if (settings.updateDOM) {
              counters.job++;
            }

            nodeArray.forEach(function (node) {
              var isSkip = !node.__cssVars;

              if (node.__cssVars) {
                try {
                  transformCss(node.__cssVars.tree, _extends({}, settings, {
                    variables: varStore,
                    onWarning: handleWarning
                  }));
                  var outCss = stringifyCss(node.__cssVars.tree);

                  if (settings.updateDOM) {
                    if (!node.getAttribute("data-cssvars")) {
                      node.setAttribute("data-cssvars", "src");
                    }

                    if (outCss.length) {
                      var dataGroup = node.getAttribute("data-cssvars-group") || ++counters.group;
                      var outCssNoSpaces = outCss.replace(/\s/g, "");
                      var outNode = settings.rootElement.querySelector('[data-cssvars="out"][data-cssvars-group="'.concat(dataGroup, '"]')) || document.createElement("style");
                      hasKeyframesWithVars = hasKeyframesWithVars || regex.cssKeyframes.test(outCss);

                      if (!outNode.hasAttribute("data-cssvars")) {
                        outNode.setAttribute("data-cssvars", "out");
                      }

                      if (outCssNoSpaces === node.textContent.replace(/\s/g, "")) {
                        isSkip = true;

                        if (outNode && outNode.parentNode) {
                          node.removeAttribute("data-cssvars-group");
                          outNode.parentNode.removeChild(outNode);
                        }
                      } else if (outCssNoSpaces !== outNode.textContent.replace(/\s/g, "")) {
                        [node, outNode].forEach(function (n) {
                          n.setAttribute("data-cssvars-job", counters.job);
                          n.setAttribute("data-cssvars-group", dataGroup);
                        });
                        outNode.textContent = outCss;
                        outCssArray.push(outCss);
                        outNodeArray.push(outNode);

                        if (!outNode.parentNode) {
                          node.parentNode.insertBefore(outNode, node.nextSibling);
                        }
                      }
                    }
                  } else {
                    if (node.textContent.replace(/\s/g, "") !== outCss) {
                      outCssArray.push(outCss);
                    }
                  }
                } catch (err) {
                  handleError(err.message, node);
                }
              }

              if (isSkip) {
                node.setAttribute("data-cssvars", "skip");
              }

              if (!node.hasAttribute("data-cssvars-job")) {
                node.setAttribute("data-cssvars-job", counters.job);
              }
            });
            cssVarsSrcNodeCount = settings.rootElement.querySelectorAll('[data-cssvars]:not([data-cssvars="out"])').length;

            if (settings.shadowDOM) {
              var elms = [settings.rootElement].concat(_toConsumableArray(settings.rootElement.querySelectorAll("*")));

              for (var i = 0, elm; elm = elms[i]; ++i) {
                if (elm.shadowRoot && elm.shadowRoot.querySelector("style")) {
                  var shadowSettings = _extends({}, settings, {
                    rootElement: elm.shadowRoot,
                    variables: variableStore.dom
                  });

                  cssVars(shadowSettings);
                }
              }
            }

            if (settings.updateDOM && hasKeyframesWithVars) {
              fixKeyframes(settings.rootElement);
            }

            cssVarsIsRunning = false;
            settings.onComplete(outCssArray.join(""), outNodeArray, JSON.parse(JSON.stringify(varStore)), getTimeStamp() - settings.__benchmark);
          }
        }
      });
    }
  } else {
    document.addEventListener("DOMContentLoaded", function init(evt) {
      cssVars(options);
      document.removeEventListener("DOMContentLoaded", init);
    });
  }
}

cssVars.reset = function () {
  cssVarsIsRunning = false;

  if (cssVarsObserver) {
    cssVarsObserver.disconnect();
    cssVarsObserver = null;
  }

  cssVarsSrcNodeCount = 0;
  debounceTimer = null;
  isShadowDOMReady = false;

  for (var prop in variableStore) {
    variableStore[prop] = {};
  }
};

function addMutationObserver(settings) {
  function isLink(node) {
    var isStylesheet = node.tagName === "LINK" && (node.getAttribute("rel") || "").indexOf("stylesheet") !== -1;
    return isStylesheet && !node.disabled;
  }

  function isStyle(node) {
    return node.tagName === "STYLE" && !node.disabled;
  }

  function isValidAddMutation(mutationNodes) {
    return Array.apply(null, mutationNodes).some(function (node) {
      var isElm = node.nodeType === 1;
      var hasAttr = isElm && node.hasAttribute("data-cssvars");
      var isStyleWithVars = isStyle(node) && regex.cssVars.test(node.textContent);
      var isValid = !hasAttr && (isLink(node) || isStyleWithVars);
      return isValid;
    });
  }

  function isValidRemoveMutation(mutationNodes) {
    return Array.apply(null, mutationNodes).some(function (node) {
      var isElm = node.nodeType === 1;
      var isOutNode = isElm && node.getAttribute("data-cssvars") === "out";
      var isSrcNode = isElm && node.getAttribute("data-cssvars") === "src";
      var isValid = isSrcNode;

      if (isSrcNode || isOutNode) {
        var dataGroup = node.getAttribute("data-cssvars-group");
        var orphanNode = settings.rootElement.querySelector('[data-cssvars-group="'.concat(dataGroup, '"]'));

        if (isSrcNode) {
          resetCssNodes(settings.rootElement);
          variableStore.dom = {};
        }

        if (orphanNode) {
          orphanNode.parentNode.removeChild(orphanNode);
        }
      }

      return isValid;
    });
  }

  if (!window.MutationObserver) {
    return;
  }

  if (cssVarsObserver) {
    cssVarsObserver.disconnect();
    cssVarsObserver = null;
  }

  cssVarsObserver = new MutationObserver(function (mutations) {
    var hasValidMutation = mutations.some(function (mutation) {
      var isValid = false;

      if (mutation.type === "attributes") {
        isValid = isLink(mutation.target);
      } else if (mutation.type === "childList") {
        isValid = isValidAddMutation(mutation.addedNodes) || isValidRemoveMutation(mutation.removedNodes);
      }

      return isValid;
    });

    if (hasValidMutation) {
      cssVars(settings);
    }
  });
  cssVarsObserver.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["disabled", "href"],
    childList: true,
    subtree: true
  });
}

function cssVarsDebounced(settings) {
  var delay = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 100;
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(function () {
    settings.__benchmark = null;
    cssVars(settings);
  }, delay);
}

function fixKeyframes(rootElement) {
  var animationNameProp = ["animation-name", "-moz-animation-name", "-webkit-animation-name"].filter(function (prop) {
    return getComputedStyle(document.body)[prop];
  })[0];

  if (animationNameProp) {
    var allNodes = rootElement.getElementsByTagName("*");
    var keyframeNodes = [];
    var nameMarker = "__CSSVARSPONYFILL-KEYFRAMES__";

    for (var i = 0, len = allNodes.length; i < len; i++) {
      var node = allNodes[i];
      var animationName = getComputedStyle(node)[animationNameProp];

      if (animationName !== "none") {
        node.style[animationNameProp] += nameMarker;
        keyframeNodes.push(node);
      }
    }

    void document.body.offsetHeight;

    for (var _i = 0, _len = keyframeNodes.length; _i < _len; _i++) {
      var nodeStyle = keyframeNodes[_i].style;
      nodeStyle[animationNameProp] = nodeStyle[animationNameProp].replace(nameMarker, "");
    }
  }
}

function fixRelativeCssUrls(cssText, baseUrl) {
  var cssUrls = cssText.replace(regex.cssComments, "").match(regex.cssUrls) || [];
  cssUrls.forEach(function (cssUrl) {
    var oldUrl = cssUrl.replace(regex.cssUrls, "$1");
    var newUrl = getFullUrl$1(oldUrl, baseUrl);
    cssText = cssText.replace(cssUrl, cssUrl.replace(oldUrl, newUrl));
  });
  return cssText;
}

function fixVarNames() {
  var varObj = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  var reLeadingHyphens = /^-{2}/;
  return Object.keys(varObj).reduce(function (obj, value) {
    var key = reLeadingHyphens.test(value) ? value : "--".concat(value.replace(/^-+/, ""));
    obj[key] = varObj[value];
    return obj;
  }, {});
}

function getFullUrl$1(url) {
  var base = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : location.href;
  var d = document.implementation.createHTMLDocument("");
  var b = d.createElement("base");
  var a = d.createElement("a");
  d.head.appendChild(b);
  d.body.appendChild(a);
  b.href = base;
  a.href = url;
  return a.href;
}

function getTimeStamp() {
  return isBrowser && (window.performance || {}).now ? window.performance.now() : new Date().getTime();
}

function resetCssNodes(rootElement) {
  var resetNodes = Array.apply(null, rootElement.querySelectorAll('[data-cssvars="skip"],[data-cssvars="src"]'));
  resetNodes.forEach(function (node) {
    return node.setAttribute("data-cssvars", "");
  });
}
/**
 * GLightbox v2.0.0
 * Awesome pure javascript lightbox
 * made by mcstudios.com.mx
 */


var isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i);
var isTouch = isMobile !== null || document.createTouch !== undefined || 'ontouchstart' in window || 'onmsgesturechange' in window || navigator.msMaxTouchPoints;
var html = document.getElementsByTagName('html')[0];
var transitionEnd = whichTransitionEvent();
var animationEnd = whichAnimationEvent();
var uid = Date.now();
var YTTemp = [];
var videoPlayers = {}; // Default settings

var defaults$1 = {
  selector: 'glightbox',
  skin: 'clean',
  closeButton: true,
  startAt: 0,
  autoplayVideos: true,
  descPosition: 'bottom',
  width: 900,
  height: 506,
  videosWidth: 960,
  videosHeight: 540,
  beforeSlideChange: null,
  afterSlideChange: null,
  beforeSlideLoad: null,
  afterSlideLoad: null,
  onOpen: null,
  onClose: null,
  loopAtEnd: false,
  touchNavigation: true,
  keyboardNavigation: true,
  closeOnOutsideClick: true,
  jwplayer: {
    api: null,
    licenseKey: null,
    params: {
      width: '100%',
      aspectratio: '16:9',
      stretching: 'uniform'
    }
  },
  vimeo: {
    api: 'https://player.vimeo.com/api/player.js',
    params: {
      api: 1,
      title: 0,
      byline: 0,
      portrait: 0
    }
  },
  youtube: {
    api: 'https://www.youtube.com/iframe_api',
    params: {
      enablejsapi: 1,
      showinfo: 0
    }
  },
  openEffect: 'zoomIn',
  // fade, zoom, none
  closeEffect: 'zoomOut',
  // fade, zoom, none
  slideEffect: 'slide',
  // fade, slide, zoom, none
  moreText: 'See more',
  moreLength: 60,
  lightboxHtml: '',
  cssEfects: {
    fade: {
      "in": 'fadeIn',
      out: 'fadeOut'
    },
    zoom: {
      "in": 'zoomIn',
      out: 'zoomOut'
    },
    slide: {
      "in": 'slideInRight',
      out: 'slideOutLeft'
    },
    slide_back: {
      "in": 'slideInLeft',
      out: 'slideOutRight'
    }
  }
};
/* jshint multistr: true */
// You can pass your own slide structure
// just make sure that add the same classes so they are populated
// title class = gslide-title
// desc class = gslide-desc
// prev arrow class = gnext
// next arrow id = gprev
// close id = gclose

var lightboxSlideHtml = '<div class="gslide">\
         <div class="gslide-inner-content">\
            <div class="ginner-container">\
               <div class="gslide-media">\
               </div>\
               <div class="gslide-description">\
                    <div class="gdesc-inner">\
                        <h4 class="gslide-title"></h4>\
                        <div class="gslide-desc"></div>\
                    </div>\
               </div>\
            </div>\
         </div>\
       </div>';
defaults$1.slideHtml = lightboxSlideHtml;
var lightboxHtml = '<div id="glightbox-body" class="glightbox-container">\
            <div class="gloader visible"></div>\
            <div class="goverlay"></div>\
            <div class="gcontainer">\
               <div id="glightbox-slider" class="gslider"></div>\
               <a class="gnext"></a>\
               <a class="gprev"></a>\
               <a class="gclose"></a>\
            </div>\
   </div>';
defaults$1.lightboxHtml = lightboxHtml;
/**
 * Merge two or more objects
 */

function extend() {
  var extended = {};
  var deep = false;
  var i = 0;
  var length = arguments.length;

  if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
    deep = arguments[0];
    i++;
  }

  var merge = function merge(obj) {
    for (var prop in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, prop)) {
        if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
          extended[prop] = extend(true, extended[prop], obj[prop]);
        } else {
          extended[prop] = obj[prop];
        }
      }
    }
  };

  for (; i < length; i++) {
    var obj = arguments[i];
    merge(obj);
  }

  return extended;
}

var utils = {
  isFunction: function isFunction(f) {
    return typeof f === 'function';
  },
  isString: function isString(s) {
    return typeof s === 'string';
  },
  isNode: function isNode(el) {
    return !!(el && el.nodeType && el.nodeType == 1);
  },
  isArray: function isArray(ar) {
    return Array.isArray(ar);
  },
  isArrayLike: function isArrayLike(ar) {
    return ar && ar.length && isFinite(ar.length);
  },
  isObject: function isObject(o) {
    var type = _typeof(o);

    return type === 'object' && o != null && !utils.isFunction(o) && !utils.isArray(o);
  },
  isNil: function isNil(o) {
    return o == null;
  },
  has: function has(obj, key) {
    return obj !== null && hasOwnProperty.call(obj, key);
  },
  size: function size(o) {
    if (utils.isObject(o)) {
      if (o.keys) {
        return o.keys().length;
      }

      var l = 0;

      for (var k in o) {
        if (utils.has(o, k)) {
          l++;
        }
      }

      return l;
    } else {
      return o.length;
    }
  },
  isNumber: function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  }
};
/**
 * Each
 *
 * @param {mixed} node lisy, array, object
 * @param {function} callback
 */

function each(collection, callback) {
  if (utils.isNode(collection) || collection === window || collection === document) {
    collection = [collection];
  }

  if (!utils.isArrayLike(collection) && !utils.isObject(collection)) {
    collection = [collection];
  }

  if (utils.size(collection) == 0) {
    return;
  }

  if (utils.isArrayLike(collection) && !utils.isObject(collection)) {
    var l = collection.length,
        i = 0;

    for (; i < l; i++) {
      if (callback.call(collection[i], collection[i], i, collection) === false) {
        break;
      }
    }
  } else if (utils.isObject(collection)) {
    for (var key in collection) {
      if (utils.has(collection, key)) {
        if (callback.call(collection[key], collection[key], key, collection) === false) {
          break;
        }
      }
    }
  }
}
/**
 * Get nde events
 * return node events and optionally
 * check if the node has already a specific event
 * to avoid duplicated callbacks
 *
 * @param {node} node
 * @param {string} name event name
 * @param {object} fn callback
 * @returns {object}
 */


function getNodeEvents(node) {
  var name = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var fn = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
  var cache = node[uid] = node[uid] || [];
  var data = {
    all: cache,
    evt: null,
    found: null
  };

  if (name && fn && utils.size(cache) > 0) {
    each(cache, function (cl, i) {
      if (cl.eventName == name && cl.fn.toString() == fn.toString()) {
        data.found = true;
        data.evt = i;
        return false;
      }
    });
  }

  return data;
}
/**
 * Add Event
 * Add an event listener
 *
 * @param {string} eventName
 * @param {object} detials
 */


function addEvent(eventName) {
  var _ref4 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
      onElement = _ref4.onElement,
      withCallback = _ref4.withCallback,
      _ref4$avoidDuplicate = _ref4.avoidDuplicate,
      avoidDuplicate = _ref4$avoidDuplicate === void 0 ? true : _ref4$avoidDuplicate,
      _ref4$once = _ref4.once,
      once = _ref4$once === void 0 ? false : _ref4$once,
      _ref4$useCapture = _ref4.useCapture,
      useCapture = _ref4$useCapture === void 0 ? false : _ref4$useCapture;

  var thisArg = arguments.length > 2 ? arguments[2] : undefined;
  var element = onElement || [];

  if (utils.isString(element)) {
    element = document.querySelectorAll(element);
  }

  function handler(event) {
    if (utils.isFunction(withCallback)) {
      withCallback.call(thisArg, event, this);
    }

    if (once) {
      handler.destroy();
    }
  }

  handler.destroy = function () {
    each(element, function (el) {
      var events = getNodeEvents(el, eventName, handler);

      if (events.found) {
        events.all.splice(events.evt, 1);
      }

      if (el.removeEventListener) el.removeEventListener(eventName, handler, useCapture);
    });
  };

  each(element, function (el) {
    var events = getNodeEvents(el, eventName, handler);

    if (el.addEventListener && avoidDuplicate && !events.found || !avoidDuplicate) {
      el.addEventListener(eventName, handler, useCapture);
      events.all.push({
        eventName: eventName,
        fn: handler
      });
    }
  });
  return handler;
}
/**
 * Add element class
 *
 * @param {node} element
 * @param {string} class name
 */


function addClass(node, name) {
  if (hasClass(node, name)) {
    return;
  }

  if (node.classList) {
    node.classList.add(name);
  } else {
    node.className += " " + name;
  }
}
/**
 * Remove element class
 *
 * @param {node} element
 * @param {string} class name
 */


function removeClass(node, name) {
  var c = name.split(' ');

  if (c.length > 1) {
    each(c, function (cl) {
      removeClass(node, cl);
    });
    return;
  }

  if (node.classList) {
    node.classList.remove(name);
  } else {
    node.className = node.className.replace(name, "");
  }
}
/**
 * Has class
 *
 * @param {node} element
 * @param {string} class name
 */


function hasClass(node, name) {
  return node.classList ? node.classList.contains(name) : new RegExp("(^| )" + name + "( |$)", "gi").test(node.className);
}
/**
 * Determine animation events
 */


function whichAnimationEvent() {
  var t,
      el = document.createElement("fakeelement");
  var animations = {
    animation: "animationend",
    OAnimation: "oAnimationEnd",
    MozAnimation: "animationend",
    WebkitAnimation: "webkitAnimationEnd"
  };

  for (t in animations) {
    if (el.style[t] !== undefined) {
      return animations[t];
    }
  }
}
/**
 * Determine transition events
 */


function whichTransitionEvent() {
  var t,
      el = document.createElement("fakeelement");
  var transitions = {
    transition: "transitionend",
    OTransition: "oTransitionEnd",
    MozTransition: "transitionend",
    WebkitTransition: "webkitTransitionEnd"
  };

  for (t in transitions) {
    if (el.style[t] !== undefined) {
      return transitions[t];
    }
  }
}
/**
 * CSS Animations
 *
 * @param {node} element
 * @param {string} animation name
 * @param {function} callback
 */


function animateElement(element) {
  var animation = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  if (!element || animation === '') {
    return false;
  }

  if (animation == 'none') {
    if (utils.isFunction(callback)) callback();
    return false;
  }

  var animationNames = animation.split(' ');
  each(animationNames, function (name) {
    addClass(element, 'g' + name);
  });
  addEvent(animationEnd, {
    onElement: element,
    avoidDuplicate: false,
    once: true,
    withCallback: function withCallback(event, target) {
      each(animationNames, function (name) {
        removeClass(target, 'g' + name);
      });
      if (utils.isFunction(callback)) callback();
    }
  });
}
/**
 * Create a document fragment
 *
 * @param {string} html code
 */


function createHTML(htmlStr) {
  var frag = document.createDocumentFragment(),
      temp = document.createElement('div');
  temp.innerHTML = htmlStr;

  while (temp.firstChild) {
    frag.appendChild(temp.firstChild);
  }

  return frag;
}
/**
 * Get the closestElement
 *
 * @param {node} element
 * @param {string} class name
 */


function getClosest(elem, selector) {
  while (elem !== document.body) {
    elem = elem.parentElement;
    var matches = typeof elem.matches == 'function' ? elem.matches(selector) : elem.msMatchesSelector(selector);
    if (matches) return elem;
  }
}
/**
 * Show element
 *
 * @param {node} element
 */


function show(element) {
  element.style.display = 'block';
}
/**
 * Hide element
 */


function hide(element) {
  element.style.display = 'none';
}
/**
 * Get slide data
 *
 * @param {node} element
 */


var getSlideData = function getSlideData() {
  var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var settings = arguments.length > 1 ? arguments[1] : undefined;
  var data = {
    href: '',
    title: '',
    type: '',
    description: '',
    descPosition: 'bottom',
    effect: '',
    node: element
  };

  if (utils.isObject(element) && !utils.isNode(element)) {
    return extend(data, element);
  }

  var url = '';
  var config = element.getAttribute('data-glightbox');
  var nodeType = element.nodeName.toLowerCase();
  if (nodeType === 'a') url = element.href;
  if (nodeType === 'img') url = element.src;
  data.href = url;
  each(data, function (val, key) {
    if (utils.has(settings, key)) {
      data[key] = settings[key];
    }

    var nodeData = element.dataset[key];

    if (!utils.isNil(nodeData)) {
      data[key] = nodeData;
    }
  });

  if (!data.type) {
    data.type = getSourceType(url);
  }

  if (!utils.isNil(config)) {
    var cleanKeys = [];
    each(data, function (v, k) {
      cleanKeys.push(';\\s?' + k);
    });
    cleanKeys = cleanKeys.join('\\s?:|');

    if (config.trim() !== '') {
      each(data, function (val, key) {
        var str = config;
        var match = '\s?' + key + '\s?:\s?(.*?)(' + cleanKeys + '\s?:|$)';
        var regex = new RegExp(match);
        var matches = str.match(regex);

        if (matches && matches.length && matches[1]) {
          var value = matches[1].trim().replace(/;\s*$/, '');
          data[key] = value;
        }
      });
    }
  } else {
    if (nodeType == 'a') {
      var title = element.title;
      if (!utils.isNil(title) && title !== '') data.title = title;
    }

    if (nodeType == 'img') {
      var alt = element.alt;
      if (!utils.isNil(alt) && alt !== '') data.title = alt;
    }

    var desc = element.getAttribute('data-description');
    if (!utils.isNil(desc) && desc !== '') data.description = desc;
  }

  var nodeDesc = element.querySelector('.glightbox-desc');

  if (nodeDesc) {
    data.description = nodeDesc.innerHTML;
  }

  var defaultWith = data.type == 'video' ? settings.videosWidth : settings.width;
  var defaultHeight = data.type == 'video' ? settings.videosHeight : settings.height;
  data.width = utils.has(data, 'width') ? data.width : defaultWith;
  data.height = utils.has(data, 'height') ? data.height : defaultHeight;
  return data;
};
/**
 * Set slide content
 *
 * @param {node} slide
 * @param {object} data
 * @param {function} callback
 */


var setSlideContent = function setSlideContent() {
  var _this8 = this;

  var slide = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  if (hasClass(slide, 'loaded')) {
    return false;
  }

  if (utils.isFunction(this.settings.beforeSlideLoad)) {
    this.settings.beforeSlideLoad(slide, data);
  }

  var type = data.type;
  var position = data.descPosition;
  var slideMedia = slide.querySelector('.gslide-media');
  var slideTitle = slide.querySelector('.gslide-title');
  var slideText = slide.querySelector('.gslide-desc');
  var slideDesc = slide.querySelector('.gdesc-inner');
  var finalCallback = callback;

  if (utils.isFunction(this.settings.afterSlideLoad)) {
    finalCallback = function finalCallback() {
      if (utils.isFunction(callback)) {
        callback();
      }

      _this8.settings.afterSlideLoad(slide, data);
    };
  }

  if (data.title == '' && data.description == '') {
    if (slideDesc) {
      slideDesc.parentNode.removeChild(slideDesc);
    }
  } else {
    if (slideTitle && data.title !== '') {
      slideTitle.innerHTML = data.title;
    } else {
      slideTitle.parentNode.removeChild(slideTitle);
    }

    if (slideText && data.description !== '') {
      if (isMobile && this.settings.moreLength > 0) {
        data.smallDescription = slideShortDesc(data.description, this.settings.moreLength, this.settings.moreText);
        slideText.innerHTML = data.smallDescription;
        slideDescriptionEvents.apply(this, [slideText, data]);
      } else {
        slideText.innerHTML = data.description;
      }
    } else {
      slideText.parentNode.removeChild(slideText);
    }

    addClass(slideMedia.parentNode, "desc-".concat(position));
    addClass(slideDesc.parentNode, "description-".concat(position));
  }

  addClass(slideMedia, "gslide-".concat(type));
  addClass(slide, 'loaded');

  if (type === 'video') {
    slideMedia.innerHTML = '<div class="gvideo-wrapper"></div>';
    setSlideVideo.apply(this, [slide, data, finalCallback]);
    return;
  }

  if (type === 'external') {
    var iframe = createIframe({
      url: data.href,
      width: data.width,
      height: data.height,
      callback: finalCallback
    });
    slideMedia.parentNode.style.maxWidth = "".concat(data.width, "px");
    slideMedia.appendChild(iframe);
    return;
  }

  if (type === 'inline') {
    setInlineContent.apply(this, [slide, data, finalCallback]);
    return;
  }

  if (type === 'image') {
    var img = new Image();
    img.addEventListener('load', function () {
      if (utils.isFunction(finalCallback)) {
        finalCallback();
      }
    }, false);
    img.src = data.href;
    slideMedia.appendChild(img);
    return;
  }

  if (utils.isFunction(finalCallback)) finalCallback();
};
/**
 * Set slide video
 *
 * @param {node} slide
 * @param {object} data
 * @param {function} callback
 */


function setSlideVideo(slide, data, callback) {
  var _this9 = this;

  var videoID = 'gvideo' + data.index; // const slideMedia = slide.querySelector('.gslide-media');

  var slideMedia = slide.querySelector('.gvideo-wrapper');
  var url = data.href;
  var protocol = location.protocol.replace(':', '');

  if (protocol == 'file') {
    protocol = 'http';
  } // Set vimeo videos


  if (url.match(/vimeo\.com\/([0-9]*)/)) {
    var vimeoID = /vimeo.*\/(\d+)/i.exec(url);
    var params = parseUrlParams(this.settings.vimeo.params);
    var videoUrl = "".concat(protocol, "://player.vimeo.com/video/").concat(vimeoID[1], "?").concat(params);
    injectVideoApi(this.settings.vimeo.api);

    var finalCallback = function finalCallback() {
      waitUntil(function () {
        return typeof Vimeo !== 'undefined';
      }, function () {
        var player = new Vimeo.Player(iframe);
        videoPlayers[videoID] = player;

        if (utils.isFunction(callback)) {
          callback();
        }
      });
    };

    slideMedia.parentNode.style.maxWidth = "".concat(data.width, "px");
    slideMedia.style.width = "".concat(data.width, "px");
    slideMedia.style.maxHeight = "".concat(data.height, "px");
    var iframe = createIframe({
      url: videoUrl,
      callback: finalCallback,
      allow: 'autoplay; fullscreen',
      appendTo: slideMedia
    });
    iframe.id = videoID;
    iframe.className = 'vimeo-video gvideo';

    if (this.settings.autoplayVideos && !isMobile) {
      iframe.className += ' wait-autoplay';
    }
  } // Set youtube videos


  if (url.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || url.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) {
    var youtubeParams = extend(this.settings.youtube.params, {
      playerapiid: videoID
    });
    var yparams = parseUrlParams(youtubeParams);
    var youtubeID = getYoutubeID(url);

    var _videoUrl = "".concat(protocol, "://www.youtube.com/embed/").concat(youtubeID, "?").concat(yparams);

    injectVideoApi(this.settings.youtube.api);

    var _finalCallback = function _finalCallback() {
      if (!utils.isNil(YT) && YT.loaded) {
        var player = new YT.Player(_iframe);
        videoPlayers[videoID] = player;
      } else {
        YTTemp.push(_iframe);
      }

      if (utils.isFunction(callback)) {
        callback();
      }
    };

    slideMedia.parentNode.style.maxWidth = "".concat(data.width, "px");
    slideMedia.style.width = "".concat(data.width, "px");
    slideMedia.style.maxHeight = "".concat(data.height, "px");

    var _iframe = createIframe({
      url: _videoUrl,
      callback: _finalCallback,
      allow: 'autoplay; fullscreen',
      appendTo: slideMedia
    });

    _iframe.id = videoID;
    _iframe.className = 'youtube-video gvideo';

    if (this.settings.autoplayVideos && !isMobile) {
      _iframe.className += ' wait-autoplay';
    }
  } // Set local videos


  if (url.match(/\.(mp4|ogg|webm)$/) !== null) {
    var _html = '<video id="' + videoID + '" ';

    _html += "style=\"background:#000; width: ".concat(data.width, "px; height: ").concat(data.height, "px;\" ");
    _html += 'preload="metadata" ';
    _html += 'x-webkit-airplay="allow" ';
    _html += 'webkit-playsinline="" ';
    _html += 'controls ';
    _html += 'class="gvideo">';
    var format = url.toLowerCase().split('.').pop();
    var sources = {
      'mp4': '',
      'ogg': '',
      'webm': ''
    };
    sources[format] = url;

    for (var key in sources) {
      if (sources.hasOwnProperty(key)) {
        var videoFile = sources[key];

        if (data.hasOwnProperty(key)) {
          videoFile = data[key];
        }

        if (videoFile !== '') {
          _html += "<source src=\"".concat(videoFile, "\" type=\"video/").concat(key, "\">");
        }
      }
    }

    _html += '</video>';
    var video = createHTML(_html);
    slideMedia.appendChild(video);
    var vnode = document.getElementById(videoID);

    if (this.settings.jwplayer !== null && this.settings.jwplayer.api !== null) {
      var jwplayerConfig = this.settings.jwplayer;
      var jwplayerApi = this.settings.jwplayer.api;

      if (!jwplayerApi) {
        console.warn('Missing jwplayer api file');
        if (utils.isFunction(callback)) callback();
        return false;
      }

      injectVideoApi(jwplayerApi, function () {
        var jwconfig = extend(_this9.settings.jwplayer.params, {
          width: "".concat(data.width, "px"),
          height: "".concat(data.height, "px"),
          file: url
        });
        jwplayer.key = _this9.settings.jwplayer.licenseKey;
        var player = jwplayer(videoID);
        player.setup(jwconfig);
        videoPlayers[videoID] = player;
        player.on('ready', function () {
          vnode = slideMedia.querySelector('.jw-video');
          addClass(vnode, 'gvideo');
          vnode.id = videoID;
          if (utils.isFunction(callback)) callback();
        });
      });
    } else {
      addClass(vnode, 'html5-video');
      videoPlayers[videoID] = vnode;
      if (utils.isFunction(callback)) callback();
    }
  }
}
/**
 * Create an iframe element
 *
 * @param {string} url
 * @param {numeric} width
 * @param {numeric} height
 * @param {function} callback
 */


function createIframe(config) {
  var url = config.url,
      width = config.width,
      height = config.height,
      allow = config.allow,
      callback = config.callback,
      appendTo = config.appendTo;
  var iframe = document.createElement('iframe');
  var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  iframe.className = 'vimeo-video gvideo';
  iframe.src = url;

  if (height) {
    if (isMobile && winWidth < 767) {
      iframe.style.height = '';
    } else {
      iframe.style.height = "".concat(height, "px");
    }
  }

  if (width) {
    iframe.style.width = "".concat(width, "px");
  }

  if (allow) {
    iframe.setAttribute('allow', allow);
  }

  iframe.onload = function () {
    addClass(iframe, 'iframe-ready');

    if (utils.isFunction(callback)) {
      callback();
    }
  };

  if (appendTo) {
    appendTo.appendChild(iframe);
  }

  return iframe;
}
/**
 * Get youtube ID
 *
 * @param {string} url
 * @returns {string} video id
 */


function getYoutubeID(url) {
  var videoID = '';
  url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);

  if (url[2] !== undefined) {
    videoID = url[2].split(/[^0-9a-z_\-]/i);
    videoID = videoID[0];
  } else {
    videoID = url;
  }

  return videoID;
}
/**
 * Inject videos api
 * used for youtube, vimeo and jwplayer
 *
 * @param {string} url
 * @param {function} callback
 */


function injectVideoApi(url, callback) {
  if (utils.isNil(url)) {
    console.error('Inject videos api error');
    return;
  }

  var found = document.querySelectorAll('script[src="' + url + '"]');

  if (utils.isNil(found) || found.length == 0) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;

    script.onload = function () {
      if (utils.isFunction(callback)) callback();
    };

    document.body.appendChild(script);
    return false;
  }

  if (utils.isFunction(callback)) callback();
}
/**
 * Handle youtube Api
 * This is a simple fix, when the video
 * is ready sometimes the youtube api is still
 * loading so we can not autoplay or pause
 * we need to listen onYouTubeIframeAPIReady and
 * register the videos if required
 */


function youtubeApiHandle() {
  for (var i = 0; i < YTTemp.length; i++) {
    var iframe = YTTemp[i];
    var player = new YT.Player(iframe);
    videoPlayers[iframe.id] = player;
  }
}

if (typeof window.onYouTubeIframeAPIReady !== 'undefined') {
  window.onYouTubeIframeAPIReady = function () {
    window.onYouTubeIframeAPIReady();
    youtubeApiHandle();
  };
} else {
  window.onYouTubeIframeAPIReady = youtubeApiHandle;
}
/**
 * Wait until
 * wait until all the validations
 * are passed
 *
 * @param {function} check
 * @param {function} onComplete
 * @param {numeric} delay
 * @param {numeric} timeout
 */


function waitUntil(check, onComplete, delay, timeout) {
  if (check()) {
    onComplete();
    return;
  }

  if (!delay) delay = 100;
  var timeoutPointer;
  var intervalPointer = setInterval(function () {
    if (!check()) return;
    clearInterval(intervalPointer);
    if (timeoutPointer) clearTimeout(timeoutPointer);
    onComplete();
  }, delay);
  if (timeout) timeoutPointer = setTimeout(function () {
    clearInterval(intervalPointer);
  }, timeout);
}
/**
 * Parse url params
 * convert an object in to a
 * url query string parameters
 *
 * @param {object} params
 */


function parseUrlParams(params) {
  var qs = '';
  var i = 0;
  each(params, function (val, key) {
    if (i > 0) {
      qs += '&amp;';
    }

    qs += key + '=' + val;
    i += 1;
  });
  return qs;
}
/**
 * Set slide inline content
 * we'll extend this to make http
 * requests using the fetch api
 * but for now we keep it simple
 *
 * @param {node} slide
 * @param {object} data
 * @param {function} callback
 */


function setInlineContent(slide, data, callback) {
  var slideMedia = slide.querySelector('.gslide-media');
  var hash = data.href.split('#').pop().trim();
  var div = document.getElementById(hash);

  if (!div) {
    return false;
  }

  var cloned = div.cloneNode(true);
  cloned.style.height = "".concat(data.height, "px");
  cloned.style.maxWidth = "".concat(data.width, "px");
  addClass(cloned, 'ginlined-content');
  slideMedia.appendChild(cloned);

  if (utils.isFunction(callback)) {
    callback();
  }

  return;
}
/**
 * Get source type
 * gte the source type of a url
 *
 * @param {string} url
 */


var getSourceType = function getSourceType(url) {
  var origin = url;
  url = url.toLowerCase();

  if (url.match(/\.(jpeg|jpg|gif|png|apn|webp|svg)$/) !== null) {
    return 'image';
  }

  if (url.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || url.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) {
    return 'video';
  }

  if (url.match(/vimeo\.com\/([0-9]*)/)) {
    return 'video';
  }

  if (url.match(/\.(mp4|ogg|webm)$/) !== null) {
    return 'video';
  } // Check if inline content


  if (url.indexOf("#") > -1) {
    var hash = origin.split('#').pop();

    if (hash.trim() !== '') {
      return 'inline';
    }
  } // Ajax


  if (url.includes("gajax=true")) {
    return 'ajax';
  }

  return 'external';
};
/**
 * Desktop keyboard navigation
 */


function keyboardNavigation() {
  var _this10 = this;

  if (this.events.hasOwnProperty('keyboard')) {
    return false;
  }

  this.events['keyboard'] = addEvent('keydown', {
    onElement: window,
    withCallback: function withCallback(event, target) {
      event = event || window.event;
      var key = event.keyCode;
      if (key == 39) _this10.nextSlide();
      if (key == 37) _this10.prevSlide();
      if (key == 27) _this10.close();
    }
  });
}
/**
 * Touch navigation
 */


function touchNavigation() {
  var _this11 = this;

  if (this.events.hasOwnProperty('touchStart')) {
    return false;
  }

  var index,
      hDistance,
      vDistance,
      hDistanceLast,
      vDistanceLast,
      hDistancePercent,
      vSwipe = false,
      hSwipe = false,
      hSwipMinDistance = 0,
      vSwipMinDistance = 0,
      doingPinch = false,
      pinchBigger = false,
      startCoords = {},
      endCoords = {},
      slider = this.slidesContainer,
      activeSlide = null,
      xDown = 0,
      yDown = 0,
      activeSlideImage = null,
      activeSlideMedia = null,
      activeSlideDesc = null;
  var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  var winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  var body = document.body;
  this.events['doctouchmove'] = addEvent('touchmove', {
    onElement: document,
    withCallback: function withCallback(e, target) {
      if (hasClass(body, 'gdesc-open')) {
        e.preventDefault();
        return false;
      }
    },
    useCapture: {
      passive: false
    }
  });
  this.events['touchStart'] = addEvent('touchstart', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      if (hasClass(body, 'gdesc-open')) {
        return;
      }

      addClass(body, 'touching');
      activeSlide = _this11.getActiveSlide();
      activeSlideImage = activeSlide.querySelector('.gslide-image');
      activeSlideMedia = activeSlide.querySelector('.gslide-media');
      activeSlideDesc = activeSlide.querySelector('.gslide-description');
      index = _this11.index;
      endCoords = e.targetTouches[0];
      startCoords.pageX = e.targetTouches[0].pageX;
      startCoords.pageY = e.targetTouches[0].pageY;
      xDown = e.targetTouches[0].clientX;
      yDown = e.targetTouches[0].clientY;
    }
  });
  this.events['gestureStart'] = addEvent('gesturestart', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      if (activeSlideImage) {
        e.preventDefault();
        doingPinch = true;
      }
    }
  });
  this.events['gestureChange'] = addEvent('gesturechange', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      e.preventDefault();
      slideCSSTransform(activeSlideImage, "scale(".concat(e.scale, ")"));
    }
  });
  this.events['gesturEend'] = addEvent('gestureend', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      doingPinch = false;

      if (e.scale < 1) {
        pinchBigger = false;
        slideCSSTransform(activeSlideImage, "scale(1)");
      } else {
        pinchBigger = true;
      }
    }
  });
  this.events['touchMove'] = addEvent('touchmove', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      if (!hasClass(body, 'touching')) {
        return;
      }

      if (hasClass(body, 'gdesc-open') || doingPinch || pinchBigger) {
        return;
      }

      e.preventDefault();
      endCoords = e.targetTouches[0];
      var slideHeight = activeSlide.querySelector('.gslide-inner-content').offsetHeight;
      var slideWidth = activeSlide.querySelector('.gslide-inner-content').offsetWidth;
      var xUp = e.targetTouches[0].clientX;
      var yUp = e.targetTouches[0].clientY;
      var xDiff = xDown - xUp;
      var yDiff = yDown - yUp;

      if (Math.abs(xDiff) > Math.abs(yDiff)) {
        /*most significant*/
        vSwipe = false;
        hSwipe = true;
      } else {
        hSwipe = false;
        vSwipe = true;
      }

      if (vSwipe) {
        vDistanceLast = vDistance;
        vDistance = endCoords.pageY - startCoords.pageY;

        if (Math.abs(vDistance) >= vSwipMinDistance || vSwipe) {
          var opacity = 0.75 - Math.abs(vDistance) / slideHeight;
          activeSlideMedia.style.opacity = opacity;

          if (activeSlideDesc) {
            activeSlideDesc.style.opacity = opacity;
          }

          slideCSSTransform(activeSlideMedia, "translate3d(0, ".concat(vDistance, "px, 0)"));
        }

        return;
      }

      hDistanceLast = hDistance;
      hDistance = endCoords.pageX - startCoords.pageX;
      hDistancePercent = hDistance * 100 / winWidth;

      if (hSwipe) {
        if (_this11.index + 1 == _this11.elements.length && hDistance < -60) {
          resetSlideMove(activeSlide);
          return false;
        }

        if (_this11.index - 1 < 0 && hDistance > 60) {
          resetSlideMove(activeSlide);
          return false;
        }

        var _opacity = 0.75 - Math.abs(hDistance) / slideWidth;

        activeSlideMedia.style.opacity = _opacity;

        if (activeSlideDesc) {
          activeSlideDesc.style.opacity = _opacity;
        }

        slideCSSTransform(activeSlideMedia, "translate3d(".concat(hDistancePercent, "%, 0, 0)"));
      }
    },
    useCapture: {
      passive: false
    }
  });
  this.events['touchEnd'] = addEvent('touchend', {
    onElement: body,
    withCallback: function withCallback(e, target) {
      vDistance = endCoords.pageY - startCoords.pageY;
      hDistance = endCoords.pageX - startCoords.pageX;
      hDistancePercent = hDistance * 100 / winWidth;
      removeClass(body, 'touching');
      var slideHeight = activeSlide.querySelector('.gslide-inner-content').offsetHeight;
      var slideWidth = activeSlide.querySelector('.gslide-inner-content').offsetWidth; // Swipe to top/bottom to close

      if (vSwipe) {
        var onEnd = slideHeight / 2;
        vSwipe = false;

        if (Math.abs(vDistance) >= onEnd) {
          _this11.close();

          return;
        }

        resetSlideMove(activeSlide);
        return;
      }

      if (hSwipe) {
        hSwipe = false;
        var where = 'prev';
        var asideExist = true;

        if (hDistance < 0) {
          where = 'next';
          hDistance = Math.abs(hDistance);
        }

        if (where == 'prev' && _this11.index - 1 < 0) {
          asideExist = false;
        }

        if (where == 'next' && _this11.index + 1 >= _this11.elements.length) {
          asideExist = false;
        }

        if (asideExist && hDistance >= slideWidth / 2 - 90) {
          if (where == 'next') {
            _this11.nextSlide();
          } else {
            _this11.prevSlide();
          }

          return;
        }

        resetSlideMove(activeSlide);
      }
    }
  });
}

function slideCSSTransform(slide) {
  var translate = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

  if (translate == '') {
    slide.style.webkitTransform = '';
    slide.style.MozTransform = '';
    slide.style.msTransform = '';
    slide.style.OTransform = '';
    slide.style.transform = '';
    return false;
  }

  slide.style.webkitTransform = translate;
  slide.style.MozTransform = translate;
  slide.style.msTransform = translate;
  slide.style.OTransform = translate;
  slide.style.transform = translate;
}

function resetSlideMove(slide) {
  var media = slide.querySelector('.gslide-media');
  var desc = slide.querySelector('.gslide-description');
  addClass(media, 'greset');
  slideCSSTransform(media, "translate3d(0, 0, 0)");
  var animation = addEvent(transitionEnd, {
    onElement: media,
    once: true,
    withCallback: function withCallback(event, target) {
      removeClass(media, 'greset');
    }
  });
  media.style.opacity = '';

  if (desc) {
    desc.style.opacity = '';
  }
}

function slideShortDesc(string) {
  var n = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 50;
  var wordBoundary = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
  var useWordBoundary = wordBoundary;
  string = string.trim();

  if (string.length <= n) {
    return string;
  }

  var subString = string.substr(0, n - 1);

  if (!useWordBoundary) {
    return subString;
  }

  return subString + '... <a href="#" class="desc-more">' + wordBoundary + '</a>';
}

function slideDescriptionEvents(desc, data) {
  var moreLink = desc.querySelector('.desc-more');

  if (!moreLink) {
    return false;
  }

  addEvent('click', {
    onElement: moreLink,
    withCallback: function withCallback(event, target) {
      event.preventDefault();
      var body = document.body;
      var desc = getClosest(target, '.gslide-desc');

      if (!desc) {
        return false;
      }

      desc.innerHTML = data.description;
      addClass(body, 'gdesc-open');
      var shortEvent = addEvent('click', {
        onElement: [body, getClosest(desc, '.gslide-description')],
        withCallback: function withCallback(event, target) {
          if (event.target.nodeName.toLowerCase() !== 'a') {
            removeClass(body, 'gdesc-open');
            addClass(body, 'gdesc-closed');
            desc.innerHTML = data.smallDescription;
            slideDescriptionEvents(desc, data);
            setTimeout(function () {
              removeClass(body, 'gdesc-closed');
            }, 400);
            shortEvent.destroy();
          }
        }
      });
    }
  });
}
/**
 * GLightbox Class
 * Class and public methods
 */


var GlightboxInit =
/*#__PURE__*/
function () {
  function GlightboxInit(options) {
    _classCallCheck(this, GlightboxInit);

    this.settings = extend(defaults$1, options || {});
    this.effectsClasses = this.getAnimationClasses();
  }

  _createClass(GlightboxInit, [{
    key: "init",
    value: function init() {
      var _this12 = this;

      this.baseEvents = addEvent('click', {
        onElement: ".".concat(this.settings.selector),
        withCallback: function withCallback(e, target) {
          e.preventDefault();

          _this12.open(target);
        }
      });
    }
  }, {
    key: "open",
    value: function open() {
      var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.elements = this.getElements(element);
      if (this.elements.length == 0) return false;
      this.activeSlide = null;
      this.prevActiveSlideIndex = null;
      this.prevActiveSlide = null;
      var index = this.settings.startAt;

      if (element) {
        // if element passed, get the index
        index = this.elements.indexOf(element);

        if (index < 0) {
          index = 0;
        }
      }

      this.build();
      animateElement(this.overlay, this.settings.openEffect == 'none' ? 'none' : this.settings.cssEfects.fade["in"]);
      var body = document.body;
      body.style.width = "".concat(body.offsetWidth, "px");
      addClass(body, 'glightbox-open');
      addClass(html, 'glightbox-open');

      if (isMobile) {
        addClass(html, 'glightbox-mobile');
        this.settings.slideEffect = 'slide';
      }

      this.showSlide(index, true);

      if (this.elements.length == 1) {
        hide(this.prevButton);
        hide(this.nextButton);
      } else {
        show(this.prevButton);
        show(this.nextButton);
      }

      this.lightboxOpen = true;

      if (utils.isFunction(this.settings.onOpen)) {
        this.settings.onOpen();
      }

      if (isMobile && isTouch && this.settings.touchNavigation) {
        touchNavigation.apply(this);
        return false;
      }

      if (this.settings.keyboardNavigation) {
        keyboardNavigation.apply(this);
      }
    }
    /**
     * Set Slide
     */

  }, {
    key: "showSlide",
    value: function showSlide() {
      var _this13 = this;

      var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      var first = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      show(this.loader);
      this.index = index;
      var current = this.slidesContainer.querySelector('.current');

      if (current) {
        removeClass(current, 'current');
      } // hide prev slide


      this.slideAnimateOut();
      var slide = this.slidesContainer.querySelectorAll('.gslide')[index];
      show(this.slidesContainer); // Check if slide's content is alreay loaded

      if (hasClass(slide, 'loaded')) {
        this.slideAnimateIn(slide, first);
        hide(this.loader);
      } else {
        // If not loaded add the slide content
        show(this.loader); // console.log("a", this.settings);

        var slide_data = getSlideData(this.elements[index], this.settings); // console.log(slide_data);

        slide_data.index = index;
        setSlideContent.apply(this, [slide, slide_data, function () {
          hide(_this13.loader);

          _this13.slideAnimateIn(slide, first);
        }]);
      } // Preload subsequent slides


      this.preloadSlide(index + 1);
      this.preloadSlide(index - 1); // Handle navigation arrows

      removeClass(this.nextButton, 'disabled');
      removeClass(this.prevButton, 'disabled');

      if (index === 0) {
        addClass(this.prevButton, 'disabled');
      } else if (index === this.elements.length - 1 && this.settings.loopAtEnd !== true) {
        addClass(this.nextButton, 'disabled');
      }

      this.activeSlide = slide;
    }
    /**
     * Preload slides
     * @param  {Int}  index slide index
     * @return {null}
     */

  }, {
    key: "preloadSlide",
    value: function preloadSlide(index) {
      var _this14 = this;

      // Verify slide index, it can not be lower than 0
      // and it can not be greater than the total elements
      if (index < 0 || index > this.elements.length) return false;
      if (utils.isNil(this.elements[index])) return false;
      var slide = this.slidesContainer.querySelectorAll('.gslide')[index];

      if (hasClass(slide, 'loaded')) {
        return false;
      }

      var slide_data = getSlideData(this.elements[index], this.settings);
      slide_data.index = index;
      var type = slide_data.sourcetype;

      if (type == 'video' || type == 'external') {
        setTimeout(function () {
          setSlideContent.apply(_this14, [slide, slide_data]);
        }, 200);
      } else {
        setSlideContent.apply(this, [slide, slide_data]);
      }
    }
    /**
    * Load previous slide
    * calls goToslide
    */

  }, {
    key: "prevSlide",
    value: function prevSlide() {
      var prev = this.index - 1;

      if (prev < 0) {
        return false;
      }

      this.goToSlide(prev);
    }
    /**
     * Load next slide
     * calls goToslide
     */

  }, {
    key: "nextSlide",
    value: function nextSlide() {
      var next = this.index + 1;
      if (next > this.elements.length) return false;
      this.goToSlide(next);
    }
    /**
     * Go to sldei
     * calls set slide
     * @param [Int] - index
     */

  }, {
    key: "goToSlide",
    value: function goToSlide() {
      var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      if (index > -1) {
        this.prevActiveSlide = this.activeSlide;
        this.prevActiveSlideIndex = this.index;

        if (index < this.elements.length) {
          this.showSlide(index);
        } else {
          if (this.settings.loopAtEnd === true) {
            index = 0;
            this.showSlide(index);
          }
        }
      }
    }
    /**
     * Slide In
     * @return {null}
     */

  }, {
    key: "slideAnimateIn",
    value: function slideAnimateIn(slide, first) {
      var _this15 = this;

      var slideMedia = slide.querySelector('.gslide-media');
      var slideDesc = slide.querySelector('.gslide-description');
      var prevData = {
        index: this.prevActiveSlideIndex,
        slide: this.prevActiveSlide
      };
      var nextData = {
        index: this.index,
        slide: this.activeSlide
      };

      if (slideMedia.offsetWidth > 0 && slideDesc) {
        hide(slideDesc);
        slide.querySelector('.ginner-container').style.maxWidth = "".concat(slideMedia.offsetWidth, "px");
        slideDesc.style.display = '';
      }

      removeClass(slide, this.effectsClasses);

      if (first) {
        animateElement(slide, this.settings.openEffect, function () {
          if (!isMobile && _this15.settings.autoplayVideos) {
            _this15.playSlideVideo(slide);
          }

          if (utils.isFunction(_this15.settings.afterSlideChange)) {
            _this15.settings.afterSlideChange.apply(_this15, [prevData, nextData]);
          }
        });
      } else {
        var effect_name = this.settings.slideEffect;
        var animIn = effect_name !== 'none' ? this.settings.cssEfects[effect_name]["in"] : effect_name;

        if (this.prevActiveSlideIndex > this.index) {
          if (this.settings.slideEffect == 'slide') {
            animIn = this.settings.cssEfects.slide_back["in"];
          }
        }

        animateElement(slide, animIn, function () {
          if (!isMobile && _this15.settings.autoplayVideos) {
            _this15.playSlideVideo(slide);
          }

          if (utils.isFunction(_this15.settings.afterSlideChange)) {
            _this15.settings.afterSlideChange.apply(_this15, [prevData, nextData]);
          }
        });
      }

      addClass(slide, 'current');
    }
    /**
     * Slide out
     */

  }, {
    key: "slideAnimateOut",
    value: function slideAnimateOut() {
      if (!this.prevActiveSlide) {
        return false;
      }

      var prevSlide = this.prevActiveSlide;
      removeClass(prevSlide, this.effectsClasses);
      addClass(prevSlide, 'prev');
      var animation = this.settings.slideEffect;
      var animOut = animation !== 'none' ? this.settings.cssEfects[animation].out : animation;
      this.stopSlideVideo(prevSlide);

      if (utils.isFunction(this.settings.beforeSlideChange)) {
        this.settings.beforeSlideChange.apply(this, [{
          index: this.prevActiveSlideIndex,
          slide: this.prevActiveSlide
        }, {
          index: this.index,
          slide: this.activeSlide
        }]);
      }

      if (this.prevActiveSlideIndex > this.index && this.settings.slideEffect == 'slide') {
        // going back
        animOut = this.settings.cssEfects.slide_back.out;
      }

      animateElement(prevSlide, animOut, function () {
        var media = prevSlide.querySelector('.gslide-media');
        var desc = prevSlide.querySelector('.gslide-description');
        media.style.transform = '';
        removeClass(media, 'greset');
        media.style.opacity = '';

        if (desc) {
          desc.style.opacity = '';
        }

        removeClass(prevSlide, 'prev');
      });
    }
  }, {
    key: "stopSlideVideo",
    value: function stopSlideVideo(slide) {
      if (utils.isNumber(slide)) {
        slide = this.slidesContainer.querySelectorAll('.gslide')[slide];
      }

      var slideVideo = slide ? slide.querySelector('.gvideo') : null;

      if (!slideVideo) {
        return false;
      }

      var videoID = slideVideo.id;

      if (videoPlayers && videoPlayers.hasOwnProperty(videoID)) {
        var player = videoPlayers[videoID];

        if (hasClass(slideVideo, 'vimeo-video')) {
          player.pause();
        }

        if (hasClass(slideVideo, 'youtube-video')) {
          player.pauseVideo();
        }

        if (hasClass(slideVideo, 'jw-video')) {
          player.pause(true);
        }

        if (hasClass(slideVideo, 'html5-video')) {
          player.pause();
        }
      }
    }
  }, {
    key: "playSlideVideo",
    value: function playSlideVideo(slide) {
      if (utils.isNumber(slide)) {
        slide = this.slidesContainer.querySelectorAll('.gslide')[slide];
      }

      var slideVideo = slide.querySelector('.gvideo');

      if (!slideVideo) {
        return false;
      }

      var videoID = slideVideo.id;

      if (videoPlayers && (utils.has(videoPlayers, videoID) || hasClass(slideVideo, 'wait-autoplay'))) {
        waitUntil(function () {
          return hasClass(slideVideo, 'iframe-ready') && utils.has(videoPlayers, videoID);
        }, function () {
          var player = videoPlayers[videoID];

          if (hasClass(slideVideo, 'vimeo-video')) {
            waitUntil(function () {
              return player.play;
            }, function () {
              player.play();
            });
          }

          if (hasClass(slideVideo, 'youtube-video')) {
            waitUntil(function () {
              return player.playVideo;
            }, function () {
              player.playVideo();
            });
          }

          if (hasClass(slideVideo, 'jw-video')) {
            waitUntil(function () {
              return player.play;
            }, function () {
              player.play();
            });
          }

          if (hasClass(slideVideo, 'html5-video')) {
            player.play();
          }

          setTimeout(function () {
            removeClass(slideVideo, 'wait-autoplay');
          }, 300);
        }, 50, 4000);
        return false;
      }
    }
  }, {
    key: "setElements",
    value: function setElements(elements) {
      this.settings.elements = elements;
    }
  }, {
    key: "getElements",
    value: function getElements() {
      var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.elements = [];

      if (!utils.isNil(this.settings.elements) && utils.isArray(this.settings.elements)) {
        return this.settings.elements;
      }

      var nodes = false;

      if (element !== null) {
        var gallery = element.getAttribute('data-gallery');

        if (gallery && gallery !== '') {
          nodes = document.querySelectorAll("[data-gallery=\"".concat(gallery, "\"]"));
        }
      }

      if (nodes == false) {
        nodes = document.querySelectorAll(".".concat(this.settings.selector));
      }

      nodes = Array.prototype.slice.call(nodes);
      return nodes;
    }
    /**
     * Get the active slide
     */

  }, {
    key: "getActiveSlide",
    value: function getActiveSlide() {
      return this.slidesContainer.querySelectorAll('.gslide')[this.index];
    }
    /**
     * Get the active index
     */

  }, {
    key: "getActiveSlideIndex",
    value: function getActiveSlideIndex() {
      return this.index;
    }
    /**
     * Get the defined
     * effects as string
     */

  }, {
    key: "getAnimationClasses",
    value: function getAnimationClasses() {
      var effects = [];

      for (var key in this.settings.cssEfects) {
        if (this.settings.cssEfects.hasOwnProperty(key)) {
          var effect = this.settings.cssEfects[key];
          effects.push("g".concat(effect["in"]));
          effects.push("g".concat(effect.out));
        }
      }

      return effects.join(' ');
    }
    /**
     * Build the structure
     * @return {null}
     */

  }, {
    key: "build",
    value: function build() {
      var _this16 = this;

      if (this.built) {
        return false;
      }

      var lightbox_html = createHTML(this.settings.lightboxHtml);
      document.body.appendChild(lightbox_html);
      var modal = document.getElementById('glightbox-body');
      this.modal = modal;
      var closeButton = modal.querySelector('.gclose');
      this.prevButton = modal.querySelector('.gprev');
      this.nextButton = modal.querySelector('.gnext');
      this.overlay = modal.querySelector('.goverlay');
      this.loader = modal.querySelector('.gloader');
      this.slidesContainer = document.getElementById('glightbox-slider');
      this.events = {};
      addClass(this.modal, 'glightbox-' + this.settings.skin);

      if (this.settings.closeButton && closeButton) {
        this.events['close'] = addEvent('click', {
          onElement: closeButton,
          withCallback: function withCallback(e, target) {
            e.preventDefault();

            _this16.close();
          }
        });
      }

      if (closeButton && !this.settings.closeButton) {
        closeButton.parentNode.removeChild(closeButton);
      }

      if (this.nextButton) {
        this.events['next'] = addEvent('click', {
          onElement: this.nextButton,
          withCallback: function withCallback(e, target) {
            e.preventDefault();

            _this16.nextSlide();
          }
        });
      }

      if (this.prevButton) {
        this.events['prev'] = addEvent('click', {
          onElement: this.prevButton,
          withCallback: function withCallback(e, target) {
            e.preventDefault();

            _this16.prevSlide();
          }
        });
      }

      if (this.settings.closeOnOutsideClick) {
        this.events['outClose'] = addEvent('click', {
          onElement: modal,
          withCallback: function withCallback(e, target) {
            if (!getClosest(e.target, '.ginner-container')) {
              if (!hasClass(e.target, 'gnext') && !hasClass(e.target, 'gprev')) {
                _this16.close();
              }
            }
          }
        });
      }

      each(this.elements, function () {
        var slide = createHTML(_this16.settings.slideHtml);

        _this16.slidesContainer.appendChild(slide);
      });

      if (isTouch) {
        addClass(html, 'glightbox-touch');
      }

      this.built = true;
    }
    /**
     * Reload Lightbox
     * reload and apply events to nodes
     */

  }, {
    key: "reload",
    value: function reload() {
      this.init();
    }
    /**
     * Close Lightbox
     * closes the lightbox and removes the slides
     * and some classes
     */

  }, {
    key: "close",
    value: function close() {
      var _this17 = this;

      if (this.closing) {
        return false;
      }

      this.closing = true;
      this.stopSlideVideo(this.activeSlide);
      addClass(this.modal, 'glightbox-closing');
      animateElement(this.overlay, this.settings.openEffect == 'none' ? 'none' : this.settings.cssEfects.fade.out);
      animateElement(this.activeSlide, this.settings.closeEffect, function () {
        _this17.activeSlide = null;
        _this17.prevActiveSlideIndex = null;
        _this17.prevActiveSlide = null;
        _this17.built = false;

        if (_this17.events) {
          for (var key in _this17.events) {
            if (_this17.events.hasOwnProperty(key)) {
              _this17.events[key].destroy();
            }
          }
        }

        var body = document.body;
        removeClass(body, 'glightbox-open');
        removeClass(html, 'glightbox-open');
        removeClass(body, 'touching');
        removeClass(body, 'gdesc-open');
        body.style.width = '';

        _this17.modal.parentNode.removeChild(_this17.modal);

        if (utils.isFunction(_this17.settings.onClose)) {
          _this17.settings.onClose();
        }

        _this17.closing = null;
      });
    }
  }, {
    key: "destroy",
    value: function destroy() {
      this.close();
      this.baseEvents.destroy();
    }
  }]);

  return GlightboxInit;
}();

var clickAnchorLink = function clickAnchorLink(e) {
  e.preventDefault();
  var target = e.target.getAttribute('href');
  document.querySelector(target).scrollIntoView({
    behavior: 'smooth'
  });
};

window.addEventListener('load', function () {
  var imgLightbox = new GlightboxInit({
    selector: 'img-lightbox'
  });
  imgLightbox.init();
  cssVars({
    onlyLegacy: false
  });
  smoothscroll();
  fix();
  var modalCallbackButtons = document.querySelectorAll('.js-init-modal__form');
  Array.prototype.forEach.call(modalCallbackButtons, function (btn) {
    btn.addEventListener('click', function () {
      var settings = {
        modalName: 'callback_modal',
        dataAjax: collectorAttributes(btn)
      };
      modalFromAjax(settings);
    });
  });
  var anchorLinks = document.querySelectorAll('.anchor');
  Array.prototype.forEach.call(anchorLinks, function (link) {
    link.addEventListener('click', clickAnchorLink);
  });
  var classNames = {
    inputError: '',
    formError: 'form-field_error',
    error: 'form-field__error'
  };
  var callbackForm = new Form(document.querySelector('.callback-form'), null, {
    uriAction: '',
    method: 'POST'
  }, classNames, null);
  callbackForm.init();
});