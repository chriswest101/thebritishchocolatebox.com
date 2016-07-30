		<!-- Header -->
			<div id="header-wrapper">
				<div id="header" class="container">
					
					<!-- Logo -->
						<h1 id="logo"><a href="index.html">British Chocolate Box</a></h1>
						<p>Cadbury British Chocolate</p>
					
					<!-- Nav -->
						<nav id="nav" class="headerClass">
							<ul>
								<li><a class="icon fa-home" href="index"><span>Home</span></a></li>
								{*<li>
									<a href="" class="icon fa-bar-chart-o"><span>Dropdown</span></a>
									<ul>
										<li><a href="#">Lorem ipsum dolor</a></li>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam dolore nisl</a></li>
										<li>
											<a href="">Phasellus consequat</a>
											<ul>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam dolore nisl</a></li>
												<li><a href="#">Phasellus consequat</a></li>
											</ul>
										</li>
										<li><a href="#">Veroeros feugiat</a></li>
									</ul>
								</li>*}
								<li><a href="products"><span>Products</span></a></li>
                                <li><a href="delivery"><span>Delivery</span></a></li>
								<li id="cartLink"><a href="cart" ><span>Cart</span> <img src="img/basket.png" width="16" alt="Basket" title="Basket" /> <span id="basketTotal">{if $smarty.session.checkout.item_count}{$smarty.session.checkout.item_count}{else}0{/if}</span></a></li>
							</ul>
						</nav>

				</div>
			</div>