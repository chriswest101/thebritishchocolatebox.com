<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 20:37:46
         compiled from "./templates/checkout.stage4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127210104255e33da4991b48-91250745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d8c93de9fe39e5b3fbd247f117c2e3c6ee0a321' => 
    array (
      0 => './templates/checkout.stage4.tpl',
      1 => 1440958844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127210104255e33da4991b48-91250745',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e33da4b480e1_79529262',
  'variables' => 
  array (
    'orderID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e33da4b480e1_79529262')) {function content_55e33da4b480e1_79529262($_smarty_tpl) {?>		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						<div id="content" class="8u important(collapse)">
							<article id="main">
								<header>
									<h2><a href="#">Order #<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
 received</a></h2>
								</header>
                                <section class="relative">
                                    <h4><span style="font-style: italic;font-weight:bold;"><?php echo $_SESSION['user']['name'];?>
</span>, thank you for your order.</h4><hr />
                                    
                                    <p>Your order has been recieved and we shall process this as soon as possible. You should receive an email at <span style="font-style: italic;font-weight:bold;"><?php echo $_SESSION['user']['email_address'];?>
</span> confirming your order shortly.</p>
                                    
                                    <p>Thank you for being apart of The British Chocolate Box</p>
                                </section>
							</article>
						</div>
					</div>
				</div>

			</div><?php }} ?>
