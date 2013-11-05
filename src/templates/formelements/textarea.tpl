{$inputDetails.preappend}

<textarea 
	class="textarea"
    name="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}" 
    id='{if $inputDetails.id!=''}{$inputDetails.id}{else}{$inputDetails.name}{/if}'
    {if $inputDetails.readonly!=''} readonly="readonly"{/if}
    {$inputDetails.required}
    placeholder="{$inputDetails.placeholder}"
    rows="{$inputDetails.rows}" 
    cols="{$inputDetails.cols}"
    wrap="soft">{$inputDetails.value}</textarea>
    
{$inputDetails.append}
