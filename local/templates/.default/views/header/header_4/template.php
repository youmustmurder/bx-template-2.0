<?php

global $arCurrentSetting;

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/script.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

?>
<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header__block header__menu">
                    <button class="js-init__menu--desktop header__hamburger">
                        <span></span>
                    </button>
                    <div class="head-nav__modal--desktop" style="display: none;">
                        <div class="container">
                            <div class="head-nav__content head-nav__content--desktop">
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul class="head-nav__category-list">
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center header__logo header-logo--desc">
                    <a href="/">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 753.12 212.94" style="width:100%;height:auto;">
                            <title>Ресурс 6</title>
                            <g id="Слой_2" data-name="Слой 2">
                                <g id="Слой_1-2" data-name="Слой 1">
                                    <path class="logo-circle" d="M420.19,79.94c11.64,19.2,28.59,30.14,51,32.79l-27.76,41.54h1q19.66,0,39.33,0a1.57,1.57,0,0,0,1.48-.82Q507.11,121.23,529,89A106.71,106.71,0,0,0,537.62,75a61.5,61.5,0,0,0,6.07-30.78c-1.05-17.14-8.07-31.53-20.31-43.46a2.26,2.26,0,0,1-.57-.73C551.87.22,577,10.21,597.87,30.57a106.33,106.33,0,0,1,27.5,105.84,66.08,66.08,0,0,0-21.62-23.8A64.81,64.81,0,0,0,573.39,102l27.82-41.63h-1.13q-19.58,0-39.14,0a1.66,1.66,0,0,0-1.57.82q-21.81,32.25-43.7,64.43A106.27,106.27,0,0,0,506.88,140a61.62,61.62,0,0,0-5.9,30.34c1,16.33,7.44,30.24,18.73,42l.55.6a106.41,106.41,0,0,1-81.05-41C414.58,140.35,413.63,103.4,420.19,79.94Z"></path>
                                    <path class="logo-circle" d="M567,135.53a31.28,31.28,0,1,1-31.73,31.12C535.23,151.09,549.11,135.1,567,135.53Z"></path>
                                    <path class="logo-circle" d="M477.71,79A31.31,31.31,0,0,1,447,55.81,31,31,0,0,1,464,19.63a32.1,32.1,0,0,1,37.55,7.52c8.56,9.51,10.46,23.74,4.25,34.9-5.11,9.17-12.73,15.18-23.4,16.75a19.68,19.68,0,0,1-2,.22C479.46,79.06,478.58,79,477.71,79Z"></path>
                                    <path class="logo-font" d="M35.75,132.5h-19C11.74,114,6.08,96.44,0,79.75H16.18A341.23,341.23,0,0,1,27.2,116c3.19-9.48,8.14-27.31,10.3-36.27H51.82c3,9.38,7.52,26.27,9.79,36.27A364,364,0,0,0,72.43,79.75H88.3c-5,16.79-11.34,36.16-18.14,52.75h-19c-1.75-8.76-4.94-23.08-6.9-30.6C42.34,111.17,38.33,124.77,35.75,132.5Z"></path>
                                    <path class="logo-font" d="M137.24,131.06a67.77,67.77,0,0,1-19.06,2.88c-14.84,0-25.86-6.49-25.86-28.12,0-21.23,9.68-27.51,24.83-27.51,17.51,0,25.14,5.36,23.69,32.45H108.6c.2,8.45,4,10,11.64,10A71.88,71.88,0,0,0,134.87,119ZM108.7,99.12H127c-.21-7.32-2.58-8.86-8.76-8.86C111.69,90.26,109.63,92.42,108.7,99.12Z"></path>
                                    <path class="logo-font" d="M151.66,58.11h15.87V81.3a30.62,30.62,0,0,1,13.09-3c13.7,0,20.81,6.08,20.81,27.3,0,21.64-7.94,28.33-25.86,28.33-8.25,0-18.24-1.54-23.91-3.71Zm15.87,61.82a24.74,24.74,0,0,0,8,1.34c7.52,0,10-1.85,10-15.35,0-11.13-2.27-14-9.58-14-4.74,0-8.45,1.44-8.45,3.71Z"></path>
                                    <path class="logo-font" d="M248.41,92.94a63.14,63.14,0,0,0-15.56-2.27c-4.94,0-7.41.41-7.41,4.53,0,2.79,1.44,3.51,9.58,4.54,12.26,1.54,17.72,5.25,17.72,16.07,0,14.32-10.31,18.13-23.6,18.13-5.66,0-13.91-1.13-18.75-2.88l3.09-12a58.76,58.76,0,0,0,14.94,2.16c6.18,0,9.07-.51,9.07-4.64,0-2.88-1.75-4-10.51-4.84-11-1-16.9-4.22-16.9-15.45,0-14.32,10.2-18,23.39-18a60.61,60.61,0,0,1,18,2.88Z"></path>
                                    <path class="logo-font" d="M279.84,64.4c0,7.11-2.27,8.34-9,8.34s-9-1.23-9-8.34c0-6.49,2.16-7.52,9-7.52S279.84,57.91,279.84,64.4Zm-1,68.1H262.94V79.75h15.87Z"></path>
                                    <path class="logo-font" d="M310.64,93.35V113c0,5.36,1.55,7.52,7.11,7.52a25.93,25.93,0,0,0,8.45-1.44l2.58,12.16c-3.92,1.64-10.2,2.67-15.87,2.67-11.64,0-18.13-3.5-18.13-19.26V93.35h-8.56V79.75h8.56V71.92l15.86-6.39V79.75h16.49v13.6Z"></path>
                                    <path class="logo-font" d="M379.05,131.06A67.66,67.66,0,0,1,360,133.94c-14.83,0-25.86-6.49-25.86-28.12,0-21.23,9.69-27.51,24.83-27.51,17.52,0,25.14,5.36,23.7,32.45H350.41c.21,8.45,4,10,11.64,10A71.71,71.71,0,0,0,376.68,119ZM350.51,99.12h18.34c-.2-7.32-2.57-8.86-8.75-8.86C353.5,90.26,351.44,92.42,350.51,99.12Z"></path>
                                    <path class="logo-font" d="M664.3,79.65h15.87v4.12c1.75-3.09,5.15-5.57,12.78-5.57a50.76,50.76,0,0,1,5.25.31V93.25a27.64,27.64,0,0,0-7.42-.83c-5.66,0-10.61,1.86-10.61,5.36V132.4H664.3Z"></path>
                                    <path class="logo-font" d="M737.46,79.65h15.66V129.2a87.61,87.61,0,0,1-26.69,4.74c-14.63,0-21.63-6.18-21.63-25V79.65h15.66v28c0,9.48,1.64,12.16,9.37,12.16a33.78,33.78,0,0,0,7.63-1Z"></path>
                                </g>
                            </g>
                        </svg>


                    </a>
                    <div class="header__desc">
                        <p>Разработка и продвижение сайтов</p>
                    </div>
                </div>
                <div class="header__block header__address">
                    <div class="header__pic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #333;
                                        fill-rule: evenodd;
                                    }
                                </style>
                            </defs>
                            <path id="geo" class="cls-1" d="M1267.03,18.215a5.773,5.773,0,0,1,5.72,6.264,6.571,6.571,0,0,1-1.22,3.051,16.534,16.534,0,0,1-4.23,4.142,0.449,0.449,0,0,1-.56.023,15.064,15.064,0,0,1-4.82-5.1,5.6,5.6,0,0,1,3.52-8.106C1265.96,18.346,1266.5,18.3,1267.03,18.215Zm-0.04,12.656c0.17-.13.31-0.232,0.45-0.338a14.635,14.635,0,0,0,3.67-3.918,4.831,4.831,0,0,0-4.78-7.474,4.8,4.8,0,0,0-3.96,6.391C1263.27,27.829,1265.08,29.38,1266.99,30.871ZM1267,32a0.653,0.653,0,0,1-.39-0.129,15.145,15.145,0,0,1-4.89-5.18,5.733,5.733,0,0,1-.23-5.083,5.993,5.993,0,0,1,3.89-3.33,9.419,9.419,0,0,1,1.11-.2c0.17-.022.34-0.046,0.5-0.073l0.02,0h0.02a6.232,6.232,0,0,1,4.46,2.022,5.806,5.806,0,0,1,1.48,4.477,6.632,6.632,0,0,1-1.26,3.151,16.655,16.655,0,0,1-4.28,4.2A0.743,0.743,0,0,1,1267,32Zm0.04-13.568c-0.16.027-.33,0.049-0.49,0.072a8.369,8.369,0,0,0-1.05.189,5.577,5.577,0,0,0-3.61,3.087,5.292,5.292,0,0,0,.22,4.71,14.69,14.69,0,0,0,4.76,5.031,0.224,0.224,0,0,0,.3-0.023,16.374,16.374,0,0,0,4.18-4.088,6.39,6.39,0,0,0,1.19-2.951,5.415,5.415,0,0,0-1.38-4.15A5.781,5.781,0,0,0,1267.04,18.431Zm-0.05,12.713-0.14-.105c-1.94-1.519-3.76-3.077-4.68-5.429a4.788,4.788,0,0,1,.41-4.283,5.047,5.047,0,0,1,3.72-2.4,5.325,5.325,0,0,1,3.93,1.059,5.063,5.063,0,0,1,1.91,3.478,5.117,5.117,0,0,1-.84,3.26,14.471,14.471,0,0,1-3.72,3.977c-0.1.073-.19,0.141-0.29,0.219-0.06.038-.11,0.078-0.17,0.121Zm-0.01-11.825a5.3,5.3,0,0,0-.63.037,4.606,4.606,0,0,0-3.39,2.194,4.368,4.368,0,0,0-.38,3.905c0.86,2.2,2.57,3.694,4.41,5.142l0.03-.02c0.1-.077.19-0.143,0.28-0.213a14,14,0,0,0,3.62-3.859,4.719,4.719,0,0,0,.79-2.995,4.652,4.652,0,0,0-1.76-3.186A4.792,4.792,0,0,0,1266.98,19.319Zm1.44,4.649a1.424,1.424,0,0,1-1.43,1.375A1.39,1.39,0,1,1,1268.42,23.968Zm-1.41,1.592h-0.03a1.652,1.652,0,0,1-1.15-.5,1.528,1.528,0,0,1-.46-1.128A1.634,1.634,0,1,1,1267.01,25.56ZM1267,22.779a1.186,1.186,0,0,0-1.19,1.162,1.123,1.123,0,0,0,.33.822,1.22,1.22,0,0,0,.85.365,1.207,1.207,0,0,0,1.21-1.162h0a1.2,1.2,0,0,0-1.18-1.187H1267Z" transform="translate(-1261 -18)"></path>
                        </svg>
                    </div>
                    <div class="header__text">
                        <span>г. Екатеринбург</span>
                        <span>ул. Генеральская, д. 3, оф. 206</span>                    </div>
                </div>
                <div class="header__block header__phone">
                    <div class="header__pic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #ff223d;
                                        fill-rule: evenodd;
                                    }
                                </style>
                            </defs>
                            <path id="phone" class="cls-1" d="M1159.5,98.6a8.638,8.638,0,0,0,3.98,3.948,12.181,12.181,0,0,1,1.07-1.169,0.932,0.932,0,0,1,1.43-.1c0.79,0.484,1.58.989,2.39,1.446a1.158,1.158,0,0,1,.62,1.038,3.074,3.074,0,0,1-2.53,3.11,5.893,5.893,0,0,1-3.51-.352,12.653,12.653,0,0,1-7.64-8.121,4.611,4.611,0,0,1,.31-4,2.862,2.862,0,0,1,2.79-1.374,1.025,1.025,0,0,1,.78.531c0.52,0.877,1.05,1.749,1.6,2.6a0.785,0.785,0,0,1,0,1.028C1160.4,97.66,1159.97,98.09,1159.5,98.6Zm0.19-1.8c-0.52-.836-0.97-1.53-1.38-2.246a0.457,0.457,0,0,0-.64-0.23,1.931,1.931,0,0,0-1.27,1.5,4.914,4.914,0,0,0,.35,2.956,11.844,11.844,0,0,0,5.71,6.152,6.225,6.225,0,0,0,3.16.785,2.163,2.163,0,0,0,2.07-1.356,0.506,0.506,0,0,0-.25-0.712c-0.54-.294-1.06-0.634-1.59-0.955-0.59-.362-0.71-0.334-1.06.288a1.355,1.355,0,0,0-.16.377c-0.21.685-.47,0.867-1.12,0.551a14.306,14.306,0,0,1-2.43-1.422,8.614,8.614,0,0,1-3.03-4.136,0.658,0.658,0,0,1,.47-0.925A11.334,11.334,0,0,0,1159.69,96.793Z" transform="translate(-1155 -93)"></path>
                        </svg>
                    </div>
                    <div class="header__text">
                        <a class="header__number" href="tel:+7 (343) 372-57-75">+7 (343) 372-57-75</a>
                        <a href="#" class="btn js-init-modal__form header__modal" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveE16b2lhR1ZoWkdWeVgxOXRiMlJoYkNJN2N6b3hNVG9pUms5U1RWOUdTVVZNUkZNaU8yRTZNanA3YVRvd08zTTZNam9pTWpRaU8yazZNVHR6T2pJNklqSTFJanQ5Y3pveE5qb2lSazlTVFY5UVQweEpWRWxEWDFWU1RDSTdjem81T2lJdmNHOXNhWFJwWXk4aU8zTTZNVFk2SWtaUFVrMWZVRkpQUkZWRFZGOUJSRVFpTzNNNk1Ub2lUaUk3Y3pveE5Ub2lSazlTVFY5UVVrOUVWVU5VWDBsRUlqdHpPakE2SWlJN2N6b3lNRG9pUms5U1RWOVNSVkZWU1ZKRlJGOUdTVVZNUkZNaU8yRTZNanA3YVRvd08zTTZNam9pTWpRaU8yazZNVHR6T2pJNklqSTFJanQ5Y3pveE1Eb2lSazlTVFY5VVNWUk1SU0k3Y3pveU9Ub2kwSjdSZ2RHQzBMRFFzdEdNMFlMUXRTRFF0OUN3MFkvUXN0QzYwWU1pTzNNNk9Ub2lTVUpNVDBOTFgwbEVJanR6T2pJNklqRTBJanR6T2pFeE9pSkpRa3hQUTB0ZlZGbFFSU0k3Y3pvMU9pSm1iM0p0Y3lJN2N6b3hPRG9pUTA5TlVFOU9SVTVVWDFSRlRWQk1RVlJGSWp0ek9qZzZJaTVrWldaaGRXeDBJanQ5Ljk1MTBhMzcyYWUwNzk2ZmRlZDBiNTExMmUwODU2MDFkYTA2YWY3M2JhNmMyYmQ3Yjk4ZjEyNzE2NDEzZDQyOTE%3D" data-modal="14">Заказать звонок</a>
                    </div>
                </div>
                <div class="header__block header__search header__search--desktop">
                    <div class="header__loupe">
                        <button class="header__loupe-pic">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.6807 20.0385L15.5038 14.5928C16.8349 12.9924 17.5642 10.9788 17.5642 8.88249C17.5642 3.98476 13.6245 0 8.7821 0C3.93973 0 0 3.98476 0 8.88249C0 13.7802 3.93973 17.765 8.7821 17.765C10.6 17.765 12.3324 17.2104 13.8135 16.1576L19.0297 21.6447C19.2477 21.8737 19.5409 22 19.8552 22C20.1526 22 20.4348 21.8853 20.649 21.6768C21.1042 21.2338 21.1187 20.4992 20.6807 20.0385ZM8.7821 2.31717C12.3614 2.31717 15.2732 5.2623 15.2732 8.88249C15.2732 12.5027 12.3614 15.4478 8.7821 15.4478C5.20282 15.4478 2.29098 12.5027 2.29098 8.88249C2.29098 5.2623 5.20282 2.31717 8.7821 2.31717Z" fill="#2D2D2D"></path>
                            </svg>
                        </button>
                        <button class="header__loupe-crest">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.9021" y="1.82617" width="2" height="25.0904" rx="1" transform="rotate(-45 0.9021 1.82617)" fill="#2D2D2D"></rect>
                                <rect x="18.6436" y="0.46875" width="2" height="25.0904" rx="1" transform="rotate(45 18.6436 0.46875)" fill="#2D2D2D"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="header__search-panel header__search-panel">
                    <form method="get" action="/search/">
                        <input class="inp inp-search inp-search--desktop" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск">
                        <button class="btn-search--desktop" type="submit" title="Поиск">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M16.7918 15.7927L12.7049 11.7057C13.718 10.4706 14.3286 8.88857 14.3286 7.16429C14.3286 3.20918 11.1194 0 7.16429 0C3.20571 0 0 3.20918 0 7.16429C0 11.1194 3.20571 14.3286 7.16429 14.3286C8.88857 14.3286 10.4671 13.7214 11.7022 12.7084L15.7892 16.7918C16.0667 17.0694 16.5143 17.0694 16.7918 16.7918C17.0694 16.5178 17.0694 16.0667 16.7918 15.7927ZM7.16429 12.9027C3.99673 12.9027 1.42245 10.3284 1.42245 7.16429C1.42245 4.0002 3.99673 1.42245 7.16429 1.42245C10.3284 1.42245 12.9061 4.0002 12.9061 7.16429C12.9061 10.3284 10.3284 12.9027 7.16429 12.9027Z" fill="#171B1F"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>