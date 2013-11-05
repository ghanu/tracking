<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=__country"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=__country&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="__country_form" id="__country_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_languages">
<td width="200px" bgcolor="#F2F2F2" align="right">Languages</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.languages}</td>
</tr>
<tr id="row_nationality">
<td width="200px" bgcolor="#F2F2F2" align="right">Nationality</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.nationality}</td>
</tr>
<tr id="row_country_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Country Name</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.country_name}</td>
</tr>
</table> 
 </p> 
</div>
</td></td>
</tr>
{if $content_details_array.page.request_type eq '' && $content_details_array.page.action neq 'view'} <tr>
                <td>
                    {include file="formelements/reset_button.tpl" inputDetails=$content_details_array.formelements.reset_button}
                </td>
                <td>
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}
                    <input type="hidden" value={$content_details_array.page.action} name="formaction" />
                    
                </td>
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}
{/if}</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='__country'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#__country').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}