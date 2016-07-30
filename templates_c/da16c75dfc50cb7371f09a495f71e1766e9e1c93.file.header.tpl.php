<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-22 11:23:46
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199244757655aa8c39a5b8e2-98617852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da16c75dfc50cb7371f09a495f71e1766e9e1c93' => 
    array (
      0 => './templates/header.tpl',
      1 => 1469179384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199244757655aa8c39a5b8e2-98617852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55aa8c39b939f2_53746533',
  'variables' => 
  array (
    'SITE_NAME' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55aa8c39b939f2_53746533')) {function content_55aa8c39b939f2_53746533($_smarty_tpl) {?><!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cadbury British Chocolate: <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><?php echo '<script'; ?>
 src="css/ie/html5shiv.js"><?php echo '</script'; ?>
><![endif]-->
		<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/skel.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/skel-layers.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="js/init.js"><?php echo '</script'; ?>
>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">

    <!-- Navigation -->
    <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
