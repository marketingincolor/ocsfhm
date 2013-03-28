<!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="robots" content="noindex,nofollow">
	<title><?php echo $title; ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php echo link_tag('assets/css/tribute.css'); ?>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	</head>
	<body>
	
	<div id="base" class="column">	
		<div id="header">
			<div id="trib_pic">
				<?php $image_properties = array(
					'src' => 'images/trib_photo_frame.png',
					'alt' => 'photoframe',
					'class' => 'left photoframe',
					);
					echo img($image_properties);
				?>
				
				<?php $image_properties = array(
					'src' => $photo,
					'alt' => $title,
					'class' => 'left mphoto',
					);
					echo img($image_properties);
				?>
			</div>

			<?php $image_properties = array(
				'src' => 'images/trib_logo.png',
				'alt' => 'company logo',
				'class' => 'right',
				);
				echo img($image_properties);
			?>
			<br clear="all" />
			<div id="fh_info" class="right" style="width:160px; margin-right:100px; text-align:center; color:white; font-size:12px;">
				<?php echo isset($ss_info['ss_address']) ? $ss_info['ss_address'] : '' ; ?><br />
				<?php echo isset($ss_info['ss_city']) ? $ss_info['ss_city'] : '' ; ?>, <?php echo isset($ss_info['ss_state']) ? $ss_info['ss_state'] : '' ; ?> <?php echo isset($ss_info['ss_zip']) ? $ss_info['ss_zip'] : '' ; ?><br />
				<?php echo isset($ss_info['ss_phone']) ? $ss_info['ss_phone'] : '' ; ?>
			</div>

		</div>

		<div id="main" class="col_full">
			<div id="navbox">
				<h2 id="mname"><?php echo $title; ?></h2>
			</div>
			<h3 id="mdates"><?php echo date("F j, Y", strtotime($dob)); ?> - <?php echo date("F j, Y", strtotime($dod)); ?></h3>

			<?php echo $contents; ?>
		</div>
		
		<div id="footer">
			<br />
			<br />
		</div>

	</div>
	
	</body>
</html>