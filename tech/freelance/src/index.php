<?php
 include_once '../inc/config/config.php';
 include_once IncDir.'smarty/Smarty.class.php';
 include_once AppController.'cSessionController.php';
 $smarty=new Smarty();
 $_GET['file']=$_GET['file'] ? $_GET['file'] : 'login';
 $ScriptFileName=AppScriptURL.$_GET['file'].'.php';
 include_once $ScriptFileName;

 if($_GET['datatype']==''){
     $smarty->assign('CompanyURL',CompanyURL);
     $smarty->assign('CompanyName',CompanyName);
     $smarty->assign('AppURL',AppURL);
     $smarty->assign('AppJsURL',AppJsURL);
     $smarty->assign('AppCssURL',AppCssURL);
     $smarty->assign('AppTheme',AppTheme);
     $smarty->assign('FileName',$_GET['file']);

     
     $smarty->display('layout.tpl');
?>
     <script>
         var AppURL='<?php echo AppURL;?>'
     </script>
<?php
 }