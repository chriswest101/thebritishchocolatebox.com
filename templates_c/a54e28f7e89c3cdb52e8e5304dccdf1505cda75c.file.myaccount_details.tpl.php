<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-26 14:00:36
         compiled from "./templates/myaccount_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2054464552a7cb7a0cdd0-44353499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a54e28f7e89c3cdb52e8e5304dccdf1505cda75c' => 
    array (
      0 => './templates/myaccount_details.tpl',
      1 => 1430049628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2054464552a7cb7a0cdd0-44353499',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552a7cb7a0eff5_47293345',
  'variables' => 
  array (
    'stage' => 0,
    'states' => 0,
    'state' => 0,
    'countries' => 0,
    'country' => 0,
    'editAddress' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552a7cb7a0eff5_47293345')) {function content_552a7cb7a0eff5_47293345($_smarty_tpl) {?>
<form id="checkoutDetails" action="checkout.php" method="post">
    <?php if ($_smarty_tpl->tpl_vars['stage']->value!="checkout") {?>
        <h3 class="cartTD">Your Details</h3>
        <table>
            <tr>
                <th>Email Address</th>
                <td class="cartTD"><input type="text" name="email_address" value="" required/></td>
            </tr>
            <tr>
                <th>Password</th>
                <td class="cartTD"><input type="password" name="password" id="password" value="" required/></td>
            </tr>
            <tr>
                <th>Confirm Password</th>
                <td class="cartTD"><input type="password" name="password_confirm" value="" class="confirmPass" /></td>
            </tr>
        </table>
    <?php }?>
    <h3 class="cartTD">Your Address</h3>
    <table>
        <tr>
            <th>Your Name</th>
            <td class="cartTD"><input type="text" name="name" value="<?php if ($_SESSION['address']['name']) {
echo $_SESSION['address']['name'];
}?>" required/></td>
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td class="cartTD"><input type="text" name="address_1" value="<?php if ($_SESSION['address']['address_1']) {
echo $_SESSION['address']['address_1'];
}?>" required/></td>
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td class="cartTD"><input type="text" name="address_2" value="<?php if ($_SESSION['address']['address_2']) {
echo $_SESSION['address']['address_2'];
}?>" /></td>
        </tr>
        <tr>
            <th>Town/City</th>
            <td class="cartTD"><input type="text" name="town" value="<?php if ($_SESSION['address']['town']) {
echo $_SESSION['address']['town'];
}?>" required/></td>
        </tr>
        <tr>
            <th><?php if ($_SESSION['location']=="USA") {?>State<?php } else { ?>County<?php }?></th>
            <td class="cartTD">
                <select name="state">
                    <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['state']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['state'];?>
" <?php if ($_SESSION['address']['county']==$_smarty_tpl->tpl_vars['state']->value['state']) {?>selected=""<?php }?> ><?php echo $_smarty_tpl->tpl_vars['state']->value['state'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><?php if ($_SESSION['location']=="USA") {?>Zip Code<?php } else { ?>Postcode<?php }?></th>
            <td class="cartTD"><input type="text" name="postcode" value="<?php if ($_SESSION['address']['postcode']) {
echo $_SESSION['address']['postcode'];
}?>" /></td>
        </tr>
        <tr>
            <th>Country</th>
            <td class="cartTD">
                <select name="country">
                    <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['country']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['country']->value['country_code']==$_SESSION['location']) {?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td class="cartTD alignRight" style="border-bottom:none;"><input type="submit" value="Save Details" name="<?php if ($_smarty_tpl->tpl_vars['editAddress']->value) {?>enterEditAddress<?php } else { ?>enterCustDetails<?php }?>" /></td>
        </tr>
    </table>
</form><?php }} ?>
