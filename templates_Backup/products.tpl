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
                						<h2><strong>The British Chocolate Box</strong></h2>
                					</header>
                					<section class="relative">
                                        <section style="text-align:right;">
                                            <form action="products.php" method="post" style="width: 100%;display: inline-block;" onsubmit="showLoader();">
                                                
                                                <span>Sort By</span>
                                                <select id="order_by" name="order_by" class="prodOrderSelect" onchange="this.form.submit(); showLoader();" style="font-weight:bold;display: inline-block;">
                                                    <option value="price/DESC" {if $orderBy == "price/DESC"}selected=""{/if}>Price (High - Low)</option>
                                                    <option value="price/ASC" {if $orderBy == "price/ASC"}selected=""{/if}>Price (Low - High)</option>
                                                    <option value="sale_price/DESC" {if $orderBy == "sale_price/DESC"}selected=""{/if}>Sale Price (High - Low)</option>
                                                    <option value="sale_price/ASC" {if $orderBy == "sale_price/ASC"}selected=""{/if}>Sale Price (Low - High)</option>
                                                    <option value="name/ASC" {if $orderBy == "name/ASC"}selected=""{/if}>Name (A to Z)</option>
                                                    <option value="name/DESC" {if $orderBy == "name/DESC"}selected=""{/if}>Name (Z to A)</option>
                                                    <option value="manufacturer/ASC" {if $orderBy == "manufacturer/ASC"}selected=""{/if}>Manufacturer (A to Z)</option>
                                                    <option value="manufacturer/DESC" {if $orderBy == "manufacturer/DESC"}selected=""{/if}>Manufacturer (Z to A)</option>
                                                    <option value="featured/DESC" {if $orderBy == "featured/DESC"}selected=""{/if}>Order by default</option>
                                                </select>
                                                <input type="hidden" id="productCount" value="{$totalProducts.productCount}" />
                                                <input type="hidden" id="loadedProducts" value="0" />
                                                <input type="hidden" id="productLimit" value="{$limit}" />
                                                
                                                <input type="button" class="mobileSideBarButton" onclick="$('.mobileSideBar').toggle();" value="Filter" style="padding: 0.5em 0.5em 0.5em 0.5em;" />
                                                
                                            </form>
                                        </section>
                                        <section id="productList">
                                            {include file="product.tpl"}
                                        </section>
                                        {include file="loader.tpl"}
                                        {if $totalProducts.productCount <= $limit}
                                            <h3>No more products</h3>
                                        {/if}
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