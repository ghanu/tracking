<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=admission"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=admission&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="admission_form" id="admission_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead">Take Picture</h4>
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
<h4 class="subhead">General Details</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_application_no">
<td width="200px" bgcolor="#F2F2F2" align="right">Application No</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.application_no}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.application_no}{/if}</td>
</tr>
<tr id="row_registration_date">
<td width="200px" bgcolor="#F2F2F2" align="right">Registration Date</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.registration_date}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.registration_date}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_enrollment">
<td width="200px" bgcolor="#F2F2F2" align="right">Enrollment</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.enrollment}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.enrollment}{/if}</td>
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
<h4 class="subhead">Student Details</h4>
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
<tr id="row_current_class">
<td width="200px" bgcolor="#F2F2F2" align="right">Current Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.current_class}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.current_class}
{/if}                    
</td>
</tr>
<tr id="row_date_of_birth">
<td width="200px" bgcolor="#F2F2F2" align="right">Date Of Birth</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.date_of_birth}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.date_of_birth}{/if}</td>
</tr>
<tr id="row_height">
<td width="200px" bgcolor="#F2F2F2" align="right">Height</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.height}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.height}{/if}</td>
</tr>
<tr id="row_weight">
<td width="200px" bgcolor="#F2F2F2" align="right">Weight</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.weight}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.weight}{/if}</td>
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
 </td><td valign="top"><table><tr id="row_nationality">
<td width="200px" bgcolor="#F2F2F2" align="right">Nationality</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.nationality}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.nationality}{/if}</td>
</tr>
<tr id="row_religion">
<td width="200px" bgcolor="#F2F2F2" align="right">Religion</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.religion}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.religion}{/if}</td>
</tr>
<tr id="row_caste">
<td width="200px" bgcolor="#F2F2F2" align="right">Caste</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.caste}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.caste}{/if}</td>
</tr>
<tr id="row_community">
<td width="200px" bgcolor="#F2F2F2" align="right">Community</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.community}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.community}{/if}</td>
</tr>
<tr id="row_blood_group">
<td width="200px" bgcolor="#F2F2F2" align="right">Blood Group</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.blood_group}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.blood_group}{/if}</td>
</tr>
<tr id="row_mother_tongue">
<td width="200px" bgcolor="#F2F2F2" align="right">Mother Tongue</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mother_tongue}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mother_tongue}{/if}</td>
</tr>
<tr id="row_lang_speak_at_home">
<td width="200px" bgcolor="#F2F2F2" align="right">Lang Speak At Home</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.lang_speak_at_home}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.lang_speak_at_home}{/if}</td>
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
<h4 class="subhead">Parent Information</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_father_photo">
<td width="200px" bgcolor="#F2F2F2" align="right">Father Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.father_photo}
                        {$content_details_array.formelements.father_photo.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.father_photo}{/if}</td>
</tr>
<tr id="row_father_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Father Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.father_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.father_name}{/if}</td>
</tr>
<tr id="row_mobile_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mobile_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mobile_phone}{/if}</td>
</tr>
<tr id="row_work_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.work_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.work_phone}{/if}</td>
</tr>
<tr id="row_email">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.email}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.email}{/if}</td>
</tr>
<tr id="row_employer">
<td width="200px" bgcolor="#F2F2F2" align="right">Employer</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.employer}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.employer}{/if}</td>
</tr>
<tr id="row_occupation">
<td width="200px" bgcolor="#F2F2F2" align="right">Occupation</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.occupation}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.occupation}{/if}</td>
</tr>
<tr id="row_annual_income">
<td width="200px" bgcolor="#F2F2F2" align="right">Annual Income</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.annual_income}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.annual_income}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_mother_photo">
<td width="200px" bgcolor="#F2F2F2" align="right">Mother Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.mother_photo}
                        {$content_details_array.formelements.mother_photo.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.mother_photo}{/if}</td>
</tr>
<tr id="row_mother_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Mother Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mother_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mother_name}{/if}</td>
</tr>
<tr id="row_mmobile_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mmobile_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mmobile_phone}{/if}</td>
</tr>
<tr id="row_mwork_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Work Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mwork_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mwork_phone}{/if}</td>
</tr>
<tr id="row_memail">
<td width="200px" bgcolor="#F2F2F2" align="right">Email</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.memail}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.memail}{/if}</td>
</tr>
<tr id="row_memployer">
<td width="200px" bgcolor="#F2F2F2" align="right">Employer</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.memployer}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.memployer}{/if}</td>
</tr>
<tr id="row_moccupation">
<td width="200px" bgcolor="#F2F2F2" align="right">Occupation</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.moccupation}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.moccupation}{/if}</td>
</tr>
<tr id="row_mannual_income">
<td width="200px" bgcolor="#F2F2F2" align="right">Annual Income</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.mannual_income}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.mannual_income}{/if}</td>
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
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_home_address">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.home_address}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.home_address}{/if}</td>
</tr>
<tr id="row_haddress_line2">
<td width="200px" bgcolor="#F2F2F2" align="right">Street Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.haddress_line2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.haddress_line2}{/if}</td>
</tr>
<tr id="row_haddress_city">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.haddress_city}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.haddress_city}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_pincode">
<td width="200px" bgcolor="#F2F2F2" align="right">Pincode</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pincode}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pincode}{/if}</td>
</tr>
<tr id="row_home_phone">
<td width="200px" bgcolor="#F2F2F2" align="right">Home Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.home_phone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.home_phone}{/if}</td>
</tr>
<tr id="row_landmark">
<td width="200px" bgcolor="#F2F2F2" align="right">Landmark</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.landmark}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.landmark}{/if}</td>
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
<h4 class="subhead">Doctor Information</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_doctors_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Doctors Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.doctors_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.doctors_name}{/if}</td>
</tr>
<tr id="row_daddress_line2">
<td width="200px" bgcolor="#F2F2F2" align="right">Street Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.daddress_line2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.daddress_line2}{/if}</td>
</tr>
<tr id="row_daddress_city">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.daddress_city}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.daddress_city}{/if}</td>
</tr>
<tr id="row_dphone">
<td width="200px" bgcolor="#F2F2F2" align="right">Phone</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dphone}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dphone}{/if}</td>
</tr>
<tr id="row_dmobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Mobile</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.dmobile}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dmobile}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_doctors_address">
<td width="200px" bgcolor="#F2F2F2" align="right">Doctors Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.doctors_address}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.doctors_address}{/if}</td>
</tr>
<tr id="row_child_allergies">
<td width="200px" bgcolor="#F2F2F2" align="right">Child Allergies</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.child_allergies}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_allergies}{/if}</td>
</tr>
<tr id="row_any_special_info">
<td width="200px" bgcolor="#F2F2F2" align="right">Any Special Info</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.any_special_info}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.any_special_info}{/if}</td>
</tr>
<tr id="row_physically_challenged">
<td width="200px" bgcolor="#F2F2F2" align="right">Physically Challenged</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.physically_challenged}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.physically_challenged}
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
<h4 class="subhead">Previous Study</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_previous_school">
<td width="200px" bgcolor="#F2F2F2" align="right">Previous School</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.previous_school}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.previous_school}{/if}</td>
</tr>
<tr id="row_ps_standard">
<td width="200px" bgcolor="#F2F2F2" align="right">Standard</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.ps_standard}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.ps_standard}{/if}</td>
</tr>
<tr id="row_psacademic_yr">
<td width="200px" bgcolor="#F2F2F2" align="right">Academic Yr</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.psacademic_yr}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.psacademic_yr}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_ps_address">
<td width="200px" bgcolor="#F2F2F2" align="right">Address</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.ps_address}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.ps_address}{/if}</td>
</tr>
<tr id="row_saddress_line2">
<td width="200px" bgcolor="#F2F2F2" align="right">Street Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.saddress_line2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.saddress_line2}{/if}</td>
</tr>
<tr id="row_scity">
<td width="200px" bgcolor="#F2F2F2" align="right">City</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.scity}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.scity}{/if}</td>
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
<h4 class="subhead">Transport</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_transport">
<td width="200px" bgcolor="#F2F2F2" align="right">Transport</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.transport}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.transport}
{/if}                    
</td>
</tr>
<tr id="row_person1_photo">
<td width="200px" bgcolor="#F2F2F2" align="right">Pick Up Person 1Pick Up Person 1 Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.person1_photo}
                        {$content_details_array.formelements.person1_photo.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.person1_photo}{/if}</td>
</tr>
<tr id="row_pick_up_person_1">
<td width="200px" bgcolor="#F2F2F2" align="right">Pick Up Person 1</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pick_up_person_1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pick_up_person_1}{/if}</td>
</tr>
<tr id="row_prelationship">
<td width="200px" bgcolor="#F2F2F2" align="right">Prelationship</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.prelationship}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.prelationship}{/if}</td>
</tr>
<tr id="row_person2_phot">
<td width="200px" bgcolor="#F2F2F2" align="right">Pick Up Person 2 Photo</td>
<td width="200px">{if $smarty.get.action eq 'view'}
                    {include file="formelements/img.tpl" inputDetails=$content_details_array.formelements.person2_phot}
                        {$content_details_array.formelements.person2_phot.value} 
                                            {else}{include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.person2_phot}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_pick_up_person_2">
<td width="200px" bgcolor="#F2F2F2" align="right">Pick Up Person 2</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.pick_up_person_2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pick_up_person_2}{/if}</td>
</tr>
<tr id="row_prelationship2">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.prelationship2}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.prelationship2}{/if}</td>
</tr>
<tr id="row_route">
<td width="200px" bgcolor="#F2F2F2" align="right">Route</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.route}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.route}{/if}</td>
</tr>
<tr id="row_stage">
<td width="200px" bgcolor="#F2F2F2" align="right">Stage</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.stage}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.stage}{/if}</td>
</tr>
<tr id="row_cost">
<td width="200px" bgcolor="#F2F2F2" align="right">Cost</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.cost}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.cost}{/if}</td>
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
<h4 class="subhead">Siblings</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_sname">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sname}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sname}{/if}</td>
</tr>
<tr id="row_sage">
<td width="200px" bgcolor="#F2F2F2" align="right">Age</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sage}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sage}{/if}</td>
</tr>
<tr id="row_sclass">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sclass}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sclass}{/if}</td>
</tr>
<tr id="row_sschool">
<td width="200px" bgcolor="#F2F2F2" align="right">School</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sschool}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sschool}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_sname1">
<td width="200px" bgcolor="#F2F2F2" align="right">Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sname1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sname1}{/if}</td>
</tr>
<tr id="row_sage1">
<td width="200px" bgcolor="#F2F2F2" align="right">Age</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sage1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sage1}{/if}</td>
</tr>
<tr id="row_sclass1">
<td width="200px" bgcolor="#F2F2F2" align="right">Class</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sclass1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sclass1}{/if}</td>
</tr>
<tr id="row_sschool1">
<td width="200px" bgcolor="#F2F2F2" align="right">School</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.sschool1}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.sschool1}{/if}</td>
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
<h4 class="subhead">Emergency Contact</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_emergency_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Emergency Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.emergency_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.emergency_name}{/if}</td>
</tr>
<tr id="row_emergency_mobile">
<td width="200px" bgcolor="#F2F2F2" align="right">Emergency Mobile</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.emergency_mobile}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.emergency_mobile}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_relationship">
<td width="200px" bgcolor="#F2F2F2" align="right">Relationship</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.relationship}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.relationship}{/if}</td>
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
<h4 class="subhead">Certificates Attached</h4>
 <p>
<table valign="top" class="contenttable">

<tr>
<td valign="top">
<table class="contenttablesub">
<tr id="row_copy_birth_certificate">
<td width="200px" bgcolor="#F2F2F2" align="right">Copy of Birth Certificate</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.copy_birth_certificate}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.copy_birth_certificate}{/if}</td>
</tr>
<tr id="row_tc">
<td width="200px" bgcolor="#F2F2F2" align="right">Original Transfer Certificate</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.tc}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.tc}{/if}</td>
</tr>
</table> 
 </td><td valign="top"><table><tr id="row_assessment_report_card">
<td width="200px" bgcolor="#F2F2F2" align="right">Assessment Report Card</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.assessment_report_card}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.assessment_report_card}{/if}</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.status}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.screening_id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.branch_id}
{/if}</form>
{literal}<script>$(function() {$('#registration_date').datepicker({
                 showOn: "button",
                        buttonImage: AppImgURL+"icon_calendar.jpg",
                        buttonImageOnly: true,
                        showAnim:'blind',
                        dateFormat:'yy-mm-dd',
                        yearRange: 'c-1:c+1',
                        minDate:'0d',
                            altField: "#registration_date_date",
                                    altFormat: "dd/mm/yy", 
                      maxDate:'0d'
                    });
	$('#date_of_birth').datepicker({
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
           
                    });
					
					
					$("#first_name,#last_name,#middle_name,#father_name,#mother_name,#doctors_name").bind('keyup', function (e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $("#first_name").val(($("#first_name").val()).toUpperCase());
    $("#last_name").val(($("#last_name").val()).toUpperCase());
    $("#middle_name").val(($("#middle_name").val()).toUpperCase());
    $("#father_name").val(($("#father_name").val()).toUpperCase());
    $("#mother_name").val(($("#mother_name").val()).toUpperCase());
	$("#doctors_name").val(($("#doctors_name").val()).toUpperCase());

});
$("#religion").capitalize();	
$("#caste").capitalize();
$("#community").capitalize();
$("#employer").capitalize();
$("#occupation").capitalize();
$("#memployer").capitalize();
$("#moccupation").capitalize();
$("#home_address").capitalize();
$("#haddress_line2").capitalize();
$("#haddress_city").capitalize();
$("#landmark").capitalize();
$("#daddress_line2").capitalize();
$("#daddress_city").capitalize();
$("#doctors_address").capitalize();
$("#child_allergies").capitalize();
$("#any_special_info").capitalize();
$("#previous_school").capitalize();
$("#psacademic_yr").capitalize();
$("#ps_address").capitalize();
$("#saddress_line2").capitalize();
$("#scity").capitalize();
$("#pick_up_person_1").capitalize();
$("#prelationship").capitalize();
$("#pick_up_person_2").capitalize();
$("#prelationship2").capitalize();
$("#sname").capitalize();
$("#sage").capitalize();
$("#sschool").capitalize();
$("#sname1").capitalize();
$("#sage1").capitalize();
$("#sclass1").capitalize();
$("#sschool1").capitalize();
$("#emergency_name").capitalize();
$("#relationship").capitalize();
				
$("#row_route").hide();
$("#row_stage").hide();
$("#row_cost").hide();
$("#row_pick_up_person_1").hide();
$("#row_pick_up_person_2").hide();
$("#row_person1_photo").hide();
$("#row_person2_phot").hide();
$("#row_prelationship").hide();
$("#row_prelationship2").hide();
	
$("#transport").bind("change",function(){
if($(this).val()=="no"){
$("#row_route").hide();
$("#row_stage").hide();
$("#row_cost").hide();
$("#row_pick_up_person_1").show();
$("#row_pick_up_person_2").show();
$("#row_person1_photo").show();
$("#row_person2_phot").show();
$("#row_prelationship").show();
$("#row_prelationship2").show()}
else {$("#row_route").show();
$("#row_stage").show();
$("#row_cost").show();
$("#row_pick_up_person_1").hide();
$("#row_pick_up_person_2").hide();
$("#row_person1_photo").hide();
$("#row_person2_phot").hide();
$("#row_prelationship").hide();
$("#row_prelationship2").hide()}
});});</script>{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='admission'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#admission').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},{ "bVisible": false},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null, {
                    "fnRender": function ( oObj ) {
                        return '<img src="'+AppViewUploadsURL+oObj.aData[1]+'" />' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null, {
                    "fnRender": function ( oObj ) {
                        return '<img src="'+AppViewUploadsURL+oObj.aData[1]+'" />' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null, {
                    "fnRender": function ( oObj ) {
                        return '<img src="'+AppViewUploadsURL+oObj.aData[1]+'" />' ;
        },
        "bUseRendered": false
      },null,null, {
                    "fnRender": function ( oObj ) {
                        return '<img src="'+AppViewUploadsURL+oObj.aData[1]+'" />' ;
        },
        "bUseRendered": false
      },null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return null;
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}