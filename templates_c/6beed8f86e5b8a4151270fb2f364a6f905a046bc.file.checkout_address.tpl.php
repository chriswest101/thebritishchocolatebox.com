<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-26 14:02:36
         compiled from "./templates/checkout_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9134595455532975222ef06-11191668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6beed8f86e5b8a4151270fb2f364a6f905a046bc' => 
    array (
      0 => './templates/checkout_address.tpl',
      1 => 1430049681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9134595455532975222ef06-11191668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553297522a5919_79105671',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553297522a5919_79105671')) {function content_553297522a5919_79105671($_smarty_tpl) {?><div>
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
        <tr>
            <td><form action="checkout.php" method="post"><input type="submit" value="Edit" name="editAddress" /></form></td>
        </tr>
    </table>
</div><?php }} ?>
