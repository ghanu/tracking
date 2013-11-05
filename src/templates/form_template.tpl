<table>

{include file='formelements/input.tpl' fieldLabel='Test'}
{include file='formelements/date.tpl' ui_input_=$ui_date}
{include file='formelements/upload.tpl' ui_upload_=$ui_upload}
{include file='formelements/select.tpl' ui_upload_=$ui_upload}
{include file='formelements/textarea.tpl' ui_upload_=$ui_upload}
<tr><td>{include file='formelements/reset_button.tpl' ui_reset_=$ui_reset}</td><td>{include file='formelements/submit_button.tpl' ui_reset_=$ui_reset}</td></tr>
<table/>