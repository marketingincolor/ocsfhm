<h1>Staff</h1>

<p>You may edit the Staff section of your website below.</p>

<div class='mainInfo'>

	<table>
		<tr>
			<th>Name</th>
			<th>Position</th>
			<th>Email</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($staffarray as $staff):?>
		<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
			<td><?php echo $staff->first_name.' '.$staff->last_name;?></td>
			<td><?php echo $staff->position;?></td>
			<td><?php echo $staff->email;?></td>
			<td><a href="staff_edit/<?php echo $staff->id; ?>">edit</a></td>
			<td><a href="staff_delete/<?php echo $staff->id; ?>">delete</a></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach;?>

	</table>

	<p>
		<a href="<?php echo site_url('admin/staff_add');?>"><img src="<?php echo base_url();?>images/icons/add.png" class="icon">Add a Staff Member</a> or 
		<a href="<?php echo site_url('admin/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>
