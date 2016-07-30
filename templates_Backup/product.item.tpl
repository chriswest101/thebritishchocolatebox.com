            <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        {include file="left_sidebar.tpl"}
                        
                        <!-- Features -->
                        <div id="content" class="8u important(collapse)">
                			<div id="features-wrapper">
                				<section id="features" class="container" style="  width: 100%;">
                					<header>
                						<h2><a style="cursor:pointer;">{$product.name}</a></h2>
                                        
                                        
                					</header>
                                    <section style="display:inline-block; width:50%;">
                                        <a class="image featured productImage" style="cursor:pointer; display:inline-blocka;"><img src="img/products/{$product.image_path}" alt="{$product.name}" width="60%" /></a>
                                    </section>
                					<section class="relative" style="display:inline-block; width:49%;position: relative;vertical-align: top;">
                                        <section style="text-align:right;">
                                            <form class="ajaxCart">
                                                {$product.description}
                                                <br />
                                                {if $product_nutrition.kcal}
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">
                                                            Energy<br />
                                                            <span class="nutritionSpan">{$product_nutrition.kcal}kcal</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">
                                                            Fat<br />
                                                            <span class="nutritionSpan">{$product_nutrition.fat}g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner"> 
                                                            Saturates  <br />                                             
                                                            <span class="nutritionSpan">{$product_nutrition.saturates}g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner"> 
                                                            Sugars  <br />                                                 
                                                            <span class="nutritionSpan">{$product_nutrition.sugars}g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">   
                                                            Salt<br />
                                                            <span class="nutritionSpan">{$product_nutrition.salt}g</span>
                                                        </div>
                                                    </div>
                                                    <p>{$product_nutrition.per}</p>
                                                {/if}
                                                <br /><br />
                                                <form class="ajaxCart">
                                                    <input type="number" name="qty" value="1" class="inputQty" min="1" max="15" style="display:inline-block;" />
                                                    <input type="hidden" name="code" value="{$product.prod_code}" />
                                                    <input type="submit" value="Buy" name="ajaxItem" style="padding: 0.65em 2em 0.65em 2em;display:inline-block;" />
                                                </form>	
                                                
                                                {if $product.sale_price != 0.00}
                                                    {priceFormat value=$product.price currency=$smarty.session.currency class="pricestrike"}
                                                    {priceFormat value=$product.sale_price currency=$smarty.session.currency class="pricesale"}
                                                {else}
                                                    {priceFormat value=$product.price currency=$smarty.session.currency}
                                                {/if}                                               	
                                                
                                            </form>
                                        </section>
                                        <section id="productList">
                                            {include file="product.tpl"}
                                        </section>
                                        {include file="loader.tpl"}
                                        <footer class="loaderAjax" id="ajaxProductLoader" style="position:inherit;">
                                            <img src="img/cube.svg" />
                                        </footer>
                                    </section>
                				</section>		
                			</div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal" id="modal" aria-hidden="true" style="display:none;">
                            <div class="modal-dialog" id="modalContent">
                                
                            </div>
                        </div>
                        <!-- /Modal -->
                        
					</div>
				</div>
                
                <div class="screen">
                </div>
                
			</div>