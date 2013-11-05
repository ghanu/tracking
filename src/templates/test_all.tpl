<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=test_all">View All</a></li><li><a href="{$AppURL}index.php?file=test_all&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="test_all_form" id="test_all_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_col_text">
<td style="width:50%">Col Text</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_text}</td>
</tr>
<tr id="row_col_date_time">
<td style="width:50%">Col Date Time</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_date_time}</td>
</tr>
<tr id="row_col_date">
<td style="width:50%">Col Date</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_date}</td>
</tr>
<tr id="row_col_number">
<td style="width:50%">Col Number</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_number}</td>
</tr>
<tr id="row_col_email">
<td style="width:50%">Col Email</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_email}</td>
</tr>
<tr id="row_col_url">
<td style="width:50%">Col Url</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_url}</td>
</tr>
<tr id="row_col_free_field">
<td style="width:50%">Col Free Field</td>
<td>{if $smarty.get.action eq 'view'}{$content_details_array.formelements.col_free_field.value} 
                                            {else} <div id="col_free_field_cam_stream"></div><div id="col_free_field_cams"></div>
                    <input value="" type="hidden" id="col_free_field" name="col_free_field"/>
                        <a href="javascript:webcam.capture();void(0);">Take a picture</a>
{/if}</td>
</tr>
<tr id="row_col_pattern_valid">
<td style="width:50%">Col Pattern Valid</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_pattern_valid}</td>
</tr>
<tr id="row_col_foreign_key">
<td style="width:50%">Col Foreign Key</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.col_foreign_key}</td>
</tr>
<tr id="row_col_no_display">
<td style="width:50%">Col No Display</td>
<td></td>
</tr>
<tr id="row_col_textarea">
<td style="width:50%">Col Textarea</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_textarea}</td>
</tr>
<tr id="row_col_multiselect">
<td style="width:50%">Col Multiselect</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_textarea}</td>
</tr>
<tr id="row_col_direct_select">
<td style="width:50%">Col Direct Select</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.col_direct_select}</td>
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
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.col_hidden}
</form>
        <script src="{$AppJsURL}cam/jquery.webcam.js"></script>{literal}<script>$(function() {
                    

     var pos = 0, ctx = null, saveCB, image = [];

    var canvas = document.createElement("canvas");
    canvas.setAttribute("width", 320);
    canvas.setAttribute("height", 240);
  ctx = canvas.getContext("2d");
		
        image = ctx.getImageData(0, 0, 320, 240);
    
$("#col_free_field_cam_stream").webcam({
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
                $.post(AppURL+"index.php?file=uploadcameraimage&dataType=ajax&table=test_all&column=col_free_field", {
                    type: "data", 
                    image: canvas.toDataURL("image/png")
                    },function(data){$("#col_free_field").val(data);});
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
        jQuery("#col_free_field_cams").append("<li>" + cams[i] + "</li>");
    }}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='test_all'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#test_all').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=test_all&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=test_all&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=test_all&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}