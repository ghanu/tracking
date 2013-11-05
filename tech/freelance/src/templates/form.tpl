<script src="{$AppJsURL}jquery.js"></script>
<script src="{$AppJsURL}jquery.ui.js"></script>
<script src="{$AppJsURL}jquery.layout.js"></script>
<script src="{$AppJsURL}jquery.ui.core.js" type="text/javascript"></script>
<script src="{$AppJsURL}jquery.ui.button.js" type="text/javascript"></script>
<script src="{$AppJsURL}jquery.ui.sortable.js" type="text/javascript"></script>
<script src="{$AppJsURL}jquery.ui.widget.js" type="text/javascript"></script>
<script src="{$AppJsURL}jqgrid/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="{$AppJsURL}jqgrid/jquery.jqGrid.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="screen" href="{$AppCssURL}{$AppTheme}/jquery-ui.css" />
<link rel="stylesheet" type="text/css" media="screen" href="{$AppCssURL}ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="{$AppCssURL}layout-default.css" />
	{literal}

        {/literal}
<script type="text/javascript">
    
    {literal}
    var layoutOptions={
        fxName:    "slide"
        ,fxSpeed:   "slow"
        ,north__resizable :false
        ,south__resizable :false
        ,north__closable :false
        ,south__closable :false
        ,slidable:true
        ,west__maxSize:'18%'
        ,north__size:'8%'
        ,south__size:'3%'
        ,togglerContent_closed:'Menu'
        ,hideTogglerOnSlide :true
        ,togglerAlign_closed : 'center'

    };
    
    jQuery(document).ready(function(){
        jQuery('body').layout(layoutOptions);

    jQuery('#switcher').themeswitcher();

        {/literal} {$gridJsScript} {literal}
    });
    jQuery('div').bind('onShowHideColumn',function(e,colmnname,state){});
    jQuery('div').bind('onDragEnd',function(e,columnname,size){});
//    jQuery('[id^=geogrid]').bind('headercontextmenu',function(e){alert('hello')});

</script>
{/literal}

<script type="text/javascript"
  src="http://jqueryui.com/themeroller/themeswitchertool/">
</script>

    {$gridHTML}
    <a href="{$AppURL}index.php?file=form&type=graph" >Shows Graph</a>
