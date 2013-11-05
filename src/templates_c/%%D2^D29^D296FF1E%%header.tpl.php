<?php /* Smarty version 2.6.26, created on 2013-08-26 21:40:49
         compiled from themes/greenschoolerp/header.tpl */ ?>
<html>
    <head>
        <title>
    <?php if ($this->_tpl_vars['content_details_array']['page']['heading']): ?><?php echo $this->_tpl_vars['content_details_array']['page']['heading']; ?>
<?php else: ?><?php echo $this->_tpl_vars['content_details_array']['page']['title']; ?>
<?php endif; ?>
</title>
<script>
    var AppImgURL='<?php echo $this->_tpl_vars['AppImgURL']; ?>
';
    var AppURL='<?php echo $this->_tpl_vars['AppURL']; ?>
';
    var AppJsURL='<?php echo $this->_tpl_vars['AppJsURL']; ?>
';
    var AppCssURL='<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
    var AppScriptURL='<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
    var AppViewUploadsURL='<?php echo $this->_tpl_vars['AppViewUploadsURL']; ?>
';
	
            
</script>

<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
geotheme1.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
jquery.multiselect.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
jquery.multiselect.filter.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
print.css">
<link href="<?php echo $this->_tpl_vars['AppThemeCss']; ?>
default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $this->_tpl_vars['AppThemeCss']; ?>
blue.css" rel="stylesheet" type="text/css" media="screen" /> <!-- color skin: blue / red / green / dark -->
<link href="<?php echo $this->_tpl_vars['AppThemeCss']; ?>
datePicker.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
<?php echo $this->_tpl_vars['AppJqueryTheme']; ?>
/jquery-ui.css"  />

<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-ui.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.cookie.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
geo.base.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
custom_jquery.js" ></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-ui-multiselect/jquery.multiselect.min.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-ui-multiselect/jquery.multiselect.filter.min.js"></script>



<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
autonumeric.js" ></script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
/date.js"></script>
    <!--[if IE]><script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
/jquery.datePicker.js"></script>
<script src="<?php echo $this->_tpl_vars['AppThemeJs']; ?>
/init.js"></script>
</head>
<body>
<!-- <div class="loadingmessage">loading please wait...</div> -->
    <div id="header">
        <div id="logo"><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
/logo.png" width="100" height="74"></a></div>
<!-- /#logo -->
        <!-- #user -->                        
        <div id="user"> 
            <?php if ($_SESSION['user_id']): ?>
            <h2>Welcome <?php echo $_SESSION['first_name']; ?>
 <?php echo $_SESSION['middle_name']; ?>
 <?php echo $_SESSION['last_name']; ?>
</h2>
            <a href="#">settings</a> - <a href="index.php?file=logout">logout</a>     
        <?php endif; ?>
        </div>
<!-- /#user -->  </div>
