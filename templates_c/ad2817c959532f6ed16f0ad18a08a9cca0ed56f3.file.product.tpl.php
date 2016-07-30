<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-12 10:46:37
         compiled from "./templates/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:638405375520f1fa28a997-42327745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad2817c959532f6ed16f0ad18a08a9cca0ed56f3' => 
    array (
      0 => './templates/product.tpl',
      1 => 1428828395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '638405375520f1fa28a997-42327745',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5520f1fa33df30_81345640',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5520f1fa33df30_81345640')) {function content_5520f1fa33df30_81345640($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
    <article class="productContainer">
		<a href="#" class="image featured productImage"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="" width="100" /></a>
		<header>
			<h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h3>
		</header>
        <footer class="productFooter">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=0.00) {?>
                <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency'],'class'=>"pricestrike"),$_smarty_tpl);?>

                <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['sale_price'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>

            <?php } else { ?>
                <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>

            <?php }?>
        </footer>	
        <form class="ajaxCart">
            <input type="number" name="qty" value="1" class="inputQty" min="1" max="15" style="display:inline-block;" />
            <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" />
            <input type="submit" value="Buy" name="ajaxItem" style="padding: 0.65em 2em 0.65em 2em;display:inline-block;" />
        </form>						
	</article>
<?php } ?><?php }} ?>
