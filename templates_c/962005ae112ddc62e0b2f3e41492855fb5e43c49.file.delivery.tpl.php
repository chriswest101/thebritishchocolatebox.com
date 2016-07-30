<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-09 20:01:02
         compiled from "./templates/delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9604555555da1c4737bf69-24898940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '962005ae112ddc62e0b2f3e41492855fb5e43c49' => 
    array (
      0 => './templates/delivery.tpl',
      1 => 1447768682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9604555555da1c4737bf69-24898940',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55da1c474ddd75_49559688',
  'variables' => 
  array (
    'checkoutStage' => 0,
    'courier' => 0,
    'couriers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55da1c474ddd75_49559688')) {function content_55da1c474ddd75_49559688($_smarty_tpl) {?><?php if ($_SESSION['checkout']['delivery']['id']&&$_smarty_tpl->tpl_vars['checkoutStage']->value=="confirm") {?>
    <div>
        <input type="radio" name="courier" id="courier<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
" class="radio" value="<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
" checked="" disabled="" />
        <label for="courier<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['courier']->value['courier_name'];?>
 <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['courier']->value['cost'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>
</label>
    </div>   
<?php } else { ?>
    <?php  $_smarty_tpl->tpl_vars['courier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['courier']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['couriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['courier']->key => $_smarty_tpl->tpl_vars['courier']->value) {
$_smarty_tpl->tpl_vars['courier']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['courier']->key;
?>
        <div>
            <input type="radio" name="courier" id="courier<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
" class="radio" value="<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
" onclick="updateDelivery('<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
')" <?php if ($_smarty_tpl->tpl_vars['courier']->value['id']==$_SESSION['checkout']['delivery']['id']) {?>checked=""<?php }
if (!$_SESSION['checkout']['delivery']['id']&&$_smarty_tpl->tpl_vars['courier']->value['id']==2) {?>checked=""<?php }?> />
            <label for="courier<?php echo $_smarty_tpl->tpl_vars['courier']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['courier']->value['courier_name'];?>
 <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['courier']->value['cost'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>
</label>
        </div>
    <?php } ?>
<?php }?><?php }} ?>
