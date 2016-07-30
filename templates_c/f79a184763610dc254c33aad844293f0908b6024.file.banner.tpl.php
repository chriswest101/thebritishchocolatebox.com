<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-22 11:31:56
         compiled from "./templates/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78298575355aa8c39c6cf53-47887046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f79a184763610dc254c33aad844293f0908b6024' => 
    array (
      0 => './templates/banner.tpl',
      1 => 1469179911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78298575355aa8c39c6cf53-47887046',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55aa8c39de35a9_31940954',
  'variables' => 
  array (
    'SITE_NAME' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55aa8c39de35a9_31940954')) {function content_55aa8c39de35a9_31940954($_smarty_tpl) {?>    		<!-- Features -->
			<div id="features-wrapper">
				<section id="features" class="container">
					<header>
						<h2><strong><?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
</strong></h2>
					</header>
					<div class="row">
                    
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
        					<div class="4u" style="width: 25%;padding: 25px 25px 25px 25px;min-height: 36em;position: relative;">
        						<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" class="image featured"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="" width="100" /></a>
        						<header>
        							<h3><a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
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
        						<p><?php if (strlen($_smarty_tpl->tpl_vars['product']->value['description'])>50) {
echo substr($_smarty_tpl->tpl_vars['product']->value['description'],0,50);?>
...<?php } else {
echo $_smarty_tpl->tpl_vars['product']->value['description'];
}?></p>	
                                <form class="ajaxCart" style="position: absolute;bottom: 2em;right: 0;left: 0;">
                                    <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" />
                                    <input type="hidden" name="qty" value="1" />
                                    <input type="submit" value="Buy" name="ajaxItem" />
                                </form>						
        					</div>
                        <?php } ?>
					</div>
					<ul class="actions">
						<li><a href="products" class="button icon fa-file">Our Products</a></li>
					</ul>
				</section>		
			</div><?php }} ?>
