<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

CModule::IncludeModule('website.template');

global $arCurrentSetting;

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

$arParameters = CWebsiteTemplate::$arParametersList;

?>

<div class="settings-panel">
	<form class="settings-panel__inner tabs">
		<ul class="settings-panel__tabs-nav settings-panel-tabs-nav">
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle tabs__toggle_active">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#common"
                        aria-expanded="true"
                        aria-controls="common">Общие настройки</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#home"
                        aria-expanded="false"
                        aria-controls="home">Главная</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#contact"
                        aria-expanded="false"
                        aria-controls="contact">Контакты</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#catalog"
                        aria-expanded="false"
                        aria-controls="catalog">Каталог</button>
			</li>
		</ul>
		<div class="settings-panel__tabs-content settings-panel-tabs-content">
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content tabs__content_active" id="common" aria-label="<?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?>">
				<div class="settings-panel-tabs-content-item__header"><?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?></div>
				<div class="settings-panel-tabs-content-item__body">
                    <?foreach ($arParameters as $CODE => $parameters) {
                        switch ($CODE) {
                            //в 1 столбик (для цветовы)
                            case 'COLOR':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_COLOR_TITLE')?></div>
                                    <div class="settings-option__inner">
                                        <ul class="settings-option__colors settings-option-colors">
                                            <?foreach ($parameters as $id => $parameter) {?>
                                                <li class="settings-option-colors__item settings-option-colors-item">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           value="<?=$id?>"
                                                           id="<?=$CODE?>_<?=$id?>">
                                                    <label class="settings-option-colors-item__prviews"
                                                           for="<?=$CODE?>_<?=$id?>"
                                                           style="background-color: #<?=$parameter['VALUE']?>">
                                                </li>
                                            <?}?>
                                        </ul>
                                    </div>
                                </div>
                                <?break;
                            //в 2 столбика (для шрифтов)
                            case 'FONT':?>
                                <div class="settings-panel-tabs-content-item__option settings-panel-tabs-content-item__option_2column">
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_FONT_MAIN_TITLE')?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card form-default-select">
                                                <select name="FONT" id="FONT" style="display: none;">
                                                    <?foreach ($parameters as $id => $parameter) {?>
                                                        <option value="<?=$parameter['FONT_CODE']?>"><?=$parameter['NAME']?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_FONT_SIZE_TITLE')?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card form-default-select">
                                                <select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
                                                    <?foreach ($arParameters['FONT_SIZE'] as $code => $parameter) {?>
                                                        <option value="<?=$code?>"><?=$parameter['VALUE']?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?break;
                            //в один столбик
                            case 'HEADER':
                            case 'FOOTER':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_'.$CODE.'_TITLE')?></div>
                                    <div class="settings-option__inner">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox">
                                                <label for="<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                            //в 3 столбика
                            case '3':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title">Готовое решение</div>
                                    <div class="settings-option__inner settings-option__inner_cards3">
                                        <div class="settings-option__card settings-option-card">
                                            <input type="radio" name="setting_1" value="1" id="setting_1_1" class="settings-option-card__checkbox">
                                            <label for="setting_1_1" class="settings-option-card__inner">
                                                <div class="settings-option-card__preview">
                                                    <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                </div>
                                                <div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
                                            </label>
                                        </div>
                                        <div class="settings-option__card settings-option-card">
                                            <input type="radio" name="setting_1" value="2" id="setting_1_2" class="settings-option-card__checkbox">
                                            <label for="setting_1_2" class="settings-option-card__inner">
                                                <div class="settings-option-card__preview">
                                                    <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                </div>
                                                <div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
                                            </label>
                                        </div>
                                        <div class="settings-option__card settings-option-card settings-option-card_disable">
                                            <input type="radio" name="setting_1" value="3" id="setting_1_3" class="settings-option-card__checkbox">
                                            <label for="setting_1_3" class="settings-option-card__inner">Отключить</label>
                                        </div>
                                    </div>
                                </div>
                                <?break;
                            default:?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_'.$CODE.'_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>" id="<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox">
                                                <label for="<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                        }
                        ?>
                    <?}?>
					<!-- В 3 столбика -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner settings-option__inner_cards3">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_1" value="1" id="setting_1_1" class="settings-option-card__checkbox">
								<label for="setting_1_1" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_1" value="2" id="setting_1_2" class="settings-option-card__checkbox">
								<label for="setting_1_2" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card settings-option-card_disable">
								<input type="radio" name="setting_1" value="3" id="setting_1_3" class="settings-option-card__checkbox">
								<label for="setting_1_3" class="settings-option-card__inner">Отключить</label>
							</div>
						</div>
					</div>
					<!-- В 2 столбика -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner settings-option__inner_cards2">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_2" value="1" id="setting_2_1" class="settings-option-card__checkbox">
								<label for="setting_1_1" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_2" value="2" id="setting_2_2" class="settings-option-card__checkbox">
								<label for="setting_2_2" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
						</div>
					</div>
					<!-- В 1 столбик -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_3" value="1" id="setting_3" class="settings-option-card__checkbox">
								<label for="setting_3" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
						</div>
					</div>
					<!-- В 1 столбик -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Основной цвет</div>
						<div class="settings-option__inner">
							<ul class="settings-option__colors settings-option-colors">
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
							</ul>
						</div>
					</div>
					<!-- Для шрифтов в 2 стобика -->
					<div class="settings-panel-tabs-content-item__option settings-panel-tabs-content-item__option_2column">
						<div class="settings-option">
							<div class="settings-option__title">Основной шрифт</div>
							<div class="settings-option__inner">
								<div class="settings-option__card settings-option-card">
									<select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
										<option value="roboto_condensed">Roboto Condensed</option>
										<option value="open_sans">Open Sans</option>
										<option value="montserrat_alternates">Montserrat Alternates</option>
										<option value="ubuntu">Ubuntu</option>
										<option value="pt_sans">PT Sans</option>
										<option value="rubik">Rubik</option>
										<option value="play">Play</option>
										<option value="roboto">Roboto</option>
										<option value="default" selected="">Montserrat</option>
									</select>
								</div>
							</div>
						</div>
						<div class="settings-option">
							<div class="settings-option__title">Основной шрифт</div>
							<div class="settings-option__inner">
								<div class="settings-option__card settings-option-card">
									<select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
										<option value="roboto_condensed">Roboto Condensed</option>
										<option value="open_sans">Open Sans</option>
										<option value="montserrat_alternates">Montserrat Alternates</option>
										<option value="ubuntu">Ubuntu</option>
										<option value="pt_sans">PT Sans</option>
										<option value="rubik">Rubik</option>
										<option value="play">Play</option>
										<option value="roboto">Roboto</option>
										<option value="default" selected="">Montserrat</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="home" aria-label="Главная">
				<div class="settings-panel-tabs-content-item__header">Главная</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="contact" aria-label="Контакты">
				<div class="settings-panel-tabs-content-item__header">Контакты</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="catalog" aria-label="Каталог">
				<div class="settings-panel-tabs-content-item__header">Каталог</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
		</div>
	</form>
	<div class="settings-panel__buttons">
		<button class="btn settings-panel__btn settings-panel__btn_toggle">
			<span class="btn__icon"><?=GetContentSvgIcon('magic_wand');?></span>
		</button>
		<button class="btn btn_icon-left settings-panel__btn settings-panel__btn_apply">
			<span class="btn__icon"><?=GetContentSvgIcon('success');?></span>
			<?=Loc::getMessage('SETTING_PANEL_BUTTON_APPLY')?>
		</button>
		<button class="btn btn_icon-left settings-panel__btn settings-panel__btn_reset">
			<span class="btn__icon"><?=GetContentSvgIcon('close');?></span>
			<?=Loc::getMessage('SETTING_PANEL_BUTTON_RESET')?>
		</button>
	</div>
</div>