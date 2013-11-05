{include file=$AppTheme|cat:"header.tpl"}
{if $smarty.session.user_id}
    {*include file=$AppTheme|cat:'menu.tpl' menu=$content_details_array.menu*}
    {include file=$AppTheme|cat:"page.tpl" content_details_array=$content_details_array} 
    {*include file='form_template.tpl' form_template=$form_template*}

{else}

    {*include file="error.tpl"*}     
    {include file=$AppTheme|cat:"login.tpl"}     
{/if}
{include file=$AppTheme|cat:'footer.tpl'}