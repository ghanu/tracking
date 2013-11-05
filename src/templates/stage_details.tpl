<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=stage_details"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=stage_details&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="stage_details_form" id="stage_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_route_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Route Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.route_name}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.route_name}
{/if}                    
</td>
</tr>
<tr id="row_stages">
<td width="200px" bgcolor="#F2F2F2" align="right">Stages</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.stages}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.stages}{/if}</td>
</tr>
<tr id="row_cost">
<td width="200px" bgcolor="#F2F2F2" align="right">Cost</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.cost}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.cost}{/if}</td>
</tr>
<tr id="row_km">
<td width="200px" bgcolor="#F2F2F2" align="right">Km</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.km}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.km}{/if}</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date}
{/if}</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='stage_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#stage_details').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=stage_details&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=stage_details&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=stage_details&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}