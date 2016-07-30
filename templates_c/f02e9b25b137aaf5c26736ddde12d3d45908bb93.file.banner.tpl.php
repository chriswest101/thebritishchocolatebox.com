<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-11 17:23:22
         compiled from "./templates/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13564189955a134ea6a52b3-49056885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f02e9b25b137aaf5c26736ddde12d3d45908bb93' => 
    array (
      0 => './templates/banner.tpl',
      1 => 1429968785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13564189955a134ea6a52b3-49056885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a134ea7bba15_49363589',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a134ea7bba15_49363589')) {function content_55a134ea7bba15_49363589($_smarty_tpl) {?>
    		<!-- Features -->
			<div id="features-wrapper">
				<section id="features" class="container">
					<header>
						<h2><strong>The British Chocolate Box</strong></h2>
					</header>
					<div class="row">
                    
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
        					<div class="4u" style="width: 25%;">
        						<a href="#" class="image featured"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="" width="100" /></a>
        						<header>
        							<h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h3>
        						</header>
                                <footer>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=0.00) {?>
                                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency'],'class'=>"pricestrike"),$_smarty_tpl);?>

                                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['sale_price'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>

                                    <?php } else { ?>
                                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>

                                    <?php }?>
                                </footer>
        						<p><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>	
                                <form class="ajaxCart">
                                    <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" />
                                    <input type="submit" value="Buy" name="ajaxItem" />
                                </form>						
        					</div>
                        <?php } ?>
					</div>
					<ul class="actions">
						<li><a href="products.php" class="button icon fa-file">Our Products</a></li>
					</ul>
				</section>		
			</div><?php }} ?>
