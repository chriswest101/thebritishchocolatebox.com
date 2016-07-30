<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-22 11:58:59
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9749524954e8b60347ea22-40870054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6383bab8e9eb9030894eae893271554227eac0b6' => 
    array (
      0 => './templates/index.tpl',
      1 => 1424602738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9749524954e8b60347ea22-40870054',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e8b6034dd609_37038917',
  'variables' => 
  array (
    'products' => 0,
    'counter' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e8b6034dd609_37038917')) {function content_54e8b6034dd609_37038917($_smarty_tpl) {?>
    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>The British Chocolate Box</h1>
                        <h3>All your british chocolate</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable(1, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
        <div class="content-section-<?php if (!(1 & $_smarty_tpl->tpl_vars['counter']->value)) {?>a<?php } else { ?>b<?php }?>">
    
            <div class="container">
                <div class="row">
                    <div class="<?php if (!(1 & $_smarty_tpl->tpl_vars['counter']->value)) {?>floatright<?php } else { ?>floatleft<?php }?> col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                        <p class="lead"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
                    </div>
                    <div class="<?php if (!(1 & $_smarty_tpl->tpl_vars['counter']->value)) {?>floatright<?php } else { ?>floatleft<?php }?> col-sm-6">
                        <img class="img-responsive" src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" width="300" alt="">
                    </div>
                </div>
            </div>
            <!-- /.container -->
    
        </div>   
        
        <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable($_smarty_tpl->tpl_vars['counter']->value+1, null, 0);?>
    <?php } ?>

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Start Bootstrap:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner --><?php }} ?>
