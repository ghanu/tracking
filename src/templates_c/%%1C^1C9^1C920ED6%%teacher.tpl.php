<?php /* Smarty version 2.6.26, created on 2012-10-22 18:51:57
         compiled from teacher.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'teacher.tpl', 384, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
    <ul><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=teacher"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
view_all.png" align="absmiddle"> View All</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=teacher&action=add"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
add.png" align="absmiddle"> Add New</a></li></ul>
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
        <?php echo $this->_tpl_vars['content_details_array']['page']['viewactions']; ?>

            
<form name="teacher_form" id="teacher_form" method="post" action="<?php echo $this->_tpl_vars['content_details_array']['current_page']; ?>
" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">User</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_user_id">
<td width="200px" bgcolor="#F2F2F2" align="right">User </td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['user_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['user_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>                    
</td>
</tr>
</table> 
 </td><td valign="top"><table></table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Educational details</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_school_name">
<td width="200px" bgcolor="#F2F2F2" align="right">School Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['school_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['school_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_subject_major">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_year_completed">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_percentage">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_school_name1">
<td width="200px" bgcolor="#F2F2F2" align="right">School Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['school_name1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['school_name1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_subject_major1">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_year_completed1">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_percentage1">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_college_name">
<td width="200px" bgcolor="#F2F2F2" align="right">College Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['college_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['college_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_subject_major2">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_year_completed2">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_percentage2">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_college_name2">
<td width="200px" bgcolor="#F2F2F2" align="right">College Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['college_name2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['college_name2'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_subject_major3">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['subject_major3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_year_completed3">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['year_completed3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_percentage3">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['percentage3'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Previous Experience</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_name_of_employer">
<td width="200px" bgcolor="#F2F2F2" align="right">Name Of Employer</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['name_of_employer'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['name_of_employer'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_daddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['daddress'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['daddress'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_dcity">
<td width="200px" bgcolor="#F2F2F2" align="right"> City</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dcity'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dcity'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_dstate">
<td width="200px" bgcolor="#F2F2F2" align="right">State</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dstate'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dstate'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_dpincode">
<td width="200px" bgcolor="#F2F2F2" align="right">Pincode</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dpincode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['dpincode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_employment_dates_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates From</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['employment_dates_from'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['employment_dates_from'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_employment_dates_to">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates To</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['employment_dates_to'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['employment_dates_to'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_pay_rs">
<td width="200px" bgcolor="#F2F2F2" align="right">Pay Rs</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['pay_rs'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['pay_rs'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_name_of_immediate_superviser">
<td width="200px" bgcolor="#F2F2F2" align="right">Name Of Immediate Superviser</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['name_of_immediate_superviser'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['name_of_immediate_superviser'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_job_title_description_of_work">
<td width="200px" bgcolor="#F2F2F2" align="right">Job Title Description Of Work</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['job_title_description_of_work'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['job_title_description_of_work'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_reason_for_leaving">
<td width="200px" bgcolor="#F2F2F2" align="right">Reason For Leaving</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['reason_for_leaving'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['reason_for_leaving'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Reference I</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_rname">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rname'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rname'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_rrelationship">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rrelationship'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rrelationship'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_raddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['raddress'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['raddress'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_rwork_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rwork_number'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rwork_number'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_rhome_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rhome_number'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rhome_number'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Reference II</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_rname1">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rname1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rname1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_rrelationship1">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rrelationship1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rrelationship1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_raddress1">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['raddress1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['raddress1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_rwork_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rwork_number1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rwork_number1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
<tr id="row_rhome_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px"><?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?> 
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rhome_number1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['rhome_number1'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?></td>
</tr>
</table> 
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
 ?>
<?php endif; ?></form>
<?php echo ''; ?>
<?php else: ?>
    <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
	    

    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='teacher'"), $this);?>

    <?php echo '
        <script>
            
        $(document).ready(function() {
        geoTable = $(\'#teacher\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href=\'"+AppURL+"index.php?file=teacher&action=delete&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"delete.png\'></a>  <a href=\'"+AppURL+"index.php?file=teacher&action=edit&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"edit.png\'></a>  <a href=\'"+AppURL+"index.php?file=teacher&action=view&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"view.png\'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    '; ?>



<?php endif; ?>