<div class="modal-header" style="text-align:right;">
    <a href="#close" class="btn" onclick="closeModal();">Close Popup</a>  <!--CHANGED TO "#close"-->
</div>
<div class="modal-body">
    <article class="productContainer" style="width: 100%!important;">
		<div style="display:inline-block;width:30%;">
            <a href="#" class="image featured productImage" onclick="showModal('{$product.prod_code}');"><img src="img/products/{$product.image_path}" alt="" width="100" /></a>
		</div>
        <div style="display:inline-block;width:69%;vertical-align: top;text-align: right;">
            <header>
    			<h3><a href="#">{$product.name}</a></h3>
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
        </div>				
	</article>
</div>
<div class="modal-footer">
    <a href="#close" class="btn" onclick="closeModal();">Close Popup</a>  <!--CHANGED TO "#close"-->
</div>