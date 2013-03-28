<h1>Services</h1>

<p>You may edit your Client's Service information below.</p>

<div class='mainInfo'>

	<table>
		<tr>
			<th>Deceased</th>
			<th>Date of Death</th>
			<th>Page URI</th>
			<th>Photos</th>
			<!-- <th>Memories</th> -->
			<th>Passcode</th>
			<th>Active</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($servicearray as $service):?>
		<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
			<td><?php echo $service->full_name;?></td>
			<td><?php echo $service->dod;?></td>
			<td><?php echo $service->uri;?></td>
			<td><a href="service_photo/<?php echo $service->id; ?>">view</a></td>
			<!-- <td><a href="service_memo/<?php echo $service->id; ?>">view</a></td> -->
			<td><?php echo $service->passcode;?></td>
			<td><?php echo ($service->active == 0)?'yes':'no';?></td>
			<td><a href="service_edit/<?php echo $service->id; ?>">edit</a></td>
			<td><a href="service_delete/<?php echo $service->id; ?>">delete</a></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach;?>
	</table>
	<p>
		<a href="<?php echo site_url('admin/service_add');?>"><img src="<?php echo base_url();?>images/icons/add.png" class="icon">Add a New Service</a> or 
		<a href="<?php echo site_url('admin/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>
