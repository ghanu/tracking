<?php /* Smarty version 2.6.26, created on 2013-09-14 20:22:39
         compiled from system/__dashboard.tpl */ ?>
	
<?php echo '
    <style>
        .column { float: left; width: 100%}
        .portlet { background: white;
                   position: relative;
                   border-radius: 4px;
                   -moz-border-radius: 4px;
                   -webkit-border-radius: 4px;
                   border: 1px solid #CCC;
                   margin: 15px;
                   z-index: 5; 
                   min-height: 250px;

        }
        .portlet-header { border-radius: 4px 4px 0 0;
                          -moz-border-radius: 4px 4px 0 0;
                          -webkit-border-radius: 4px 4px 0 0;
                          border-bottom: 1px solid #CCC;
                          font-size: 14px;

                          padding: 0;
                          margin: 0;

                          padding: 6px 12px;
                          cursor: move;
                          color: #555;

        }

        .portlet-header .ui-icon { float: right;cursor: pointer }
        .portlet-content { padding: 0.4em;overflow: auto; }
        .ui-sortable-placeholder { border: 5px dotted black; visibility: visible !important; height: 100% !important; }
        .ui-sortable-placeholder * { visibility: hidden; }

    </style>
    <script>
        $(function() {
            $( ".column" ).sortable({
                connectWith: ".column",
                placeholder: \'ui-state-highlight\',
                opacity: 0.6 ,
                helper: \'clone\',
                forcePlaceholderSize: true
            });

            $( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
            .find( ".portlet-header" )
            .addClass( "ui-widget-header ui-corner-all" )
            .prepend( "<span class=\'ui-icon ui-icon-triangle-1-n\'></span>")
            .end()
            .find( ".portlet-content" );

            $( ".portlet-header .ui-icon" ).click(function() {
                $( this ).toggleClass( "ui-icon-triangle-1-n" ).toggleClass( "ui-icon-triangle-1-s" );
                $( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
            });

            $( ".column" ).disableSelection();
        
        
        
            //Load Widget data using Ajax
        
        
        $(\'.portlet > .content_hash\').each(function(index,element){
        
        
            


            loadWidgetData($(element).val(),$(this).prev());
            
        
        
        
        });
        
        
        });
    
        function loadWidgetData(params,parentObj){
            
            var paramsObj=$.parseJSON(params);
            var id=geoJs.getQueryStringVal(\'pid\');
                
            $.ajax({
                url: AppURL+\'index.php?file=\'+paramsObj.widget+\'&dataType=ajax&type=widget&id=\'+1,            
                crossDomain: true,
                success: function(data){
                    $(parentObj).html(data);
                }
            });
            }
    </script>
'; ?>




<?php $_from = $this->_tpl_vars['content_details_array']['dashboard']['data']['widgets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column']):
?>

    <div class="column">

        <?php $_from = $this->_tpl_vars['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['widget']):
?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/widget.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['widget'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endforeach; else: ?>
            This column  has no widgets
        <?php endif; unset($_from); ?>
    </div>
<?php endforeach; else: ?>
    Dashboard has no widgets 
<?php endif; unset($_from); ?>










