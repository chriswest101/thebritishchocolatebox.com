<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 17:51:35
         compiled from "./templates/modal_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119686278755db31fced1046-59149037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09789f186ad842eec650037a45e1605435dfc8ba' => 
    array (
      0 => './templates/modal_content.tpl',
      1 => 1440431479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119686278755db31fced1046-59149037',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db31fd0c2044_14641961',
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db31fd0c2044_14641961')) {function content_55db31fd0c2044_14641961($_smarty_tpl) {?><div class="modal-header" style="text-align:right;">
    <a href="#close" class="btn" onclick="closeModal();">Close Popup</a>  <!--CHANGED TO "#close"-->
</div>
<div class="modal-body">
    <article class="productContainer" style="width: 100%!important;">
		<div style="display:inline-block;width:30%;">
            <a href="#" class="image featured productImage" onclick="showModal('<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
');"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="" width="100" /></a>
		</div>
        <div style="display:inline-block;width:69%;vertical-align: top;text-align: right;">
            <header>
    			<h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h3>
    		</header>
            <footer class="productFooter">
                <?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=0.00) {?>
                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency'],'class'=>"pricestrike"),$_smarty_tpl);?>

                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['sale_price'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>

                <?php }?>
            </footer>	
            <form class="ajaxCart">
                <input type="number" name="qty" value="1" class="inputQty" min="1" max="15" style="display:inline-block;" />
                <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" />
                <input type="submit" value="Buy" name="ajaxItem" style="padding: 0.65em 2em 0.65em 2em;display:inline-block;" />
            </form>		
        </div>				
	</article>
</div>
<div class="modal-footer">
    <a href="#close" class="btn" onclick="closeModal();">Close Popup</a>  <!--CHANGED TO "#close"-->
</div><?php }} ?>
