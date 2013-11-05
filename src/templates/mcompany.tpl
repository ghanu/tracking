<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mcompany">View All</a></li><li><a href="{$AppURL}index.php?file=mcompany&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="mcompany_form" id="mcompany_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_company_name">
<td style="width:50%">School Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.company_name}</td>
</tr>
<tr id="row_company_code">
<td style="width:50%">School Code</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.company_code}</td>
</tr>
<tr id="row_branch_name">
<td style="width:50%">Branch Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_name}</td>
</tr>
<tr id="row_parent_company">
<td style="width:50%">Parent Company</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.parent_company}</td>
</tr>
<tr id="row_factory_address_id">
<td style="width:50%">Factory Address</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.factory_address_id}</td>
</tr>
<tr id="row_office_address_id">
<td style="width:50%">School Address</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.office_address_id}</td>
</tr>
<tr id="row_company_logo">
<td style="width:50%">School Logo</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.company_logo}</td>
</tr>
<tr id="row_company_currency">
<td style="width:50%">Company Currency</td>
<td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.company_currency}</td>
</tr>
<tr id="row_website">
<td style="width:50%">Website</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.website}</td>
</tr>
<tr id="row_tax_id">
<td style="width:50%">Tax Id</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.tax_id}</td>
</tr>
<tr id="row_phone1">
<td style="width:50%">Phone1</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.phone1}</td>
</tr>
<tr id="row_phone2">
<td style="width:50%">Phone2</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.phone2}</td>
</tr>
<tr id="row_phone3">
<td style="width:50%">Phone3</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.phone3}</td>
</tr>
<tr id="row_phone4">
<td style="width:50%">Phone4</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.phone4}</td>
</tr>
<tr id="row_phone5">
<td style="width:50%">Phone5</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.phone5}</td>
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
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mcompany'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mcompany').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=mcompany&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mcompany&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mcompany&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}