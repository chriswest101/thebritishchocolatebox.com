    		<!-- Features -->
			<div id="features-wrapper">
				<section id="features" class="container">
					<header>
						<h2><strong>{$SITE_NAME}</strong></h2>
					</header>
					<div class="row">
                    
                        {foreach from=$products key=key item=product}
        					<div class="4u" style="width: 25%;padding: 25px 25px 25px 25px;min-height: 36em;position: relative;">
        						<a href="{$product.prod_code}" class="image featured"><img src="img/products/{$product.image_path}" alt="" width="100" /></a>
        						<header>
        							<h3><a href="{$product.prod_code}">{$product.name}</a></h3>
        						</header>
                                <footer>
                                    {if $product.sale_price != 0.00}
                                        {priceFormat value=$product.price currency=$smarty.session.currency class="pricestrike"}
                                        {priceFormat value=$product.sale_price currency=$smarty.session.currency class="pricesale"}
                                    {else}
                                        {priceFormat value=$product.price currency=$smarty.session.currency}
                                    {/if}
                                </footer>
        						<p>{if strlen($product.description) > 50}{substr($product.description, 0, 50)}...{else}{$product.description}{/if}</p>	
                                <form class="ajaxCart" style="position: absolute;bottom: 2em;right: 0;left: 0;">
                                    <input type="hidden" name="code" value="{$product.prod_code}" />
                                    <input type="hidden" name="qty" value="1" />
                                    <input type="submit" value="Buy" name="ajaxItem" />
                                </form>						
        					</div>
                        {/foreach}
					</div>
					<ul class="actions">
						<li><a href="products" class="button icon fa-file">Our Products</a></li>
					</ul>
				</section>		
			</div>