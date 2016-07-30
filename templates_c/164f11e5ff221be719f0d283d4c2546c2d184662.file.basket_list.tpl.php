<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:00:51
         compiled from "./templates/basket_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116067932255da1c42b48aa3-28664600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '164f11e5ff221be719f0d283d4c2546c2d184662' => 
    array (
      0 => './templates/basket_list.tpl',
      1 => 1447768684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116067932255da1c42b48aa3-28664600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55da1c42cfdc97_60065366',
  'variables' => 
  array (
    'stage' => 0,
    'cart' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55da1c42cfdc97_60065366')) {function content_55da1c42cfdc97_60065366($_smarty_tpl) {?><section id="basketList">
    <table>
        <thead>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Qty</th>
            <?php if ($_smarty_tpl->tpl_vars['stage']->value=="cart") {?>
                <th>Options</th>
            <?php }?>
            <th>Total</th>
        </thead>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
                <td class="cartTD">
                    <img src="img/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image_path'];?>
" width="50" />
                </td>
                <td class="cartTD">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                </td>
                <td class="cartTD" <?php if ($_smarty_tpl->tpl_vars['stage']->value=="cart") {?>colspan="2"<?php }?>>
                    <form class="inlineBlock" action="cart" method="post">
                        <?php if ($_smarty_tpl->tpl_vars['stage']->value=="cart") {?>
                            <input type="number" name="qty" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
" class="inputQty" min="1" max="15" />
                            
                            <input type="hidden" name="prod_code" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['prod_code'];?>
" />
                            <input type="submit" value="Update" class="smallButton" name="update" />
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>

                        <?php }?>
                    </form>
                    <?php if ($_smarty_tpl->tpl_vars['stage']->value=="cart") {?>
                        <form class="inlineBlock" action="cart" method="post">
                            <input type="hidden" name="prod_code" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['prod_code'];?>
" />
                            <input type="submit" value="Remove" class="smallButton" name="remove" />
                        </form>
                    <?php }?>
                </td>
                <td class="cartTD">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['sale_total']!=0.00) {?>
                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['item']->value['price_total'],'currency'=>$_SESSION['currency'],'class'=>"pricestrike"),$_smarty_tpl);?>

                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['item']->value['sale_total'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['item']->value['price_total'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>

                    <?php }?>
                </td>
            </tr>
        <?php } ?>
    </table>
</section><?php }} ?>
