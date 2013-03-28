<div class='mainInfo'>

	<h1>Users</h1>
	<p>View and Edit site users accounts below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Groups</th>
			<th>Status</th>
			<th>Data</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($users as $user):?>
			<tr <?php echo $i & 1 ? "bgcolor='#FFF'" : "bgcolor='#CCC'"; ?> >
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->email;?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo $group->name;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit'); ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach;?>
	</table>

	<p>
		<a href="<?php echo site_url('auth/create_user');?>"><img src="<?php echo base_url();?>images/icons/add.png" class="icon">Create a New User</a> or 
		<a href="<?php echo site_url('admin/');?>"><img src="<?php echo base_url();?>images/icons/return.png" class="icon">Return</a>
	</p>
	
</div>