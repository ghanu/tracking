<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=fees_structure"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=fees_structure&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="fees_structure_form" id="fees_structure_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_branch_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Branch Id</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.branch_id}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.branch_id}
{/if}                    
</td>
</tr>
<tr id="row_class">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.class}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.class}
{/if}                    
</td>
</tr>
<tr id="row_fees_types">
<td width="200px" bgcolor="#F2F2F2" align="right">Fees Types</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.fees_types}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.fees_types}
{/if}                    
</td>
</tr>
<tr id="row_amount">
<td width="200px" bgcolor="#F2F2F2" align="right">Amount</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.amount}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.amount}{/if}</td>
</tr>
<tr id="row_effect_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Effect From</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.effect_from}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.effect_from}{/if}</td>
</tr>
<tr id="row_fees_status">
<td width="200px" bgcolor="#F2F2F2" align="right">Fees Status</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.fees_status}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.fees_status}
{/if}                    
</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_timestamp}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}
{/if}</form>
{literal}<script>$(function() { $('#effect_from').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        changeMonth: true,
                        changeYear: true,
                        
						altField: "#effect_from_date",
                                    altFormat: "DD, d MM, yy",    
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-100:c+100',
           
                    });	});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='fees_structure'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#fees_structure').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=fees_type&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=fees_type&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=fees_type&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}