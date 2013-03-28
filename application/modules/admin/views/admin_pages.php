<h1>Pages</h1>

<p>You may edit the Pages of your website below.</p>

<div class='mainInfo'>

	<table>
		<tr>
			<th>Page Title</th>
			<th>URI</th>
			<th>Page Headline</th>
			<th>section id</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($pagearray as $page):?>
		<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
			<td><?php echo $page->title;?></td>
			<td><?php echo $page->uri;?></td>
			<td><?php echo $page->headline;?></td>
			<td><?php echo $page->section_id;?></td>
			<td><a href="page_edit/<?php echo $page->id; ?>">edit</a></td>
			<td><a href="page_delete/<?php echo $page->id; ?>">delete</a></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach;?>

	</table>
	<p>
		<a href="<?php echo site_url('admin/page_add');?>"><img src="<?php echo base_url();?>images/icons/add.png" class="icon">Add a Page</a> or 
		<a href="<?php echo site_url('admin/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>
