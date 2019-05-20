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
                <div class="d-flex align-items-center header__logo header__logo-desc">
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
                <div class="header-search">
                    <form class="search__form" method="get" action="/search/">
    <span class="icon__search"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
  <defs>
    <style>
      .cls-1 {
          fill: #aaa9ad;
          fill-rule: evenodd;
      }
    </style>
  </defs>
  <path id="search" class="cls-1" d="M641.35,102.389l-2.861,2.865c-0.1.1-.194,0.192-0.289,0.289a0.536,0.536,0,1,1-.753-0.734c0.723-.719,1.442-1.444,2.167-2.16,0.326-.323.663-0.633,1.027-0.979a5.738,5.738,0,0,1-1.125-5.246,5.566,5.566,0,0,1,2.338-3.232,5.743,5.743,0,0,1,7.551,8.517A5.817,5.817,0,0,1,641.35,102.389Zm3.69,0.256A4.7,4.7,0,1,0,640.355,98,4.7,4.7,0,0,0,645.04,102.645ZM637.725,106h0a0.7,0.7,0,0,1-.51-0.245,0.717,0.717,0,0,1,.092-1.089l0.868-.867q0.648-.65,1.3-1.3c0.225-.222.452-0.436,0.692-0.661l0.206-.194a5.926,5.926,0,0,1-1.049-5.277,5.761,5.761,0,0,1,2.421-3.349,5.947,5.947,0,0,1,7.82,8.818,5.983,5.983,0,0,1-8.189.817l-2.84,2.843-0.185.185A0.885,0.885,0,0,1,637.725,106Zm7.328-13.592a5.5,5.5,0,0,0-3.084.953,5.365,5.365,0,0,0-2.256,3.117,5.5,5.5,0,0,0,1.09,5.069l0.112,0.146-0.133.126-0.34.321c-0.238.224-.464,0.436-0.684,0.654q-0.651.645-1.3,1.293-0.433.435-.868,0.868c-0.3.3-.159,0.441-0.085,0.518a0.313,0.313,0,0,0,.217.119h0a0.523,0.523,0,0,0,.329-0.191c0.062-.064.126-0.126,0.189-0.188l0.1-.1,2.987-2.992,0.142,0.107A5.555,5.555,0,1,0,645.053,92.407Zm-0.024,10.442a4.9,4.9,0,0,1,.035-9.8h0.028a4.9,4.9,0,0,1,3.453,8.349,4.922,4.922,0,0,1-3.5,1.452h-0.011Zm0.063-9.393h-0.026A4.492,4.492,0,0,0,640.56,98a4.4,4.4,0,0,0,1.311,3.137,4.45,4.45,0,0,0,3.158,1.308h0.01a4.528,4.528,0,0,0,3.217-1.332,4.458,4.458,0,0,0-.049-6.347A4.421,4.421,0,0,0,645.092,93.456Z" transform="translate(-637 -92)"></path>
</svg>
</span>
                        <input class="inp inp-search" name="q" id="qplSKIW" autocomplete="off" placeholder="Поиск по сайту" size="20">
                        <button class="btn-search" type="submit" title="Поиск">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.44" height="14.438" viewBox="0 0 8.44 14.438">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                            fill-rule: evenodd;
                                        }
                                    </style>
                                </defs>
                                <path id="arrow_small_right" class="cls-1" d="M1046.71,99.707l-7,7-1.42-1.415,5.8-5.792-5.8-5.793,1.42-1.414,7,7-0.21.207Z" transform="translate(-1038.28 -92.281)"></path>
                            </svg>
                        </button>
                    </form>                </div>
                <div class="header__block header__contacts">
                    <div class="header__phone">
                        <?=GetContentSvgIcon('phone');?>
                        <a href="tel:+7 (343) 372-57-75">+7 (343) 372-57-75</a>
                    </div>
                    <div class="header__call">
                        <a href="#" class="btn btn--primary btn--big btn--circle" data-sign="WVRveE5EcDdjem94TURvaVEwRkRTRVZmVkVsTlJTSTdjem8wT2lJek5qQXdJanR6T2pFd09pSkRRVU5JUlY5VVdWQkZJanR6T2pFNklrRWlPM002TVRNNklrWlBVazFmUWxST1gwOVFSVTRpTzNNNk1qazZJdENYMExEUXV0Q3cwTGZRc05HQzBZd2cwTGZRc3RDKzBMM1F2dEM2SWp0ek9qRTFPaUpHVDFKTlgwSlVUbDlUVlVKTlNWUWlPM002TVRnNkl0Q2UwWUxRdjlHQTBMRFFzdEM0MFlMUmpDSTdjem94TXpvaVJrOVNUVjlDVkU1ZlZGbFFSU0k3Y3pveE1Ub2lZblJ1TFdSbFptRjFiSFFpTzNNNk1URTZJa1pQVWsxZlJrbEZURVJUSWp0aE9qSTZlMms2TUR0ek9qSTZJakkwSWp0cE9qRTdjem95T2lJeU5TSTdmWE02TVRZNklrWlBVazFmVUU5TVNWUkpRMTlWVWt3aU8zTTZPVG9pTDNCdmJHbDBhV012SWp0ek9qRTJPaUpHVDFKTlgxQlNUMFJWUTFSZlFVUkVJanR6T2pFNklrNGlPM002TVRVNklrWlBVazFmVUZKUFJGVkRWRjlKUkNJN2N6b3dPaUlpTzNNNk1qQTZJa1pQVWsxZlVrVlJWVWxTUlVSZlJrbEZURVJUSWp0aE9qSTZlMms2TUR0ek9qSTZJakkwSWp0cE9qRTdjem95T2lJeU5TSTdmWE02TVRBNklrWlBVazFmVkVsVVRFVWlPM002TWprNkl0Q2UwWUhSZ3RDdzBMTFJqTkdDMExVZzBMZlFzTkdQMExMUXV0R0RJanR6T2prNklrbENURTlEUzE5SlJDSTdjem95T2lJeE5DSTdjem94TVRvaVNVSk1UME5MWDFSWlVFVWlPM002TlRvaVptOXliWE1pTzNNNk1UZzZJa05QVFZCUFRrVk9WRjlVUlUxUVRFRlVSU0k3Y3pvNE9pSXVaR1ZtWVhWc2RDSTdmUT09LmVhNGEwMDU4YTdlZWY2YTI2ZDAwZWMwMjRiNThjYWIyNWFhNmFhNTI1NGMxYzUzNjhjYmE3YWE2NzNhYWM4NDc%3D" data-modal="14">Заказать звонок</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="header__bottom">
        <div class="container">
            <div class="row row-line">
                <div class="col-12">
                    <div class="header__list">
                        <ul>
                            <li>
                                <a href="/catalog/elektronika/">Электроника</a>
                            </li>
                            <li>
                                <a href="/catalog/mebel/">Мебель</a>
                            </li>
                            <li>
                                <a href="/catalog/odezhda/">Одежда</a>
                            </li>
                            <li>
                                <a href="/catalog/krasota-i-zdorove/">Красота и здоровье</a>
                            </li>
                            <li>
                                <a href="/catalog/sport-i-turizm/">Спорт и туризм</a>
                            </li>
                            <li class="more__menu">
                                <a href="#" class="js-init_more_menu"><span class="menu__dots"></span>Еще</a>
                                <ul>
                                    <li>
                                        <a href="/catalog/uslugi/">Услуги</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>