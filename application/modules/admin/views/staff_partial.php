
<div id="staff_partial" class="left">

		<?php foreach ($staff as $member):?>

		<table class="staffdata" cellpadding="5px;">
		<tr>
			<td rowspan="2">
				<img class="staffpic" src="<?php echo base_url().$member->photo; ?>">
			</td>
			<td>
				<?php echo $member->first_name.' '.$member->last_name; ?><br />
				<?php echo $member->position; ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $member->quote; ?><br />
				<a href="mailto:<?php echo $member->email; ?>"><?php echo $member->email; ?></a>
			</td>
		</tr>
		</table>
		<?php endforeach;?>

</div>