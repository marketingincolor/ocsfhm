<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>
	
	<?php 
	$attributes = array('class' => 'admin', 'id' => 'service');
	$hidden = array('action' => 'save', 'servid' => $servicephoto['services_id'] );
	echo form_open_multipart($this->uri->uri_string(), $attributes, $hidden);
	?>
	<?php //var_dump($servicephoto); ?>

	<br />
	<?php echo form_label('Name:', 'sp_name'); ?>
	<?php echo form_input('sp_name', isset($servicephoto['name']) ? $servicephoto['name'] : ''); ?>
	<br />
	<?php echo form_label('Title:', 'sp_title'); ?>
	<?php echo form_input('sp_title', isset($servicephoto['title']) ? $servicephoto['title'] : ''); ?>
	<br />
	<?php if (isset($servicephoto['filename'])) { echo form_label('Photo:', 's_photo'); } ?>
	<?php if (isset($servicephoto['filename'])) { echo form_hidden('s_photo', isset($servicephoto['filename']) ? $servicephoto['filename'] : set_value($servicephoto['filename']) ); } ?>
	<?php if (isset($servicephoto['filename'])) { echo '<img src="'.base_url().$servicephoto['filename'].'" style="margin-left:10px;">'; } ?>
	<br />
	<?php echo form_label('Upload New Photo:', 'userfile'); ?>
	<?php //echo form_upload('userfile', isset($servicephoto['filename']) ? $servicephoto['filename'] : set_value('filename') ); ?>
	<?php echo form_upload('userfile', isset($servicephoto['filename']) ? $servicephoto['filename'] : '' ); ?>

	<?php //echo form_label('Photo:', 's_photo'); ?>
	<?php //echo form_input('s_photo', isset($servicedata['photo']) ? $servicedata['photo'] : ''); ?>

	<br />
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/service_photo/'.$servicephoto['services_id'].'', 'Return'); ?>
	
	<?php echo form_close(); ?>
	

	
</div>
