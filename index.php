<?php
define('AppRoot', dirname(__FILE__));
include_once AppRoot . '/inc/config/config.php';
include_once AppRoot . '/inc/smarty/Smarty.class.php';
include_once AppRoot . '/inc/smarty/SmartyValidate.class.php';
include_once AppRoot . '/inc/common/utils.php';
session_start();

$post = cleanpost();
$get = cleanget();
//print_r($get);
$smarty = new Smarty();

$get['file'] = $get['file'] ? $get['file'] : 'login';


switch ($get['type']) {
    case 'system':
        $get['file'] = PathSystem . $get['file'];print_r($get['file']);
        break;
    case 'widget':
        $get['file'] = PathWidget . $get['file'];
	
}

if($get['type'] == 'mobapi') {

include_once AppRoot . AppScriptURL . 'mobapi/'.$get['file'].'.php';
exit;
}

if ($get['dataType'] == '') {

    if ($_SESSION['user_id']) {
        include_once AppRoot . AppScriptURL . 'menu.php';
        if ($get['file'] == 'login') {
            $get['file'] = 'home';
        }
    } else {
        if (AppRequiresLogin) {
            $get['file'] = 'login';
        } else {
            $get['file'] = 'home';
        }
    }
}
if ($get['report'] != '') {
    $get['file'] = 'report';
}
$ScriptFileName = AppRoot . AppScriptURL . $get['file'] . '.php';


if (is_readable($ScriptFileName)) {
    include_once "$ScriptFileName";
}



$smarty->assign('CompanyURL', CompanyURL);
$smarty->assign('CompanyName', CompanyName);
$smarty->assign('AppURL', AppURL);
$smarty->assign('AppViewUploadsURL', AppViewUploadsURL);
$smarty->assign('AppJsURL', AppJsURL);
$smarty->assign('AppCssURL', AppCssURL);
$smarty->assign('AppChartURL', AppChartURL);
$smarty->assign('AppImgURL', AppImgURL);
$smarty->assign('AppScriptURL', AppScriptURL);
$smarty->assign('AppTheme', AppTheme);
$smarty->assign('AppJqueryTheme', AppJqueryTheme);
$smarty->assign('AppThemeCss', AppThemeCss);
$smarty->assign('AppThemeJs', AppThemeJs);
$smarty->assign('AppThemeImg', AppThemeImg);
$smarty->assign('AppDateFormatTpl', AppDateFormatTpl);

$content_details_array['localization'] = localize($get['file']);
$content_details_array['tplFileName'] = $get['file'] . ".tpl";
$content_details_array['request_type'] = $get['dataType'];
$content_details_array['global_get'] = $get;
$content_details_array['global_post'] = $post;
$content_details_array['lastaction']['error'] = $_SESSION['lastaction']['error'];
$content_details_array['lastaction']["info"] = $_SESSION["lastaction"]["info"];
$_SESSION['lastaction'] = "";
$content_details_array['current_page'] = $_SERVER['REQUEST_URI'];
$smarty->assign('content_details_array', $content_details_array);
$smarty->assign('dataType', $get['dataType']);


if ($get['dataType'] == '') {
    $smarty->display(AppTheme . '/layout.tpl');
} else {
    $smarty->display($content_details_array['tplFileName']);
}
?>
<script>
    var jsdateFromat='<?php echo AppDateFormatJs; ?>';
</script>