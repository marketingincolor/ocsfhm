<h1>Admin Dashboard</h1>

<p>Special Content/Page for Administrators ONLY - will need ADMIN ONLY menu as well, to allow for full
site management, to edit user accounts and control the entire system.</p>

<table class="dash_icons">
	<tr>
		<td><a href="admin/settings"><img src="images/icons/settings.png" class="dashboard"><br />Settings</a></td>
		<td><a href="admin/pages"><img src="images/icons/pages.png" class="dashboard"><br />Pages</a></td>
		<td><a href="admin/services"><img src="images/icons/service.png" class="dashboard"><br />Services</a></td>
		<td><a href="admin/users"><img src="images/icons/users.png" class="dashboard"><br />Users</a></td>
		<td><a href="admin/staff"><img src="images/icons/staff.png" class="dashboard"><br />Staff</a></td>
		<td><a href="admin/products"><img src="images/icons/product.png" class="dashboard"><br />Products</a></td>
		<!-- <td><a href="admin/languages"><img src="images/icons/languages.png" class="dashboard"><br />Languages</a></td>
		<td><a href="admin/comments"><img src="images/icons/comments.png" class="dashboard"><br />Comments</a></td>
		<td><a href="admin/templates"><img src="images/icons/templates.png" class="dashboard"><br />Templates</a></td>
		<td><a href="admin/navigation"><img src="images/icons/navigation.png" class="dashboard"><br />Navigation</a></td> -->
	</tr>
	<!-- <tr>
		<td><a href="admin/feeds"><img src="images/icons/feeds.png" class="dashboard"><br />Feeds</a></td>
		<td><a href="admin/social_bookmarking"><img src="images/icons/social_bookmarking.png" class="dashboard"><br />Bookmarking</a></td>
		<td><a href="admin/categories"><img src="images/icons/categories.png" class="dashboard"><br />Categories</a></td>
		<td><a href="admin/posts"><img src="images/icons/posts.png" class="dashboard"><br />Posts</a></td>
		<td><a href="admin/links"><img src="images/icons/links.png" class="dashboard"><br />Links</a></td>
		<td><a href="admin/backup"><img src="images/icons/database.png" class="dashboard"><br />DB Backup</a></td>
		<td><a href="admin/statistics"><img src="images/icons/statistics.png" class="dashboard"><br />Statistics</a></td>
		<td><a href="admin/information"><img src="images/icons/info.png" class="dashboard"><br />Information</a></td>
	</tr> -->
</table>


<div class='mainInfo' style="display:none;">

	<h1>Users</h1>
	<p>Below is a list of the users.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
	<table cellpadding=0 cellspacing=10>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Groups</th>
			<th>Status</th>
			<th>Data</th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
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
		<?php endforeach;?>
	</table>
	
	<p><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a></p>
	
</div>
