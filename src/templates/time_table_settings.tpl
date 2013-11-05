<div id="nav-menu" class="toolbar">
    <ul><li><a href="{$AppURL}index.php?file=time_table_settings"><img src="{$AppImgURL}view_all.png" align="absmiddle"> View All</a></li><li><a href="{$AppURL}index.php?file=time_table_settings&action=add"><img src="{$AppImgURL}add.png" align="absmiddle"> Add New</a></li></ul>
</div>{if $content_details_array.formelements neq ''}
{$content_details_array.page.viewactions}
<script src="{$AppJsURL}multiselect_drag/ui.multiselect.js"></script>
<link href="{$AppCssURL}ui.multiselect.css" />
<form name="time_table_settings_form" id="time_table_settings_form" method="post" action="{$content_details_array.current_page}" >
    <table class="formbox" width="100%">
        <tr >
            <td  >
                <div class="divframe">
                    <h4 class="subhead"></h4>
                    <p>
                    <table valign="top" class="contenttable">
                        <tr id="row_no_of_periods">
                            <td width="200px" bgcolor="#F2F2F2" align="right">No Of Periods</td>
                            <td width="200px">{if $content_details_array.page.action eq 'view'} 
                                {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.no_of_periods}

                                {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.no_of_periods}{/if}</td>
                                </tr>
                                <tr id="row_no_of_days">
                                    <td width="200px" bgcolor="#F2F2F2" align="right">No Of Days</td>
                                    <td width="200px">{if $content_details_array.page.action eq 'view'} 
                                        {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.no_of_days}

                                        {else}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.no_of_days}{/if}</td>
                                        </tr>
                                        <tr id="row_week_days">
                                            <td width="200px" bgcolor="#F2F2F2" align="right">Week Days</td>
                                            <td width="200px">{if $content_details_array.page.action eq 'view'} 

                                                {include file="formelements/label.tpl" inputDetails=$content_details_array.formelements.week_days}
                                                {else}
                                                    {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.week_days}
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
                                    </tr>{/if}</table>{if $content_details_array.page.action neq 'view'}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.id}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.last_updated}{include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.user_id}
                            {/if}</form>

                        <script>
                            $('#week_days').multiselect();        
                        
                        </script>

                    {literal}{/literal}{else}
                        <script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>


                        {html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='time_table_settings'"}
                        {literal}
                            <script>
            
                            $(document).ready(function() {
                            geoTable = $('#time_table_settings').dataTable(
                                {
                                "bAutoWidth": false,
                                    "bJQueryUI": true,
                
                                            "sPaginationType": "full_numbers",

                                aoColumns: [{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},{ "bVisible": false},
            
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