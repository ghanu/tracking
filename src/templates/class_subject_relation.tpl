<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=class_subject_relation"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=class_subject_relation&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="class_subject_relation_form" id="class_subject_relation_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_class_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Class Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.class_id}</td>
</tr>
<tr id="row_subject_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.subject_id}</td>
</tr>
<tr id="row_teacher_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Teacher Id</td>
<td width="200px">{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.teacher_id}</td>
</tr>
<tr id="row_last_updated">
<td width="200px" bgcolor="#F2F2F2" align="right">Last Updated</td>
<td width="200px">{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_updated}</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}
{/if}</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='class_subject_relation'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#class_subject_relation').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=class_subject_relation&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=class_subject_relation&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=class_subject_relation&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}