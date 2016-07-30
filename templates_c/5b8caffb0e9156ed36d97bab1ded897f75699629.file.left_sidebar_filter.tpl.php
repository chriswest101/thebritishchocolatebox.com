<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-22 10:58:40
         compiled from "./templates/left_sidebar_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:957570122564b31037c4331-90891252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b8caffb0e9156ed36d97bab1ded897f75699629' => 
    array (
      0 => './templates/left_sidebar_filter.tpl',
      1 => 1469177885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '957570122564b31037c4331-90891252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_564b3103842841_88807784',
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'manufacture' => 0,
    'selected' => 0,
    'manufacturers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564b3103842841_88807784')) {function content_564b3103842841_88807784($_smarty_tpl) {?><section class="mobileSideBarHeader">
    <input type="button" value="Close Filter" onclick="$('.mobileSideBar').toggle();" class="mobileSideBarButton" />
</section>

<!-- Excerpts -->
<section>
    <form action="products" method="post" onsubmit="showLoader();">
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
            
                    
                    
                    <p>
                        <input type="checkbox" name="category[<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
]" id="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" class="css-checkbox filterProducts" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['selected']->value[$_smarty_tpl->tpl_vars['manufacture']->value['name']])) {?>checked="" style="background-position: 0 -35px;"<?php }?> />
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
            
                    
                    
                    <p>
                        <input type="checkbox" name="manufacturers[<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
]" id="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" class="css-checkbox filterProducts" value="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['selected']->value[$_smarty_tpl->tpl_vars['manufacture']->value['name']])) {?>checked="" style="background-position: 0 -35px;"<?php }?> />
                        <label for="<?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
" class="css-label radGroup1" style="border:none;"><?php echo $_smarty_tpl->tpl_vars['manufacture']->value['name'];?>
</label>
					</p>
                    
            	</article>
			</li>
            <?php } ?>
        </ul>
        
        <section>
            <input type="submit" name="filterProducts" value="Update" />
            <a href="products">Clear All</a>
        </section>
        
    </form>
</section><?php }} ?>
