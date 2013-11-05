<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=sales_order"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=pre_admission&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
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
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.application_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_no}{/if}</td>
</tr>
<tr id="row_child_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.child_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_name}{/if}</td>
</tr>
<tr id="row_how_did_you_heard_about_us">
<td width="200px" bgcolor="#F2F2F2" align="right">How Did You Heard About Us</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.how_did_you_heard_about_us}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.how_did_you_heard_about_us}{/if}</td>
</tr>
<tr id="row_child_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Date Of Birth</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.child_date_of_birth}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_date_of_birth}{/if}</td>
</tr>
<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.class_to_be_admitted}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.class_to_be_admitted}
{/if}                    
</td>
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
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.parent_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.parent_name}{/if}</td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.email}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.email}{/if}</td>
</tr>
<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mobile}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mobile}{/if}</td>
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
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date_of_issue}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_issue}{/if}</td>
</tr>
<tr id="row_date_of_returning">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Returning</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date_of_returning}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_returning}{/if}</td>
</tr>
<tr id="row_amount_paid">
<td width="200px" bgcolor="#F2F2F2" align="right">Amount Paid</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.amount_paid}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.amount_paid}{/if}</td>
</tr>
<tr id="row_payment_mode">
<td width="200px" bgcolor="#F2F2F2" align="right">Payment Mode</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.payment_mode}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.payment_mode}
{/if}                    
</td>
</tr>
<tr id="row_cheque_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Cheque No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.cheque_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.cheque_no}{/if}</td>
</tr>
<tr id="row_bank_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Bank Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.bank_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.bank_name}{/if}</td>
</tr>
<tr id="row_bill_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Bill No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.bill_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.bill_no}{/if}</td>
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
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date_of_pre_screening}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_pre_screening}{/if}</td>
</tr>
<tr id="row_time_of_pre_screening">
<td width="200px" bgcolor="#F2F2F2" align="right">Time Of Pre Screening</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.time_of_pre_screening}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.time_of_pre_screening}
{/if}                    
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.screening_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_timestamp}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}
{/if}</form>
{literal}<script>$(function() {$('#date_of_issue').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-1:c+1',
                        minDate:'-0d',
                            altField: "#date_of_issue_date",
                                    altFormat: "dd/mm/yy", 
                      maxDate:'+0d'
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
                                    altFormat: "dd/mm/yy", 
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
                                    altFormat: "dd/mm/yy", 
                        maxDate:'+12d'
                    }); 
                            $('#child_date_of_birth').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        
						altField: "#child_date_of_birth_date",
                                    altFormat: "dd/mm/yy",    
                        yearRange: 'c-100:c+100',
           
                    });
							
      $("#child_name,#parent_name").bind('keyup', function (e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $("#child_name").val(($("#child_name").val()).toUpperCase());
    $("#parent_name").val(($("#parent_name").val()).toUpperCase());
	
					
});
				
                 $("#row_bank_name").hide();
                $("#row_cheque_no").hide();

$('#how_did_you_heard_about_us,#bank_name').capitalize();	

	$("#child_date_of_birth").bind("change",function(){
	$("#class_to_be_admitted").find('option').each(function() {
if((Math.round((new Date()- new Date($('#child_date_of_birth').val()))/1000/60/60/24/365,0))>$(this).val()){$(this).show();}else{$(this).hide();}});$('#class_to_be_admitted').val("");
	});
$("#payment_mode").bind("change",function(){
if($(this).val()=="Cash"){
$("#row_bank_name").hide();
$("#row_cheque_no").hide();}
else {$("#row_bank_name").show();
$("#row_cheque_no").show();}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='sales_order'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#sales_order').dataTable(
            {
            "bAutoWidth": true,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{"fnRender": function ( oObj ) {
                        return '<a href="'+AppURL+'index.php?file=details&id='+oObj.aData[0]+'" >'+oObj.aData[0]+'<a>' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}
