<?php /* Smarty version 2.6.26, created on 2012-10-22 18:59:45
         compiled from __menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', '__menu.tpl', 58, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
    <ul><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=__menu"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
view_all.png" align="absmiddle"> View All</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=__menu&action=add"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
add.png" align="absmiddle"> Add New</a></li></ul>
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
        <?php echo $this->_tpl_vars['content_details_array']['page']['viewactions']; ?>

            
<form name="__menu_form" id="__menu_form" method="post" action="<?php echo $this->_tpl_vars['content_details_array']['current_page']; ?>
" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_menu_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Menu Name</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['menu_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_url">
<td width="200px" bgcolor="#F2F2F2" align="right">Url</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_display_icon">
<td width="200px" bgcolor="#F2F2F2" align="right">Display Icon</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['display_icon'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_access_key">
<td width="200px" bgcolor="#F2F2F2" align="right">Access Key</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['access_key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_parent">
<td width="200px" bgcolor="#F2F2F2" align="right">Parent</td>
<td width="200px"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['parent'])));
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
	    

    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='__menu'"), $this);?>

    <?php echo '
        <script>
            
        $(document).ready(function() {
        geoTable = $(\'#__menu\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href=\'"+AppURL+"index.php?file=__menu&action=delete&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"delete.png\'></a>  <a href=\'"+AppURL+"index.php?file=__menu&action=edit&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"edit.png\'></a>  <a href=\'"+AppURL+"index.php?file=__menu&action=view&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"view.png\'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    '; ?>



<?php endif; ?>