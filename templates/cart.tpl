		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        {include file="left_sidebar.tpl"}
						<!-- Content -->
							<div id="content" class="8u important(collapse)">
								<header>
									<h2><a href="#">Your Cart</a></h2>
								</header>
                                {if $noItems}
                                    <h3>Sorry you have no items in your basket. <a href="products">Add</a> some products</h3>
                                {else}
                                    <section class="relative">
                                        {include file="basket_list.tpl"}
                                        {include file="loader.tpl"}
                                    </section>
                                    {*<section>
                                        {include file="discount.tpl"}
                                    </section>
                                    <section>
                                        {include file="totals.tpl"}
                                    </section>*}
                                    <section class="alignLeft" style="padding:0;margin:0;">
                                        <form action="cart?emptyCart" method="post"> 
                                            <input type="submit" value="Empty Basket" class="payButton" style="padding: 0.45em 2.05em 0.45em 2.05em;" />
                                        </form>
                                    </section>
                                    <section class="alignRight">
                                        <form action="cart?goToCheckout" method="post">
                                            <input type="submit" value="Go to Checkout" class="payButton" />
                                        </form>
                                    </section>
                                {/if}
						</div>
					</div>
				</div>

			</div>