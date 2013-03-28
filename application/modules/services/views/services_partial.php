<div id="title_block_a" class="left">CURRENT SERVICES:</div>
<div id="title_block_b" class="right">PAST SERVICES:</div><br clear="all" />

<div id="output_block_a" class="left">
	<table style="width:100%;">
		<?php foreach ($list_active as $active):?>
		<tr>
			<td>
			<a href="services/<?php echo $active->uri; ?>" target="_blank"><?php echo $active->last_name.', '.$active->first_name; ?></a>
			<br />
			<?php echo date("M j, Y", strtotime($active->dob)); ?> - <?php echo date("M j, Y", strtotime($active->dod)); ?>
			</td>
		</tr>
		<?php endforeach;?>
		<tr>
			<td><a href="#">Cannicci, Donald</a>
			<br />Jan 26, 1937 - Feb 17, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Elderson, Michael</a>
			<br />Sep 9, 1924 - Jul 2, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Sisterton, "Mackey"</a>
			<br />Apr 11, 1921 - Mar 2, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Jameson, Jimmy</a>
			<br />Feb 17, 1926 - Apr 3, 2012</td>
		</tr>

		
	</table>
</div>

<div id="output_block_b" class="right">
	<table style="width:100%;">
		<?php foreach ($list_inactive as $inactive):?>
		<tr>
			<td><a href="services/<?php echo $inactive->uri; ?>" target="_blank"><?php echo $inactive->last_name.', '.$inactive->first_name; ?></a>
			<br />
			<?php echo date("M j, Y", strtotime($inactive->dob)); ?> - <?php echo date("M j, Y", strtotime($inactive->dod)); ?></td>
		</tr>
		<?php endforeach;?>
		<tr>
			<td><a href="#">Kessimer, George</a>
			<br />Jan 26, 1937 - Feb 17, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Lithersberg, Ira</a>
			<br />Sep 9, 1924 - Jul 2, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Matthers, Scott</a>
			<br />Apr 11, 1921 - Mar 2, 2012</td>
		</tr>
		<tr>
			<td><a href="#">Pocci, Michael</a>
			<br />Feb 17, 1926 - Apr 3, 2012</td>
		</tr>
		
	</table>
</div>