<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=mstudents">View All</a></li><li><a href="{$AppURL}index.php?file=mstudents&action=add">Add New</a></li><li><a href="{$AppURL}index.php?file="></a></li></ul>
</div>{if $content_details_array.formelements neq ''}
            <form name="mstudents_form" id="mstudents_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table class="contenttable">
<tr id="row_student_name">
<td style="width:50%">Student Name</td>
<td>{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.student_name}</td>
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
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='mstudents'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#mstudents').dataTable(
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
                                                                    return "<a href='"+AppURL+"index.php?file=mstudents&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=mstudents&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=mstudents&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
            
        } );
        

        </script>
    {/literal}


{/if}