<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-22 16:13:10
         compiled from "./templates/buy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82757347754e9bc2e32a573-94102654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38d92e2d67e216ba7444de2fea33781c824001cf' => 
    array (
      0 => './templates/buy.tpl',
      1 => 1424617988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82757347754e9bc2e32a573-94102654',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54e9bc2e4654e4_81551736',
  'variables' => 
  array (
    'boxes' => 0,
    'box' => 0,
    'counter' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e9bc2e4654e4_81551736')) {function content_54e9bc2e4654e4_81551736($_smarty_tpl) {?>
    <!-- Page Content -->
    <form name="createBox" id="createBox">
        <div class="content-section-a" style="padding-top: 60px;padding-bottom: 0px;">
    
            <div class="container txtcenter">
                <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['box'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['box']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['boxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['box']->key => $_smarty_tpl->tpl_vars['box']->value) {
$_smarty_tpl->tpl_vars['box']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['box']->key;
?>
                <label> 
                    <input type='radio' name='box_size' value='<?php echo $_smarty_tpl->tpl_vars['box']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['box']->value['max_items'];?>
' style="display: none;" class="radio_box_size">
                
                    <div class="inline">
                        <div>
                            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['box']->value['image_path'];?>
" alt="">
                        </div>
                        <div class="txtcenter">
                            <hr class="section-heading-spacer" id="<?php echo $_smarty_tpl->tpl_vars['box']->value['name'];?>
-<?php echo $_smarty_tpl->tpl_vars['box']->value['max_items'];?>
">
                            <div class="clearfix"></div>
                            <h2 class="section-heading"><?php echo $_smarty_tpl->tpl_vars['box']->value['name'];?>
</h2>
                        </div>
                    </div>
                </label> 
                <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable($_smarty_tpl->tpl_vars['counter']->value+1, null, 0);?>
                <?php } ?>
            </div>
            <!-- /.container -->
    
        </div> 
        
        <div style="position:relative;">
            <div class="content-section-a">
            
                <div class="container txtright">
                    <div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">Your Box is 0% full</span>
                          </div>
                        </div>
                        <input type="submit" value="Create Box" class="submitBtn" />
                    </div>
                </div>
            </div>
            
            <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable(1, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                <div class="content-section-a">
            
                    <div class="container">
                        <div class="row">
                            <div class="floatright col-sm-6 txtcenter">
                                <img class="img-responsive" src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['image_path'];?>
" width="150" alt="">
                                <input type="number" name="quantity" min="1" max="10" class="qty" value="1" >
                                <input type="hidden" name="product_code" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_code'];?>
" >
                                <a class="btn">Add To Box</a>
                            </div>
                            <div class="floatright col-sm-6">
                                <hr class="section-heading-spacer">
                                <div class="clearfix"></div>
                                <h2 class="section-heading"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                                <p class="lead"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.container -->
            
                </div>   
                
                <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable($_smarty_tpl->tpl_vars['counter']->value+1, null, 0);?>
            <?php } ?>
            
            <div class="content-section-a">
                <div class="container txtright">
                    <input id="boxID" type="text" />
                    <input id="boxLimit" type="text" />
                    <input id="boxSize" type="text" />
                    
                    <input type="submit" value="Create Box" class="submitBtn" />                    
                </div>
            </div>
            
            <div class="screen">
                <img class="img-responsive" src="img/start_here.png" alt="">
            </div>
              
        </div>
        
    </form>
        
<?php }} ?>
