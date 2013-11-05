<?php
/*****
* Created by : G.M.Sundar
*
*****/

/**
 * Server Configurations
 */

ini_set('error_reporting',E_ALL & ~E_NOTICE);
ini_set('html_errors',On);
//ini_set('expose_php',Off);
//ini_set('output_buffering',40960);
//ini_set('max_execution_time',40);
ini_set('default_charset','utf-8');
//ini_set('session.save_path','../../tech/sessions');


/**
 * Commercial
 */
define('CompanyName', 'GS');
define('CompanyURL', 'http://www.ghanuagoram.blogspot.com');

/**
 * Database
 */
define('DataBaseName', 'gbase');
define('DataBasePort', '3306');
define('DataBaseHost', 'localhost');
define('DataBaseUser', 'root');
define('DataBasePass', 'thamizh');
define('DataBaseType', 'mysql');


/**
 *Security
 */

define('EncryptMethod', 'AES-256-CBC');
define('EncryptSalt', '25c6c7ff35b9979b151f2136cd13b0ff');
define('EncryptIV', '1234567812345678');
define('EncryptOutput', false);

/**
 * Directories
 */
define('AppHost',$_SERVER['HTTP_HOST']);
define('AppProtocol',((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
define('AppURL',AppProtocol.AppHost.'/gbase/');
define('PublicDir', 'src/');
define('IncDir', 'inc/');
define('AppController','/'.IncDir.'controller/');
define('AppCommon','/'.IncDir.'common/');
define('AppLanguage','/'.IncDir.'language/');
define('AppModel','/'.IncDir.'modal/');
define('AppJsURL',AppURL.PublicDir.'js/');
define('AppCssURL',AppURL.PublicDir.'css/');
define('AppImgURL',AppURL.PublicDir.'img/');
define('AppChartURL',AppURL.PublicDir.'scripts/graph/');
define('AppScriptURL','/'.PublicDir.'scripts/');
define('AppUploadsURL',AppRoot.'/'.PublicDir.'uploads/');
define('AppViewUploadsURL',AppURL.'/'.PublicDir.'uploads/');
define('Controllers',AppURL.IncDir.'controller/');
define('SmartyTemplateDir','templates/');
define('AppAdminDirUrl',AppURL.IncDir.'admin/');

/***
 * Language Settings
 */

define('AppLang','en');
define('AppLocalizationURL','/'.PublicDir.'localization/'.AppLang.'/');

/**
 * Apperance Settings
 */
define('AppTheme','themes/greenschoolerp/');
define('AppThemeCss',AppURL.PublicDir.SmartyTemplateDir.AppTheme.'css/');
define('AppThemeJs',AppURL.PublicDir.SmartyTemplateDir.AppTheme.'js/');
define('AppThemeImg',AppURL.PublicDir.SmartyTemplateDir.AppTheme.'img/');
define('AppJqueryTheme','start-blue/');

//TODO Fix Log Problem

/**
 * Log Settings
 */
define('AppLogPath','');
define('AppLogLevel',2);
define('AppLogDateFormat','Y-m-d H:i:s');

/**
 * Environment
 */
define('AppEnvironment','Development');
/**
 * SMTP Settings
 */
define('SMTP_HOST','smtp.google.com');
define('SMTP_USER','');
define('SMTP_PASS','');
define('SMTP_PORT','25');
define('SMTP_TIMEOUT','5');
define('SMTP_CRYPTO','');
define('SEND_MAIL_PATH','');
define('DEFAULT_EMAIL_FROM','smtp.google.com');

/***
 * File operations
 */

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


define('FOPEN_READ','rb');
define('FOPEN_READ_WRITE','r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE','wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE','w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE','ab');
define('FOPEN_READ_WRITE_CREATE','a+b');
define('FOPEN_WRITE_CREATE_STRICT','xb');
define('FOPEN_READ_WRITE_CREATE_STRICT','x+b');

/**
 * Report Details
 */

define('AppJavaBridgeURL','http://127.0.0.1:8080/JavaBridge/java/Java.inc');
//define('AppJavaBridgeURL',AppController.'JavaBridge/java/Java.inc');
define('AppReportDesigns',AppRoot.'/'.IncDir.'admin/reportdesigns/');

/**
 * Bugs Tracking
 */
define('AppsBugsURL','http://code.google.com/p/issueescalator/issues/list');

/**
 *Application Settings
 *
 */
define('AppRequiresLogin',true);



define('AppDateFormatPhp','d/m/Y');
define('AppDateFormatJs','yy-mm-dd');
define('AppDateFormatDb','%d/%m/%Y');
define('AppDateFormatDbInput','yyyy-mm-dd');
define('AppDateFormatTpl','%d/%m/%Y');

//Paths
define("PathSystem","system/");
define("PathWidget","system/widgets/");
define("PathMobApi","mobapi/");



?>
