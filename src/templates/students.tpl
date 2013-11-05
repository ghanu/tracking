<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=students">View All</a></li><li><a href="{$AppURL}index.php?file=students&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="students_form" id="students_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_student_name">
<td style="width:50%">Student Name</td>
<td>{if $smarty.get.action eq 'view'}{$content_details_array.formelements.student_name.value} 
                                            {else} <div id="student_name_cam_stream"></div><div id="student_name_cams"></div>
                    <input value="" type="hidden" id="student_name" name="student_name"/>
                        <a href="javascript:webcam.capture();void(0);">Take a picture</a>
{/if}</td>
</tr>
<tr id="row_class_id">
<td style="width:50%">Class Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.class_id}</td>
</tr>
<tr id="row_parent_id">
<td style="width:50%">Parent Id</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.parent_id}</td>
</tr>
<tr id="row_date_of_joining">
<td style="width:50%">Date Of Joining</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_joining}</td>
</tr>
<tr id="row_user_id">
<td style="width:50%">User Id</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.user_id}</td>
</tr>
</table> 
 </p> 
</div>
</td></td>
</tr>
{if $content_details_array.page.request_type eq ''} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    
                </td>
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
</form>
        <script src="{$AppJsURL}cam/jquery.webcam.js"></script>{literal}<script>$(function() {
                    

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
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='students'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#students').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=students&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=students&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=students&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}