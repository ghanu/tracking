<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=report&id=0"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=fees&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="fees_form" id="fees_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_bill_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Bill No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.bill_no}</td>
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
<tr id="row_chellan_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Chellan No</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.chellan_no}</td>
</tr>
<tr id="row_pay">
<td width="200px" bgcolor="#F2F2F2" align="right">Pay</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pay}</td>
</tr>
</table> 
 </p> 
</div>
</td><td>{$content_details_array.formelements.fees_table}</td>
</tr>
{if $content_details_array.page.request_type eq '' && $content_details_array.page.action neq 'view'} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.class_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.student_id}
{/if}</form>
{literal}<script>$(function() {$("#row_bank_name").hide();
$("#row_cheque_no").hide();
$("#payment_mode").bind("change",function(){
if($(this).val()=="Cash"){
$("#row_bank_name").hide();
$("#row_cheque_no").hide();}
else {$("#row_bank_name").show();
$("#row_cheque_no").show();}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='fees'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#fees').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
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