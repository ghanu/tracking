{include file='header.tpl'}
{if $smarty.session.user_id}
    {include file="page.tpl" content_details_array=$content_details_array} 
    {*include file='form_template.tpl' form_template=$form_template*}

{else}

    {*include file="error.tpl"*}     
    {include file="login.tpl"}     
{/if}
{include file='footer.tpl'}