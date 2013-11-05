<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=trip_sheet"><img src="http://localhost/schoolerp/src/img/view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=trip_sheet&action=add"><img src="http://localhost/schoolerp/src/img/add.png" align="absmiddle"> Add New</a></li><li><a href="{$AppURL}index.php?file=vehicle">vehicle</a></li><li><a href="{$AppURL}index.php?file=driver">driver</a></li><li><a href="{$AppURL}index.php?file=route_details">route details</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="trip_sheet_form" id="trip_sheet_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_vehicle_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Vehicle No</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.vehicle_no}</td>
</tr>
<tr id="row_driver_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Driver Name</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.driver_name}</td>
</tr>
<tr id="row_route">
<td width="200px" bgcolor="#F2F2F2" align="right">Route</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.route}</td>
</tr>
<tr id="row_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Date</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date}</td>
</tr>
<tr id="row_morning_pickup">
<td width="200px" bgcolor="#F2F2F2" align="right">Morning Pickup</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.morning_pickup}</td>
</tr>
<tr id="row_morning_drop">
<td width="200px" bgcolor="#F2F2F2" align="right">Morning Drop</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.morning_drop}</td>
</tr>
<tr id="row_evening_pickup">
<td width="200px" bgcolor="#F2F2F2" align="right">Evening Pickup</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.evening_pickup}</td>
</tr>
<tr id="row_evening_drop">
<td width="200px" bgcolor="#F2F2F2" align="right">Evening Drop</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.evening_drop}</td>
</tr>
<tr id="row_total_km">
<td width="200px" bgcolor="#F2F2F2" align="right">Total Km</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.total_km}</td>
</tr>
<tr id="row_diesel_litre">
<td width="200px" bgcolor="#F2F2F2" align="right">Diesel Litre</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.diesel_litre}</td>
</tr>
<tr id="row_diesel_price">
<td width="200px" bgcolor="#F2F2F2" align="right">Diesel Price</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.diesel_price}</td>
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
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='trip_sheet'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#trip_sheet').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [ { "bVisible": false},null,null,null,null,null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=trip_sheet&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=trip_sheet&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=trip_sheet&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}