<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=teacher"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=teacher&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="teacher_form" id="teacher_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">User</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_user_id">
<td width="200px" bgcolor="#F2F2F2" align="right">User </td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.user_id}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.user_id}
{/if}                    
</td>
</tr>
</table> 
 </td><td valign="top"><table></table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Educational details</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_school_name">
<td width="200px" bgcolor="#F2F2F2" align="right">School Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.school_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.school_name}{/if}</td>
</tr>
<tr id="row_subject_major">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.subject_major}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.subject_major}{/if}</td>
</tr>
<tr id="row_year_completed">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.year_completed}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.year_completed}{/if}</td>
</tr>
<tr id="row_percentage">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.percentage}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.percentage}{/if}</td>
</tr>
<tr id="row_school_name1">
<td width="200px" bgcolor="#F2F2F2" align="right">School Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.school_name1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.school_name1}{/if}</td>
</tr>
<tr id="row_subject_major1">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.subject_major1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.subject_major1}{/if}</td>
</tr>
<tr id="row_year_completed1">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.year_completed1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.year_completed1}{/if}</td>
</tr>
<tr id="row_percentage1">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.percentage1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.percentage1}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_college_name">
<td width="200px" bgcolor="#F2F2F2" align="right">College Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.college_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.college_name}{/if}</td>
</tr>
<tr id="row_subject_major2">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.subject_major2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.subject_major2}{/if}</td>
</tr>
<tr id="row_year_completed2">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.year_completed2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.year_completed2}{/if}</td>
</tr>
<tr id="row_percentage2">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.percentage2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.percentage2}{/if}</td>
</tr>
<tr id="row_college_name2">
<td width="200px" bgcolor="#F2F2F2" align="right">College Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.college_name2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.college_name2}{/if}</td>
</tr>
<tr id="row_subject_major3">
<td width="200px" bgcolor="#F2F2F2" align="right">Subject Major</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.subject_major3}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.subject_major3}{/if}</td>
</tr>
<tr id="row_year_completed3">
<td width="200px" bgcolor="#F2F2F2" align="right">Year Completed</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.year_completed3}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.year_completed3}{/if}</td>
</tr>
<tr id="row_percentage3">
<td width="200px" bgcolor="#F2F2F2" align="right">Percentage</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.percentage3}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.percentage3}{/if}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Previous Experience</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_name_of_employer">
<td width="200px" bgcolor="#F2F2F2" align="right">Name Of Employer</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.name_of_employer}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.name_of_employer}{/if}</td>
</tr>
<tr id="row_daddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.daddress}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.daddress}{/if}</td>
</tr>
<tr id="row_dcity">
<td width="200px" bgcolor="#F2F2F2" align="right"> City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dcity}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dcity}{/if}</td>
</tr>
<tr id="row_dstate">
<td width="200px" bgcolor="#F2F2F2" align="right">State</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dstate}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dstate}{/if}</td>
</tr>
<tr id="row_dpincode">
<td width="200px" bgcolor="#F2F2F2" align="right">Pincode</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dpincode}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dpincode}{/if}</td>
</tr>
<tr id="row_employment_dates_from">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates From</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.employment_dates_from}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.employment_dates_from}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_employment_dates_to">
<td width="200px" bgcolor="#F2F2F2" align="right">Employment Dates To</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.employment_dates_to}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.employment_dates_to}{/if}</td>
</tr>
<tr id="row_pay_rs">
<td width="200px" bgcolor="#F2F2F2" align="right">Pay Rs</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pay_rs}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pay_rs}{/if}</td>
</tr>
<tr id="row_name_of_immediate_superviser">
<td width="200px" bgcolor="#F2F2F2" align="right">Name Of Immediate Superviser</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.name_of_immediate_superviser}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.name_of_immediate_superviser}{/if}</td>
</tr>
<tr id="row_job_title_description_of_work">
<td width="200px" bgcolor="#F2F2F2" align="right">Job Title Description Of Work</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.job_title_description_of_work}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.job_title_description_of_work}{/if}</td>
</tr>
<tr id="row_reason_for_leaving">
<td width="200px" bgcolor="#F2F2F2" align="right">Reason For Leaving</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.reason_for_leaving}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.reason_for_leaving}{/if}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Reference I</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_rname">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rname}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rname}{/if}</td>
</tr>
<tr id="row_rrelationship">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rrelationship}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rrelationship}{/if}</td>
</tr>
<tr id="row_raddress">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.raddress}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.raddress}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_rwork_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rwork_number}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rwork_number}{/if}</td>
</tr>
<tr id="row_rhome_number">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rhome_number}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rhome_number}{/if}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Reference II</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_rname1">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rname1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rname1}{/if}</td>
</tr>
<tr id="row_rrelationship1">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rrelationship1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rrelationship1}{/if}</td>
</tr>
<tr id="row_raddress1">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.raddress1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.raddress1}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_rwork_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rwork_number1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rwork_number1}{/if}</td>
</tr>
<tr id="row_rhome_number1">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Number</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.rhome_number1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.rhome_number1}{/if}</td>
</tr>
</table> 
 </td>
</tr>
</table>
</p> 
</div>
</td></tr>
</td>
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
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='teacher'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#teacher').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=teacher&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=teacher&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=teacher&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}