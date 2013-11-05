{$inputDetails.preappend}

<input 
    type="{if $inputDetails.type!='' && $inputDetails.type neq 'date'}{$inputDetails.type}{else}text{/if}" 
    class="{if $inputDetails.class!=''}{$inputDetails.class}{else}input{/if}" 
    style="{$inputDetails.style}"
    name="{if $inputDetails.name!=''}{$inputDetails.name}{if $inputDetails.type eq 'date'}_date{/if}{else}{$inputDetails.id}{/if}" 
    id={if $inputDetails.id!=''}{$inputDetails.id}{if $inputDetails.type eq 'date'}_date{/if}{else}{$inputDetails.name}{/if} 
    {if $inputDetails.pattern!=''}pattern="{$inputDetails.pattern}"{/if} 
    {if $inputDetails.value!=''} value='{if $inputDetails.type eq 'date' && $inputDetails.value neq ''}{$inputDetails.value|date_format:$AppDateFormatTpl}{else}{$inputDetails.value}{/if}'{/if} 
    {if $inputDetails.readonly!=''} readonly="readonly"{/if} 
    {$inputDetails.required}
	{$inputDetails.min}
	{$inputDetails.max}
    {if $inputDetails.checked!=''|| $inputDetails.value!=''} checked {/if} 
    {$inputDetails.readonly}
    {if $inputDetails.data!=''} list="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}_data" {/if} 
    {$inputDetails.event}
    {if $inputDetails.placeholder!=''}placeholder="{$inputDetails.placeholder}"{/if}
    {if $inputDetails.size!=''}size="{$inputDetails.size}"{/if}

    />
    {if $inputDetails.type eq 'date'}
    <input name="{$inputDetails.name}" id="{$inputDetails.id}"  type="hidden" value="{$inputDetails.value}" />
{/if}
<span id="{$inputDetails.id}_error" style="display: inline"></span>
{if $inputDetails.data!=''} 
<datalist id="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}_data">
    {foreach from=$inputDetails.data item=currentselectvalue key=key name=selectbox}
    <option value="{$currentselectvalue}"></option>

    {/foreach}
</datalist>

{/if} 
{$inputDetails.append}
