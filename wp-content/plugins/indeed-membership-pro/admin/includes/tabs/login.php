<script>
	jQuery(document).ready(function(){
		ihcLoginPreview();
	});
</script>
<div class="ihc-subtab-menu">
	<a class="ihc-subtab-menu-item <?php echo ($_REQUEST['subtab'] =='design' || !isset($_REQUEST['subtab'])) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=design';?>"><?php _e('Login Showcase', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo ($_REQUEST['subtab'] =='msg') ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=msg';?>"><?php _e('Custom Messages', 'ihc');?></a>
	<div class="ihc-clear"></div>
</div>
<?php
	echo ihc_inside_dashboard_error_license();
	//set default pages message
	echo ihc_check_default_pages_set();
	echo ihc_check_payment_gateways();
	echo ihc_is_curl_enable();
	do_action( "ihc_admin_dashboard_after_top_menu" );
	$login_templates = array(
							  13 => '(#13) '.__('Ultimate Member', 'ihc'),
							  12 => '(#12) '.__('MegaBox', 'ihc'),
							  11 => '(#11) '.__('Flat New Style', 'ihc'),
							  10 => '(#10) '.__('Simple BootStrap Theme', 'ihc'),
							  9 => '(#9) '.__('Radius Gradient Theme', 'ihc'),
							  8 => '(#8) '.__('Border Pink Theme', 'ihc'),
							  7 => '(#7) '.__('Double Long Theme', 'ihc'),
							  6 => '(#6) '.__('Premium Theme', 'ihc'),
							  5 => '(#5) '.__('Labels Theme', 'ihc'),
							  4 =>  '(#4) '.__('Simple Green Theme', 'ihc'),
							  3 => '(#3) '.__('BlueBox Theme', 'ihc'),
							  2 =>'(#2) '. __('Basic Theme', 'ihc'),
							  1 => '(#1) '.__('Standard Theme', 'ihc')
							  );

	$subtab = 'design';
	if (isset($_REQUEST['subtab'])) $subtab = $_REQUEST['subtab'];

	if ($subtab=='design'){
		ihc_save_update_metas('login');
		$meta_arr = ihc_return_meta_arr('login');
		?>
		<div class="iump-page-title">Ultimate Membership Pro -
							<span class="second-text">
								<?php _e('Login Form', 'ihc');?>
							</span>
						</div>
			<div class="ihc-stuffbox">
				<div class="impu-shortcode-display">
					[ihc-login-form]
				</div>
			</div>
			<form action="" method="post" >
				<div style="display: inline-block; width: 50%;">
					<div class="ihc-stuffbox">
						<h3><?php _e('Showcase Display', 'ihc');?></h3>
						<div class="inside">
						  <div class="iump-register-select-template">
						  <?php _e('Login Template:', 'ihc');?>
							<select name="ihc_login_template" id="ihc_login_template" onChange="ihcLoginPreview();"  style="min-width:400px">
							<?php
								foreach ($login_templates as $k=>$value){
									echo '<option value="ihc-login-template-'.$k.'"'. ($meta_arr['ihc_login_template']=='ihc-login-template-'.$k ? 'selected': '') .'>'.$value.'</option>';
								}
							?>
							</select>
						 </div>
						 <div style="padding: 5px;">
							<div id="ihc-preview-login"></div>
						</div>
							<div class="ihc-wrapp-submit-bttn">
								<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
							</div>
						</div>
					</div>


				</div>
			   <div style="display: inline-block; width: 45%; vertical-align: top;">
				<div class="ihc-stuffbox">
					<h3><?php _e('Additional Display Options', 'ihc');?></h3>
					<div class="inside">
							<div class="iump-form-line iump-no-border">
									<input type="checkbox" onClick="checkAndH(this, '#ihc_login_remember_me');ihcLoginPreview();" <?php if($meta_arr['ihc_login_remember_me']==1) echo 'checked';?>/>
									<input type="hidden" name="ihc_login_remember_me" value="<?php echo $meta_arr['ihc_login_remember_me'];?>" id="ihc_login_remember_me"/>
									<span style="color: #21759b; font-weight:bold;"><?php _e('Remember Me', 'ihc');?></span>
							</div>
							<div class="iump-form-line iump-no-border">
									<input type="checkbox" onClick="checkAndH(this, '#ihc_login_register');ihcLoginPreview();" <?php if($meta_arr['ihc_login_register']==1) echo 'checked';?>/>
									<input type="hidden" name="ihc_login_register" value="<?php echo $meta_arr['ihc_login_register'];?>" id="ihc_login_register"/>
									<span style="color: #21759b; font-weight:bold;"><?php _e('Register Link', 'ihc');?></span>
							</div>
							<div class="iump-form-line iump-no-border">
									<input type="checkbox" onClick="checkAndH(this, '#ihc_login_pass_lost');ihcLoginPreview();" <?php if($meta_arr['ihc_login_pass_lost']==1) echo 'checked';?>/>
									<span style="color: #21759b; font-weight:bold;"><?php _e('Lost your passw', 'ihc');?></span>
									<input type="hidden" name="ihc_login_pass_lost" value="<?php echo $meta_arr['ihc_login_pass_lost'];?>" id="ihc_login_pass_lost"/>
							</div>
							<div class="iump-form-line iump-no-border">
									<input type="checkbox" onClick="checkAndH(this, '#ihc_login_show_sm');ihcLoginPreview();" <?php if ($meta_arr['ihc_login_show_sm']==1) echo 'checked';?>/>
									<span style="color: #21759b; font-weight:bold;"><?php _e('Show Social Media Login Buttons', 'ihc');?></span>
									<input type="hidden" name="ihc_login_show_sm" value="<?php echo $meta_arr['ihc_login_show_sm'];?>" id="ihc_login_show_sm"/>
							</div>
							<div class="iump-form-line iump-no-border">
									<input type="checkbox" onClick="checkAndH(this, '#ihc_login_show_recaptcha');ihcLoginPreview();" <?php if ($meta_arr['ihc_login_show_recaptcha']==1) echo 'checked';?>/>
									<span style="color: #21759b; font-weight:bold;"><?php _e('Show ReCaptcha', 'ihc');?></span>
									<input type="hidden" name="ihc_login_show_recaptcha" value="<?php echo $meta_arr['ihc_login_show_recaptcha'];?>" id="ihc_login_show_recaptcha"/>
							</div>
							<div class="ihc-wrapp-submit-bttn">
								<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
							</div>
						</div>
				  </div>
				  <div class="ihc-stuffbox">
						<h3><?php _e('Custom CSS', 'ihc');?></h3>
						<div class="inside">
							<textarea id="ihc_login_custom_css" name="ihc_login_custom_css" onBlur="ihcLoginPreview();" class="ihc-dashboard-textarea"><?php echo stripslashes($meta_arr['ihc_login_custom_css']);?></textarea>
							<div class="ihc-wrapp-submit-bttn">
								<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php
	} else {
		ihc_save_update_metas('login-messages');
		$meta_arr = ihc_return_meta_arr('login-messages');
		?>
			<form action="" method="post" >
				<div class="ihc-stuffbox">
					<h3><?php _e('Messages:', 'ihc');?></h3>
					<div class="inside">
						<div style="display: inline-block; width: 45%;">
							<h2><?php _e('Login Messages', 'ihc');?></h2>
							<div>
								<div class="iump-labels-special"><?php _e('Successfully Message:', 'ihc');?></div>
								<textarea name="ihc_login_succes" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_succes']);?></textarea>
							</div>
							<div>
								<div class="iump-labels-special"><?php _e('Default message for pending users:', 'ihc');?></div>
								<textarea name="ihc_login_pending" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_pending']);?></textarea>
							</div>
							<div>
								<div class="iump-labels-special"><?php _e('Error Message:', 'ihc');?></div>
								<textarea name="ihc_login_error" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_error']);?></textarea>
							</div>
							<div>
								<div class="iump-labels-special"><?php _e('E-mail Pending:', 'ihc');?></div>
								<textarea name="ihc_login_error_email_pending" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_error_email_pending']);?></textarea>
							</div>
						</div>

						<div style="display: inline-block; width: 45%;vertical-align: top;">
							<h2><?php _e('Reset Password Messages', 'ihc');?></h2>
							<div>
								<div class="iump-labels-special"><?php _e('Successfully Message:', 'ihc');?></div>
								<textarea name="ihc_reset_msg_pass_ok" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_reset_msg_pass_ok']);?></textarea>
							</div>

							<div>
								<div class="iump-labels-special"><?php _e('Error Message:', 'ihc');?></div>
								<textarea name="ihc_reset_msg_pass_err" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_reset_msg_pass_err']);?></textarea>
							</div>

							<div>
								<div class="iump-labels-special"><?php _e('ReCaptcha Error:', 'ihc');?></div>
								<textarea name="ihc_login_error_on_captcha" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_error_on_captcha']);?></textarea>
							</div>

							<div>
								<div class="iump-labels-special"><?php _e('Ajax Error Message:', 'ihc');?></div>
								<textarea name="ihc_login_error_ajax" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_login_error_ajax']);?></textarea>
							</div>

						</div>

						<div class="ihc-wrapp-submit-bttn">
							<input type="submit" value="<?php _e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>
			</form>
		<?php
	}
?>
