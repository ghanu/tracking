<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=driver"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=driver&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="driver_form" id="driver_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">User</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_user_id">
<td width="200px" bgcolor="#F2F2F2" align="right">User</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.user_id}</td>
</tr>
</table> 
 </td><td valign="top"><table></table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Educational details</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_school_name">
<td width="200px" bgcolor="#F2F2F2" align="right">School Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.school_name}</td>
</tr>
<tr id="row_standard">
<td width="200px" bgcolor="#F2F2F2" align="right">Standard</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.standard}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_year">
<td width="200px" bgcolor="#F2F2F2" align="right">Year</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.year}</td>
</tr>
<tr id="row_city2">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.city2}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Vehicle driving experience</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_vehicle_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Vehicle Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.vehicle_name}</td>
</tr>
<tr id="row_period_start">
<td width="200px" bgcolor="#F2F2F2" align="right">Period Start</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.period_start}</td>
</tr>
<tr id="row_period_end">
<td width="200px" bgcolor="#F2F2F2" align="right">Period End</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.period_end}</td>
</tr>
<tr id="row_accident">
<td width="200px" bgcolor="#F2F2F2" align="right">Accident</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.accident}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_vehicle_name1">
<td width="200px" bgcolor="#F2F2F2" align="right">Vehicle Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.vehicle_name1}</td>
</tr>
<tr id="row_period_start1">
<td width="200px" bgcolor="#F2F2F2" align="right">Period Start</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.period_start1}</td>
</tr>
<tr id="row_period_end1">
<td width="200px" bgcolor="#F2F2F2" align="right">Period End</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.period_end1}</td>
</tr>
<tr id="row_accident1">
<td width="200px" bgcolor="#F2F2F2" align="right">Accident</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.accident1}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Driving License</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_license_no">
<td width="200px" bgcolor="#F2F2F2" align="right">License No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.license_no}</td>
</tr>
<tr id="row_license_address">
<td width="200px" bgcolor="#F2F2F2" align="right">License Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.license_address}</td>
</tr>
<tr id="row_period_start2">
<td width="200px" bgcolor="#F2F2F2" align="right">Period Start</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.period_start2}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_expiry_on">
<td width="200px" bgcolor="#F2F2F2" align="right">Expiry On</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.expiry_on}</td>
</tr>
<tr id="row_rto">
<td width="200px" bgcolor="#F2F2F2" align="right">RTO</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rto}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Previous Driving experience</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_name_of_employer">
<td width="200px" bgcolor="#F2F2F2" align="right">Name of Employer</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.name_of_employer}</td>
</tr>
<tr id="row_daddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.daddress}</td>
</tr>
<tr id="row_dcity">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dcity}</td>
</tr>
<tr id="row_dstate">
<td width="200px" bgcolor="#F2F2F2" align="right">State</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dstate}</td>
</tr>
<tr id="row_dpincode">
<td width="200px" bgcolor="#F2F2F2" align="right">Pincode</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dpincode}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_employment_dates_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates From</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.employment_dates_from}</td>
</tr>
<tr id="row_employment_dates_to">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates To</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.employment_dates_to}</td>
</tr>
<tr id="row_pay_rs">
<td width="200px" bgcolor="#F2F2F2" align="right">Pay Rs</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pay_rs}</td>
</tr>
<tr id="row_name_of_immediate_superviser">
<td width="200px" bgcolor="#F2F2F2" align="right">Name Of Immediate Superviser</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.name_of_immediate_superviser}</td>
</tr>
<tr id="row_reason_for_leaving">
<td width="200px" bgcolor="#F2F2F2" align="right">Reason For Leaving</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.reason_for_leaving}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Reference II</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_rname">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rname}</td>
</tr>
<tr id="row_rrelationship">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rrelationship}</td>
</tr>
<tr id="row_raddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.raddress}</td>
</tr>
<tr id="row_rwork_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rwork_number}</td>
</tr>
<tr id="row_rhome_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rhome_number}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_rname1">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rname1}</td>
</tr>
<tr id="row_rrelationship1">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rrelationship1}</td>
</tr>
<tr id="row_raddress1">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.raddress1}</td>
</tr>
<tr id="row_rwork_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rwork_number1}</td>
</tr>
<tr id="row_rhome_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rhome_number1}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
</td>
</tr>
{if $content_details_array.page.request_type eq '' && $content_details_array.page.action neq 'view'} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
{/if}</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='driver'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#driver').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}