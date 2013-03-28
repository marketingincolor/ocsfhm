<div class='mainInfo'>

	<h1>Create User</h1>
	<p>Please enter the users information below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/create_user");?>
      <p>
      	<?php echo form_label('First Name:', 'first_name'); ?><?php echo form_input($first_name);?>
      </p>
      
      <p>
      	<?php echo form_label('Last Name:', 'last_name'); ?><?php echo form_input($last_name);?>
      </p>
      
      <p>
      	<?php echo form_label('Company Name:', 'company'); ?><?php echo form_input($company);?>
      </p>
      
      <p>
      	<?php echo form_label('Email:', 'email'); ?><?php echo form_input($email);?>
      </p>
      
      <p>
      	<?php echo form_label('Phone:', 'phone1'); ?><?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>
      
      <p>
      	<?php echo form_label('Password:', 'password'); ?><?php echo form_input($password);?>
      </p>
      
      <p>
      	<?php echo form_label('Confirm Password:', 'password_confirm'); ?><?php echo form_input($password_confirm);?>
      </p>

      <p>
      	<?php echo form_submit('submit', 'Create User');?>
      </p>

    <?php echo form_close();?>

</div>
