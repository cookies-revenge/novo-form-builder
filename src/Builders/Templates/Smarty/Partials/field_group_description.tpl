{assign var="fieldGroupDescription" value=$fieldObj->getDescription()}
{if $fieldGroupDescription}
    <p class="novo-field-group-description 
    {if $fieldGroupDescription.html_class}
        {$fieldGroupDescription.html_class}
    {/if}">
        {if $fieldGroupDescription.text}
            {$fieldGroupDescription.text}
        {/if}
    </p>
{/if}