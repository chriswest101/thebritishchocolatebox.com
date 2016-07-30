<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 16:22:26
         compiled from "./templates/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1113285565552a7cb797cb22-30353421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a451086f78686c5e534cd63189f74393c1c61959' => 
    array (
      0 => './templates/checkout.tpl',
      1 => 1430576153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1113285565552a7cb797cb22-30353421',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552a7cb79fd808_85545671',
  'variables' => 
  array (
    'noItems' => 0,
    'error' => 0,
    'notLoggedIn' => 0,
    'editAddress' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552a7cb79fd808_85545671')) {function content_552a7cb79fd808_85545671($_smarty_tpl) {?>		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						<div id="content" class="8u important(collapse)">
							<article id="main">
								<header>
									<h2><a href="#">Checkout</a></h2>
								</header>
                                <?php if ($_smarty_tpl->tpl_vars['noItems']->value) {?>
                                    <h3>Sorry you have no items in your basket. <a href="products.php">Add</a> some products</h3>
                                <?php } else { ?>
                                    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
                                        <h3 class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h3>
                                    <?php }?>
                                    <section class="relative">
                                        <h4>1 - Items</h4><hr />
                                        <?php echo $_smarty_tpl->getSubTemplate ("basket_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                    </section>
                                    
                                    <section>
                                        <h4>2 - Totals</h4><hr />
                                        <section class="totals1">
                                            <?php echo $_smarty_tpl->getSubTemplate ("discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            <?php echo $_smarty_tpl->getSubTemplate ("delivery.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                        
                                        <section class="totals2 relative" id="totals">
                                            <?php echo $_smarty_tpl->getSubTemplate ("totals.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                    </section>
                                    
                                    <section>
                                        <h4>3 - Your Details</h4><hr />
                                        <?php if ($_smarty_tpl->tpl_vars['notLoggedIn']->value) {?>
                                        
                                            <section>
                                                <?php echo $_smarty_tpl->getSubTemplate ("login_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            </section>
                                            
                                            <section> 
                                                <?php echo $_smarty_tpl->getSubTemplate ("myaccount_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            </section>
                                            
                                        <?php } else { ?>
                                            <?php if ($_smarty_tpl->tpl_vars['editAddress']->value) {?>
                                            
                                                <section> 
                                                    <?php echo $_smarty_tpl->getSubTemplate ("myaccount_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                </section>
                                                
                                            <?php } else { ?>
                                            
                                                <section class="inlineBlock details1" > 
                                                    <?php echo $_smarty_tpl->getSubTemplate ("checkout_address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                </section>
                                                
                                                <section class="inlineBlock details1" > 
                                                    <?php echo $_smarty_tpl->getSubTemplate ("payment.paypal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                    <?php echo $_smarty_tpl->getSubTemplate ("payment.secure.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                </section>
                                            <?php }?>
                                        <?php }?>
                                    </section>
                                    
                                    <form action="checkout.php?paypal" method="post" class="alignRight" id="checkoutForm">
                                        
                                        
                                        <input type="hidden" name="courier" value="" id="paypalCourier" />
                                        <input type="submit" value="Pay With Paypal" style="vertical-align: middle;" class="payButton" id="creteOrderBtn" onclick="showProcessingOrder()" />
                                    </form>
                                    <div style="text-align: right;">
                                        <span id="processingOrder" style="display:none;"><h2 class="inlineBlock">Processing...</h2> <img src="img/cube.svg" width="60em" /></span>
                                    </div>
                                <?php }?>
							</article>
						</div>
					</div>
				</div>

			</div><?php }} ?>
