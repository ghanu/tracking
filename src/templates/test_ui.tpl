<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=test_ui"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=test_ui&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="test_ui_form" id="test_ui_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_photo">
<td width="200px" bgcolor="#F2F2F2" align="right">Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.photo}
                        {$content_details_array.formelements.photo.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.photo}{/if}</td>
</tr>
<tr id="row_read_only">
<td width="200px" bgcolor="#F2F2F2" align="right">Read Only</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.read_only}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.read_only}{/if}</td>
</tr>
<tr id="row_select_array">
<td width="200px" bgcolor="#F2F2F2" align="right">Select Array</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.select_array}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.select_array}
{/if}                    
</td>
</tr>
<tr id="row_radio">
<td width="200px" bgcolor="#F2F2F2" align="right">Radio</td>
<td width="200px">{include file="formelements/radio.tpl" inputDetails=$content_details_array.formelements.radio}</td>
</tr>
<tr id="row_check_box">
<td width="200px" bgcolor="#F2F2F2" align="right">Check Box</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.check_box}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.check_box}{/if}</td>
</tr>
<tr id="row_select_foregin">
<td width="200px" bgcolor="#F2F2F2" align="right">Select Foregin</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.select_foregin}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.select_foregin}
{/if}                    
</td>
</tr>
<tr id="row_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.number}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.number}{/if}</td>
</tr>
<tr id="row_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date}{/if}</td>
</tr>
<tr id="row_text">
<td width="200px" bgcolor="#F2F2F2" align="right">Text</td>
<td width="200px">{include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.text}</td>
</tr>
</table> 
 </p> 
</div>
</td></td>
</tr>
{if $content_details_array.page.request_type eq '' && $content_details_array.page.action neq 'view'} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
{/if}</form>
{literal}<script>$(function() {$('#date').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-100:c+100',

                            altField: "#date_date",
                                    altFormat: "DD, d MM yy"

                    });});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='test_ui'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#test_ui').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,null,null, {
                    "fnRender": function ( oObj ) {
                        return '<img src="'+AppViewUploadsURL+oObj.aData[1]+'" />' ;
        },
        "bUseRendered": false
      },null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return null;
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}