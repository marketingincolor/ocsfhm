<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>
	
	<?php 
	$attributes = array('class' => 'admin', 'id' => 'service');
	$hidden = array('action' => 'save');
	echo form_open_multipart($this->uri->uri_string(), $attributes, $hidden);
	?>
	
	<?php echo form_label('Service URI:', 's_uri'); ?>
	<?php echo form_input('s_uri', isset($servicedata['uri']) ? $servicedata['uri'] : ''); ?>
	<br />
	<?php echo form_label('First Name:', 's_first_name'); ?>
	<?php echo form_input('s_first_name', isset($servicedata['first_name']) ? $servicedata['first_name'] : ''); ?>
	<br />
	<?php echo form_label('Last Name:', 's_last_name'); ?>
	<?php echo form_input('s_last_name', isset($servicedata['last_name']) ? $servicedata['last_name'] : ''); ?>
	<br />
	<?php echo form_label('Full Name:', 's_full_name'); ?>
	<?php echo form_input('s_full_name', isset($servicedata['full_name']) ? $servicedata['full_name'] : ''); ?>
	<br />
	<?php echo form_label('Date of Birth:', 's_dob'); ?>
	<?php echo form_input('s_dob', isset($servicedata['dob']) ? $servicedata['dob'] : ''); ?>
	<br />
	<?php echo form_label('Date of Death:', 's_dod'); ?>
	<?php echo form_input('s_dod', isset($servicedata['dod']) ? $servicedata['dod'] : ''); ?>
	<br />
	<?php echo form_label('Service Location:', 's_service_location'); ?>
	<?php echo form_textarea('s_service_location', isset($servicedata['service_location']) ? $servicedata['service_location'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Service Date:', 's_service_date'); ?>
	<?php echo form_input('s_service_date', isset($servicedata['service_date']) ? $servicedata['service_date'] : ''); ?>
	<br />
	<?php echo form_label('Service Time:', 's_service_time'); ?>
	<?php echo form_input('s_service_time', isset($servicedata['service_time']) ? $servicedata['service_time'] : ''); ?>
	<br />
	<?php echo form_label('Visitation Date:', 's_visit_date'); ?>
	<?php echo form_input('s_visit_date', isset($servicedata['visit_date']) ? $servicedata['visit_date'] : ''); ?>
	<br />
	<?php echo form_label('Visitation Time:', 's_visit_time'); ?>
	<?php echo form_input('s_visit_time', isset($servicedata['visit_time']) ? $servicedata['visit_time'] : ''); ?>
	<br />
	<?php echo form_label('Interment Location:', 's_int_location'); ?>
	<?php echo form_textarea('s_int_location', isset($servicedata['int_location']) ? $servicedata['int_location'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Interment Date:', 's_int_date'); ?>
	<?php echo form_input('s_int_date', isset($servicedata['int_date']) ? $servicedata['int_date'] : ''); ?>
	<br />
	<?php echo form_label('Interment Time:', 's_int_time'); ?>
	<?php echo form_input('s_int_time', isset($servicedata['int_time']) ? $servicedata['int_time'] : ''); ?>
	<br />
	<?php echo form_label('Service Biography:', 's_bio'); ?>
	<?php echo form_textarea('s_bio', isset($servicedata['bio']) ? $servicedata['bio'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Published Obituary:', 's_obit'); ?>
	<?php echo form_textarea('s_obit', isset($servicedata['obit']) ? $servicedata['obit'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Passcode:', 's_passcode'); ?>
	<?php echo form_input('s_passcode', isset($servicedata['passcode']) ? $servicedata['passcode'] : ''); ?>
	<br />
	
	<?php if (isset($servicedata['photo'])) { echo form_label('Photo:', 's_photo'); } ?>
	<?php if (isset($servicedata['photo'])) { echo form_hidden('s_photo', isset($servicedata['photo']) ? $servicedata['photo'] : set_value($servicedata['photo']) ); } ?>
	<?php if (isset($servicedata['photo'])) { echo '<img src="'.base_url().$servicedata['photo'].'" style="margin-left:10px;">'; } ?>
	<br />
	<?php echo form_label('Upload New Photo:', 'userfile'); ?>
	<?php echo form_upload('userfile', isset($servicedata['photo']) ? $servicedata['photo'] : '' ); ?>
	
	<?php //echo form_label('Photo:', 's_photo'); ?>
	<?php //echo form_input('s_photo', isset($servicedata['photo']) ? $servicedata['photo'] : ''); ?>
	<br />
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/services', 'Return'); ?>
	
	<?php echo form_close(); ?>

</div>
