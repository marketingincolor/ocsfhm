<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>
	
	<?php 
	$attributes = array('class' => 'admin', 'id' => 'service');
	$hidden = array('action' => 'save');
	echo form_open_multipart($this->uri->uri_string(), $attributes, $hidden);
	?>
	<?php var_dump($servicememos); ?>
	<br />
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/services', 'Return'); ?>
	
	<?php echo form_close(); ?>
	

	
</div>
