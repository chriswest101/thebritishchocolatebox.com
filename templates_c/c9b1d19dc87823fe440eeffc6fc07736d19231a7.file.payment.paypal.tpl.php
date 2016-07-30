<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 16:24:47
         compiled from "./templates/payment.paypal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6410799815544b3cf7bc8e6-22664230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9b1d19dc87823fe440eeffc6fc07736d19231a7' => 
    array (
      0 => './templates/payment.paypal.tpl',
      1 => 1430576685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6410799815544b3cf7bc8e6-22664230',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5544b3cf7c8fc6_00944677',
  'variables' => 
  array (
    'paymentMethod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5544b3cf7c8fc6_00944677')) {function content_5544b3cf7c8fc6_00944677($_smarty_tpl) {?><div id="checkoutPaypal" style="display:block;">
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
