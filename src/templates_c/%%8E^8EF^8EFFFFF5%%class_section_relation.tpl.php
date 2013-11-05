<?php /* Smarty version 2.6.26, created on 2012-11-03 04:38:33
         compiled from class_section_relation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'class_section_relation.tpl', 50, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
    <ul><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=class_section_relation"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
view_all.png" align="absmiddle"> View All</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=class_section_relation&action=add"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
add.png" align="absmiddle"> Add New</a></li></ul>
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
        <?php echo $this->_tpl_vars['content_details_array']['page']['viewactions']; ?>

            
<form name="class_section_relation_form" id="class_section_relation_form" method="post" action="<?php echo $this->_tpl_vars['content_details_array']['current_page']; ?>
" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_class_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Class Id</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['class_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_section_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Section Id</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['section_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_teacher_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Teacher Id</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['teacher_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_status">
<td width="200px" bgcolor="#F2F2F2" align="right">Status</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['status'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table> 
 </p> 
</div>
</td></td>
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
	    

    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='class_section_relation'"), $this);?>

    <?php echo '
        <script>
            
        $(document).ready(function() {
        geoTable = $(\'#class_section_relation\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href=\'"+AppURL+"index.php?file=class_section_relation&action=delete&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"delete.png\'></a>  <a href=\'"+AppURL+"index.php?file=class_section_relation&action=edit&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"edit.png\'></a>  <a href=\'"+AppURL+"index.php?file=class_section_relation&action=view&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"view.png\'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    '; ?>



<?php endif; ?>