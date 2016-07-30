<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:22
         compiled from "./templates/payment.paypal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137944203155e2db99e7de99-05850562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b13c0d1e135e9c13678bcc1344c4cb033c87a9a' => 
    array (
      0 => './templates/payment.paypal.tpl',
      1 => 1447768685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137944203155e2db99e7de99-05850562',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2db99e9b929_05813814',
  'variables' => 
  array (
    'paymentMethod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2db99e9b929_05813814')) {function content_55e2db99e9b929_05813814($_smarty_tpl) {?><div id="checkoutPaypal" style="display:block;">
    <h4>Payment Method - <?php echo $_smarty_tpl->tpl_vars['paymentMethod']->value;?>
</h4>
    <table>
        <tr>
            <td>You have chosen PayPal as your payment method. We will 
            take payment for your items using their secure online system
            </td>
        </tr>
        <tr>
            <td><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" width="230" style="vertical-align: middle;"/></td>
        </tr>
    </table>
</div><?php }} ?>
