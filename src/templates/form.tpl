{if $reportType eq 'normal' || $reportType eq 'summary'}
<div class="ui-widget-header">{$formName}</div>
<div class="fg-toolbar  ui-corner-all ui-helper-clearfix"> 

    <div class="fg-buttonset ui-helper-clearfix"> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo ui-corner-all" title="Open"><span class="ui-icon ui-icon-folder-open"></span> Open</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Save"><span class="ui-icon ui-icon-disk"></span> Save</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Delete"><span class="ui-icon ui-icon-trash"></span> Delete</a> 
    </div> 
    <div class="fg-buttonset fg-buttonset-multi"> 
        <button class="fg-button ui-state-default ui-corner-left"><b>B</b></button> 
        <button class="fg-button ui-state-default"><i>I</i></button> 
        <button class="fg-button ui-state-default  ui-corner-right"><u>U</u></button> 
    </div> 
    <div class="fg-buttonset ui-helper-clearfix"> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Print"><span class="ui-icon ui-icon-print"></span> Print</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Email"><span class="ui-icon ui-icon-mail-closed"></span> Email</a> 
    </div> 
    <div class="fg-buttonset fg-buttonset-single ui-helper-clearfix"> 
        <button class="fg-button ui-state-default ui-state-active ui-priority-primary ui-corner-left">Design</button> 
        <button class="fg-button ui-state-default ui-priority-primary ui-corner-right">View</button> 
    </div>
    <span id='toolbar' class=''><button title='Add or Remove Columns' >Show / Hide Columns</button></span> 
</div> 

{literal}
<script type="text/javascript">
    
    jQuery(document).ready(function(){
        
        {/literal} {$gridJsScript} {literal}

    });
</script>

{/literal}
{$gridHTML}
{elseif $reportType eq 'chart' }

<div class="fg-toolbar  ui-corner-all ui-helper-clearfix"> 
    <div class="fg-buttonset ui-helper-clearfix"> 
        <a href="#" class="fg-button ui-state-default ui-corner-all" title="Edit chart" id="edit_chart">Design</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Save Chart"><span class="ui-icon ui-icon-disk"></span> Save</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Delete Chart"><span class="ui-icon ui-icon-trash"></span> Delete</a> 
    </div> 
    <div class="fg-buttonset ui-helper-clearfix"> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Print"><span class="ui-icon ui-icon-print"></span> Print</a> 
        <a href="#" class="fg-button ui-state-default fg-button-icon-solo  ui-corner-all" title="Email"><span class="ui-icon ui-icon-mail-closed"></span> Email</a> 
        <a href="#" class="fg-button ui-state-default   ui-corner-all" title="Email">Export Spreadsheet</a> 
        <a href="#" class="fg-button ui-state-default   ui-corner-all" title="Email">Export PDF</a> 
    </div> 
    <div class="fg-buttonset fg-buttonset-single ui-helper-clearfix"> 
        <button class="fg-button ui-state-default ui-state-active ui-priority-primary ui-corner-left">Design</button> 
        <button class="fg-button ui-state-default ui-priority-primary ui-corner-right">View</button> 
    </div>

</div> 
<div id="editbox" style="display: none">
    <p>
        <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
		Your files have downloaded successfully into the My Downloads folder.
    </p>
    <p>
		Currently using <b>36% of your storage space</b>.
    </p>
</div>
<div id="placeholder" style="margin: 10px;width:90%;height:90%;"></div>


{literal}
<script type="text/javascript">
    
    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #fdd',
            padding: '2px',
            'background-color': '#fee',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }
    
    jQuery(document).ready(function(){
        var placeholder=$("#placeholder");
        var options = {
            lines: { show: true, shadowSize: 0.6 },
            points: { show: true },
            xaxis: { tickDecimals: 0, tickSize: 3},
            
            zoom: {
                interactive: true
            },
            pan: {
                interactive: true
            },
            //            crosshair: { mode: "xy" },
            grid: { hoverable: true, autoHighlight: true }
        };
        
        
        $.ajax({
            url: 'index.php?file=data&type=chart&cid=3&dataType=json',
            method: 'GET',
            dataType: 'json',
            success: function(data){
                $.plot(placeholder, data, options);
            }
        });
        $( "#edit_chart" ).click(function() {
            $( "#editbox" ).dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });});
        var previousPoint = null;
        placeholder.bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.datapoint) {
                    previousPoint = item.datapoint;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                    showTooltip(item.pageX, item.pageY,
                    item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
            
        });

        placeholder.bind("plotclick", function (event, pos, item) {
            if (item) {
                $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                plot.highlight(item.series, item.datapoint);
            }
        });
    });
</script>

{/literal}
{elseif $reportType eq  'crosstab'}



{elseif $reportType eq  'joins'}

{else}
<div class="ui-widget-header">Home page</div>
<div id="idgc" title="Import from Files" class="dn">
    
</div>
<table style="width: 95%;height:95%">
    <tbody>
        <tr>
            <td><a id="import_dialog" onclick="openImportDialog();" class="tp">Import from Files (CSV,XLS,HTML etc.,)</a></td>
            <td><a id="link_ds_dialog" class="tp">Link to Existing Datasource (Mysql,PostgreSql,MSSQL Server,Apache solr,Infobright)</a></td>
        </tr>
        <tr>
            <td><a id="create_db_dialog" class="tp">Create DB Online(Enter the table name and other attributes related to it)</a></td>
            <td><a id="create_forms_dialog" class="tp">Create Forms(Geo reports will create tables for you)</a></td>
        </tr>
    </tbody>
</table>


{/if}