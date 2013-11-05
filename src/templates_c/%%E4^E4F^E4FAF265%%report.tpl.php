<?php /* Smarty version 2.6.26, created on 2012-11-20 17:12:00
         compiled from report.tpl */ ?>

<?php if ($_GET['id'] == '3'): ?>
    <link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
ui.daterangepicker.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
daterangepicker.jQuery.js" ></script>

    <form method="POST" name="reportfilters">
        <a id="georeportfiltercontroller" style="cursor:pointer">Filters(-)</a>
        <div id="georeportfilters">
            <table>
                <tr>
                    <?php $_from = $this->_tpl_vars['content_details_array']['page']['report']['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['filter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentselectvalue']):
        $this->_foreach['filter']['iteration']++;
?>
                        <td>
                            <?php if ($this->_tpl_vars['currentselectvalue']['controltype'] == 'list-box'): ?>
                                <?php echo $this->_tpl_vars['currentselectvalue']['displayname']; ?>
 : <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentselectvalue'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php else: ?>
                                <?php echo $this->_tpl_vars['currentselectvalue']['displayname']; ?>
 : <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['currentselectvalue'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; endif; unset($_from); ?>
                </tr>
            </table>
            <button id="applygeoreportfilter">Apply Filter</button>
            <button id="savegeoreportfilter">Save Filter</button>
            <button id="resetgeoreportfilter">Reset Filter</button>

        </div>
    </form> 
    <br/>
<?php endif; ?>
<div id="georeporttable">
    <?php echo $this->_tpl_vars['content_details_array']['page']['report']['data']; ?>

</div>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
<script>
        <?php $_from = $this->_tpl_vars['content_details_array']['page']['report']['variables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['filter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['currentselectvalue']):
        $this->_foreach['filter']['iteration']++;
?>
        var <?php echo $this->_tpl_vars['key']; ?>
="<?php echo $this->_tpl_vars['currentselectvalue']; ?>
";
    <?php endforeach; endif; unset($_from); ?>
    <?php echo '
    
        $(document).ready(function() {
//                   var theaddata=$("#georeport").children(\'tbody\').children(\'tr\');
//                    georeportheaderrows=georeportheaderrows>0?georeportheaderrows:1;
//                    theaddata=$(theaddata).slice(0,georeportheaderrows);
//                    $("#georeport").prepend(\'<thead></thead>\');
//                    $("#georeport > thead").append(theaddata);
                   
 $("select").multiselect().multiselectfilter({\'placeholder\':\'Enter filter values\'});
    $(\'[type=date]\').daterangepicker({
                                        dateFormat: \'M d, yy\',
                                        rangeSplitter: \'to\',
                                        closeOnSelect:true,
                                        datepickerOptions: {
                                                changeMonth: true,
                                                changeYear: true
                                        }
                                 }); 

            $(\'#georeportfiltercontroller\').bind(\'click\',function(){
                if($(this).html()==\'Filters(-)\'){  
                    $(this).html(\'Filters(+)\');
                }else{
                    $(this).html(\'Filters(-)\');        
                }
                $("#georeportfilters").toggle();
            });
        $(\'#georeport\').dataTable({"bAutoWidth": false,"bJQueryUI": true});

        });
        $(\'#applygeoreportfilter\').bind(\'click\',function(){
            var formdata= $("form").serialize();
    


        });
        $(\'#resetgeoreportfilter\').bind(\'click\',function(){


        });
        $(\'#savegeoreportfilter\').bind(\'click\',function(){


        });
       
    </script>
    <style>

        #georeportfilters{
            background-color: #8db1ff;
        }

    </style>
'; ?>
