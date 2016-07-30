<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 15:05:29
         compiled from "./templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1556048648551e4f48124af6-08037892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '256eac5707a02a3d46fca71075635f26449c8a79' => 
    array (
      0 => './templates/menu.tpl',
      1 => 1430571925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1556048648551e4f48124af6-08037892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551e4f48128780_56079989',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551e4f48128780_56079989')) {function content_551e4f48128780_56079989($_smarty_tpl) {?>		<!-- Header -->
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
