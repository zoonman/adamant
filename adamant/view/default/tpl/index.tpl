{include file="chunk/head.tpl"}

<h1>Adamant</h1>
<p>This is an example page.</p>

	{* include file="`$module`/`$template_version``$main`.tpl" *}

	
<p>	
{if isset($my_test)}
	{$my_test}
{/if}
</p>
{include file="chunk/foot.tpl"}