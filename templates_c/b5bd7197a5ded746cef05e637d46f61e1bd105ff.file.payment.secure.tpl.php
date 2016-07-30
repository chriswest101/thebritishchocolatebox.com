<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:22
         compiled from "./templates/payment.secure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99915634355e2db99ea0e13-82142555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5bd7197a5ded746cef05e637d46f61e1bd105ff' => 
    array (
      0 => './templates/payment.secure.tpl',
      1 => 1447768685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99915634355e2db99ea0e13-82142555',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2db99ebd371_57989481',
  'variables' => 
  array (
    'paymentMethod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2db99ebd371_57989481')) {function content_55e2db99ebd371_57989481($_smarty_tpl) {?><div id="checkoutSecure" style="display:none;">
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
