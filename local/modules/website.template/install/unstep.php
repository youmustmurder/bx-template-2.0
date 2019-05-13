<?if(!check_bitrix_sessid()) return;?>
<?=CAdminMessage::ShowNote(GetMessage("WEBSITE_TEMPLATE_UNINSTALL_SUCCESS"));?>
<form action="<?=$APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?=LANG?>">
    <input type="submit" name="" value="<?=GetMessage('WEBSITE_TEMPLATE_UNINSTALL_BACK')?>">
<form>

