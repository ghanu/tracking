<?php /* Smarty version 2.6.26, created on 2013-09-12 21:06:47
         compiled from sales_orders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'sales_orders.tpl', 269, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
    <ul><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=sales_orders"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
view_all.png" align="absmiddle"> View All</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=pre_admission&action=add"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
add.png" align="absmiddle"> Add New</a></li></ul>
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
        <?php echo $this->_tpl_vars['content_details_array']['page']['viewactions']; ?>

            
<form name="pre_admission_form" id="pre_admission_form" method="post" action="<?php echo $this->_tpl_vars['content_details_array']['current_page']; ?>
" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Appllicant Details</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_application_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Application No</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['application_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['application_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_child_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['child_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['child_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_how_did_you_heard_about_us">
<td width="200px" bgcolor="#F2F2F2" align="right">How Did You Heard About Us</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['how_did_you_heard_about_us'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['how_did_you_heard_about_us'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_child_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Date Of Birth</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['child_date_of_birth'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['child_date_of_birth'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_class_to_be_admitted">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['class_to_be_admitted'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['class_to_be_admitted'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>                    
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
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['parent_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['parent_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['email'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['email'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['mobile'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['mobile'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
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
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_issue'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_issue'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_date_of_returning">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Returning</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_returning'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_returning'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_amount_paid">
<td width="200px" bgcolor="#F2F2F2" align="right">Amount Paid</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['amount_paid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['amount_paid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_payment_mode">
<td width="200px" bgcolor="#F2F2F2" align="right">Payment Mode</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['payment_mode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['payment_mode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>                    
</td>
</tr>
<tr id="row_cheque_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Cheque No</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['cheque_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['cheque_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_bank_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Bank Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['bank_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['bank_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_bill_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Bill No</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['bill_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['bill_no'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
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
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_pre_screening'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_pre_screening'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_time_of_pre_screening">
<td width="200px" bgcolor="#F2F2F2" align="right">Time Of Pre Screening</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['time_of_pre_screening'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['time_of_pre_screening'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>                    
</td>
</tr>
</table> 
 </p> 
</div>
</td></tr>
</td>
</tr>
<?php if ($this->_tpl_vars['content_details_array']['page']['request_type'] == '' && $this->_tpl_vars['content_details_array']['page']['action'] != 'view'): ?> <tr>
                <td>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/reset_button.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['reset_button'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
                <td>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/submit_button.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['submit_button'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <input type="hidden" value=<?php echo $this->_tpl_vars['content_details_array']['page']['action']; ?>
 name="formaction" />
                    
                </td>
           </tr><?php endif; ?></table><?php if ($this->_tpl_vars['content_details_array']['page']['action'] != 'view'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['screening_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['branch_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_timestamp'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['status'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?></form>
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
      },null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]



            }
            );
           
        } );
        

        </script>
    '; ?>



<?php endif; ?>