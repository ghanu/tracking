<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mfees">View All</a></li><li><a href="{$AppURL}index.php?file=mfees&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="mfees_form" id="mfees_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_admission_fees">
<td style="width:50%">Admission Fees</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.admission_fees}</td>
</tr>
<tr id="row_material_fees">
<td style="width:50%">Material Fees</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.material_fees}</td>
</tr>
<tr id="row_refundable_fees">
<td style="width:50%">Refundable Fees</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.refundable_fees}</td>
</tr>
<tr id="row_extra_curricular">
<td style="width:50%">Extra Curricular</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.extra_curricular}</td>
</tr>
<tr id="row_term_1">
<td style="width:50%">Term 1</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.term_1}</td>
</tr>
<tr id="row_term_2">
<td style="width:50%">Term 2</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.term_2}</td>
</tr>
<tr id="row_term_3">
<td style="width:50%">Term 3</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.term_3}</td>
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
           </tr>{/if}</table>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_timestamp}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}
</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mfees'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mfees').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=mfees&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mfees&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mfees&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}