<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=__user_details"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=__user_details&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="__user_details_form" id="__user_details_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Picture</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_photo">
<td width="200px" bgcolor="#F2F2F2" align="right">Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.photo}
                        {$content_details_array.formelements.photo.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.photo}{/if}</td>
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
<h4 class="subhead">User Information</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_first_name">
<td width="200px" bgcolor="#F2F2F2" align="right">First Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.first_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.first_name}{/if}</td>
</tr>
<tr id="row_last_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Last Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.last_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_name}{/if}</td>
</tr>
<tr id="row_middle_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Middle Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.middle_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.middle_name}{/if}</td>
</tr>
<tr id="row_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Birth</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date_of_birth}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_birth}{/if}</td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.email}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.email}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mobile}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mobile}{/if}</td>
</tr>
<tr id="row_work_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.work_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.work_phone}{/if}</td>
</tr>
<tr id="row_deignation">
<td width="200px" bgcolor="#F2F2F2" align="right">Designation</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.deignation}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.deignation}
{/if}                    
</td>
</tr>
<tr id="row_blood_group">
<td width="200px" bgcolor="#F2F2F2" align="right">Blood Group</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.blood_group}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.blood_group}
{/if}                    
</td>
</tr>
<tr id="row_sex">
<td width="200px" bgcolor="#F2F2F2" align="right">Sex</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sex}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.sex}
{/if}                    
</td>
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
<h4 class="subhead">Address</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_taddress_1">
<td width="200px" bgcolor="#F2F2F2" align="right">Door No.</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.taddress_1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.taddress_1}{/if}</td>
</tr>
<tr id="row_taddress_2">
<td width="200px" bgcolor="#F2F2F2" align="right">Street Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.taddress_2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.taddress_2}{/if}</td>
</tr>
<tr id="row_tcity_id">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.tcity_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.tcity_id}{/if}</td>
</tr>
<tr id="row_tstate_id">
<td width="200px" bgcolor="#F2F2F2" align="right">State</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.tstate_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.tstate_id}{/if}</td>
</tr>
<tr id="row_tcountry_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Country</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.tcountry_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.tcountry_id}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_paddress_1">
<td width="200px" bgcolor="#F2F2F2" align="right">Door No.</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.paddress_1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.paddress_1}{/if}</td>
</tr>
<tr id="row_paddress_2">
<td width="200px" bgcolor="#F2F2F2" align="right">Street Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.paddress_2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.paddress_2}{/if}</td>
</tr>
<tr id="row_pcity_id">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pcity_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pcity_id}{/if}</td>
</tr>
<tr id="row_pstate_id">
<td width="200px" bgcolor="#F2F2F2" align="right">State</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pstate_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pstate_id}{/if}</td>
</tr>
<tr id="row_pcountry_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Country</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pcountry_id}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pcountry_id}{/if}</td>
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
<h4 class="subhead">Others</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_is_physically_challenged">
<td width="200px" bgcolor="#F2F2F2" align="right">Is Physically Challenged</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.is_physically_challenged}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.is_physically_challenged}
{/if}                    
</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_physically_challanged_remarks">
<td width="200px" bgcolor="#F2F2F2" align="right">Physically Challanged Remarks</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.physically_challanged_remarks}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.physically_challanged_remarks}{/if}</td>
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
<h4 class="subhead">User Rights</h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_organization_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Organization</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.organization_id}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.organization_id}
{/if}                    
</td>
</tr>
<tr id="row_user_type">
<td width="200px" bgcolor="#F2F2F2" align="right">User Type</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.user_type}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.user_type}
{/if}                    
</td>
</tr>
<tr id="row_branch_id">
<td width="200px" bgcolor="#F2F2F2" align="right">Branch</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.branch_id}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.branch_id}
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_added}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_last_updated}
{/if}</form>
{literal}<script>$(function() { $('#date_of_birth').datepicker({
                        showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        changeMonth: true,
                        changeYear: true,
                        
						altField: "#date_of_birth_date",
                                    altFormat: "dd/mm/yy",    
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-100:c+100',
           
                    });	});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='__user_details'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#__user_details').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},null,{ "bVisible": false},null,{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=__user_details&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=__user_details&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=__user_details&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}