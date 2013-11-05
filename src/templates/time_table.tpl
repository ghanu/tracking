

<link rel="stylesheet" type="text/css" href="{$AppCssURL}easyui.css">
<script type="text/javascript" src="{$AppJsURL}jquery.easyui.min.js"></script>

{literal}
<style type="text/css">
    .left{
        width:120px;
        float:left;
    }
    .left table{
        background:#E0ECFF;
    }
    .left td{
        background:#eee;
    }
    .right{
        float:right;
        width:570px;
    }
    .right table{
        background:#E0ECFF;
        width:100%;
    }
    .right td{
        background:#fafafa;
        text-align:center;
        padding:2px;
    }
    .right td{
        background:#E0ECFF;
    }
    .right td.drop{
        background:#fafafa;
        width:100px;
    }
    .right td.over{
        background:#FBEC88;
    }
    .item{
        text-align:center;
        border:1px solid #499B33;
        background:#fafafa;
        width:100px;
    }
    .assigned{
        border:1px solid #BC2A4D;
    }
    .time{
        width:150px;
    }

</style>
<script>
    $(function(){
        $('.left .item').draggable({
            revert:true,
            proxy:'clone'
        });
        $('.right td.drop').droppable({
            onDragEnter:function(){
                $(this).addClass('over');
            },
            onDragLeave:function(){
                $(this).removeClass('over');
            },
            onDrop:function(e,source){
                $(this).removeClass('over');
                if ($(source).hasClass('assigned')){
                    $(this).append(source);
                } else {
                    var c = $(source).clone().addClass('assigned');
                    $(this).empty().append(c);
                    c.draggable({
                        revert:true
                    });
                }
            }
        });
    });
    {/literal}
</script>



<div class="demo-info" style="margin-bottom:10px">

    

    <div class="demo-tip icon-tip">&nbsp;</div>

    <div>Click and drag a class to timetable.</div>

</div>

<div style="width:700px;">
    <div class="left">
        <table>
            {foreach from=$content_details_array.formelements.subject_id item=subject_name key=subject_id name=subjects }

            <tr>
                <td><div class="item">{$subject_name}</div></td>
            </tr>

            {/foreach}


        </table>
    </div>
    <div class="right">
        <table>
            <tr>
                <td class="blank"></td>
                <td class="title">1</td>
                <td class="title">2</td>
                <td class="title">3</td>
                <td class="title">4</td>
                <td class="lunch" ></td>
                <td class="title">5</td>
                <td class="title">6</td>
                <td class="title">7</td>
            </tr>
            {foreach from=$content_details_array.formelements.class item=class_name key=class_id name=class }

            <tr>
                <tr>
                <td class="time">{$class_name}</td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="lunch" ></td>
                <td class="drop"></td>
                <td class="drop"></td>
                <td class="drop"></td>
            </tr>
            </tr>

            {/foreach}
            
            
        </table>
    </div>
</div>
