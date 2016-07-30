<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-17 14:58:24
         compiled from "./templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50467780755aa8c39bb2086-65603578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f4bdd251c8b7a304ec72a08dada35b8467ab26c' => 
    array (
      0 => './templates/menu.tpl',
      1 => 1447768685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50467780755aa8c39bb2086-65603578',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55aa8c39c195a4_36435735',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55aa8c39c195a4_36435735')) {function content_55aa8c39c195a4_36435735($_smarty_tpl) {?>		<!-- Header -->
			<div id="header-wrapper">
				<div id="header" class="container">
					
					<!-- Logo -->
						<h1 id="logo"><a href="index.html">British Chocolate Box</a></h1>
						<p>Cadbury British Chocolate</p>
					
					<!-- Nav -->
						<nav id="nav" class="headerClass">
							<ul>
								<li><a class="icon fa-home" href="index"><span>Home</span></a></li>
								
								<li><a href="products"><span>Products</span></a></li>
                                <li><a href="delivery"><span>Delivery</span></a></li>
								<li id="cartLink"><a href="cart" ><span>Cart</span> <img src="img/basket.png" width="16" alt="Basket" title="Basket" /> <span id="basketTotal"><?php if ($_SESSION['checkout']['item_count']) {
echo $_SESSION['checkout']['item_count'];
} else { ?>0<?php }?></span></a></li>
							</ul>
						</nav>

				</div>
			</div><?php }} ?>
