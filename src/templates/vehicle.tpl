<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=vehicle"><img src="http://localhost/schoolerp/src/img/view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=vehicle&action=add"><img src="http://localhost/schoolerp/src/img/add.png" align="absmiddle"> Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="vehicle_form" id="vehicle_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Registration details</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_registration_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Registration No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.registration_no}</td>
</tr>
<tr id="row_owners_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Owners Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.owners_name}</td>
</tr>
<tr id="row_s_w_d_o">
<td width="200px" bgcolor="#F2F2F2" align="right">s/w/d/o</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.s_w_d_o}</td>
</tr>
<tr id="row_permanent_address">
<td width="200px" bgcolor="#F2F2F2" align="right">Permanent Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.permanent_address}</td>
</tr>
<tr id="row_dealer">
<td width="200px" bgcolor="#F2F2F2" align="right">Dealer</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dealer}</td>
</tr>
<tr id="row_registered_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Registered Date</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.registered_date}</td>
</tr>
<tr id="row_life_time_tax_paid">
<td width="200px" bgcolor="#F2F2F2" align="right">Life Time Tax Paid</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.life_time_tax_paid}</td>
</tr>
<tr id="row_challan_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Challan No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.challan_no}</td>
</tr>
<tr id="row_valid_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Valid From</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.valid_from}</td>
</tr>
<tr id="row_valid_upto">
<td width="200px" bgcolor="#F2F2F2" align="right">Valid Upto</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.valid_upto}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_class_of_vehicle">
<td width="200px" bgcolor="#F2F2F2" align="right">Class Of Vehicle</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.class_of_vehicle}</td>
</tr>
<tr id="row_makers_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Makers Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.makers_name}</td>
</tr>
<tr id="row_month_year">
<td width="200px" bgcolor="#F2F2F2" align="right">Month Year</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.month_year}</td>
</tr>
<tr id="row_chassis_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Chassis No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.chassis_no}</td>
</tr>
<tr id="row_engine_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Engine Number</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.engine_number}</td>
</tr>
<tr id="row_fuel_used">
<td width="200px" bgcolor="#F2F2F2" align="right">Fuel Used</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.fuel_used}</td>
</tr>
<tr id="row_makers_class">
<td width="200px" bgcolor="#F2F2F2" align="right">Makers Class</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.makers_class}</td>
</tr>
<tr id="row_seating_capacity">
<td width="200px" bgcolor="#F2F2F2" align="right">Seating Capacity</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.seating_capacity}</td>
</tr>
<tr id="row_colour">
<td width="200px" bgcolor="#F2F2F2" align="right">Colour</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.colour}</td>
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
<h4 class="subhead">Finance</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_hypothecation">
<td width="200px" bgcolor="#F2F2F2" align="right">Hypothecation</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.hypothecation}</td>
</tr>
<tr id="row_finance_company">
<td width="200px" bgcolor="#F2F2F2" align="right">Finance Company</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.finance_company}</td>
</tr>
<tr id="row_address">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.address}</td>
</tr>
<tr id="row_contract_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Contract No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.contract_no}</td>
</tr>
<tr id="row_customer_code">
<td width="200px" bgcolor="#F2F2F2" align="right">Customer Code</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.customer_code}</td>
</tr>
<tr id="row_original_loan_amount">
<td width="200px" bgcolor="#F2F2F2" align="right">Original Loan Amount</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.original_loan_amount}</td>
</tr>
<tr id="row_original_interest_amount">
<td width="200px" bgcolor="#F2F2F2" align="right">Original Interest Amount</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.original_interest_amount}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_original_amount_payable">
<td width="200px" bgcolor="#F2F2F2" align="right">Original Amount Payable</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.original_amount_payable}</td>
</tr>
<tr id="row_original_tenure">
<td width="200px" bgcolor="#F2F2F2" align="right">Original Tenure</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.original_tenure}</td>
</tr>
<tr id="row_monthly_instalment">
<td width="200px" bgcolor="#F2F2F2" align="right">Monthly Instalment</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.monthly_instalment}</td>
</tr>
<tr id="row_agreement_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Agreement Date</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.agreement_date}</td>
</tr>
<tr id="row_first_instalment_due_on">
<td width="200px" bgcolor="#F2F2F2" align="right">First Instalment Due On</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.first_instalment_due_on}</td>
</tr>
<tr id="row_last_instalment_due_on">
<td width="200px" bgcolor="#F2F2F2" align="right">Last Instalment Due On</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_instalment_due_on}</td>
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
<h4 class="subhead">Fitness Certificate</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_fc_expires_on">
<td width="200px" bgcolor="#F2F2F2" align="right">Fc Expires On</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.fc_expires_on}</td>
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
<h4 class="subhead">Insurance</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_insurance_company">
<td width="200px" bgcolor="#F2F2F2" align="right">Insurance Company</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.insurance_company}</td>
</tr>
<tr id="row_iaddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.iaddress}</td>
</tr>
<tr id="row_policy_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Policy No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.policy_no}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_date_of_issuance">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Issuance</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_issuance}</td>
</tr>
<tr id="row_ivalid_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Valid From</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.ivalid_from}</td>
</tr>
<tr id="row_ivalid_upto">
<td width="200px" bgcolor="#F2F2F2" align="right">Valid Upto</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.ivalid_upto}</td>
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
<h4 class="subhead">Permit</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_permit_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Permit From</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.permit_from}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_permit_to">
<td width="200px" bgcolor="#F2F2F2" align="right">Permit To</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.permit_to}</td>
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
{literal}<script>$(function() {$("#hypothecation").bind("change",function(){
if($(this).val()=="yes"){
$("#row_finance_company").show();
$("#row_address").show();
$("#row_contract_no").show();
$("#row_customer_code").show();
$("#row_original_loan_amount").show();
$("#row_original_interest_amount").show();
$("#row_original_amount_payable").show();
$("#row_original_tenure").show();
$("#row_monthly_instalment").show();
$("#row_agreement_date").show();
$("#row_first_instalment_due_on").show();
$("#row_last_instalment_due_on").show();}
else {$("#row_finance_company").hide();
$("#row_address").hide();
$("#row_contract_no").hide();
$("#row_customer_code").hide();
$("#row_original_loan_amount").hide();
$("#row_original_interest_amount").hide();
$("#row_original_amount_payable").hide();
$("#row_original_tenure").hide();
$("#row_monthly_instalment").hide();
$("#row_agreement_date").hide();
$("#row_first_instalment_due_on").hide();
$("#row_last_instalment_due_on").hide();}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='vehicle'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#vehicle').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},null,null,null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=vehicle&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=vehicle&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=vehicle&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}