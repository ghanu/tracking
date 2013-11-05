<?php
/*****
* Created by : G.M.Sundar
*
*****/

/**
 * Server Configurations
 */
ini_set('error_reporting',E_ALL & ~E_NOTICE);
ini_set('session.name','freelance');
ini_set('upload_max_filesize','300M');
ini_set('post_max_size','300M');




/**
 * Commercial
 */
define('CompanyName', 'GS');
define('CompanyURL', 'http://www.geotekh.com');

/**
 * Database
 */
define('DataBaseName', 'freelance');
define('DataBasePort', '3306');
define('DataBaseHost', 'localhost');
define('DataBaseUser', 'root');
define('DataBasePass', '');
define('DataBaseType', 'mysql');


/**
 * Directories
 */
define('AppURL','http://127.0.0.1/home/gt/freelance/src/');
define('AppBasePath',dirname(dirname(__DIR__)).'/');
define('PublicDir', 'src/');
define('IncDir', AppBasePath.'inc/');
define('AppController',IncDir.'controller/');
define('AppModel',IncDir.'model/');
define('AppJsURL',AppURL.'js/');
define('AppCssURL',AppURL.'css/');
define('AppScriptURL',AppBasePath.PublicDir.'scripts/');
define('AppChartURL',PublicDir.'chart/');
define('Controllers',AppURL.IncDir.'controller/');
define('AppTemplates',AppBasePath.PublicDir.'templates/');
define('AppTemplatesCompile',AppBasePath.PublicDir.'templates_c/');


/**
 * Apperance Settings
 */
define('AppTheme','redmond/');

?>
