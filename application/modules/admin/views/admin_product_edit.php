<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>
	<?php echo isset($sys_msg) ? '<span class="sysmsg">'.$sys_msg.'</span>' : ''; ?>

	<?php 
	$attributes = array('class' => 'admin', 'id' => 'settings');
	$hidden = array('action' => 'save');
	echo form_open_multipart($this->uri->uri_string(), $attributes, $hidden);
	?>
	
	<?php echo form_label('Item Id:', 'p_itemid'); ?>
	<?php echo form_input('p_itemid', isset($proddata['item_id']) ? $proddata['item_id'] : ''); ?>
	<br />
	<?php echo form_label('Name:', 'p_itemname'); ?>
	<?php echo form_input('p_itemname', isset($proddata['item_name']) ? $proddata['item_name'] : ''); ?>
	<br />
	<?php echo form_label('Description:', 'p_itemdesc'); ?>
	<?php echo form_input('p_itemdesc', isset($proddata['item_desc']) ? $proddata['item_desc'] : ''); ?>
	<br />
	<?php echo form_label('Note:', 'p_itemnote'); ?>
	<?php echo form_textarea('p_itemnote', isset($proddata['item_note']) ? $proddata['item_note'] : '', 'rows=5 cols=20'); ?>
	
	<br />
	<?php if (isset($proddata['item_photo'])) { echo form_label('Photo:', 'p_itemphoto'); } ?>
	<?php if (isset($proddata['item_photo'])) { echo '<img src="'.base_url().$proddata['item_photo'].'" style="margin-left:10px;">'; } ?>
	<br />
	<?php echo form_label('Upload New Photo:', 'userfile'); ?>
	<?php echo form_upload('userfile', isset($proddata['item_photo']) ? $proddata['item_photo'] : set_value('photo') ); ?>
	<br />
	
	<br />
	<?php //echo form_label('Photo:', 'p_itemphoto'); ?>
	<?php //echo form_input('p_itemphoto', isset($proddata['item_photo']) ? $proddata['item_photo'] : ''); ?>
	<br />
	
	<?php echo form_submit('submit', 'Submit'); ?> or <?php echo anchor('/admin/products', 'Return'); ?>
	
	<?php echo form_close(); ?>
	

	
</div>
