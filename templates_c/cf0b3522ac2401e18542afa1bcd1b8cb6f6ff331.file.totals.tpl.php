<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:02
         compiled from "./templates/totals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96312317255da1c474e5909-15426474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf0b3522ac2401e18542afa1bcd1b8cb6f6ff331' => 
    array (
      0 => './templates/totals.tpl',
      1 => 1447768685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96312317255da1c474e5909-15426474',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55da1c47597736_09384593',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55da1c47597736_09384593')) {function content_55da1c47597736_09384593($_smarty_tpl) {?>
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
