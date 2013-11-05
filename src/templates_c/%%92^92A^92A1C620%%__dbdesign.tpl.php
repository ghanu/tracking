<?php /* Smarty version 2.6.26, created on 2012-10-22 18:56:58
         compiled from system/__dbdesign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'system/__dbdesign.tpl', 113, false),)), $this); ?>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
<form method="POST" name="__dbdesign">

<?php if ($this->_tpl_vars['content_details_array']['page']['action'] == 'add' || $this->_tpl_vars['content_details_array']['page']['action'] == 'edit'): ?>

<table border="0" id="table_details">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Length</th>
            <th>Default</th>
            <th>Default Value</th>
            <th>Not Null</th>
            <th>Index</th>
            <th>Auto Increment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['content_details_array']['formelements']['add_edit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentvalue']):
?>
        <?php if ($this->_tpl_vars['key'] == 'id'): ?>
        <tr>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_NAME'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['DATA_TYPE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['CHARACTER_MAXIMUM_LENGTH'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_DEFAULT'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>            
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_DEFAULT'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['IS_NULLABLE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['INDEX'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['AI'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            
        </tr>
        <?php else: ?>
        <tr>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_NAME'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['DATA_TYPE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['CHARACTER_MAXIMUM_LENGTH'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_DEFAULT'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_DEFAULT'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['IS_NULLABLE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['INDEX'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['AI'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
        <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/submit_button.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['submit_button'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
        
    $(document).ready(function() {
        geoJs.makeInsertRowTable({"tableid":"table_details","skiprows":"1"}); 
        $(\'#table_details\').dataTable({"bAutoWidth": true,
            "bJQueryUI": true,
            "bSort": false
        });
        
    } );
</script>
'; ?>

<?php elseif ($this->_tpl_vars['content_details_array']['page']['action'] == 'view'): ?>


<table border="0" id="table_details">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Length</th>
            <th>Default</th>
            <th>Not Null</th>
            <th>Index</th>
            <th>Auto Increment</th>
           
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['content_details_array']['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentvalue']):
?>
        <tr>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_NAME'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['DATA_TYPE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['CHARACTER_MAXIMUM_LENGTH'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['COLUMN_DEFAULT'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>            
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['IS_NULLABLE'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['INDEX'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/label.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentvalue']['AI'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
            
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>

<?php echo '
<script>
        
    $(document).ready(function() {
        
        $(\'#table_details\').dataTable({"bAutoWidth": true,
            "bJQueryUI": true,
            "bSort": false
        });
        
        
    } );
</script>
'; ?>

<?php else: ?>

<?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='__dbdesign'"), $this);?>




<?php echo '
<script>
        
    $(document).ready(function() {
        
        $(\'#submit\').click(function(event){
            
            
            //$(\'<div />\').attr(\'title\',\'Add columns\').html(\'\').dialog();
            $(\'#add_table\').dialog();
            event.preventDefault();
            
        });
        
        geoTable = $(\'#__dbdesign\').dataTable(
        {
            "bAutoWidth": false,
            "bJQueryUI": true,
              
            "sPaginationType": "full_numbers",
 
            aoColumns: [null,null,null,null,null,
            
                {
                    "bSearchable": false,
                    "bSortable": false,
                    "fnRender": function (oObj) 
                    {
                        return "<a href=\'"+AppURL+"index.php?file=__dbdesign&type=system&action=delete&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"delete.png\'></a>  <a href=\'"+AppURL+"index.php?file=__dbdesign&type=system&action=edit&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"edit.png\'></a>  <a href=\'"+AppURL+"index.php?file=__dbdesign&type=system&action=view&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"view.png\'></a>";
                    }
                }]



        }
    );
        $("#__dbdesign_length >label").after(" <a href=\'"+AppURL+"index.php?file=__dbdesign&type=system&action=add\'><img src=\'"+AppImgURL+"/add.png\' />Add Table</a>");       
    } );
        

</script>
'; ?>

<?php endif; ?>
</form>