<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-25 16:31:06
         compiled from "./templates/discount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:634178979552a4085939337-06370760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3227c893cfd58e62d83ceaddddc5cd5a16bc1f71' => 
    array (
      0 => './templates/discount.tpl',
      1 => 1429972264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '634178979552a4085939337-06370760',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552a408593ce10_06609300',
  'variables' => 
  array (
    'stage' => 0,
    'notFoundDiscount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552a408593ce10_06609300')) {function content_552a408593ce10_06609300($_smarty_tpl) {?>
<?php if ($_SESSION['checkout']['discount']['id']) {?>
    <h3 class="inlineBlock"><?php echo $_SESSION['checkout']['discount']['name'];?>
: -<?php echo priceFormat(array('value'=>$_SESSION['checkout']['discount']['discount_savings'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>
</h3>
    <?php if ($_smarty_tpl->tpl_vars['stage']->value=="checkout") {?>
        <form action="checkout.php?removeDiscount" method="post" class="inlineBlock">
            <input type="submit" value="Remove" class="smallButton" />
        </form>
    <?php }?>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['notFoundDiscount']->value) {?>
        <h4>Sorry that discount code is not valid or is no longer available</h4>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['stage']->value=="checkout") {?>
        <form action="checkout.php" method="post">
            <table>
                <tr>
                    <td class="cartTD alignRight" style="vertical-align: middle;max-width:2.5em;border-bottom: none;">Discount Code</td>
                    <td class="cartTD" style="vertical-align: middle;border-bottom: none;"><input type="text" value="" name="code" size="1" /></td>
                    <td class="cartTD" style="vertical-align: middle;border-bottom: none;"><input type="submit" value="Add" name="discount" class="smallButton"/></td>
                </tr>
            </table>
        </form>
    <?php }?>
<?php }?>
<?php }} ?>
