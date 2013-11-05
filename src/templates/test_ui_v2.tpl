<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=test_ui"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=test_ui&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div><table class="contenttable" valign="top"><tr><td>
            {if $content_details_array.page.action neq 'viewall'}
            {$content_details_array.page.viewactions}{if $content_details_array.page.action neq 'add'} 
            {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
            {/if}<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body><table><tbody><tr><td>
				{$content_details_array.localization.text}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.text}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.text}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.select_foregin}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.select_foregin}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.select_foregin}
{/if}                    
</td>
		</tr><tr><td>
				{$content_details_array.localization.number}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.number}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.number}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.date}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.check_box}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.check_box}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.check_box}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.radio}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.radio}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.radio}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.photo}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.photo}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.photo}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.read_only}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.read_only}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.read_only}{/if}</td>
		</tr><tr><td>
				{$content_details_array.localization.select_array}</td>
			<td>
				{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.select_array}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.select_array}{/if}</td>
		</tr></tbody></table></body></html>
 </td></tr>
            {if $content_details_array.page.request_type eq '' && $content_details_array.page.action neq 'view'}<tr>
                
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>
           {/if}
           </table>{else}<script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>{html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='test_ui'"}
    {literal}
        <script>
            
        $(document).ready(function() {
           geoTable = $('#test_ui').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [Array
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return             "<a href='"+AppURL+"index.php?file=test_ui&action=view&id="+ oObj.aData[0] +"' >
                <img src='"+AppImgURL+"/view.png' /></a>  
            <a href='"+AppURL+"index.php?file=test_ui&action=edit&id="+ oObj.aData[0] +"' >
                <img src='"+AppImgURL+"/edit.png' /></a>  
            <a href='"+AppURL+"index.php?file=test_ui&action=delete&id="+ oObj.aData[0] +"' >
                <img src='"+AppImgURL+"/delete2.png' /></a>
								}
							}]



            }
            );} );
        

        </script>
    {/literal}


{/if}