<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<section class="about about_news">
    <div class="container">
		<div class="row">
			<div class="col">
				<div class="about__wrap">
					<div class="about__img">
						<img class="lazy-image" lazy-image="<?=$arParams['BLOCK_IMG']?>">
					</div>
					<div class="about__content">
						<h2 class="about__title"><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_BLOCK_TITLE')?></h2>
						<div class="text text_default about__text">
							<?$APPLICATION->IncludeFile(
									"/include/".SITE_ID."/content/home/home-about_text.php",
									array(), array(
										"SHOW_BORDER" => true,
										"MODE" => "html"
									)
							);?>
						</div>
						<a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
							class="link link_secondary link_icon-right">
							<?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_SECTION_LINK_NAME')?>
							<span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
