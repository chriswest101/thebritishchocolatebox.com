<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 16:22:27
         compiled from "./templates/payment.secure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18484857905544b3cf7ce134-62080080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a7daf5a6c2adc97f1cafb6e6abcfbecc2e7b7e1' => 
    array (
      0 => './templates/payment.secure.tpl',
      1 => 1430576197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18484857905544b3cf7ce134-62080080',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5544b3cf7d95a1_56420317',
  'variables' => 
  array (
    'paymentMethod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5544b3cf7d95a1_56420317')) {function content_5544b3cf7d95a1_56420317($_smarty_tpl) {?><div id="checkoutSecure" style="display:none;">
    <h4>Payment Method - <?php echo $_smarty_tpl->tpl_vars['paymentMethod']->value;?>
</h4>
    <table>
        <tr>
            <td>You have chosen our secure online checkout system to take payment</td>
        </tr>
        <tr>
            <td><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" width="230" style="vertical-align: middle;"/></td>
        </tr>
    </table>
</div><?php }} ?>
