<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>

	<?php 
	$attributes = array('class' => 'admin', 'id' => 'pages');
	$hidden = array('action' => 'save');
	echo form_open($this->uri->uri_string(), $attributes, $hidden);
	?>
	
	<?php echo form_label('Page URI:', 'p_uri'); ?>
	<?php echo form_input('p_uri', isset($pagedata['uri']) ? $pagedata['uri'] : ''); ?>
	<br />
	<?php echo form_label('Page Title:', 'p_title'); ?>
	<?php echo form_input('p_title', isset($pagedata['title']) ? $pagedata['title'] : ''); ?>
	<br />
	<?php echo form_label('Headline:', 'p_headline'); ?>
	<?php echo form_input('p_headline', isset($pagedata['headline']) ? $pagedata['headline'] : ''); ?>
	<br />
	<?php echo form_label('Main Content:', 'p_content_a'); ?>
	<?php echo form_textarea('p_content_a', isset($pagedata['content_a']) ? $pagedata['content_a'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Content B:', 'p_content_b'); ?>
	<?php echo form_textarea('p_content_b', isset($pagedata['content_b']) ? $pagedata['content_b'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Content C:', 'p_content_c'); ?>
	<?php echo form_textarea('p_content_c', isset($pagedata['content_c']) ? $pagedata['content_c'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Content D:', 'p_content_d'); ?>
	<?php echo form_textarea('p_content_d', isset($pagedata['content_d']) ? $pagedata['content_d'] : '', 'class="cledit"'); ?>
	<br />
	<?php echo form_label('Note:', 'p_note'); ?>
	<?php echo form_input('p_note', isset($pagedata['note']) ? $pagedata['note'] : ''); ?>
	<br />
	<?php echo form_label('Section ID:', 'p_section_id'); ?>
	<?php echo form_input('p_section_id', isset($pagedata['section_id']) ? $pagedata['section_id'] : ''); ?>
	<br />
	
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/pages', 'Return'); ?>
	
	<?php echo form_close(); ?>
	

	
</div>
