<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-02 16:23:02
         compiled from "./templates/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163767180552037912d12d8-27806280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a52556864ea961421c31ab8c4763087cc0f8f18e' => 
    array (
      0 => './templates/products.tpl',
      1 => 1430575811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163767180552037912d12d8-27806280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552037913b14c7_01891079',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552037913b14c7_01891079')) {function content_552037913b14c7_01891079($_smarty_tpl) {?>            <!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
                        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        
                        <!-- Features -->
                        <div id="content" class="8u important(collapse)">
            			<div id="features-wrapper">
            				<section id="features" class="container" style="  width: 100%;">
            					<header>
            						<h2><strong>The British Chocolate Box</strong></h2>
            					</header>
            					<section class="relative">
                                    <section id="productList">
                                        <?php echo $_smarty_tpl->getSubTemplate ("product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                    </section>
                                    <?php echo $_smarty_tpl->getSubTemplate ("loader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                </section>
            				</section>		
            			</div>
                        </div>
                        
					</div>
				</div>

			</div><?php }} ?>
