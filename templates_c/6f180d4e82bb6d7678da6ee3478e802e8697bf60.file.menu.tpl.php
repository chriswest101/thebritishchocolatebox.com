<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-11 17:23:22
         compiled from "./templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8495874555a134ea609169-57999620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f180d4e82bb6d7678da6ee3478e802e8697bf60' => 
    array (
      0 => './templates/menu.tpl',
      1 => 1430571925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8495874555a134ea609169-57999620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a134ea672183_67557730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a134ea672183_67557730')) {function content_55a134ea672183_67557730($_smarty_tpl) {?>		<!-- Header -->
			<div id="header-wrapper">
				<div id="header" class="container" style="background:url(img/header.jpg);background-size: 60em;background-repeat: no-repeat;  background-position: 4em 2em;">
					
					<!-- Logo -->
						<h1 id="logo"><a href="index.html">British Chocolate Box</a></h1>
						<p>Cadbury British Chocolate</p>
					
					<!-- Nav -->
						<nav id="nav" class="headerClass">
							<ul>
								<li><a class="icon fa-home" href="index.php"><span>Home</span></a></li>
								
								<li><a href="products.php"><span>Products</span></a></li>
                                <li><a href="delivery.php"><span>Delivery</span></a></li>
								<li id="cartLink"><a href="cart.php" ><span>Cart</span> <img src="img/basket.png" width="16" alt="Basket" title="Basket" /> <span id="basketTotal"><?php if ($_SESSION['checkout']['item_count']) {
echo $_SESSION['checkout']['item_count'];
} else { ?>0<?php }?></span></a></li>
							</ul>
						</nav>

				</div>
			</div><?php }} ?>
