<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-11 17:23:22
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119941511555a134ea7f5860-37482092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faa21b80e698e293251cbb8e3a622e1f5046e4a7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1430056388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119941511555a134ea7f5860-37482092',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a134ea827bc6_09545706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a134ea827bc6_09545706')) {function content_55a134ea827bc6_09545706($_smarty_tpl) {?>		<!-- Footer -->
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
                                            <input type="hidden" name="sendMessage" value="yes" />
											<a href="#" class="form-button-submit button icon fa-envelope" id="sendMessage">Send Message</a>
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
												Okehampton, Devon EX20 1LP<br />
												UK
											</li>
											<li class="icon fa-phone">
												(01837) 52728
											</li>
											<li class="icon fa-envelope">
												<a href="#">info@thebritishchocolatebox.com</a>
											</li>
										</ul>
									</div>
									<div class="6u">
										<ul class="icons">
											<li class="icon fa-twitter">
												<a href="#">@britishchoc</a>
											</li>
											<li class="icon fa-instagram">
												<a href="#">instagram.com/britishchoc</a>
											</li>
											<li class="icon fa-dribbble">
												<a href="#">dribbble.com/britishchoc</a>
											</li>
											<li class="icon fa-facebook">
												<a href="#">facebook.com/britishchoc</a>
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
						<li>&copy; The British Chocolate Box. All rights reserved.</li><li>Design: <a href="http://christophermwest.co.uk">Christopher West</a></li>
					</ul>
				</div>
			</div><?php }} ?>
