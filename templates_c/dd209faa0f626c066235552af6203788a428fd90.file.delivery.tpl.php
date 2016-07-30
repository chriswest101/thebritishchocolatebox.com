<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 13:28:26
         compiled from "./templates/delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149345830255327eb813a2d2-73818140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd209faa0f626c066235552af6203788a428fd90' => 
    array (
      0 => './templates/delivery.tpl',
      1 => 1430566103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149345830255327eb813a2d2-73818140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55327eb81ab483_53871201',
  'variables' => 
  array (
    'checkoutStage' => 0,
    'courier' => 0,
    'couriers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55327eb81ab483_53871201')) {function content_55327eb81ab483_53871201($_smarty_tpl) {?><?php if ($_SESSION['checkout']['delivery']['id']&&$_smarty_tpl->tpl_vars['checkoutStage']->value=="confirm") {?>
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
