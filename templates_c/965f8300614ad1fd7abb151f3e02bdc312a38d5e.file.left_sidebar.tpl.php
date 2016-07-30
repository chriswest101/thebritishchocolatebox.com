<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-25 13:55:16
         compiled from "./templates/left_sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18373727755203934ab7d55-07811653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '965f8300614ad1fd7abb151f3e02bdc312a38d5e' => 
    array (
      0 => './templates/left_sidebar.tpl',
      1 => 1429962903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18373727755203934ab7d55-07811653',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55203934abd498_66209515',
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'manufacturers' => 0,
    'manufacture' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55203934abd498_66209515')) {function content_55203934abd498_66209515($_smarty_tpl) {?>        				<!-- Sidebar -->
        				<div id="sidebar" class="4u">
        				
        					<!-- Excerpts -->
        						<section>
                                
                                    <section>
        								<p>
        									Search by category
        								</p>
        							</section>
        							<ul class="divided">
                                    
                                        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
                                        <li>
                                            <article class="box excerpt">
                                        
                                                <header>
    												<h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></h3>
    											</header>
                                                
                                                <p>
                                                    <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" class="css-checkbox filterProducts" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" />
                                                    <label for="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" class="css-label radGroup1" style="border:none;"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</label>
        										</p>
                                                
                                        	</article>
        								</li>
                                        <?php } ?>
                                    </ul>
                                    
                                    <section>
        								<p>
        									Search by Manufacturer
        								</p>
        							</section>
                                    
                                    <ul class="divided">
                                    
                                        <?php  $_smarty_tpl->tpl_vars['manufacture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacture']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manufacture']->key => $_smarty_tpl->tpl_vars['manufacture']->value) {
$_smarty_tpl->tpl_vars['manufacture']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['manufacture']->key;
?>
                                        <li>
                                            <article class="box excerpt">
                                        
                                                <header>
    												<h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
</a></h3>
    											</header>
                                                
                                                <p>
                                                    <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" class="css-checkbox filterProducts" value="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" />
                                                    <label for="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" class="css-label radGroup1" style="border:none;"><?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
</label>
        										</p>
                                                
                                        	</article>
        								</li>
                                        <?php } ?>
                                    </ul>
                                        
        						</section>
                                
              </div><?php }} ?>
