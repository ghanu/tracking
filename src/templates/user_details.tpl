<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=user_details">View All</a></li><li><a href="{$AppURL}index.php?file=user_details&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="user_details_form" id="user_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_first_name">
<td style="width:50%">First Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.first_name}</td>
</tr>
<tr id="row_last_name">
<td style="width:50%">Last Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_name}</td>
</tr>
<tr id="row_middle_name">
<td style="width:50%">Middle Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.middle_name}</td>
</tr>
<tr id="row_email">
<td style="width:50%">Email</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.email}</td>
</tr>
<tr id="row_mobile">
<td style="width:50%">Mobile</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mobile}</td>
</tr>
<tr id="row_work_phone">
<td style="width:50%">Work Phone</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.work_phone}</td>
</tr>
<tr id="row_address_id">
<td style="width:50%">Address</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.address_id}</td>
</tr>
<tr id="row_organization_id">
<td style="width:50%">Organization</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.organization_id}</td>
</tr>
<tr id="row_blood_group">
<td style="width:50%">Blood Group</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.blood_group}</td>
</tr>
<tr id="row_photo">
<td style="width:50%">Photo</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.photo}</td>
</tr>
<tr id="row_is_physically_challenged">
<td style="width:50%">Is Physically Challenged</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.is_physically_challenged}</td>
</tr>
<tr id="row_physically_challanged_remarks">
<td style="width:50%">Physically Challanged Remarks</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.physically_challanged_remarks}</td>
</tr>
<tr id="row_sex">
<td style="width:50%">Sex</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sex}</td>
</tr>
<tr id="row_user_type">
<td style="width:50%">User Type</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.user_type}</td>
</tr>
<tr id="row_father_spouse_name">
<td style="width:50%">Father Spouse Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.father_spouse_name}</td>
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
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='user_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#user_details').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=user_details&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=user_details&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=user_details&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}