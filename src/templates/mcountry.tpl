<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mcountry">View All</a></li><li><a href="{$AppURL}index.php?file=mcountry&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="mcountry_form" id="mcountry_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_country_name">
<td style="width:50%">Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.country_name}</td>
</tr>
<tr id="row_country_code">
<td style="width:50%">Code</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.country_code}</td>
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
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mcountry'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mcountry').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=mcountry&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mcountry&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mcountry&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a><a href='"+AppURL+"index.php?file=mstate&action=add&country_id=" + oObj.aData[0] + "'>mstate</a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}