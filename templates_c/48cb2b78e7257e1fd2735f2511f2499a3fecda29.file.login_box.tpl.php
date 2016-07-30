<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-19 12:21:06
         compiled from "./templates/login_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11885048255337ff95c4ae8-25403878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48cb2b78e7257e1fd2735f2511f2499a3fecda29' => 
    array (
      0 => './templates/login_box.tpl',
      1 => 1429438864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11885048255337ff95c4ae8-25403878',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55337ff95c7471_81423102',
  'variables' => 
  array (
    'wrongDetails' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55337ff95c7471_81423102')) {function content_55337ff95c7471_81423102($_smarty_tpl) {?>    <h3 class="cartTD">Already have an account?</h3>
    <form action="checkout.php" method="post">
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
