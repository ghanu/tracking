<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=transportation">View All</a></li><li><a href="{$AppURL}index.php?file=transportation&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="transportation_form" id="transportation_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_application_no">
<td style="width:50%">Application No</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_no}</td>
</tr>
<tr id="row_registration_date">
<td style="width:50%">Registration Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.registration_date}</td>
</tr>
<tr id="row_enrollment">
<td style="width:50%">Enrollment</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.enrollment}</td>
</tr>
<tr id="row_user_id">
<td style="width:50%">User Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.user_id}</td>
</tr>
<tr id="row_start_date">
<td style="width:50%">Start Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.start_date}</td>
</tr>
<tr id="row_landmark1">
<td style="width:50%">Landmark1</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.landmark1}</td>
</tr>
<tr id="row_landmark2">
<td style="width:50%">Landmark2</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.landmark2}</td>
</tr>
<tr id="row_pickup">
<td style="width:50%">Pickup</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pickup}</td>
</tr>
<tr id="row_drop_point">
<td style="width:50%">Drop Point</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.drop_point}</td>
</tr>
<tr id="row_zone">
<td style="width:50%">Zone</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.zone}</td>
</tr>
<tr id="row_total_km">
<td style="width:50%">Total Km</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.total_km}</td>
</tr>
<tr id="row_pickup_km">
<td style="width:50%">Pickup Km</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pickup_km}</td>
</tr>
<tr id="row_drop_km">
<td style="width:50%">Drop Km</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.drop_km}</td>
</tr>
<tr id="row_fees">
<td style="width:50%">Fees</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.fees}</td>
</tr>
<tr id="row_last_updated">
<td style="width:50%">Last Updated</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_updated}</td>
</tr>
<tr id="row_status">
<td style="width:50%">Status</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}</td>
</tr>
<tr id="row_remarks">
<td style="width:50%">Remarks</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.remarks}</td>
</tr>
<tr id="row_pickup_time">
<td style="width:50%">Pickup Time</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pickup_time}</td>
</tr>
<tr id="row_drop_time">
<td style="width:50%">Drop Time</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.drop_time}</td>
</tr>
<tr id="row_application_date">
<td style="width:50%">Application Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_date}</td>
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
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='transportation'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#transportation').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=transportation&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=transportation&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=transportation&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}