<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=fees_dues"><img src="{$AppImgURL}/view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=fees_dues&action=add"><img src="{$AppImgURL}/add.png" align="absmiddle" /> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="fees_dues_form" id="fees_dues_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_student_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Student Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.student_id}</td>
</tr>
<tr id="row_fees_type_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Fees Type Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.fees_type_id}</td>
</tr>
<tr id="row_fees_amount">
<td width="200px" bgcolor="#F2F2F2" align="right">Fees Amount</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.fees_amount}</td>
</tr>
<tr id="row_balance">
<td width="200px" bgcolor="#F2F2F2" align="right">Balance</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.balance}</td>
</tr>
<tr id="row_due_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Due Date</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.due_date}</td>
</tr>
<tr id="row_status">
<td width="200px" bgcolor="#F2F2F2" align="right">Status</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}</td>
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
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='fees_dues'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#fees_dues').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},null,null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=fees_dues&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=fees_dues&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=fees_dues&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a><a href='"+AppURL+"index.php?file=fees&action=add&class_id=1&student_id="+ oObj.aData[0] +"' >Payment</a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}