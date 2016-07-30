<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:22
         compiled from "./templates/checkout_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35409729255e2db99c992d2-23852804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3046847615f304f472c7bc0c153f1757582367fc' => 
    array (
      0 => './templates/checkout_address.tpl',
      1 => 1447768680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35409729255e2db99c992d2-23852804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2db99e60537_62762551',
  'variables' => 
  array (
    'checkoutStage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2db99e60537_62762551')) {function content_55e2db99e60537_62762551($_smarty_tpl) {?><div>
    <h4>Your Address</h4>
    <table>
        <tr>
            <td><?php echo $_SESSION['address']['name'];?>
</td>
        </tr>
        <tr>
            <td><?php echo $_SESSION['address']['address_1'];?>
</td>
        </tr>
        <?php if ($_SESSION['address']['address_2']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['address_2'];?>
</td>
            </tr>
        <?php }?>
        <?php if ($_SESSION['address']['address_3']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['address_3'];?>
</td>
            </tr>
        <?php }?>
        <?php if ($_SESSION['address']['town']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['town'];?>
</td>
            </tr>
        <?php }?>
        <?php if ($_SESSION['address']['county']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['county'];?>
</td>
            </tr>
        <?php }?>
        <?php if ($_SESSION['address']['postcode']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['postcode'];?>
</td>
            </tr>
        <?php }?>
        <?php if ($_SESSION['address']['country']) {?>
            <tr>
                <td><?php echo $_SESSION['address']['country'];?>
</td>
            </tr>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['checkoutStage']->value) {?>
            <tr>
                <td><form action="checkout" method="post"><input type="submit" value="Edit" name="editAddress" /></form></td>
            </tr>
        <?php }?>
    </table>
</div><?php }} ?>
