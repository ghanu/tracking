<html>
    <head>
        <title>
    {if $content_details_array.page.heading}{$content_details_array.page.heading}{else}{$content_details_array.page.title}{/if}
</title>
<script>
    var AppImgURL='{$AppImgURL}';
    var AppURL='{$AppURL}';
    var AppJsURL='{$AppJsURL}';
    var AppCssURL='{$AppCssURL}';
    var AppScriptURL='{$AppCssURL}';
    var AppViewUploadsURL='{$AppViewUploadsURL}';
	
            
</script>

<link href="{$AppCssURL}geotheme1.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}jquery.multiselect.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}jquery.multiselect.filter.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="print" href="{$AppCssURL}print.css">
<link href="{$AppThemeCss}default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppThemeCss}blue.css" rel="stylesheet" type="text/css" media="screen" /> <!-- color skin: blue / red / green / dark -->
<link href="{$AppThemeCss}datePicker.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="{$AppCssURL}{$AppJqueryTheme}/jquery-ui.css"  />

<script src="{$AppJsURL}jquery.js"></script>
<script src="{$AppJsURL}jquery-ui.js" ></script>
<script src="{$AppJsURL}jquery.cookie.js" ></script>
<script src="{$AppJsURL}geo.base.js" ></script>
<script src="{$AppJsURL}custom_jquery.js" ></script>
<script src="{$AppJsURL}jquery-ui-multiselect/jquery.multiselect.min.js"></script>
<script src="{$AppJsURL}jquery-ui-multiselect/jquery.multiselect.filter.min.js"></script>



<script src="{$AppJsURL}autonumeric.js" ></script>

<script type="text/javascript" src="{$AppJsURL}/date.js"></script>
    <!--[if IE]><script type="text/javascript" src="{$AppJsURL}/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="{$AppJsURL}/jquery.datePicker.js"></script>
<script src="{$AppThemeJs}/init.js"></script>
</head>
<body>
<!-- <div class="loadingmessage">loading please wait...</div> -->
    <div id="header">
        <div id="logo"><a href="{$AppURL}"><img src="{$AppImgURL}/logo.png" width="100" height="74"></a></div>
<!-- /#logo -->
        <!-- #user -->                        
        <div id="user"> 
            {if $smarty.session.user_id}
            <h2>Welcome {$smarty.session.first_name} {$smarty.session.middle_name} {$smarty.session.last_name}</h2>
            <a href="#">settings</a> - <a href="index.php?file=logout">logout</a>     
        {/if}
        </div>
<!-- /#user -->  </div>

