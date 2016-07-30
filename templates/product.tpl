{foreach from=$products key=key item=product}
    <article class="productContainer">
		<a href="{$product.prod_code}" class="image featured productImage" {*onclick="showModal('{$product.prod_code}');"*} style="cursor:pointer;"><img src="img/products/{$product.image_path}" alt="" width="100" /></a>
		<header>
			<h3><a href="{$product.prod_code}" {*onclick="showModal('{$product.prod_code}');"*} style="cursor:pointer;">{$product.name}</a></h3>
		</header>
        <footer class="productFooter">
            {if $product.sale_price != 0.00}
                {priceFormat value=$product.price currency=$smarty.session.currency class="pricestrike"}
                {priceFormat value=$product.sale_price currency=$smarty.session.currency class="pricesale"}
            {else}
                {priceFormat value=$product.price currency=$smarty.session.currency}
            {/if}
        </footer>	
        <form class="ajaxCart">
            <input type="number" name="qty" value="1" class="inputQty" min="1" max="15" style="display:inline-block;" />
            <input type="hidden" name="code" value="{$product.prod_code}" />
            <input type="submit" value="Buy" name="ajaxItem" style="padding: 0.65em 2em 0.65em 2em;display:inline-block;" />
        </form>						
	</article>
{/foreach}