<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-18 18:15:47
         compiled from "./templates/product.item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36330554855e419416c19b2-19431087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '517a95a57fffcc3cbfd87d0b6d77243ace9281d7' => 
    array (
      0 => './templates/product.item.tpl',
      1 => 1447768685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36330554855e419416c19b2-19431087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e419417d9161_33662957',
  'variables' => 
  array (
    'product' => 0,
    'product_nutrition' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e419417d9161_33662957')) {function content_55e419417d9161_33662957($_smarty_tpl) {?>            <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        
                        <!-- Features -->
                        <div id="content" class="8u important(collapse)">
                			<div id="features-wrapper">
                				<section id="features" class="container" style="  width: 100%;">
                					<header>
                						<h2><a style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h2>
                                        
                                        
                					</header>
                                    <section style="display:inline-block; width:50%;">
                                        <a class="image featured productImage" style="cursor:pointer; display:inline-blocka;"><img src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" width="60%" /></a>
                                    </section>
                					<section class="relative" style="display:inline-block; width:49%;position: relative;vertical-align: top;">
                                        <section style="text-align:right;">
                                            <form class="ajaxCart">
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                                                <br />
                                                <?php if ($_smarty_tpl->tpl_vars['product_nutrition']->value['kcal']) {?>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">
                                                            Energy<br />
                                                            <span class="nutritionSpan"><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['kcal'];?>
kcal</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">
                                                            Fat<br />
                                                            <span class="nutritionSpan"><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['fat'];?>
g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner"> 
                                                            Saturates  <br />                                             
                                                            <span class="nutritionSpan"><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['saturates'];?>
g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner"> 
                                                            Sugars  <br />                                                 
                                                            <span class="nutritionSpan"><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['sugars'];?>
g</span>
                                                        </div>
                                                    </div>
                                                    <div class="nutritionOuter">
                                                        <div class="nutritionInner">   
                                                            Salt<br />
                                                            <span class="nutritionSpan"><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['salt'];?>
g</span>
                                                        </div>
                                                    </div>
                                                    <p><?php echo $_smarty_tpl->tpl_vars['product_nutrition']->value['per'];?>
</p>
                                                <?php }?>
                                                <br /><br />
                                                <form class="ajaxCart">
                                                    <input type="number" name="qty" value="1" class="inputQty" min="1" max="15" style="display:inline-block;" />
                                                    <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['prod_code'];?>
" />
                                                    <input type="submit" value="Buy" name="ajaxItem" style="padding: 0.65em 2em 0.65em 2em;display:inline-block;" />
                                                </form>	
                                                
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=0.00) {?>
                                                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency'],'class'=>"pricestrike"),$_smarty_tpl);?>

                                                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['sale_price'],'currency'=>$_SESSION['currency'],'class'=>"pricesale"),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                    <?php echo priceFormat(array('value'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_SESSION['currency']),$_smarty_tpl);?>

                                                <?php }?>                                               	
                                                
                                            </form>
                                        </section>
                                        <section id="productList">
                                            <?php echo $_smarty_tpl->getSubTemplate ("product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        </section>
                                        <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                        <footer class="loaderAjax" id="ajaxProductLoader" style="position:inherit;">
                                            <img src="img/cube.svg" />
                                        </footer>
                                    </section>
                				</section>		
                			</div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal" id="modal" aria-hidden="true" style="display:none;">
                            <div class="modal-dialog" id="modalContent">
                                
                            </div>
                        </div>
                        <!-- /Modal -->
                        
					</div>
				</div>
                
                <div class="screen">
                </div>
                
			</div><?php }} ?>
