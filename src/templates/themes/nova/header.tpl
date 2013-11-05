<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
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

<link rel="stylesheet" href="{$AppCssURL}{$AppJqueryTheme}/jquery-ui.css"  />

<link href="{$AppThemeCss}layout.css" rel="stylesheet" type="text/css" media="screen" />


<script src="{$AppJsURL}jquery.js"></script>
<script src="{$AppJsURL}jquery-ui.js" ></script>
<script src="{$AppJsURL}jquery.cookie.js" ></script>
<script src="{$AppJsURL}geo.base.js" ></script>
<script src="{$AppJsURL}custom_jquery.js" ></script>
<script src="{$AppJsURL}jquery-ui-multiselect/jquery.multiselect.min.js"></script>
<script src="{$AppJsURL}jquery-ui-multiselect/jquery.multiselect.filter.min.js"></script>
<script type="text/javascript" src="{$AppJsURL}/date.js"></script>
<!--[if IE]><script type="text/javascript" src="{$AppJsURL}/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="{$AppJsURL}/jquery.datePicker.js"></script>




	<!--[if lt IE 9]>
	<link rel="stylesheet" href="{$AppThemeCss}/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->



<script type="text/javascript" src="{$AppThemeJs}jquery.equalHeight.js"></script>

	<script type="text/javascript">
	{literal}
	
    	
$(document).ready(function() {

var showText='Show';
var hideText='Hide';
var is_visible = true;
$('.toggle').prev().append(' <a href="#" class="toggleLink">'+showText+'</a>');
$('.toggle').hide();
$('a.toggleLink').click(function() {
// switch visibility
is_visible = !is_visible;
// change the link text depending on whether the element is shown or hidden
if ($(this).text()==showText) {
$(this).text(hideText);
$(this).parent().next('.toggle').slideDown('slow');
}
else {
$(this).text(showText);
$(this).parent().next('.toggle').slideUp('slow');
}

// return false so any link destination is not followed
return false;

});
$('.column').equalHeight();
});
	




  
	{/literal}
</script>
</head>
<body>

<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="{$AppURL}"><img src="{$AppImgURL}/logo.png" ></a></h1>
			<h2 class="section_title">{$content_details_array.page.title}</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
		 {if $smarty.session.user_id}
			<p>Welcome {$smarty.session.first_name} {$smarty.session.middle_name} {$smarty.session.last_name}</p>
			<a class="logout_user" href="index.php?file=logout" title="Logout">Logout</a>
			{/if}
		</div>
		<!-- <div class="breadcrumbs_container">
			<article class="breadcrumbs">
			<a href="index.html">Website Admin</a>
			<div class="breadcrumb_divider"></div> 
			<a class="current">Dashboard</a>
			</article>
		</div>-->
	</section> <!-- end of secondary bar -->
	
    



	
	

	
	


