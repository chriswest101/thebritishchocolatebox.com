<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-17 23:06:30
         compiled from "./templates/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174293203455abdbcbcb6575-57199557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8caabe71d4a12108a3fcfc4c8048d2bf64f28aa' => 
    array (
      0 => './templates/products.tpl',
      1 => 1447768680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174293203455abdbcbcb6575-57199557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55abdbcbdd7fd2_30031890',
  'variables' => 
  array (
    'orderBy' => 0,
    'totalProducts' => 0,
    'limit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55abdbcbdd7fd2_30031890')) {function content_55abdbcbdd7fd2_30031890($_smarty_tpl) {?>            <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        
                        <!-- Features -->
                        <div id="content" class="8u important(collapse)">
                			<div id="features-wrapper">
                				<section id="features" class="container" style="  width: 100%;">
                					<header>
                						<h2><strong>The British Chocolate Box</strong></h2>
                					</header>
                					<section class="relative">
                                        <section style="text-align:right;">
                                            <form action="products" method="post" style="width: 100%;display: inline-block;" onsubmit="showLoader();">
                                                
                                                <span>Sort By</span>
                                                <select id="order_by" name="order_by" class="prodOrderSelect" onchange="this.form.submit(); showLoader();" style="font-weight:bold;display: inline-block;">
                                                    <option value="price/DESC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="price/DESC") {?>selected=""<?php }?>>Price (High - Low)</option>
                                                    <option value="price/ASC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="price/ASC") {?>selected=""<?php }?>>Price (Low - High)</option>
                                                    <option value="sale_price/DESC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="sale_price/DESC") {?>selected=""<?php }?>>Sale Price (High - Low)</option>
                                                    <option value="sale_price/ASC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="sale_price/ASC") {?>selected=""<?php }?>>Sale Price (Low - High)</option>
                                                    <option value="name/ASC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="name/ASC") {?>selected=""<?php }?>>Name (A to Z)</option>
                                                    <option value="name/DESC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="name/DESC") {?>selected=""<?php }?>>Name (Z to A)</option>
                                                    <option value="manufacturer/ASC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="manufacturer/ASC") {?>selected=""<?php }?>>Manufacturer (A to Z)</option>
                                                    <option value="manufacturer/DESC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="manufacturer/DESC") {?>selected=""<?php }?>>Manufacturer (Z to A)</option>
                                                    <option value="featured/DESC" <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=="featured/DESC") {?>selected=""<?php }?>>Order by default</option>
                                                </select>
                                                <input type="hidden" id="productCount" value="<?php echo $_smarty_tpl->tpl_vars['totalProducts']->value['productCount'];?>
" />
                                                <input type="hidden" id="loadedProducts" value="0" />
                                                <input type="hidden" id="productLimit" value="<?php echo $_smarty_tpl->tpl_vars['limit']->value;?>
" />
                                                
                                                <input type="button" class="mobileSideBarButton" onclick="$('.mobileSideBar').toggle();" value="Filter" style="padding: 0.5em 0.5em 0.5em 0.5em;" />
                                                
                                            </form>
                                        </section>
                                        <section id="productList">
                                            <?php echo $_smarty_tpl->getSubTemplate ("product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                        <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php if ($_smarty_tpl->tpl_vars['totalProducts']->value['productCount']<=$_smarty_tpl->tpl_vars['limit']->value) {?>
                                            <h3>No more products</h3>
                                        <?php }?>
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
                
			</div><?php }} ?>
