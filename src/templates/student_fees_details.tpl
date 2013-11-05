<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=student_fees_details">View All</a></li><li><a href="{$AppURL}index.php?file=student_fees_details&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="student_fees_details_form" id="student_fees_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_student_id">
<td style="width:50%">Student Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.student_id}</td>
</tr>
<tr id="row_fees_id">
<td style="width:50%">Fees Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.fees_id}</td>
</tr>
<tr id="row_paid_date">
<td style="width:50%">Paid Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.paid_date}</td>
</tr>
<tr id="row_paid_amount">
<td style="width:50%">Paid Amount</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.paid_amount}</td>
</tr>
<tr id="row_balance_amount">
<td style="width:50%">Balance Amount</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.balance_amount}</td>
</tr>
<tr id="row_due_date">
<td style="width:50%">Due Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.due_date}</td>
</tr>
<tr id="row_receipt_no">
<td style="width:50%">Receipt No</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.receipt_no}</td>
</tr>
<tr id="row_payment_mode_id">
<td style="width:50%">Payment Mode Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.payment_mode_id}</td>
</tr>
<tr id="row_cheque_no">
<td style="width:50%">Cheque No</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.cheque_no}</td>
</tr>
<tr id="row_received_user_id">
<td style="width:50%">Received User Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.received_user_id}</td>
</tr>
<tr id="row_status">
<td style="width:50%">Status</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}</td>
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
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='student_fees_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#student_fees_details').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=student_fees_details&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=student_fees_details&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=student_fees_details&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}