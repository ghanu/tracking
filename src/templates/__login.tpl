<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=__login"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=__login&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
        {$content_details_array.page.viewactions}
            
<form name="__login_form" id="__login_form" method="post" action="{$content_details_array.current_page}" >
<table class="formbox" width="100%">
<tr >
<td  >
<div class="divframe">
<h4 class="subhead"></h4>
 <p>
<table valign="top" class="contenttable">
<tr id="row_user_id">
<td width="200px" bgcolor="#F2F2F2" align="right">User Id</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.user_id}
                {else}
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.user_id}
{/if}                    
</td>
</tr>
<tr id="row_login_name">
<td width="200px" bgcolor="#F2F2F2" align="right">Login Name</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.login_name}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.login_name}{/if}</td>
</tr>
<tr id="row_password">
<td width="200px" bgcolor="#F2F2F2" align="right">Password</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.password}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.password}{/if}</td>
</tr>
<tr id="row_is_active">
<td width="200px" bgcolor="#F2F2F2" align="right">Is Active</td>
<td width="200px">{if $content_details_array.page.action eq 'view'} 
                    {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.is_active}
                
                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.is_active}{/if}</td>
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
           </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_updated}
{/if}</form>
{literal}{/literal}{else}
    <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
	    

    {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='__login'"}
    {literal}
        <script>
            
        $(document).ready(function() {
        geoTable = $('#__login').dataTable(
            {
            "bAutoWidth": false,
            	"bJQueryUI": true,
                
			"sPaginationType": "full_numbers",

            aoColumns: [{ "bVisible": false},null,null,null,null,null,
            
{
                                                                "bSearchable": false,
                   						"bSortable": false,
                   						"fnRender": function (oObj) 
                                                                    {
                                                                    return "<a href='"+AppURL+"index.php?file=__login&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=__login&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=__login&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
								}
							}]



            }
            );
           
        } );
        

        </script>
    {/literal}


{/if}