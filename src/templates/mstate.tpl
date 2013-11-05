<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mstate">View All</a></li><li><a href="{$AppURL}index.php?file=mstate&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file=mcountry">mcountry</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="mstate_form" id="mstate_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_state_code">
<td style="width:50%">Code</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.state_code}</td>
</tr>
<tr id="row_state_name">
<td style="width:50%">Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.state_name}</td>
</tr>
<tr id="row_country_id">
<td style="width:50%">Country</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.country_id}</td>
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
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mstate'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mstate').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=mstate&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mstate&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mstate&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}