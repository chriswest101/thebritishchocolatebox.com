<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-25 15:41:05
         compiled from "./templates/totals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1644725108552a37926e6279-36580336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0383892b4b098dbf70e747a167ed3d5620d12197' => 
    array (
      0 => './templates/totals.tpl',
      1 => 1429969263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644725108552a37926e6279-36580336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552a37927598a6_40835833',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552a37927598a6_40835833')) {function content_552a37927598a6_40835833($_smarty_tpl) {?>
<table>
    <?php if ($_SESSION['checkout']['totals']['savings_total']!=$_SESSION['checkout']['totals']['gross_total']) {?>
        <tr>       
            <th colspan="10" class="alignRight"><h4>Discount</h4></th>
            <td colspan="1" class="cartTD" style="max-width: 6em;">-<?php echo priceFormat(array('value'=>$_SESSION['checkout']['totals']['savings_total'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>
</td>
        </tr>
    <?php }?>
    <tr>
        <th colspan="10" class="alignRight"><h4>Delivery</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;"><?php echo priceFormat(array('value'=>$_SESSION['checkout']['totals']['delivery'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>
</td>
    </tr>
    <tr>
        <th colspan="10" class="alignRight"><h4>VAT</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;"><?php echo priceFormat(array('value'=>$_SESSION['checkout']['totals']['order_vat'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>
</td>
    </tr>
    <tr>
        <th colspan="10" class="alignRight"><h4>Total</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;"><?php echo priceFormat(array('value'=>$_SESSION['checkout']['totals']['gross_total'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>
</td>
    </tr>
</table><?php }} ?>
