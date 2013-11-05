<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=payment_transaction_details"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=payment_transaction_details&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="payment_transaction_details_form" id="payment_transaction_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">1</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_transaction_table_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Transaction ID</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.transaction_table_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.transaction_table_id}{/if}</td>
</tr>
<tr id="row_transaction_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Transaction No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.transaction_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.transaction_no}{/if}</td>
</tr>
<tr id="row_transaction_amount">
<td width="200px" bgcolor="#F2F2F2" align="right">Transaction Amount</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.transaction_amount}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.transaction_amount}{/if}</td>
</tr>
<tr id="row_transaction_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Transaction Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.transaction_date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.transaction_date}{/if}</td>
</tr>
</table> 
 </p> 
</div>
</td></td>
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
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='payment_transaction_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#payment_transaction_details').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return null;
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}