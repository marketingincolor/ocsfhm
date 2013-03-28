<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>

	<?php 
	$attributes = array('class' => 'admin', 'id' => 'settings');
	$hidden = array('action' => 'save');
	echo form_open_multipart($this->uri->uri_string(), $attributes, $hidden);
	?>
	<!-- 
	<?php //echo form_label('User Id:', 's_userid'); ?>
	<?php //echo form_input('s_userid', isset($staffdata['user_id']) ? $staffdata['user_id'] : null); ?>
	<br /> -->
	<?php echo form_label('First Name:', 's_firstname'); ?>
	<?php echo form_input('s_firstname', isset($staffdata['first_name']) ? $staffdata['first_name'] : ''); ?>
	<br />
	<?php echo form_label('Last Name:', 's_lastname'); ?>
	<?php echo form_input('s_lastname', isset($staffdata['last_name']) ? $staffdata['last_name'] : ''); ?>
	<br />
	<?php echo form_label('Position:', 's_position'); ?>
	<?php echo form_input('s_position', isset($staffdata['position']) ? $staffdata['position'] : ''); ?>
	<br />
	<?php echo form_label('Email:', 's_email'); ?>
	<?php echo form_input('s_email', isset($staffdata['email']) ? $staffdata['email'] : ''); ?>
	<br />
	<?php echo form_label('Bio:', 's_quote'); ?>
	<?php echo form_textarea('s_quote', isset($staffdata['quote']) ? $staffdata['quote'] : '', 'rows=5 cols=20'); ?>
	<br />
	<?php echo form_label('Note:', 's_note'); ?>
	<?php echo form_input('s_note', isset($staffdata['note']) ? $staffdata['note'] : ''); ?>
	<br />
	<?php if (isset($staffdata['photo'])) { echo form_label('Photo:', 's_cphoto'); } ?>
	<?php if (isset($staffdata['photo'])) { echo '<img src="'.base_url().$staffdata['photo'].'" style="margin-left:10px;">'; } ?>
	<br />
	<?php echo form_label('Upload New Photo:', 'userfile'); ?>
	<?php echo form_upload('userfile', isset($staffdata['photo']) ? $staffdata['photo'] : set_value('photo') ); ?>
	<br />
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/staff', 'Return'); ?>
	
	<?php echo form_close(); ?>
	
</div>
