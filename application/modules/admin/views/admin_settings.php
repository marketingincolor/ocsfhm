<h1>Settings</h1>

<p>You may edit your website settings below.</p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>

	<?php 
	$attributes = array('class' => 'admin', 'id' => 'settings');
	$hidden = array('action' => 'save');
	echo form_open($this->uri->uri_string(), $attributes, $hidden);
	?>
	
	<?php echo form_fieldset('Basic Site Information'); ?>
	<?php echo form_label('Funeral Home Name:', 'ss_name'); ?>
	<?php echo form_input('ss_name', isset($settings['ss_name']) ? $settings['ss_name'] : set_value($settings['ss_name'])); ?>
	<br />
	<?php echo form_label('Address:', 'ss_address'); ?>
	<?php echo form_input('ss_address', isset($settings['ss_address']) ? $settings['ss_address'] : set_value($settings['ss_address'])); ?>
	<br />
	<?php echo form_label('City:', 'ss_city'); ?>
	<?php echo form_input('ss_city', isset($settings['ss_city']) ? $settings['ss_city'] : set_value($settings['ss_city'])); ?>
	<br />
	<?php echo form_label('State:', 'ss_state'); ?>
	<?php echo form_input('ss_state', isset($settings['ss_state']) ? $settings['ss_state'] : set_value($settings['ss_state'])); ?>
	<br />
	<?php echo form_label('Zip:', 'ss_zip'); ?>
	<?php echo form_input('ss_zip', isset($settings['ss_zip']) ? $settings['ss_zip'] : set_value($settings['ss_zip'])); ?>
	<br />
	<?php echo form_label('Phone:', 'ss_phone'); ?>
	<?php echo form_input('ss_phone', isset($settings['ss_phone']) ? $settings['ss_phone'] : set_value($settings['ss_phone'])); ?>
	<?php echo form_fieldset_close(); ?>
	<br />
	
	<?php echo form_fieldset('Site SEO Data'); ?>
	<?php echo form_label('Meta Tags:', 'ss_meta_tags'); ?>
	<?php echo form_input('ss_meta_tags', isset($settings['ss_meta_tags']) ? $settings['ss_meta_tags'] : set_value($settings['ss_meta_tags'])); ?>
	<br />
	<?php echo form_label('Meta Description:', 'ss_meta_desc'); ?>
	<?php echo form_input('ss_meta_desc', isset($settings['ss_meta_desc']) ? $settings['ss_meta_desc'] : set_value($settings['ss_meta_desc'])); ?>
	<br />
	<?php echo form_label('Google Acct:', 'ss_google_acct'); ?>
	<?php echo form_input('ss_google_acct', isset($settings['ss_google_acct']) ? $settings['ss_google_acct'] : set_value($settings['ss_google_acct'])); ?>
	<?php echo form_fieldset_close(); ?>
	<br />
	
	<?php echo form_submit('submit', 'Submit'); //echo form_reset('reset', 'Clear Form');?> or <?php echo anchor('/admin', 'Return'); ?>
	
	<?php echo form_close(); ?>

</div>
