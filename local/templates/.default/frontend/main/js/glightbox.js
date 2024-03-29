/**
 * GLightbox v2.0.0
 * Awesome pure javascript lightbox
 * made by mcstudios.com.mx
 */

const isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i);
const isTouch = isMobile !== null || document.createTouch !== undefined || ('ontouchstart' in window) || ('onmsgesturechange' in window) || navigator.msMaxTouchPoints;
const html = document.getElementsByTagName('html')[0];
const transitionEnd = whichTransitionEvent();
const animationEnd = whichAnimationEvent();
const uid = Date.now();

let YTTemp = [];
let videoPlayers = { }

// Default settings
const defaults = {
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
            stretching: 'uniform',
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
    openEffect: 'zoomIn', // fade, zoom, none
    closeEffect: 'zoomOut', // fade, zoom, none
    slideEffect: 'slide', // fade, slide, zoom, none
    moreText: 'See more',
    moreLength: 60,
    lightboxHtml: '',
    cssEfects: {
        fade: { in: 'fadeIn', out: 'fadeOut' },
        zoom: { in: 'zoomIn', out: 'zoomOut' },
        slide: { in: 'slideInRight', out: 'slideOutLeft' },
        slide_back: { in: 'slideInLeft', out: 'slideOutRight' }
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
let lightboxSlideHtml = '<div class="gslide">\
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
defaults.slideHtml = lightboxSlideHtml;

const lightboxHtml = '<div id="glightbox-body" class="glightbox-container">\
            <div class="gloader visible"></div>\
            <div class="goverlay"></div>\
            <div class="gcontainer">\
               <div id="glightbox-slider" class="gslider"></div>\
               <a class="gnext"></a>\
               <a class="gprev"></a>\
               <a class="gclose"></a>\
            </div>\
   </div>';
defaults.lightboxHtml = lightboxHtml;



/**
 * Merge two or more objects
 */
function extend() {
    let extended = { }
    let deep = false
    let i = 0
    let length = arguments.length
    if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
        deep = arguments[0]
        i++
    }
    let merge = (obj) => {
        for (let prop in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
                    extended[prop] = extend(true, extended[prop], obj[prop])
                } else {
                    extended[prop] = obj[prop]
                }
            }
        }
    };
    for (; i < length; i++) {
        let obj = arguments[i]
        merge(obj)
    }
    return extended
}


const utils = {
    isFunction: function(f) {
        return typeof f === 'function'
    },
    isString: function(s) {
        return typeof s === 'string'
    },
    isNode: function(el) {
        return !!(el && el.nodeType && el.nodeType == 1)
    },
    isArray: function(ar) {
        return Array.isArray(ar)
    },
    isArrayLike: function(ar) {
        return (ar && ar.length && isFinite(ar.length))
    },
    isObject: function(o) {
        let type = typeof o;
        return type === 'object' && (o != null && !utils.isFunction(o) && !utils.isArray(o))
    },
    isNil: function(o) {
        return o == null
    },
    has: function(obj, key) {
        return obj !== null && hasOwnProperty.call(obj, key);
    },
    size: function(o) {
        if (utils.isObject(o)) {
            if (o.keys) {
                return o.keys().length;
            }
            let l = 0;
            for (let k in o){
                if (utils.has(o, k)) {
                    l++
                }
            }
            return l
        }
        else{
            return o.length;
        }
    },
    isNumber: function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n)
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
        let l = collection.length,
            i = 0;
        for (; i < l; i++) {
            if (callback.call(collection[i], collection[i], i, collection) === false) {
                break;
            }
        }
    } else if (utils.isObject(collection)) {
        for (let key in collection) {
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
function getNodeEvents(node, name = null, fn = null) {
    const cache = (node[uid] = node[uid] || []);
    const data = { all: cache, evt: null, found: null};
    if (name && fn && utils.size(cache) > 0) {
        each(cache, (cl, i) => {
            if (cl.eventName == name && cl.fn.toString() == fn.toString()) {
                data.found = true;
                data.evt = i;
                return false;
            }
        })
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
function addEvent(eventName, {
    onElement,
    withCallback,
    avoidDuplicate = true,
    once = false,
    useCapture = false} = { }, thisArg) {
    let element = onElement || []
    if (utils.isString(element)) {
        element =  document.querySelectorAll(element)
    }
    function handler(event) {
        if (utils.isFunction(withCallback)) {
            withCallback.call(thisArg, event, this)
        }
        if (once) {
            handler.destroy();
        }
    }
    handler.destroy = function() {
        each(element, (el) => {
            const events = getNodeEvents(el, eventName, handler);
            if (events.found) { events.all.splice(events.evt, 1); }
            if (el.removeEventListener) el.removeEventListener(eventName, handler, useCapture)
        })
    }
    each(element, (el) => {
        const events = getNodeEvents(el, eventName, handler);
        if (el.addEventListener && (avoidDuplicate && !events.found) || !avoidDuplicate) {
            el.addEventListener(eventName, handler, useCapture)
            events.all.push({ eventName: eventName, fn: handler});
        }
    })
    return handler
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
        node.classList.add(name)
    } else {
        node.className += " " + name
    }
}

/**
 * Remove element class
 *
 * @param {node} element
 * @param {string} class name
 */
function removeClass(node, name) {
    let c = name.split(' ')
    if (c.length > 1) {
        each(c, (cl) => { removeClass(node, cl) })
        return;
    }
    if (node.classList) {
        node.classList.remove(name)
    } else {
        node.className = node.className.replace(name, "")
    }
}

/**
 * Has class
 *
 * @param {node} element
 * @param {string} class name
 */
function hasClass(node, name) {
    return (node.classList ? node.classList.contains(name) : new RegExp("(^| )" + name + "( |$)", "gi").test(node.className));
}



/**
 * Determine animation events
 */
function whichAnimationEvent() {
    let t, el = document.createElement("fakeelement");
    let animations = {
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
    let t,
        el = document.createElement("fakeelement");

    const transitions = {
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
function animateElement(element, animation = '', callback = false) {
    if (!element || animation === '') {
        return false;
    }
    if (animation == 'none') {
        if (utils.isFunction(callback))
            callback()
        return false;
    }
    const animationNames = animation.split(' ')
    each(animationNames, (name) => {
        addClass(element, 'g'+name)
    })
    addEvent(animationEnd, {
        onElement: element,
        avoidDuplicate: false,
        once: true,
        withCallback: (event, target) => {
            each(animationNames, (name) => {
                removeClass(target, 'g' + name)
            })
            if (utils.isFunction(callback))
                callback()
        }
    })
}



/**
 * Create a document fragment
 *
 * @param {string} html code
 */
function createHTML(htmlStr) {
    let frag = document.createDocumentFragment(),
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
        const matches = typeof elem.matches == 'function' ? elem.matches(selector) : elem.msMatchesSelector(selector);

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
const getSlideData = function getSlideData(element = null, settings) {
    let data = {
        href: '',
        title: '',
        type: '',
        description: '',
        descPosition: 'bottom',
        effect: '',
        node: element
    };

    if (utils.isObject(element) && !utils.isNode(element)){
        return extend(data, element);
    }

    let url = '';
    let config = element.getAttribute('data-glightbox')
    let nodeType = element.nodeName.toLowerCase();
    if (nodeType === 'a')
        url = element.href;
    if (nodeType === 'img')
        url = element.src;

    data.href = url;

    each(data, (val, key) => {
        if (utils.has(settings, key)) {
            data[key] = settings[key];
        }
        const nodeData = element.dataset[key];
        if (!utils.isNil(nodeData)) {
            data[key] = nodeData;
        }
    });

    if (!data.type) {
        data.type = getSourceType(url);
    }

    if (!utils.isNil(config)) {
        let cleanKeys = [];
        each(data, (v, k) => {
            cleanKeys.push(';\\s?' + k);
        })
        cleanKeys = cleanKeys.join('\\s?:|');
        if (config.trim() !== '') {
            each(data, (val, key) => {
                const str = config;
                const match = '\s?' + key + '\s?:\s?(.*?)(' + cleanKeys + '\s?:|$)';
                const regex = new RegExp(match);
                const matches = str.match(regex);

                if (matches && matches.length && matches[1]) {
                    const value = matches[1].trim().replace(/;\s*$/, '');
                    data[key] = value;
                }
            });
        }
    } else {
        if (nodeType == 'a') {
            let title = element.title
            if (!utils.isNil(title) && title !== '') data.title = title;
        }
        if (nodeType == 'img') {
            let alt = element.alt
            if (!utils.isNil(alt) && alt !== '') data.title = alt;
        }
        let desc = element.getAttribute('data-description')
        if (!utils.isNil(desc) && desc !== '') data.description = desc;
    }
    let nodeDesc = element.querySelector('.glightbox-desc')
    if (nodeDesc) {
        data.description = nodeDesc.innerHTML;
    }

    const defaultWith = (data.type == 'video' ? settings.videosWidth : settings.width);
    const defaultHeight = (data.type == 'video' ? settings.videosHeight : settings.height);

    data.width = (utils.has(data, 'width') ? data.width : defaultWith);
    data.height = (utils.has(data, 'height') ? data.height : defaultHeight);

    return data;
}

/**
 * Set slide content
 *
 * @param {node} slide
 * @param {object} data
 * @param {function} callback
 */
const setSlideContent = function setSlideContent(slide = null, data = { }, callback = false) {
    if (hasClass(slide, 'loaded')) {
        return false
    }

    if (utils.isFunction(this.settings.beforeSlideLoad)) {
        this.settings.beforeSlideLoad(slide, data);
    }

    let type = data.type;
    let position = data.descPosition;
    let slideMedia = slide.querySelector('.gslide-media');
    let slideTitle = slide.querySelector('.gslide-title');
    let slideText = slide.querySelector('.gslide-desc');
    let slideDesc = slide.querySelector('.gdesc-inner');
    let finalCallback = callback

    if (utils.isFunction(this.settings.afterSlideLoad)) {
        finalCallback = () => {
            if (utils.isFunction(callback)) { callback() }
            this.settings.afterSlideLoad(slide, data);
        }
    }

    if (data.title == '' && data.description == '') {
        if (slideDesc) {
            slideDesc.parentNode.removeChild(slideDesc);
        }
    } else{
        if (slideTitle && data.title !== '') {
            slideTitle.innerHTML = data.title;
        } else {
            slideTitle.parentNode.removeChild(slideTitle);
        }
        if (slideText && data.description !== '') {
            if (isMobile && this.settings.moreLength > 0) {
                data.smallDescription = slideShortDesc(data.description, this.settings.moreLength, this.settings.moreText)
                slideText.innerHTML = data.smallDescription;
                slideDescriptionEvents.apply(this, [slideText, data])
            }
            else{
                slideText.innerHTML = data.description;
            }
        } else {
            slideText.parentNode.removeChild(slideText);
        }
        addClass(slideMedia.parentNode, `desc-${position}`);
        addClass(slideDesc.parentNode, `description-${position}`);
    }

    addClass(slideMedia, `gslide-${type}`)
    addClass(slide, 'loaded');

    if (type === 'video') {
        slideMedia.innerHTML = '<div class="gvideo-wrapper"></div>';
        setSlideVideo.apply(this, [slide, data, finalCallback])
        return
    }

    if (type === 'external') {
        let iframe = createIframe({
            url: data.href,
            width: data.width,
            height: data.height,
            callback: finalCallback,
        })
        slideMedia.parentNode.style.maxWidth = `${data.width}px`;
        slideMedia.appendChild(iframe);
        return
    }

    if (type === 'inline') {
        setInlineContent.apply(this, [slide, data, finalCallback])
        return
    }

    if (type === 'image') {
        let img = new Image();
        img.addEventListener('load', function() {
            if (utils.isFunction(finalCallback)){
                finalCallback()
            }
        }, false);
        img.src = data.href;
        slideMedia.appendChild(img);
        return
    }

    if (utils.isFunction(finalCallback))
        finalCallback()
}


/**
 * Set slide video
 *
 * @param {node} slide
 * @param {object} data
 * @param {function} callback
 */
function setSlideVideo(slide, data, callback) {
    const videoID = 'gvideo' + data.index;
    // const slideMedia = slide.querySelector('.gslide-media');
    const slideMedia = slide.querySelector('.gvideo-wrapper');

    let url = data.href;
    let protocol = location.protocol.replace(':', '');

    if (protocol == 'file') {
        protocol = 'http'
    }

    // Set vimeo videos
    if (url.match(/vimeo\.com\/([0-9]*)/)) {
        const vimeoID = /vimeo.*\/(\d+)/i.exec( url );
        const params = parseUrlParams(this.settings.vimeo.params);
        const videoUrl = `${protocol}://player.vimeo.com/video/${vimeoID[1]}?${params}`

        injectVideoApi(this.settings.vimeo.api);

        const finalCallback = function () {
            waitUntil(() => {
                return typeof Vimeo !== 'undefined';
            }, () => {
                const player = new Vimeo.Player(iframe)
                videoPlayers[videoID] = player;

                if (utils.isFunction(callback)) {
                    callback()
                }
            });
        }

        slideMedia.parentNode.style.maxWidth = `${data.width}px`;
        slideMedia.style.width = `${data.width}px`;
        slideMedia.style.maxHeight = `${data.height}px`;

        const iframe = createIframe({
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
    }

    // Set youtube videos
    if (url.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || url.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) {
        const youtubeParams = extend(this.settings.youtube.params, {
            playerapiid: videoID
        })
        const yparams = parseUrlParams(youtubeParams)
        const youtubeID = getYoutubeID(url)
        const videoUrl = `${protocol}://www.youtube.com/embed/${youtubeID}?${yparams}`

        injectVideoApi(this.settings.youtube.api);

        const finalCallback = () => {
            if (!utils.isNil(YT) && YT.loaded) {
                const player = new YT.Player(iframe);
                videoPlayers[videoID] = player;
            } else {
                YTTemp.push(iframe)
            }
            if (utils.isFunction(callback)) {
                callback()
            }
        }

        slideMedia.parentNode.style.maxWidth = `${data.width}px`;
        slideMedia.style.width = `${data.width}px`;
        slideMedia.style.maxHeight = `${data.height}px`;

        const iframe = createIframe({
            url: videoUrl,
            callback: finalCallback,
            allow: 'autoplay; fullscreen',
            appendTo: slideMedia
        })
        iframe.id = videoID
        iframe.className = 'youtube-video gvideo';

        if (this.settings.autoplayVideos && !isMobile) {
            iframe.className += ' wait-autoplay';
        }
    }


    // Set local videos
    if (url.match(/\.(mp4|ogg|webm)$/) !== null) {
        let html = '<video id="' + videoID + '" ';
        html += `style="background:#000; width: ${data.width}px; height: ${data.height}px;" `;
        html += 'preload="metadata" ';
        html += 'x-webkit-airplay="allow" ';
        html += 'webkit-playsinline="" ';
        html += 'controls ';
        html += 'class="gvideo">';

        let format = url.toLowerCase().split('.').pop()
        let sources = {'mp4': '', 'ogg': '', 'webm': ''}
        sources[format] = url;

        for (let key in sources) {
            if (sources.hasOwnProperty(key)) {
                let videoFile = sources[key]
                if (data.hasOwnProperty(key)) {
                    videoFile = data[key]
                }
                if (videoFile !== '') {
                    html += `<source src="${videoFile}" type="video/${key}">`;
                }
            }
        }

        html += '</video>';

        let video = createHTML(html);
        slideMedia.appendChild(video)

        let vnode = document.getElementById(videoID)
        if (this.settings.jwplayer !== null && this.settings.jwplayer.api !== null) {
            let jwplayerConfig = this.settings.jwplayer
            let jwplayerApi = this.settings.jwplayer.api

            if (!jwplayerApi) {
                console.warn('Missing jwplayer api file');
                if (utils.isFunction(callback)) callback()
                return false
            }

            injectVideoApi(jwplayerApi, () => {
                const jwconfig = extend(this.settings.jwplayer.params, {
                    width: `${data.width}px`,
                    height: `${data.height}px`,
                    file: url
                })

                jwplayer.key = this.settings.jwplayer.licenseKey;

                const player = jwplayer(videoID);

                player.setup(jwconfig);

                videoPlayers[videoID] = player;
                player.on('ready', () => {
                    vnode = slideMedia.querySelector('.jw-video')
                    addClass(vnode, 'gvideo')
                    vnode.id = videoID
                    if (utils.isFunction(callback)) callback()
                })
            })
        } else{
            addClass(vnode, 'html5-video')
            videoPlayers[videoID] = vnode
            if (utils.isFunction(callback)) callback()
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
    let { url, width, height, allow, callback, appendTo } = config;
    let iframe = document.createElement('iframe');
    let winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    iframe.className = 'vimeo-video gvideo';
    iframe.src = url;

    if (height) {
        if (isMobile && winWidth < 767) {
            iframe.style.height = ''
        } else {
            iframe.style.height = `${height}px`
        }
    }
    if (width) {
        iframe.style.width = `${width}px`
    }
    if (allow) {
        iframe.setAttribute('allow', allow)
    }
    iframe.onload = function() {
        addClass(iframe, 'iframe-ready');
        if (utils.isFunction(callback)) {
            callback()
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
    let videoID = '';
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
    let found = document.querySelectorAll('script[src="' + url + '"]')
    if (utils.isNil(found) || found.length == 0) {
        let script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = url;
        script.onload = () => {
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
    for (let i = 0; i < YTTemp.length; i++) {
        const iframe = YTTemp[i];
        const player = new YT.Player(iframe);
        videoPlayers[iframe.id] = player
    }
}
if (typeof window.onYouTubeIframeAPIReady !== 'undefined') {
    window.onYouTubeIframeAPIReady = function(){
        window.onYouTubeIframeAPIReady()
        youtubeApiHandle()
    }
} else{
    window.onYouTubeIframeAPIReady = youtubeApiHandle
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
    let timeoutPointer;
    let intervalPointer = setInterval(() => {
        if (!check()) return;
        clearInterval(intervalPointer);
        if (timeoutPointer) clearTimeout(timeoutPointer);
        onComplete();
    }, delay);
    if (timeout) timeoutPointer = setTimeout(() => {
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
    let qs = '';
    let i = 0;
    each(params, (val, key) => {
        if (i > 0) {
            qs += '&amp;';
        }
        qs += key + '=' + val;
        i += 1;
    })
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
    const slideMedia = slide.querySelector('.gslide-media');
    const hash = data.href.split('#').pop().trim();

    let div = document.getElementById(hash);
    if (!div) {
        return false;
    }

    const cloned = div.cloneNode(true)

    cloned.style.height = `${data.height}px`
    cloned.style.maxWidth = `${data.width}px`
    addClass(cloned, 'ginlined-content')
    slideMedia.appendChild(cloned)

    if (utils.isFunction(callback)) {
        callback()
    }
    return;
}



/**
 * Get source type
 * gte the source type of a url
 *
 * @param {string} url
 */
const getSourceType = function(url) {
    let origin = url;
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
    }

    // Check if inline content
    if (url.indexOf("#") > -1) {
        let hash = origin.split('#').pop()
        if (hash.trim() !== '') {
            return 'inline'
        }
    }
    // Ajax
    if (url.includes("gajax=true")) {
        return 'ajax';
    }

    return 'external';
}



/**
 * Desktop keyboard navigation
 */
function keyboardNavigation() {
    if (this.events.hasOwnProperty('keyboard')) {
        return false;
    }
    this.events['keyboard'] = addEvent('keydown', {
        onElement: window,
        withCallback: (event, target) => {
            event = event || window.event;
            const key = event.keyCode;
            if (key == 39) this.nextSlide();
            if (key == 37) this.prevSlide();
            if (key == 27) this.close();
        }
    })
}

/**
 * Touch navigation
 */
function touchNavigation() {
    if (this.events.hasOwnProperty('touchStart')) {
        return false;
    }
    let index,
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
        startCoords = { },
        endCoords = { },
        slider = this.slidesContainer,
        activeSlide = null,
        xDown = 0,
        yDown = 0,
        activeSlideImage = null,
        activeSlideMedia = null,
        activeSlideDesc = null;

    let winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    let winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    let body = document.body;

    this.events['doctouchmove'] = addEvent('touchmove', {
        onElement: document,
        withCallback: (e, target) => {
            if (hasClass(body, 'gdesc-open')) {
                e.preventDefault()
                return false
            }
        }, useCapture: { passive: false }
    })


    this.events['touchStart'] = addEvent('touchstart', {
        onElement: body,
        withCallback: (e, target) => {
            if (hasClass(body, 'gdesc-open')) {
                return;
            }
            addClass(body, 'touching');
            activeSlide = this.getActiveSlide()
            activeSlideImage = activeSlide.querySelector('.gslide-image')
            activeSlideMedia = activeSlide.querySelector('.gslide-media')
            activeSlideDesc = activeSlide.querySelector('.gslide-description')

            index = this.index;
            endCoords = e.targetTouches[0];
            startCoords.pageX = e.targetTouches[0].pageX;
            startCoords.pageY = e.targetTouches[0].pageY;
            xDown = e.targetTouches[0].clientX;
            yDown = e.targetTouches[0].clientY;
        }
    })

    this.events['gestureStart'] = addEvent('gesturestart', {
        onElement: body,
        withCallback: (e, target) => {
            if (activeSlideImage) {
                e.preventDefault()
                doingPinch = true
            }
        }
    })

    this.events['gestureChange'] = addEvent('gesturechange', {
        onElement: body,
        withCallback: (e, target) => {
            e.preventDefault()
            slideCSSTransform(activeSlideImage, `scale(${e.scale})`)
        }
    })

    this.events['gesturEend'] = addEvent('gestureend', {
        onElement: body,
        withCallback: (e, target) => {
            doingPinch = false
            if (e.scale < 1) {
                pinchBigger = false
                slideCSSTransform(activeSlideImage, `scale(1)`)
            } else{
                pinchBigger = true
            }
        }
    })

    this.events['touchMove'] = addEvent('touchmove', {
        onElement: body,
        withCallback: (e, target) => {
            if (!hasClass(body, 'touching')) {
                return;
            }
            if (hasClass(body, 'gdesc-open') || doingPinch || pinchBigger) {
                return;
            }
            e.preventDefault();
            endCoords = e.targetTouches[0];
            let slideHeight = activeSlide.querySelector('.gslide-inner-content').offsetHeight;
            let slideWidth = activeSlide.querySelector('.gslide-inner-content').offsetWidth;

            let xUp = e.targetTouches[0].clientX;
            let yUp = e.targetTouches[0].clientY;
            let xDiff = xDown - xUp;
            let yDiff = yDown - yUp;

            if (Math.abs(xDiff) > Math.abs(yDiff)) { /*most significant*/
                vSwipe = false
                hSwipe = true
            } else {
                hSwipe = false
                vSwipe = true
            }

            if (vSwipe) {
                vDistanceLast = vDistance;
                vDistance = endCoords.pageY - startCoords.pageY;
                if (Math.abs(vDistance) >= vSwipMinDistance || vSwipe) {
                    let opacity = 0.75 - Math.abs(vDistance) / slideHeight;
                    activeSlideMedia.style.opacity = opacity;
                    if (activeSlideDesc) {
                        activeSlideDesc.style.opacity = opacity;
                    }
                    slideCSSTransform(activeSlideMedia, `translate3d(0, ${vDistance}px, 0)`)
                }
                return;
            }

            hDistanceLast = hDistance;
            hDistance = endCoords.pageX - startCoords.pageX;
            hDistancePercent = hDistance * 100 / winWidth;

            if (hSwipe) {
                if (this.index + 1 == this.elements.length && hDistance < -60) {
                    resetSlideMove(activeSlide)
                    return false;
                }
                if (this.index - 1 < 0 && hDistance > 60) {
                    resetSlideMove(activeSlide)
                    return false;
                }

                let opacity = 0.75 - Math.abs(hDistance) / slideWidth;
                activeSlideMedia.style.opacity = opacity;
                if (activeSlideDesc) {
                    activeSlideDesc.style.opacity = opacity;
                }
                slideCSSTransform(activeSlideMedia, `translate3d(${hDistancePercent}%, 0, 0)`)
            }
        }, useCapture: { passive: false }
    })



    this.events['touchEnd'] = addEvent('touchend', {
        onElement: body,
        withCallback: (e, target) => {
            vDistance = endCoords.pageY - startCoords.pageY;
            hDistance = endCoords.pageX - startCoords.pageX;
            hDistancePercent = hDistance * 100 / winWidth;

            removeClass(body, 'touching')

            let slideHeight = activeSlide.querySelector('.gslide-inner-content').offsetHeight;
            let slideWidth = activeSlide.querySelector('.gslide-inner-content').offsetWidth;

            // Swipe to top/bottom to close
            if (vSwipe) {
                let onEnd = (slideHeight / 2)
                    vSwipe = false;
                if (Math.abs(vDistance) >= onEnd) {
                    this.close()
                    return;
                }
                resetSlideMove(activeSlide)
                return
            }

            if (hSwipe) {
                hSwipe = false;
                let where = 'prev'
                let asideExist = true
                if(hDistance < 0){
                    where = 'next'
                    hDistance = Math.abs(hDistance)
                }
                if (where == 'prev' && this.index - 1 < 0) {
                    asideExist = false
                }
                if (where == 'next' && this.index + 1 >= this.elements.length) {
                    asideExist = false
                }
                if (asideExist && hDistance >= (slideWidth / 2) - 90) {
                    if (where == 'next') {
                       this.nextSlide();
                    }
                    else{
                       this.prevSlide();
                    }
                    return;
                }
                resetSlideMove(activeSlide)
            }
        }
    })
}




function slideCSSTransform(slide, translate = '') {
    if (translate == '') {
        slide.style.webkitTransform = ''
        slide.style.MozTransform = ''
        slide.style.msTransform = ''
        slide.style.OTransform = ''
        slide.style.transform = ''
        return false
    }
    slide.style.webkitTransform = translate
    slide.style.MozTransform = translate
    slide.style.msTransform = translate
    slide.style.OTransform = translate
    slide.style.transform = translate
}


function resetSlideMove(slide) {
    let media = slide.querySelector('.gslide-media')
    let desc = slide.querySelector('.gslide-description')

    addClass(media, 'greset')
    slideCSSTransform(media, `translate3d(0, 0, 0)`)
    let animation = addEvent(transitionEnd, {
        onElement: media,
        once: true,
        withCallback: (event, target) => {
            removeClass(media, 'greset')
        }
    })

    media.style.opacity = ''
    if (desc) {
        desc.style.opacity = '';
    }
}



function slideShortDesc(string, n = 50, wordBoundary = false) {
    let useWordBoundary = wordBoundary
    string = string.trim()
    if (string.length <= n) {
        return string;
    }
    let subString = string.substr(0, n - 1);
    if (!useWordBoundary) {
        return subString
    }
    return subString + '... <a href="#" class="desc-more">'+wordBoundary+'</a>'
}

function slideDescriptionEvents(desc, data) {
    let moreLink = desc.querySelector('.desc-more')
    if (!moreLink) {
        return false
    }

    addEvent('click', {
        onElement: moreLink,
        withCallback: (event, target) => {
            event.preventDefault();
            const body = document.body

            let desc = getClosest(target, '.gslide-desc')
            if (!desc) {
                return false
            }

            desc.innerHTML = data.description
            addClass(body, 'gdesc-open')

            let shortEvent = addEvent('click', {
                onElement: [body, getClosest(desc, '.gslide-description')],
                withCallback: (event, target) => {
                    if (event.target.nodeName.toLowerCase() !== 'a') {
                        removeClass(body, 'gdesc-open')
                        addClass(body, 'gdesc-closed')
                        desc.innerHTML = data.smallDescription
                        slideDescriptionEvents(desc, data)

                        setTimeout(() => {
                            removeClass(body, 'gdesc-closed')
                        }, 400);
                        shortEvent.destroy()
                    }
                }
            })
        }
    })
}



/**
 * GLightbox Class
 * Class and public methods
 */
class GlightboxInit {

    constructor(options) {
        this.settings = extend(defaults, options || { })
        this.effectsClasses = this.getAnimationClasses()
    }

    init(){
        this.baseEvents = addEvent('click', {
            onElement: `.${this.settings.selector}`,
            withCallback: (e, target) => {
                e.preventDefault();
                this.open(target);
            }
        })
    }

    open(element = null){
        this.elements = this.getElements(element)
        if (this.elements.length == 0)
            return false;

        this.activeSlide = null
        this.prevActiveSlideIndex = null
        this.prevActiveSlide = null
        let index = this.settings.startAt
        if (element) { // if element passed, get the index
            index = this.elements.indexOf(element)
            if (index < 0) {
                index = 0
            }
        }

        this.build()
        animateElement(this.overlay, (this.settings.openEffect == 'none' ? 'none' : this.settings.cssEfects.fade.in))

        const body = document.body;
        body.style.width = `${body.offsetWidth}px`

        addClass(body, 'glightbox-open')
        addClass(html, 'glightbox-open')
        if (isMobile) {
            addClass(html, 'glightbox-mobile')
            this.settings.slideEffect = 'slide'
        }

        this.showSlide(index, true)

        if (this.elements.length == 1) {
            hide(this.prevButton)
            hide(this.nextButton)
        } else {
            show(this.prevButton)
            show(this.nextButton)
        }
        this.lightboxOpen = true

        if (utils.isFunction(this.settings.onOpen)) {
            this.settings.onOpen();
        }

        if (isMobile && isTouch && this.settings.touchNavigation) {
            touchNavigation.apply(this)
            return false
        }
        if (this.settings.keyboardNavigation) {
            keyboardNavigation.apply(this)
        }
    }


    /**
     * Set Slide
     */
    showSlide(index = 0, first = false) {
        show(this.loader)
        this.index = index

        let current = this.slidesContainer.querySelector('.current')
        if (current) {
            removeClass(current, 'current')
        }

        // hide prev slide
        this.slideAnimateOut();

        let slide = this.slidesContainer.querySelectorAll('.gslide')[index];
        show(this.slidesContainer);

        // Check if slide's content is alreay loaded
        if (hasClass(slide, 'loaded')) {
            this.slideAnimateIn(slide, first);
            hide(this.loader);
        } else {
            // If not loaded add the slide content
            show(this.loader);
            // console.log("a", this.settings);
            let slide_data = getSlideData(this.elements[index], this.settings);
            // console.log(slide_data);
            slide_data.index = index;
            setSlideContent.apply(this, [slide, slide_data, () => {
                hide(this.loader);
                this.slideAnimateIn(slide, first);
            }]);
        }

        // Preload subsequent slides
        this.preloadSlide(index + 1);
        this.preloadSlide(index - 1);

        // Handle navigation arrows
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
    preloadSlide(index) {
        // Verify slide index, it can not be lower than 0
        // and it can not be greater than the total elements
        if (index < 0 || index > this.elements.length)
            return false

        if (utils.isNil(this.elements[index]))
            return false

        let slide = this.slidesContainer.querySelectorAll('.gslide')[index];
        if (hasClass(slide, 'loaded')) {
            return false;
        }

        let slide_data = getSlideData(this.elements[index], this.settings);
        slide_data.index = index;
        let type = slide_data.sourcetype;
        if (type == 'video' || type == 'external') {
            setTimeout(() => {
                setSlideContent.apply(this, [slide, slide_data]);
            }, 200);
        } else {
            setSlideContent.apply(this, [slide, slide_data]);
        }
    }




    /**
	 * Load previous slide
	 * calls goToslide
	 */
    prevSlide() {
        let prev = this.index - 1;
        if (prev < 0){
            return false;
        }
        this.goToSlide(prev);
    }



    /**
     * Load next slide
     * calls goToslide
     */
    nextSlide() {
        let next = this.index + 1;
        if (next > this.elements.length)
            return false;

        this.goToSlide(next);
    }


    /**
     * Go to sldei
     * calls set slide
     * @param [Int] - index
     */
    goToSlide(index = false) {
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
    slideAnimateIn(slide, first) {
        let slideMedia = slide.querySelector('.gslide-media');
        let slideDesc = slide.querySelector('.gslide-description');
        let prevData = {
            index: this.prevActiveSlideIndex,
            slide: this.prevActiveSlide
        };
        let nextData = {
            index: this.index,
            slide: this.activeSlide
        };
        if (slideMedia.offsetWidth > 0 && slideDesc) {
            hide(slideDesc)
            slide.querySelector('.ginner-container').style.maxWidth = `${slideMedia.offsetWidth}px`
            slideDesc.style.display = ''
        }
        removeClass(slide, this.effectsClasses)
        if (first) {
            animateElement(slide, this.settings.openEffect, () => {
                if (!isMobile && this.settings.autoplayVideos) {
                    this.playSlideVideo(slide)
                }
                if (utils.isFunction(this.settings.afterSlideChange)) {
                    this.settings.afterSlideChange.apply(this, [prevData, nextData]);
                }
            });
        } else {
            let effect_name = this.settings.slideEffect;
            let animIn = (effect_name !== 'none' ? this.settings.cssEfects[effect_name].in : effect_name);
            if (this.prevActiveSlideIndex > this.index) {
                if (this.settings.slideEffect == 'slide') {
                    animIn = this.settings.cssEfects.slide_back.in;
                }
            }
            animateElement(slide, animIn, () => {
                if (!isMobile && this.settings.autoplayVideos) {
                    this.playSlideVideo(slide)
                }
                if (utils.isFunction(this.settings.afterSlideChange)) {
                    this.settings.afterSlideChange.apply(this, [prevData, nextData]);
                }
            });
        }
        addClass(slide, 'current');
    }



    /**
     * Slide out
     */
    slideAnimateOut() {
        if (!this.prevActiveSlide) {
            return false
        }


        let prevSlide = this.prevActiveSlide
        removeClass(prevSlide, this.effectsClasses)
        addClass(prevSlide, 'prev')

        let animation = this.settings.slideEffect;
        let animOut = (animation !== 'none' ? this.settings.cssEfects[animation].out : animation);

        this.stopSlideVideo(prevSlide)
        if (utils.isFunction(this.settings.beforeSlideChange)) {
            this.settings.beforeSlideChange.apply(this, [{
                index: this.prevActiveSlideIndex,
                slide: this.prevActiveSlide
            }, {
                index: this.index,
                slide: this.activeSlide
            }]);
        }
        if (this.prevActiveSlideIndex > this.index && this.settings.slideEffect == 'slide') { // going back
            animOut = this.settings.cssEfects.slide_back.out;
        }
        animateElement(prevSlide, animOut, () => {
            let media = prevSlide.querySelector('.gslide-media')
            let desc = prevSlide.querySelector('.gslide-description')

            media.style.transform = ''
            removeClass(media, 'greset')
            media.style.opacity = ''
            if (desc) {
                desc.style.opacity = ''
            }
            removeClass(prevSlide, 'prev');
        });
    }


    stopSlideVideo(slide) {
        if (utils.isNumber(slide)) {
            slide = this.slidesContainer.querySelectorAll('.gslide')[slide]
        }

        let slideVideo = (slide ? slide.querySelector('.gvideo') : null)
        if (!slideVideo) {
            return false
        }

        let videoID = slideVideo.id
        if (videoPlayers && videoPlayers.hasOwnProperty(videoID)) {
            let player = videoPlayers[videoID]
            if (hasClass(slideVideo, 'vimeo-video')) {
                player.pause()
            }
            if (hasClass(slideVideo, 'youtube-video')) {
                player.pauseVideo()
            }
            if (hasClass(slideVideo, 'jw-video')) {
                player.pause(true)
            }
            if (hasClass(slideVideo, 'html5-video')) {
                player.pause()
            }
        }
    }



    playSlideVideo(slide){
        if (utils.isNumber(slide)) {
            slide = this.slidesContainer.querySelectorAll('.gslide')[slide];
        }
        const slideVideo = slide.querySelector('.gvideo');
        if (!slideVideo) {
            return false;
        }

        let videoID = slideVideo.id;
        if (videoPlayers && (utils.has(videoPlayers, videoID) || hasClass(slideVideo, 'wait-autoplay'))) {
            waitUntil(() => {
                return hasClass(slideVideo, 'iframe-ready') && utils.has(videoPlayers, videoID);
            }, () => {
                let player = videoPlayers[videoID]

                if (hasClass(slideVideo, 'vimeo-video')) {
                    waitUntil(() => { return player.play;
                    }, () => { player.play(); })
                }
                if (hasClass(slideVideo, 'youtube-video')) {
                    waitUntil(() => { return player.playVideo;
                    }, () => { player.playVideo(); })
                }
                if (hasClass(slideVideo, 'jw-video')) {
                    waitUntil(() => { return player.play;
                    }, () => { player.play(); })
                }
                if (hasClass(slideVideo, 'html5-video')) {
                    player.play();
                }
                setTimeout(() => {
                    removeClass(slideVideo, 'wait-autoplay')
                }, 300);

            }, 50, 4000);

            return false;
        }
    }

    setElements(elements) {
        this.settings.elements = elements;
    }

    getElements(element = null) {
        this.elements = [];

        if (!utils.isNil(this.settings.elements) && utils.isArray(this.settings.elements)) {
            return this.settings.elements
        }

        let nodes = false;
        if (element !== null) {
            let gallery = element.getAttribute('data-gallery')
            if (gallery && gallery !== '') {
                nodes = document.querySelectorAll(`[data-gallery="${gallery}"]`);
            }
        }
        if (nodes == false) {
            nodes = document.querySelectorAll(`.${this.settings.selector}`);
        }
        nodes = Array.prototype.slice.call(nodes);
        return nodes;
    }


    /**
     * Get the active slide
     */
    getActiveSlide() {
        return this.slidesContainer.querySelectorAll('.gslide')[this.index];
    }

    /**
     * Get the active index
     */
    getActiveSlideIndex() {
        return this.index;
    }


    /**
     * Get the defined
     * effects as string
     */
    getAnimationClasses() {
        let effects = []
        for (let key in this.settings.cssEfects ){
            if (this.settings.cssEfects.hasOwnProperty(key)) {
                let effect = this.settings.cssEfects[key]
                effects.push(`g${effect.in}`)
                effects.push(`g${effect.out}`)
            }
        }
        return effects.join(' ')
    }


    /**
     * Build the structure
     * @return {null}
     */
    build() {
        if (this.built) {
            return false;
        }

        const lightbox_html = createHTML(this.settings.lightboxHtml);
        document.body.appendChild(lightbox_html);

        const modal = document.getElementById('glightbox-body');
        this.modal = modal;
        let closeButton = modal.querySelector('.gclose');
        this.prevButton = modal.querySelector('.gprev');
        this.nextButton = modal.querySelector('.gnext');
        this.overlay = modal.querySelector('.goverlay');
        this.loader = modal.querySelector('.gloader');
        this.slidesContainer = document.getElementById('glightbox-slider');
        this.events = {}

        addClass(this.modal, 'glightbox-' + this.settings.skin);

        if (this.settings.closeButton && closeButton){
            this.events['close'] = addEvent('click', {
                onElement: closeButton,
                withCallback: (e, target) => {
                    e.preventDefault()
                    this.close()
                }
            })
        }
        if (closeButton && !this.settings.closeButton) {
            closeButton.parentNode.removeChild(closeButton);
        }

        if (this.nextButton){
            this.events['next'] = addEvent('click', {
                onElement: this.nextButton,
                withCallback: (e, target) => {
                    e.preventDefault()
                    this.nextSlide()
                }
            })
        }

        if (this.prevButton) {
            this.events['prev'] = addEvent('click', {
                onElement: this.prevButton,
                withCallback: (e, target) => {
                    e.preventDefault()
                    this.prevSlide()
                }
            })
        }
        if (this.settings.closeOnOutsideClick) {
            this.events['outClose'] = addEvent('click', {
                onElement: modal,
                withCallback: (e, target) => {
                    if (!getClosest(e.target, '.ginner-container')) {
                        if (!hasClass(e.target, 'gnext') && !hasClass(e.target, 'gprev')) {
                            this.close();
                        }
                    }
                }
            })
        }
        each(this.elements, () => {
            let slide = createHTML(this.settings.slideHtml);
            this.slidesContainer.appendChild(slide);
        })
        if (isTouch) {
            addClass(html, 'glightbox-touch');
        }

        this.built = true;
    }

    /**
     * Reload Lightbox
     * reload and apply events to nodes
     */
    reload() {
        this.init();
    }


    /**
     * Close Lightbox
     * closes the lightbox and removes the slides
     * and some classes
     */
    close() {
        if (this.closing) {
            return false;
        }
        this.closing = true;
        this.stopSlideVideo(this.activeSlide)
        addClass(this.modal, 'glightbox-closing')
        animateElement(this.overlay, (this.settings.openEffect == 'none' ? 'none' : this.settings.cssEfects.fade.out))
        animateElement(this.activeSlide, this.settings.closeEffect, () => {
            this.activeSlide = null;
            this.prevActiveSlideIndex = null;
            this.prevActiveSlide = null;
            this.built = false;

            if (this.events) {
                for (let key in this.events) {
                    if (this.events.hasOwnProperty(key)) {
                        this.events[key].destroy()
                    }
                }
            }

            const body = document.body;
            removeClass(body, 'glightbox-open')
            removeClass(html, 'glightbox-open')
            removeClass(body, 'touching')
            removeClass(body, 'gdesc-open')
            body.style.width = '';
            this.modal.parentNode.removeChild(this.modal)
            if (utils.isFunction(this.settings.onClose)) {
                this.settings.onClose();
            }
            this.closing = null;
        });
    }

    destroy(){
        this.close();
        this.baseEvents.destroy();
    }
}

export default GlightboxInit;