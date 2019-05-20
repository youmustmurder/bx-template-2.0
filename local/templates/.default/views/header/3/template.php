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
                    <button class="header__hamburger">
                        <span></span>
                    </button>
                    <div class="head-nav__modal--desktop" style="display: none;">
                        <div class="container">
                            <div class="head-nav__content head-nav__content--desktop">
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
                                        <li><a href="#">Мебель</a></li>
                                        <li><a href="#">Одежда</a></li>
                                        <li><a href="#">Красота и здоровье</a></li>
                                        <li><a href="#">Спорт и туризм</a></li>
                                        <li><a href="#">Услуги</a></li>
                                    </ul>
                                </div>
                                <div class="head-nav__col">
                                    <div class="head-nav__category-name">Электроника</div>
                                    <ul>
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
                        <?=GetContentSvgIcon('address');?>
                    </div>
                    <div class="header__text"  id="header-text">
                        <span>г. Екатеринбург</span>
                        <span>ул. Генеральская, д. 3, оф. 206</span>                    </div>
                </div>
                <div class="header__block header__phone">
                    <div class="header__pic">
                        <?=GetContentSvgIcon('phone');?>
                    </div>
                    <div class="header__text">
                        <a class="header__number" href="tel:+7 (343) 372-57-75">+7 (343) 372-57-75</a>
                        <a href="#" class="btn header__modal" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveE16b2lhR1ZoWkdWeVgxOXRiMlJoYkNJN2N6b3hNVG9pUms5U1RWOUdTVVZNUkZNaU8yRTZNanA3YVRvd08zTTZNam9pTWpRaU8yazZNVHR6T2pJNklqSTFJanQ5Y3pveE5qb2lSazlTVFY5UVQweEpWRWxEWDFWU1RDSTdjem81T2lJdmNHOXNhWFJwWXk4aU8zTTZNVFk2SWtaUFVrMWZVRkpQUkZWRFZGOUJSRVFpTzNNNk1Ub2lUaUk3Y3pveE5Ub2lSazlTVFY5UVVrOUVWVU5VWDBsRUlqdHpPakE2SWlJN2N6b3lNRG9pUms5U1RWOVNSVkZWU1ZKRlJGOUdTVVZNUkZNaU8yRTZNanA3YVRvd08zTTZNam9pTWpRaU8yazZNVHR6T2pJNklqSTFJanQ5Y3pveE1Eb2lSazlTVFY5VVNWUk1SU0k3Y3pveU9Ub2kwSjdSZ2RHQzBMRFFzdEdNMFlMUXRTRFF0OUN3MFkvUXN0QzYwWU1pTzNNNk9Ub2lTVUpNVDBOTFgwbEVJanR6T2pJNklqRTBJanR6T2pFeE9pSkpRa3hQUTB0ZlZGbFFSU0k3Y3pvMU9pSm1iM0p0Y3lJN2N6b3hPRG9pUTA5TlVFOU9SVTVVWDFSRlRWQk1RVlJGSWp0ek9qZzZJaTVrWldaaGRXeDBJanQ5Ljk1MTBhMzcyYWUwNzk2ZmRlZDBiNTExMmUwODU2MDFkYTA2YWY3M2JhNmMyYmQ3Yjk4ZjEyNzE2NDEzZDQyOTE%3D" data-modal="14">Заказать звонок</a>
                    </div>
                </div>
                <div class="header__block header__search header__search--desktop">
                    <div class="header__loupe">
                        <button class="header__loupe-pic">
                            <?=GetContentSvgIcon('search-big');?>
                        </button>
                        <button class="header__loupe-crest">
                            <?=GetContentSvgIcon('crest-big');?>
                        </button>
                    </div>
                </div>
                <div class="header__search-panel header__search-panel">
                    <form method="get" action="/search/">
                        <input class="inp inp-search inp-search--desktop" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск">
                        <button class="btn-search--desktop" type="submit" title="Поиск">
                            <?=GetContentSvgIcon('search-grey');?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>