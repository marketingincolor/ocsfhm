<h1><?php echo $content_header; ?></h1>

<p><?php echo $content_instruct; ?></p>

<div class='mainInfo'>

	<table>
		<tr>
			<th>Preview</th>
			<th>Title</th>
			<th>File name</th>
			<th>Active</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($photoarray as $photo):?>
		<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
			<td><img src="<?php echo base_url().$photo->filename;?>" style="max-width:80px;" /></td>
			<td><?php echo $photo->title;?></td>
			<td><?php echo $photo->filename;?></td>
			<td><?php echo ($photo->active == 0)?'yes':'no';?></td>
			<td><a href="<?php echo base_url();?>admin/service_photo_edit/<?php echo $photo->id; ?>">edit</a></td>
			<td><a href="<?php echo base_url();?>admin/service_photo_delete/<?php echo $photo->id; ?>">delete</a></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach;?>
	</table>
	<p>
		<a href="<?php echo site_url('admin/services/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>
