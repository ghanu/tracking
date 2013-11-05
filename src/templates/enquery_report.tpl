<div id="nav-menu" class="toolbar">
   {$html}
</div>{$content_details_array.output}
{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="pre_admission_form" id="pre_admission_form" method="post" action="{$content_details_array.current_page}" >

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
                        return '<a href="'+AppURL+'index.php?file=sales_orders_tracking&id='+oObj.aData[0]+'" >'+oObj.aData[0]+'<a>' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null,null,null,null,null,null,null,null]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}
