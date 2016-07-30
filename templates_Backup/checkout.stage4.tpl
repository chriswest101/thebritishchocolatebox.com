		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        {include file="left_sidebar.tpl"}
						<div id="content" class="8u important(collapse)">
							<article id="main">
								<header>
									<h2><a href="#">Order #{$orderID} received</a></h2>
								</header>
                                <section class="relative">
                                    <h4><span style="font-style: italic;font-weight:bold;">{$smarty.session.user.name}</span>, thank you for your order.</h4><hr />
                                    
                                    <p>Your order has been recieved and we shall process this as soon as possible. You should receive an email at <span style="font-style: italic;font-weight:bold;">{$smarty.session.user.email_address}</span> confirming your order shortly.</p>
                                    
                                    <p>Thank you for being apart of The British Chocolate Box</p>
                                </section>
							</article>
						</div>
					</div>
				</div>

			</div>