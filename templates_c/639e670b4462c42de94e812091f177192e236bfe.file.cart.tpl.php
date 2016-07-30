<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-25 16:07:32
         compiled from "./templates/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118374988755225191721291-32559540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '639e670b4462c42de94e812091f177192e236bfe' => 
    array (
      0 => './templates/cart.tpl',
      1 => 1429969221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118374988755225191721291-32559540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55225191798783_69260871',
  'variables' => 
  array (
    'noItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55225191798783_69260871')) {function content_55225191798783_69260871($_smarty_tpl) {?>		<!-- Main -->
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
                                    <h3>Sorry you have no items in your basket. <a href="products.php">Add</a> some products</h3>
                                <?php } else { ?>
                                    <section class="relative">
                                        <?php echo $_smarty_tpl->getSubTemplate ("basket_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                    </section>
                                    
                                    <section class="alignRight">
                                        <form action="cart.php?goToCheckout" method="post">
                                            <input type="submit" value="Go to Checkout" class="payButton" />
                                        </form>
                                    </section>
                                <?php }?>
						</div>
					</div>
				</div>

			</div><?php }} ?>
