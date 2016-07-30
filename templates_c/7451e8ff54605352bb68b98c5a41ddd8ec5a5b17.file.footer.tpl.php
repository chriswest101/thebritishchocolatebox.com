<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-07-22 11:34:32
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32636903155aa8c39e12341-31924898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7451e8ff54605352bb68b98c5a41ddd8ec5a5b17' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1469180057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32636903155aa8c39e12341-31924898',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55aa8c39e42129_07599803',
  'variables' => 
  array (
    'SITE_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55aa8c39e42129_07599803')) {function content_55aa8c39e42129_07599803($_smarty_tpl) {?>		<!-- Footer -->

			<div id="footer-wrapper">

				<div id="footer" class="container">

					<header>

						<h2>Questions or comments? <strong>Get in touch:</strong></h2>

					</header>

					<div class="row">

						<div class="6u">

							<section>

								<form method="post" action="#" id="contactForm">

									<div class="row 50%">

										<div class="6u">

											<input name="name" placeholder="Name" type="text" required/>

										</div>

										<div class="6u">

											<input name="email" placeholder="Email" type="text" required/>

										</div>

									</div>

									<div class="row 50%">

										<div class="12u">

											<textarea name="message" placeholder="Message" required></textarea>

										</div>

									</div>

									<div class="row 50%">

										<div class="12u">

                                            <input type="hidden" name="thetimer" value="<?php echo date("YmdHis");?>
" />

                                            <input type="hidden" name="mobile" value="" />

                                            <input type="hidden" name="sendMessage" value="yes" />

											<input class="form-button-submit button icon fa-envelope" value="Send Message" id="sendMessage" style="vertical-align: text-bottom;"/>

                                            <div style="display: inline-block;padding:3px;" id="messageResponse">

                                                

                                            </div>

										</div>

									</div>

								</form>

							</section>

						</div>

						<div class="6u">

							<section>

								<p>Want to ask us a question or got any comments? Just full in the form and we'll read your message.</p>

								<div class="row">

									<div class="6u">

										<ul class="icons">

											<li class="icon fa-home">

												10 Church Meadow<br />

												Okehampton<br />

											</li>

											

											<li class="icon fa-envelope">

												<a href="mailto:info@thebritishchocolatebox.com?Subject=Enquiry">info@thebritishchocolatebox.com</a>

											</li>

										</ul>

									</div>

									<div class="6u">

										<ul class="icons">

											

											<li class="icon fa-instagram">

												<a href="https://instagram.com/thebritishchocolatebox/">instagram.com/thebritishchocolatebox</a>

											</li>

											

										</ul>

									</div>

								</div>

							</section>

						</div>

					</div>

				</div>

				<div id="copyright" class="container">

					<ul class="links">

						<li>&copy; <?php echo $_smarty_tpl->tpl_vars['SITE_NAME']->value;?>
. All rights reserved.</li><li>Design: <a href="http://christophermwest.co.uk">Christopher West</a></li>

					</ul>

				</div>

			</div><?php }} ?>
