<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<p style="font-weight:bold;"><?php echo $content; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>

	<?php 
	$attributes = array('class' => 'admin', 'id' => 'settings');
	$hidden = array('action' => 'save');
	echo form_open($this->uri->uri_string(), $attributes, $hidden);
	?>
	<br /><br />
	<?php echo form_submit('submit', 'Delete'); ?> or <?php echo anchor('/admin/'.$back, 'Return'); ?>
	<p style="font-weight:bold;"><span style="color:red;">NOTE:</span> This action cannot be undone!</p>
	<?php echo form_close(); ?>
	

	
</div>
