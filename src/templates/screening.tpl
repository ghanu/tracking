<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=screening"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=screening&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="screening_form" id="screening_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_application_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Application No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.application_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_no}{/if}</td>
</tr>
<tr id="row_student_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Student Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.student_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.student_name}{/if}</td>
</tr>
<tr id="row_class">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.class}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.class}{/if}</td>
</tr>
<tr id="row_screening_teacher">
<td width="200px" bgcolor="#F2F2F2" align="right">Screening Teacher</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.screening_teacher}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.screening_teacher}
{/if}                    
</td>
</tr>
<tr id="row_teacher_remarks">
<td width="200px" bgcolor="#F2F2F2" align="right">Teacher Remarks</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.teacher_remarks}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.teacher_remarks}{/if}</td>
</tr>
<tr id="row_selected">
<td width="200px" bgcolor="#F2F2F2" align="right">Selected</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.selected}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.selected}
{/if}                    
</td>
</tr>
<tr id="row_principal_remarks">
<td width="200px" bgcolor="#F2F2F2" align="right">Principal Remarks</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.principal_remarks}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.principal_remarks}{/if}</td>
</tr>
<tr id="row_admission_confirmed">
<td width="200px" bgcolor="#F2F2F2" align="right">Admission Confirmed</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.admission_confirmed}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.admission_confirmed}
{/if}                    
</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.admission_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}
{/if}</form>
{literal}<script>$(function() {if($("#selected").val()==""||$("#selected").val()=="No"){$("#row_admission_confirmed").hide();$("#row_principal_remarks").hide()}});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='screening'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#screening').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    var dynamic_link="";
                                                                            if(oObj.aData[8]=="Yes"){
																			if(oObj.aData[10]==0){
dynamic_link="<a href='"+AppURL+"index.php?file=admission&action=add&screening_id=" + oObj.aData[0] + "&application_no="+ oObj.aData[1] + "&first_name="+ oObj.aData[2] +"'><img src='"+AppImgURL+"admission.png'></a>";
dynamic_link+="<a href='"+AppURL+"index.php?file=report&id=5&ppid=" + oObj.aData[0] +"'><img src='"+AppImgURL+"letter.png'></a>";
 }    
else{
dynamic_link="<a href='"+AppURL+"index.php?file=admission&action=view&id=" + oObj.aData[10] +"'><img src='"+AppImgURL+"admitted.png'></a>";

}                                         
                                                                                }else{
if(oObj.aData[8]=="No"){
dynamic_link="<a href='#'><img src='"+AppImgURL+"rejected.png'></a>";
    }
else{
dynamic_link="<a href='"+AppURL+"index.php?file=screening&action=edit&id=" + oObj.aData[0] +"'><img src='"+AppImgURL+"principal.png'></a>";
}
}    
                                                                    return "<a href='"+AppURL+"index.php?file=screening&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=screening&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>"+dynamic_link;
		
								
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}