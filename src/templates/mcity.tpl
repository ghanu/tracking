<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mcity">View All</a></li><li><a href="{$AppURL}index.php?file=mcity&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="mcity_form" id="mcity_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_city_name">
<td width="200px" bgcolor="#F2F2F2" align="right">City Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.city_name}</td>
</tr>
<tr id="row_city_code">
<td width="200px" bgcolor="#F2F2F2" align="right">City Code</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.city_code}</td>
</tr>
<tr id="row_state_id">
<td width="200px" bgcolor="#F2F2F2" align="right">State Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.state_id}</td>
</tr>
</table> 
 </p> 
</div>
</td></td>
</tr>
{if $content_details_array.page.request_type eq ''} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mcity'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mcity').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=mcity&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mcity&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mcity&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}