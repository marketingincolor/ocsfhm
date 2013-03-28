<div class='mainInfo'>

    <div class="pageTitleBorder"></div>
	<p>Please login with your email/username and password below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php //echo form_open("auth/login");?>
    <?php echo form_open("login");?>	

		<label for="identity">Email/Username:</label>
		<?php echo form_input($identity);?>
		<br />
		<label for="password">Password:</label>
		<?php echo form_input($password);?>
		<br />
		<label for="remember">Remember Me:</label>
		<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
		<br />
		<?php echo form_submit('submit', 'Login');?>
		<br />
	<?php echo form_close();?>

    <p><a href="forgot_password">Forgot your password?</a></p>

</div>
