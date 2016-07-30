<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-22 16:10:48
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26527525654e8ae28bfdaf6-93324722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '817a0a86c5df52a95bbc908b240bb65f03d5056d' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1424617846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26527525654e8ae28bfdaf6-93324722',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e8ae28c732e8_38595178',
  'variables' => 
  array (
    'company' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e8ae28c732e8_38595178')) {function content_54e8ae28c732e8_38595178($_smarty_tpl) {?>    <!-- Footer -->
    <footer>
        <div class="banner-footer" style="position:relative;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-4">
                            <h5 class="chocolate"><img src="img/logo.png" class="inline" width="25" /> The British Chocolate Box</h5>
                            <p class="copyright text-muted small">Copyright &copy; <?php echo $_smarty_tpl->tpl_vars['company']->value;?>
 <?php echo date("Y");?>
. All Rights Reserved</p>
                        </div>
                        <div class="col-md-4">
                            <ul class="list">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#about">About</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#about">About</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="copyright text-muted small">Connect</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="img/footer-bg.jpg" style="position:absolute;left: 0;" class="img-responsive" />
        </div>
    </footer>

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }} ?>
