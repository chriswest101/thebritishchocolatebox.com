<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-17 23:06:30
         compiled from "./templates/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144102246855abdbcbf23c12-03807848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abb1551504894f65164c08768294dffc4eb8f1a8' => 
    array (
      0 => './templates/product.tpl',
      1 => 1447768680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144102246855abdbcbf23c12-03807848',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55abdbcc0e6bf8_98081986',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55abdbcc0e6bf8_98081986')) {function content_55abdbcc0e6bf8_98081986($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
    <article class="productContainer">
		<a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" class="image featured productImage"  style="cursor:pointer;"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="" width="100" /></a>
		<header>
			<h3><a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
"  style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
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
