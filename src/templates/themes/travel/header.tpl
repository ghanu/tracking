<html>
<link rel="Shortcut Icon" href="images/favicon.ico" type="image/x-icon" />
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

<link rel="stylesheet" type="text/css" href="{$AppThemeCss}/slider.css" />	
<style type="text/css">
{literal}
    
.colorbox { width:20px; height:20px; border:2px solid #666; text-align:center; margin:8px 5px 5px 5px; cursor:pointer;  display: block;float:left;}.default { background-color:#6EAFE9; }.default:hover { background-color:#1a548a; }.purple { background-color:#a07bb1; }.purple:hover { background-color:#a8136e; }.gold { background-color:#e0d800; }.gold:hover { background-color:#938e03; }.blue { background-color:#4147c8; }.blue:hover { background-color:#2a5e89; }.green { background-color:#19b665; }.green:hover { background-color:#107440; }.storm { background-color:#fafafa; }.storm:hover { background-color:#ccc; }.red { background-color:#d80303; }.red:hover { background-color:#920202; }
.vvqbox { display: block; max-width: 100%; visibility: visible !important; margin: 10px auto; } .vvqbox img { max-width: 100%; height: 100%; } .vvqbox object { max-width: 100%; } 
{/literal}
</style> 

<script type='text/javascript' src='{$AppThemeJs}/swfobjectdc8c.js?ver=2.2'></script>

<link href="{$AppThemeCss}style.css" rel="stylesheet" type="text/css" /><!-- Vipers Video Quicktags v6.3.1 | http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/ -->
<style type="text/css">

</style>
</head>
<body id="home">
<div style="clear:both"></div>
<div id="pixel"><!--Background Pixel-->		
<div id="layout"><!--Page  starts-->		
<!--Logo-->
<div id="logo"><img  alt="Traveler" src="images/logo-traveler.png" /></div>
<!--Logo-->
	<div id="header"><!--Header starts-->
		<div id="header_ad">
				
     	</div>	
	</div><!--Header ends--><!-- Wrapper Left Ends-->
    <!-- Wrapper Right Ends-->
	<div style="clear:both"></div>  	  
    <!-- Grid Ends -->  
<!-- Background Pixel Ends -->
<script type="text/javascript" src="{$AppThemeJs}/sfhover.js"></script>
<script type="text/javascript" src="{$AppThemeJs}/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="{$AppThemeJs}/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="{$AppThemeJs}/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="{$AppThemeJs}/coda-slider.1.1.1.pack.js"></script>
<script type="text/javascript">
    {literal}
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 4 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>
	<!--[if lt IE 7]>
 <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" 
 type="text/javascript">
 </script>
<![endif]-->   

<!-- Begin Shadowbox JS v3.0.3.8 -->
<!-- Selected Players: html, iframe, img, qt, swf, wmp -->
<script type="text/javascript">
/* <![CDATA[ */
	var shadowbox_conf = {
		autoDimensions: false,
		animateFade: true,
		animate: true,
		animSequence: "sync",
		autoplayMovies: true,
		continuous: false,
		counterLimit: 10,
		counterType: "default",
		displayCounter: true,
		displayNav: true,
		enableKeys: true,
		flashBgColor: "#000000",
		flashParams: {bgcolor:"#000000", allowFullScreen:true},
		flashVars: {},
		flashVersion: "9.0.0",
		handleOversize: "resize",
		handleUnsupported: "link",
		initialHeight: 160,
		initialWidth: 320,
		modal: false,
		overlayColor: "#000",
		showMovieControls: true,
		showOverlay: true,
		skipSetup: false,
		slideshowDelay: 0,
		useSizzle: false,
		viewportPadding: 20
	};
	Shadowbox.init(shadowbox_conf);
/* ]]> */
    
    {/literal}
</script>
<!-- End Shadowbox JS -->

<script type='text/javascript' src='wp-admin/admin-ajax1a0d.php?action=shadowboxjs&amp;cache=5accf6df8debb45c639367c7c8d7bde7&amp;ver=3.0.3'></script>
</body>

<!-- Mirrored from gorillathemes.com/traveler/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 03 May 2012 10:12:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>