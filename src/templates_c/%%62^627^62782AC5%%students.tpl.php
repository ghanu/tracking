<?php /* Smarty version 2.6.26, created on 2012-11-03 04:29:50
         compiled from students.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_table', 'students.tpl', 103, false),)), $this); ?>
<div id="nav-menu" class="toolbar">
    <ul><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=students">View All</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file=students&action=add">Add New</a></li><li><a href="<?php echo $this->_tpl_vars['AppURL']; ?>
index.php?file="></a></li></ul>
</div><?php if ($this->_tpl_vars['content_details_array']['formelements'] != ''): ?>
            <form name="students_form" id="students_form" method="post" action="<?php echo $this->_tpl_vars['content_details_array']['current_page']; ?>
" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_student_name">
<td style="width:50%">Student Name</td>
<td><?php if ($_GET['action'] == 'view'): ?><?php echo $this->_tpl_vars['content_details_array']['formelements']['student_name']['value']; ?>
 
                                            <?php else: ?> <div id="student_name_cam_stream"></div><div id="student_name_cams"></div>
                    <input value="" type="hidden" id="student_name" name="student_name"/>
                        <a href="javascript:webcam.capture();void(0);">Take a picture</a>
<?php endif; ?></td>
</tr>
<tr id="row_class_id">
<td style="width:50%">Class Id</td>
<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['class_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_parent_id">
<td style="width:50%">Parent Id</td>
<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['parent_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_date_of_joining">
<td style="width:50%">Date Of Joining</td>
<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['date_of_joining'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
<tr id="row_user_id">
<td style="width:50%">User Id</td>
<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['user_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table> 
 </p> 
</div>
</td></td>
</tr>
<?php if ($this->_tpl_vars['content_details_array']['page']['request_type'] == ''): ?> <tr>
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
                    
                </td>
           </tr><?php endif; ?></table><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/input.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</form>
        <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
cam/jquery.webcam.js"></script><?php echo '<script>$(function() {
                    

     var pos = 0, ctx = null, saveCB, image = [];

    var canvas = document.createElement("canvas");
    canvas.setAttribute("width", 320);
    canvas.setAttribute("height", 240);
  ctx = canvas.getContext("2d");
		
        image = ctx.getImageData(0, 0, 320, 240);
    
$("#student_name_cam_stream").webcam({
        width: 320,
        height: 240,
        mode: "callback",
        swffile: AppJsURL+"/cam/jscam.swf",
        onTick: function() {},
        onSave: function(data){
var col = data.split(";");
            var img = image;

            for(var i = 0; i < 320; i++) {
                var tmp = parseInt(col[i]);
                img.data[pos + 0] = (tmp >> 16) & 0xff;
                img.data[pos + 1] = (tmp >> 8) & 0xff;
                img.data[pos + 2] = tmp & 0xff;
                img.data[pos + 3] = 0xff;
                pos+= 4;
            }

            if (pos >= 4 * 320 * 240) {
                ctx.putImageData(img, 0, 0);
                $.post(AppURL+"index.php?file=uploadcameraimage&dataType=ajax&table=students&column=student_name", {
                    type: "data", 
                    image: canvas.toDataURL("image/png")
                    },function(data){$("#student_name").val(data);});
                pos = 0;
            }        
},
        onCapture: function(data) {
        
  webcam.save();
},
        debug: function() {},
        onLoad: function() {
        var cams = webcam.getCameraList();
        for(var i in cams) {
        jQuery("#student_name_cams").append("<li>" + cams[i] + "</li>");
    }}
});});</script>'; ?>
<?php else: ?>
    <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
datatables/jquery.dataTables.min.js"></script>
    <?php echo smarty_function_html_table(array('loop' => $this->_tpl_vars['content_details_array']['viewall']['data'],'cols' => $this->_tpl_vars['content_details_array']['viewall']['columnnames'],'rows' => $this->_tpl_vars['content_details_array']['viewall']['rowcount'],'table_attr' => "id='students'"), $this);?>

    <?php echo '
        <script>
            
        $(document).ready(function() {
        geoTable = $(\'#students\').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href=\'"+AppURL+"index.php?file=students&action=delete&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"delete.png\'></a>  <a href=\'"+AppURL+"index.php?file=students&action=edit&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"edit.png\'></a>  <a href=\'"+AppURL+"index.php?file=students&action=view&id=" + oObj.aData[0] + "\'><img src=\'"+AppImgURL+"view.png\'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    '; ?>



<?php endif; ?>