<?php /* Smarty version 2.6.26, created on 2013-10-27 16:47:57
         compiled from production_order_line.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'production_order_line.tpl', 91, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
   
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
        <?php echo $this->_tpl_vars['content_details_array']['page']['viewactions']; ?>

            

<?php echo '<script>$(function() {$(\'#date_of_issue\').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:\'blind\',
                        dateFormat:\'yy-mm-dd\',
                        yearRange: \'c-1:c+1\',
                        minDate:\'-0d\',
                            altField: "#date_of_issue_date",
                                    altFormat: "dd/mm/yy", 
                      maxDate:\'+0d\'
                    }); 
	
                    $(\'#date_of_returning\').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:\'blind\',
                        dateFormat:\'yy-mm-dd\',
                        yearRange: \'c-1:c+1\',
                        minDate:\'0d\',
                            altField: "#date_of_returning_date",
                                    altFormat: "dd/mm/yy", 
                        maxDate:\'+12d\'
                    }); 
                            $(\'#date_of_pre_screening\').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:\'blind\',
                        dateFormat:\'yy-mm-dd\',
                        yearRange: \'c-1:c+1\',
                        minDate:\'0d\',
                            altField: "#date_of_pre_screening_date",
                                    altFormat: "dd/mm/yy", 
                        maxDate:\'+12d\'
                    }); 
                            $(\'#child_date_of_birth\').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:\'blind\',
                        dateFormat:\'yy-mm-dd\',
                        changeMonth: true,
                        changeYear: true,
                        
						altField: "#child_date_of_birth_date",
                                    altFormat: "dd/mm/yy",    
                        yearRange: \'c-100:c+100\',
           
                    });
							
      $("#child_name,#parent_name").bind(\'keyup\', function (e) {
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

$(\'#how_did_you_heard_about_us,#bank_name\').capitalize();	

	$("#child_date_of_birth").bind("change",function(){
	$("#class_to_be_admitted").find(\'option\').each(function() {
if((Math.round((new Date()- new Date($(\'#child_date_of_birth\').val()))/1000/60/60/24/365,0))>$(this).val()){$(this).show();}else{$(this).hide();}});$(\'#class_to_be_admitted\').val("");
	});
$("#payment_mode").bind("change",function(){
if($(this).val()=="Cash"){
$("#row_bank_name").hide();
$("#row_cheque_no").hide();}
else {$("#row_bank_name").show();
$("#row_cheque_no").show();}
});});</script>'; ?>
<?php else: ?>
    <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
	    

    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='sales_order'"), $this);?>

    <?php echo '
        <script>
            
        $(document).ready(function() {
        geoTable = $(\'#sales_order\').dataTable(
            {
            "bAutoWidth": true,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{"fnRender": function ( oObj ) {
                        return \'<a href="\'+AppURL+\'index.php?file=sales_orders_tracking&id=\'+oObj.aData[0]+\'" >\'+oObj.aData[0]+\'<a>\' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null,null,null,null,null,null]



            }
            );
           
        } );
        

        </script>
    '; ?>



<?php endif; ?>