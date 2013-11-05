</div> 
<script src="{$AppJsURL}ckeditor/ckeditor.js"></script>
<script src="{$AppJsURL}ckeditor/adapters/jquery.js"></script>
<script src="{$AppJsURL}multiselect_drag/ui.multiselect.js"></script>
<link rel="stylesheet" type="text/css" href="{$AppCssURL}ui.multiselect.css">




<form method="POST" name="formcreate">




    <table>
        <tr>
            <td>Form Name</td>
            <td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.tablenames}</td>
        </tr>
    </table>
    {if $content_details_array.formelements.tablenames.value neq ''}


    <div id="tabs">

        <ul>
            <li><a href="#pagesettings">Page Settings</a></li>
            <li><a href="#columnustomization">Controls Customization</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#designer">User Interface</a></li>
        </ul>
        <div id="pagesettings">
            <table>
                <tr>
                    <td>
                        <label> Page Heading </label>
                    </td>
                    <td>
                        {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pageheading}

                        Can use {ldelim}$action{rdelim}and /or {ldelim}$id{rdelim}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> Page Title </label>
                    </td>
                    <td>
                        {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pagetitle}
                        Can use {ldelim}$action{rdelim}and /or {ldelim}$id{rdelim}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> Dynaimc Condition </label>
                    </td>
                    <td>
                        {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.dynamic_condition}

                    </td>
                </tr>
                <tr>
                    <td>
                        <label> Menu </label>
                    </td>
                    <td>
                        {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.menu}
                        Use -> to sepreate menu and submenu
                    </td>
                </tr>
            </table>
        </div>
        <div id="events">
            <table>

                <tr>
                    <td>
                        <label> View All actions</label>
                    </td>
                    <td>
                        {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.viewallactions}
                        Can use  &lt;a href='"+AppURL+"index.php?file=mcountry&action=view&id="+ oObj.aData[0] +"' &gt;Test&lt;/a&gt;
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> View actions</label>
                    </td>
                    <td>
                        {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.viewactions}
                        Can use  &lt;a href="'.AppURL.'index.php?file=mcountry&action=edit&id='.$id.'"&gt;Test&lt;/a&gt;
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> Before Write</label>
                    </td>
                    <td>
                        {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.beforewrite}
                        php code executed before add or edit
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> After Write</label>
                    </td>
                    <td>
                        {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.afterwrite}
                        php code executed after add or edit
                    </td>
                </tr>
            </table>
        </div>
        <div id="columnustomization" style="overflow: auto;height: 500px;">
            <table>
                <tr>
                    <td colspan=2>
                        <table border=1>
                            <tr>
                                <td>Column Name</td>
                                <td>Display Name</td>
                                <td>Type</td>

                                <td>Data</td>
                                <td>Column Property</td>

                                <td>Dependent Data Load</td>  
                            </tr>   
                            {foreach  from=$content_details_array.formelements.column item=currentvalue key=key}
                            <tr>
                                <td>
                                    <label> {$currentvalue.details.display_name}({$key})</label>
                                </td>
                                <td>

                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.details}
                                </td>
                                <td>
                                    <table border="0">

                                        <tbody>
                                            <tr>
                                                <td>Add/Edit</td>
                                                <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.type}</td>
                                            </tr>
                                            <tr>
                                                <td>View as </td>
                                                <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.view_type}</td>
                                            </tr>
                                            <tr>
                                                <td>View All </td>
                                                <td>  {include file="formelements/input.tpl" inputDetails=$currentvalue.viewallcolumns}
                                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.viewallcolumnformula}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>

                                <td>
                                    <table>
                                        {if $currentvalue.reference_table neq ''}
                                        <tr>
                                            <td>
                                                <label>Table</label>
                                            </td>
                                            <td>
                                                  {include file="formelements/label.tpl" inputDetails=$currentvalue.reference_table}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Columns</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.reference_column}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Condition</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.reference_column_condition}
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Order by</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.reference_column_order_by}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Add on Fly</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.addonfly}
                                            </td>
                                        </tr>
                                        {else}
                                        <tr>
                                            <td>
                                                <label>Static data</label>
                                            </td>
                                            <td> 
                                                <p>{include file="formelements/input.tpl" inputDetails=$currentvalue.static_data}</p>
                                                <p>Ex : "1"=>"India","2"=>US..["key"=>"Value"] </p></td>
                                        </tr>
                                        {/if}
                                    </table>
                                </td>

                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                Mandatory
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.mandatory}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Place holder 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.placeholder}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Default Value 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.default_value}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Formatting 
                                            </td>
                                            <td>
                                                {include file="formelements/select.tpl" inputDetails=$currentvalue.formatting_type}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Validations 
                                            </td>
                                            <td>
                                                {include file="formelements/select.tpl" inputDetails=$currentvalue.validations}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Validation Pattern 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.pattern}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                JavaScript 
                                            </td>
                                            <td>
                                                {include file="formelements/textarea.tpl" inputDetails=$currentvalue.dependentshowhide_condition}
                                            </td>
                                        </tr>
                                    </table>

                                </td>


                                <td>
                                    {include file="formelements/select.tpl" inputDetails=$currentvalue.dependent}
                                    {include file="formelements/textarea.tpl" inputDetails=$currentvalue.dependent_query}


                                </td>
                            </tr>

                            {/foreach}
                        </table>


                    </td></tr>
            </table>
        </div>

        <div id="designer" style="overflow: auto;height: 500px;">
            <table>

                <tr>
                    <td colspan="2">
                        {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.designer}
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <table>
        <tr>
            <td colspan="2">
                {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit}
            </td>
        </tr>

        {/if}


    </table>
    <script>
        var defaultCSS="{$AppCssURL}/geotheme1.css";
        {literal}
        
        $(function(){
            $( "#tabs" ).tabs({ selected: 0});
            $("#tabs div.ui-tabs-panel").css('height', '550px');
            $('#layout').ckeditor(function(e){},{fullPage:false,height:'450px',width:'800px ',extraPlugins : 'tableresize,stylesheetparser,tableresize',resize_enabled:false,toolbar :
                    [
                    { name: 'basicstyles', items :
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Bold','Italic','Underline' ,'RemoveFormat','Undo','Redo'] 
                    },
                    { name: 'htmlentities', items : 
                            ['Table','CreateDiv'] 
                    },
                        
                    { name: 'styles',items : 
                            [ 'Styles','Format','Font','FontSize','Templates','TextColor','BGColor' ]
                    }
                ],contentsCss:[defaultCSS],removePlugins:'scayt,menubutton,forms,elementspath'
            });
                

               
                
        });
                
        
    
      
    </script>
    {/literal}
