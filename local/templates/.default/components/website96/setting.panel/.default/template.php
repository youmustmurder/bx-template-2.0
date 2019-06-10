<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

CModule::IncludeModule('website.template');

global $arCurrentSetting;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);


?>

<div class="settings-panel">
	<form class="settings-panel__inner tabs">
        <?=bitrix_sessid_post()?>
		<ul class="settings-panel__tabs-nav settings-panel-tabs-nav">
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle tabs__toggle_active">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#common"
                        aria-expanded="true"
                        aria-controls="common"><?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?></button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#home"
                        aria-expanded="false"
                        aria-controls="home"><?=Loc::getMessage('SETTING_PANEL_HOME_PAGE_SETTINGS')?></button>
			</li>
		</ul>
		<div class="settings-panel__tabs-content settings-panel-tabs-content">
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content tabs__content_active" id="common" aria-label="<?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?>">
				<div class="settings-panel-tabs-content-item__header"><?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?></div>
				<div class="settings-panel-tabs-content-item__body">
                    <?foreach (CWebsiteTemplate::$arParametersList as $CODE => $parameters) {
                        switch ($CODE) {
                            //в 1 столбик (для цветовы)
                            case 'COLOR':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?= Loc::getMessage('SETTING_PANEL_COLOR_TITLE') ?></div>
                                    <div class="settings-option__inner">
                                        <ul class="settings-option__colors settings-option-colors">
                                            <?
                                            foreach ($parameters as $id => $parameter) { ?>
                                                <li class="settings-option-colors__item settings-option-colors-item">
                                                    <input type="radio"
                                                           name="<?= $CODE ?>"
                                                           value="<?= $id ?>"
                                                           id="<?= $CODE ?>_<?= $id ?>"
                                                    >
                                                    <label class="settings-option-colors-item__prviews"
                                                           for="<?= $CODE ?>_<?= $id ?>"
                                                           style="background-color: #<?= $parameter['VALUE'] ?>">
                                                </li>
                                                <?
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                                <?
                                break;
                            //в 2 столбика (для шрифтов)
                            case 'FONT':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-panel-tabs-content-item__option_2column">
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?= Loc::getMessage('SETTING_PANEL_FONT_MAIN_TITLE') ?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card form-default-select">
                                                <select name="FONT" id="FONT" style="display: none;" data-font="font">
                                                    <?
                                                    foreach ($parameters as $id => $parameter) { ?>
                                                        <option value="<?= $parameter['FONT_CODE'] ?>"
                                                            <?= $arCurrentSetting[$CODE] == $parameter['FONT_CODE'] ? 'selected' : '' ?>
                                                        ><?= $parameter['NAME'] ?></option>
                                                        <?
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?= Loc::getMessage('SETTING_PANEL_FONT_SIZE_TITLE') ?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card form-default-select">
                                                <select name="FONT_SIZE" id="selectMainfont" style="display: none;" data-font="size">
                                                    <?
                                                    foreach (CWebsiteTemplate::$arParametersList['FONT_SIZE'] as $code => $parameter) { ?>
                                                        <option value="<?= $code ?>"
                                                            <?= $arCurrentSetting['FONT_SIZE'] == $code ? 'selected' : '' ?>
                                                        ><?= $parameter['VALUE'] ?></option>
                                                        <?
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                                break;
                            //в один столбик
                            case 'HEADER':
                            case 'FOOTER':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?= Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE') ?></div>
                                    <div class="settings-option__inner">
                                        <?
                                        foreach ($parameters as $id => $parameter) { ?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?= $CODE ?>"
                                                       value="<?= $id ?>"
                                                       id="<?= $CODE ?>_<?= $id ?>"
                                                       class="settings-option-card__checkbox"
                                                    <?= $arCurrentSetting[$CODE] == $id ? 'checked' : '' ?>>
                                                <label for="<?= $CODE ?>_<?= $id ?>"
                                                       class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?= $parameter['PICTURE'] ?>" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?= $parameter['NAME'] ?></div>
                                                </label>
                                            </div>
                                            <?
                                        } ?>
                                    </div>
                                </div>
                                <?
                                break;
                        }
                    }?>
				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="home" aria-label="<?=Loc::getMessage('SETTING_PANEL_HOME_PAGE_SETTINGS')?>">
				<div class="settings-panel-tabs-content-item__header"><?=Loc::getMessage('SETTING_PANEL_HOME_PAGE_SETTINGS')?></div>
				<div class="settings-panel-tabs-content-item__body">
                    <?foreach (CWebsiteTemplate::$arParametersList as $CODE => $parameters) {
                        switch ($CODE) {
                            //в 2 столбик (slider)
                            case 'SLIDER':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                       <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-slider_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'SECTIONS':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/catalog.section.list/home-section_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            <?
                                break;
                            case 'PRODUCTS':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/catalog.section/home-product_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'SERVICES':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-service_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'ABOUT':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-about_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'NEWS':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-news_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'REVIEWS':
                                ?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_' . $CODE . '_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="setting_<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox"
                                                    <?=$arCurrentSetting[$CODE] == $id ? 'checked' : ''?>
                                                >
                                                <label for="setting_<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetNoPhoto()?>" class="lazy-image" lazy-image="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-reviews_<?=$id?>/preview.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                        }
                    }?>
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
			<span class="btn__icon"><?=GetContentSvgIcon('reset');?></span>
			<?=Loc::getMessage('SETTING_PANEL_BUTTON_RESET')?>
		</button>
	</div>
</div>