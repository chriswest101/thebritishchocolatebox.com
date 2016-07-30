<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 16:22:06
         compiled from "./templates/checkout.stage3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1384541592553ba47f5ae270-94158402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef18f29fa25135c4bd4703e9512de3899f9d677a' => 
    array (
      0 => './templates/checkout.stage3.tpl',
      1 => 1430576507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1384541592553ba47f5ae270-94158402',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553ba47f66e874_13553455',
  'variables' => 
  array (
    'noItems' => 0,
    'error' => 0,
    'paymentMethod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ba47f66e874_13553455')) {function content_553ba47f66e874_13553455($_smarty_tpl) {?>		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						<div id="content" class="8u important(collapse)">
							<article id="main">
								<header>
									<h2><a href="#">Your Cart</a></h2>
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
                                        <section class="totals2">
                                            <?php echo $_smarty_tpl->getSubTemplate ("discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            <?php echo $_smarty_tpl->getSubTemplate ("delivery.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                        
                                        <section id="totals" class="totals2 relative">
                                            <?php echo $_smarty_tpl->getSubTemplate ("totals.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                            <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                    </section>
                                    
                                    <section>
                                        <h4>3 - Your Details</h4><hr />
                                        <section class="inlineBlock yourDetails"> 
                                            <?php echo $_smarty_tpl->getSubTemplate ("checkout_address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                        <?php if ($_smarty_tpl->tpl_vars['paymentMethod']->value=="paypal") {?>
                                            <?php echo $_smarty_tpl->getSubTemplate ("payment.paypal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->getSubTemplate ("payment.secure.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php }?>
                                    </section>
                                    
                                    <form action="checkout.php" method="post" class="alignRight" id="checkoutForm">
                                        <input type="hidden" name="create_order" value="create_order" />
                                        <input type="submit" value="Confirm &amp; Create Order" style="vertical-align: middle;" class="payButton" id="createOrderBtn" onclick="showProcessingOrder()" />
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
