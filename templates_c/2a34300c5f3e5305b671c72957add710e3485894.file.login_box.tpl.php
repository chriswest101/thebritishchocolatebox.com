<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:02
         compiled from "./templates/login_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110448092455da1c4759e321-99803429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a34300c5f3e5305b671c72957add710e3485894' => 
    array (
      0 => './templates/login_box.tpl',
      1 => 1447768680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110448092455da1c4759e321-99803429',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55da1c475f88b7_52271648',
  'variables' => 
  array (
    'wrongDetails' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55da1c475f88b7_52271648')) {function content_55da1c475f88b7_52271648($_smarty_tpl) {?>    <h3 class="cartTD">Already have an account?</h3>
    <form action="checkout" method="post">
        <table>
            <?php if ($_smarty_tpl->tpl_vars['wrongDetails']->value) {?>
                <tr>
                    <td colspan="2" class="error" style="text-align:center;">Sorry the username or password was incorrect</td>
                </tr>
            <?php }?>
            <tr>
                <th>Email Address</th>
                <td class="cartTD" style="border:none;"><input type="text" name="email_address" value=""/></td>
            </tr>
            <tr>
                <th>Password</th>
                <td class="cartTD" style="border:none;"><input type="password" name="password" id="password" value=""/></td>
            </tr>
            <tr>
                <td colspan="2" class="alignRight"><input type="submit" name="signin" value="Sign In"/></td>
            </tr>
        </table>
    </form><?php }} ?>
