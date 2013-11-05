<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mclass"><img src="http://localhost/schoolerp/src/img/view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=mclass&action=add"><img src="http://localhost/schoolerp/src/img/add.png" align="absmiddle"> Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="mclass_form" id="mclass_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_status">
<td width="200px" bgcolor="#F2F2F2" align="right">Status</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}</td>
</tr>
<tr id="row_group">
<td width="200px" bgcolor="#F2F2F2" align="right">Group</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.group}</td>
</tr>
<tr id="row_class">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.class}</td>
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
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mclass'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mclass').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=mclass&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mclass&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mclass&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}