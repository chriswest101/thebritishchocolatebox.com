<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-17 22:33:20
         compiled from "./templates/deliveryMain.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192344148655ad03fb479457-48720803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcca0ed0739fb05f31516b8febcd3ad0fd434bd7' => 
    array (
      0 => './templates/deliveryMain.tpl',
      1 => 1447768683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192344148655ad03fb479457-48720803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ad03fb51e651_79710665',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ad03fb51e651_79710665')) {function content_55ad03fb51e651_79710665($_smarty_tpl) {?>        <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        
                        <!-- Features -->
            			<div id="content" class="8u important(collapse)">
            					<header>
            						<h2><strong>The British Chocolate Box - Delivery</strong></h2>
            					</header>
            					<section class="relative">
                                <?php if ($_SESSION['location']=="USA") {?>
                                    <img src="img/usa_shipping_map.jpg" title="USA Shipping Map" alt="USA Shipping Map" width="100%" />
                                <?php } else { ?>
                                    <img src="img/uk_shipping_map.jpg" title="UK Delivery Map" alt="UK Delivery Map" width="60%" />
                                <?php }?>
                                    <p>We understand you want your chocolate as soon as possible. So At The British Chocolate
                                    Box, we aim to ship your items within 1 working day. Once in transit your items will
                                    arrive at your door within the specified times above.</p>
            				</section>		
            			</div>
                        
					</div>
				</div>

			</div><?php }} ?>
