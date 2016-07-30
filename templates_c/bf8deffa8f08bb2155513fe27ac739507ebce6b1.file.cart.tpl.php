<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-19 09:15:57
         compiled from "./templates/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74515539355abdbdd7c78f8-14335403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf8deffa8f08bb2155513fe27ac739507ebce6b1' => 
    array (
      0 => './templates/cart.tpl',
      1 => 1447768681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74515539355abdbdd7c78f8-14335403',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55abdbdd91f258_70997447',
  'variables' => 
  array (
    'noItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55abdbdd91f258_70997447')) {function content_55abdbdd91f258_70997447($_smarty_tpl) {?>		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						<!-- Content -->
							<div id="content" class="8u important(collapse)">
								<header>
									<h2><a href="#">Your Cart</a></h2>
								</header>
                                <?php if ($_smarty_tpl->tpl_vars['noItems']->value) {?>
                                    <h3>Sorry you have no items in your basket. <a href="products">Add</a> some products</h3>
                                <?php } else { ?>
                                    <section class="relative">
                                        <?php echo $_smarty_tpl->getSubTemplate ("basket_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                    </section>
                                    
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
                                <?php }?>
						</div>
					</div>
				</div>

			</div><?php }} ?>
