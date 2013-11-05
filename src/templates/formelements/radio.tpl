
{foreach from=$inputDetails.data item=currentselectvalue key=key name=checkboxbox}
    <input type=radio 
           name="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}" 
           id="{$currentselectvalue}"
           value="{$currentselectvalue}"
           />
    <label for={$currentselectvalue}>{$key}</label>
{/foreach}
