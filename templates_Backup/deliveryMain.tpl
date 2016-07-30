        <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        {include file="left_sidebar.tpl"}
                        
                        <!-- Features -->
            			<div id="content" class="8u important(collapse)">
            					<header>
            						<h2><strong>The British Chocolate Box - Delivery</strong></h2>
            					</header>
            					<section class="relative">
                                {if $smarty.session.location == "USA"}
                                    <img src="img/usa_shipping_map.jpg" title="USA Shipping Map" alt="USA Shipping Map" width="100%" />
                                {else}
                                    <img src="img/uk_shipping_map.jpg" title="UK Delivery Map" alt="UK Delivery Map" width="60%" />
                                {/if}
                                    <p>We understand you want your chocolate as soon as possible. So At The British Chocolate
                                    Box, we aim to ship your items within 1 working day. Once in transit your items will
                                    arrive at your door within the specified times above.</p>
            				</section>		
            			</div>
                        
					</div>
				</div>

			</div>