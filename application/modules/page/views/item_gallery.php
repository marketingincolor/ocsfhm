<div id="gallery_verb"><?php echo $verbage; ?></div>
<div id="staff_partial" class="left">
	<?php foreach ($items as $item):?>

		<table class="itemgallery" cellpadding="5px;">
		<tr>
			<td>
				<img class="itempic" src="<?php echo base_url().$item->item_photo; ?>" alt="<?php echo $item->item_name; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<b><?php echo $item->item_desc; ?></b>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $item->item_note; ?>
			</td>
		</tr>
		</table>
	<?php endforeach;?>
</div>