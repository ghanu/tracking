</div> 
<script src="{$AppJsURL}ckeditor/ckeditor.js"></script>
<script src="{$AppJsURL}ckeditor/adapters/jquery.js"></script>
<form method="POST" name="uidesigner">
    <table>
        <tr>
            <td>
                {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.tablenames}
            </td>
        </tr>
        <tr>
            <td>
                {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.designer}
            </td>
        </tr>
    </table>
    {include file="formelements/button.tpl" inputDetails=$content_details_array.formelements.submit}
</form>
{literal}
    <script>
        $(function(){
   $('#text').select();
        $('textarea').ckeditor(function(){},{height:'450px',width:'1100px',extraPlugins : 'geotekh',toolbar :
                [
                        { name: 'basicstyles', items : ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Bold','Italic','Underline' ,'RemoveFormat','Undo','Redo'] },
                        { name: 'htmlentities', items : ['Table','CreateDiv'] },
                        { name: 'custom', items : ['GeotekhFramework'] },
                        { name: 'styles',items : [ 'Styles','Format','Font','FontSize','Templates','TextColor','BGColor' ] }
                ]});
                
    });
        function getPageDesign(){
            
            console.log($('#layout').html());
                console.log('asdasd')
            }
    </script>
{/literal}