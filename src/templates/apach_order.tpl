<div id="nav-menu" class="toolbar">
   <ul><li><a href="{$AppURL}index.php?file=apach_order">View All</a></li><li><a href="{$AppURL}index.php?file=apach_order&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="pre_admission_form" id="pre_admission_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Tracker Details</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_application_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Order No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.order_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.order_no}{/if}</td>
</tr>
<tr id="row_child_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Customer Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.customer_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.customer_name}{/if}</td>
</tr>

<tr id="row_child_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">PO Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.po_date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.po_date}{/if}</td>
</tr>

<tr id="row_how_did_you_heard_about_us">
<td width="200px" bgcolor="#F2F2F2" align="right">Po Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.po_number}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.po_number}{/if}</td>
</tr>

<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Po Line</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.po_line}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.po_line}{/if}</td>
</tr>

<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Part Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.part_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.part_name}{/if}</td>
</tr>

<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Nav Material</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.navision_material}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.navision_material}{/if}</td>
</tr>

<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Rev</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rev}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rev}{/if}</td>
</tr>

</table> 
 </p> 
</div>
</td><td  >
<div class="divframe">
<table valign="top" class="contenttable">
<tr id="row_parent_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Part Description</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.part_description}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.part_description}{/if}</td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Po Qty</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.po_qty}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.po_qty}{/if}</td>
</tr>
<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Delivery Qty</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.delivery_qty}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.delivery_qty}{/if}</td>
</tr>

<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Balanced Qty</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.balance_qty}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.balance_qty}{/if}</td>
</tr>

<tr id="project">
<td width="200px" bgcolor="#F2F2F2" align="right">Project</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.project}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.project}{/if}</td>
</tr>

<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Status</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.status}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}{/if}</td>
</tr>

<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Material Dock Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dock_date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dock_date}{/if}</td>
</tr>

<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">GE Dock Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.ge_dock_date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.ge_dock_date}{/if}</td>
</tr>

</table> 
 </p> 
</div>
</td></tr>

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
           </tr>{/if}</table></form>
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
                        return '<a href="'+AppURL+'index.php?file=sales_orders_tracking&id='+oObj.aData[0]+'" >'+oObj.aData[0]+'<a>' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,
	  {"fnRender": function ( oObj ) {
                        return '<a href="'+AppURL+'src/scripts/'+oObj.aData[7]+'.xlsx'+'" >'+oObj.aData[7]+'<a>' ;
        },
        "bUseRendered": false
      }
	  ,null,null,null,null,null,null,null,null,
	  {
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=apach_order&action=delete&order_no=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=apach_order&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a> ";
								}
							}
	  
	  ]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}
