<!DOCTYPE html>
<html lang="en">
	<head>
	<title><?php echo $title ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php echo link_tag('assets/css/default.css'); ?>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
	</head>
	<body>
	
	<div id="base" class="column">	
		
		<div id="header">
			<?php $image_properties = array(
				'src' => 'images/main_logo.png',
				'alt' => 'company logo',
				'class' => 'header_image',
				);
				echo img($image_properties);
			?>
		</div>
		
		<div id="main">
			<?php echo $contents; ?>
		</div>
		
		<div id="footer">
			Insert Footer Data here: rendered in {elapsed_time} seconds,  and {memory_usage} memory used.
			
			<?php 
			if (!$this->ion_auth->logged_in()) {
				echo ('You are not logged in.');
				echo (' <a href=\'login\'>login</a>');
			} else {
				$user = $this->ion_auth->get_user();
				echo ('You are logged in as: '.$user->email.' - '.$user->username);
				echo (' <a href=\'logout\'>logout</a>');
			}
			?>
		
		</div>

	</div>
	</body>
</html>