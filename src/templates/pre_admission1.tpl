<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=pre_admission"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=pre_admission&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="pre_admission_form" id="pre_admission_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Appllicant Details</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_application_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Application No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_no}</td>
</tr>
<tr id="row_child_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_name}</td>
</tr>
<tr id="row_how_did_you_heard_about_us">
<td width="200px" bgcolor="#F2F2F2" align="right">How Did You Heard About Us</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.how_did_you_heard_about_us}</td>
</tr>
<tr id="row_child_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Date Of Birth</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_date_of_birth}</td>
</tr>
<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.class_to_be_admitted}</td>
</tr>
</table> 
 </p> 
</div>
</td><td  >
<div class="divframe">
<h4 class="subhead">Parent Details</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_parent_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Parent Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.parent_name}</td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.email}</td>
</tr>
<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mobile}</td>
</tr>
</table> 
 </p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Application Track</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_date_of_issue">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Issue</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_issue}</td>
</tr>
<tr id="row_date_of_returning">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Returning</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_returning}</td>
</tr>
<tr id="row_amount_paid">
<td width="200px" bgcolor="#F2F2F2" align="right">Amount Paid</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.amount_paid}</td>
</tr>
<tr id="row_payment_mode">
<td width="200px" bgcolor="#F2F2F2" align="right">Payment Mode</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.payment_mode}</td>
</tr>
<tr id="row_cheque_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Cheque No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.cheque_no}</td>
</tr>
<tr id="row_bank_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Bank Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.bank_name}</td>
</tr>
<tr id="row_bill_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Bill No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.bill_no}</td>
</tr>
</table> 
 </p> 
</div>
</td><td  >
<div class="divframe">
<h4 class="subhead">Pre Screening Appointment</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_date_of_pre_screening">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Pre Screening</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_pre_screening}</td>
</tr>
<tr id="row_time_of_pre_screening">
<td width="200px" bgcolor="#F2F2F2" align="right">Time Of Pre Screening</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.time_of_pre_screening}</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.screening_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_timestamp}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}
{/if}</form>
{literal}<script>$(function() {$('#date_of_issue').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-1:c+1',
                        minDate:'0d',
                            altField: "#date_of_issue_date",
                                    altFormat: "DD, d MM, yy", 
                      maxDate:'0d'
                    }); 
	
                    $('#date_of_returning').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-1:c+1',
                        minDate:'0d',
                            altField: "#date_of_returning_date",
                                    altFormat: "DD, d MM, yy", 
                        maxDate:'+12d'
                    }); 
                            $('#date_of_pre_screening').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-1:c+1',
                        minDate:'0d',
                            altField: "#date_of_pre_screening_date",
                                    altFormat: "DD, d MM, yy", 
                        maxDate:'+12d'
                    }); 
                            $('#child_date_of_birth').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        changeMonth: true,
                        changeYear: true,
                        altField: "#child_date_of_birth_date",
                                    altFormat: "DD, d MM, yy",    
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-100:c+100',
           
                    });		
                            $("#row_bank_name").hide();
                $("#row_cheque_no").hide();
    $('#amount_paid.auto').autoNumeric({aSign: 'Rs.', dGroup: 2});
$("#payment_mode").bind("change",function(){
if($(this).val()=="cash"){
$("#row_bank_name").hide();
$("#row_cheque_no").hide();}
else {$("#row_bank_name").show();
$("#row_cheque_no").show();}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='pre_admission'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#pre_admission').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,{ "bVisible": false},null,{ "bVisible": false},null,null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    var screening_link="";
                                                                            if(oObj.aData[18]==0){
                              screening_link="<a href='"+AppURL+"index.php?file=screening&action=add&application_id=" + oObj.aData[0] + "&application_no="+ oObj.aData[1] + "&student_name="+ oObj.aData[3] + "&class="+ oObj.aData[5] +"'><img src='"+AppImgURL+"screening.png'></a>";                                                  
                                                                                }else{
screening_link="<a href='"+AppURL+"index.php?file=screening&action=view&id=" + oObj.aData[0] +"'><img src='"+AppImgURL+"screened.png'></a>";
}
                                                                        return "<a href='"+AppURL+"index.php?file=pre_admission&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=pre_admission&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=pre_admission&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a><a href='"+AppURL+"index.php?file=report&id=2&ppid="+ oObj.aData[0] +"&dataType=no' ><img src='"+AppImgURL+"print.png'></a>   <a href='"+AppURL+"index.php?file=report&id=2&ppid="+ oObj.aData[0] +"&dataType=no&format=pdf' ><img src='"+AppImgURL+"pdf.png'></a>"+screening_link;
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}