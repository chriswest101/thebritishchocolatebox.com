<!-- Sidebar -->
<div id="sidebar" class="4u mobileSideBar">
    
    {if $pageType == "products"}
    
        {include file="left_sidebar_filter.tpl"}
        
    {else}
    
        {include file="left_sidebar_products.tpl"}
        
    {/if}
        
        
</div>