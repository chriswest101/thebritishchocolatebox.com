		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        {include file="left_sidebar.tpl"}
						<div id="content" class="8u important(collapse)">
							<article id="main">
								<header>
									<h2><a href="#">Checkout</a></h2>
								</header>
                                {if $noItems}
                                    <h3>Sorry you have no items in your basket. <a href="products.php">Add</a> some products</h3>
                                {else}
                                    {if $error}
                                        <h3 class="error">{$error}</h3>
                                    {/if}
                                    <section class="relative">
                                        <h4>1 - Items</h4><hr />
                                        {include file="basket_list.tpl"}
                                        {include file="loader.tpl"}
                                    </section>
                                    
                                    <section>
                                        <h4>2 - Totals</h4><hr />
                                        <section class="totals1">
                                            {include file="discount.tpl"}
                                            {include file="delivery.tpl"}
                                        </section>
                                        
                                        <section class="totals2 relative" id="totals">
                                            {include file="totals.tpl"}
                                            {include file="loader.tpl"}
                                        </section>
                                    </section>
                                    
                                    <section>
                                        <h4>3 - Your Details</h4><hr />
                                        {if $notLoggedIn}
                                        
                                            <section>
                                                {include file="login_box.tpl"}
                                            </section>
                                            
                                            <section> 
                                                {include file="myaccount_details.tpl"}
                                            </section>
                                            
                                        {else}
                                            {if $editAddress}
                                            
                                                <section> 
                                                    {include file="myaccount_details.tpl"}
                                                </section>
                                                
                                            {else}
                                            
                                                <section class="inlineBlock details1" > 
                                                    {include file="checkout_address.tpl"}
                                                </section>
                                                
                                                <section class="inlineBlock details1" > 
                                                    {include file="payment.paypal.tpl"}
                                                    {include file="payment.secure.tpl"}
                                                </section>
                                            {/if}
                                        {/if}
                                    </section>
                                    {if $notLoggedIn}
                                    {else}
                                        {*<form action="checkout.php?secure" method="post" class="alignRight">
                                            <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" width="230" style="vertical-align: middle;"/>
                                            <input type="submit" style="
                                                                        background:url(https://www.paypalobjects.com/en_US/i/btn/x-click-but6.gif);
                                                                        background-size: 150px;
                                                                        background-repeat: no-repeat;
                                                                        width: 150px;" value="" />
                                            <input type="hidden" name="courier" value="" id="secureCourier" />
                                            <input type="submit" value="Secure Online Checkout" class="payButtonSecure" style="
                                                                          ackground-image: url(img/padlock.png)!important;
                                                                          background-size: 35px!important;
                                                                          background-repeat: no-repeat!important;
                                                                          background-position: 1em 0.5em!important;
                                                                          vertical-align: middle;" />
                                        </form>*}
                                        <form action="checkout.php?paypal" method="post" class="alignRight" id="checkoutForm">
                                            {*<h5 style="margin-top: 0.5em;margin-right: 11em;">OR</h5>*}
                                            {*<img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" width="230" style="vertical-align: middle;"/>
                                            <input type="submit" style="
                                                                        background:url(https://www.paypalobjects.com/en_US/i/btn/x-click-but6.gif);
                                                                        background-size: 150px;
                                                                        background-repeat: no-repeat;
                                                                        width: 150px;" value="" />*}
                                            <input type="hidden" name="courier" value="" id="paypalCourier" />
                                            <input type="submit" value="Pay With Paypal" style="vertical-align: middle;" class="payButton" id="creteOrderBtn" onclick="showProcessingOrder()" />
                                        </form>
                                        <div style="text-align: right;">
                                            <span id="processingOrder" style="display:none;"><h2 class="inlineBlock">Processing...</h2> <img src="img/cube.svg" width="60em" /></span>
                                        </div>
                                    {/if}
                                {/if}
							</article>
						</div>
					</div>
				</div>

			</div>