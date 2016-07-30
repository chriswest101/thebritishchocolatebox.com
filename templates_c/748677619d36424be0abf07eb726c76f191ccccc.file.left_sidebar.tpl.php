<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-17 22:33:20
         compiled from "./templates/left_sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174845994155abdbcbe15640-22349386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '748677619d36424be0abf07eb726c76f191ccccc' => 
    array (
      0 => './templates/left_sidebar.tpl',
      1 => 1447768684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174845994155abdbcbe15640-22349386',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55abdbcbf1d0d4_76594533',
  'variables' => 
  array (
    'pageType' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55abdbcbf1d0d4_76594533')) {function content_55abdbcbf1d0d4_76594533($_smarty_tpl) {?><!-- Sidebar -->
<div id="sidebar" class="4u mobileSideBar">
    
    <?php if ($_smarty_tpl->tpl_vars['pageType']->value=="products") {?>
    
        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar_filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    <?php } else { ?>
    
        <?php echo $_smarty_tpl->getSubTemplate ("left_sidebar_products.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    <?php }?>
        
        
</div><?php }} ?>
