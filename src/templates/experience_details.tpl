<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=experience_details">View All</a></li><li><a href="{$AppURL}index.php?file=experience_details&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="experience_details_form" id="experience_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_organization_name">
<td style="width:50%">Organization Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.organization_name}</td>
</tr>
<tr id="row_address_id">
<td style="width:50%">Address Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.address_id}</td>
</tr>
<tr id="row_from_date">
<td style="width:50%">From Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.from_date}</td>
</tr>
<tr id="row_to_date">
<td style="width:50%">To Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.to_date}</td>
</tr>
<tr id="row_salary">
<td style="width:50%">Salary</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.salary}</td>
</tr>
<tr id="row_supervisor_name">
<td style="width:50%">Supervisor Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.supervisor_name}</td>
</tr>
<tr id="row_reason_for_leaving">
<td style="width:50%">Reason For Leaving</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.reason_for_leaving}</td>
</tr>
<tr id="row_reference_id">
<td style="width:50%">Reference Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.reference_id}</td>
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
                    
                </td>
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='experience_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#experience_details').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=experience_details&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=experience_details&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=experience_details&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}