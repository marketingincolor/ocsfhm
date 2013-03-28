<!DOCTYPE html>
<html lang="en">
	<head>
	<title><?php echo $title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?php echo isset($ss_info['ss_meta_desc']) ? '<meta name="description" content="'.$ss_info['ss_meta_desc'].'">' : '' ; ?>
	<?php echo isset($ss_info['ss_meta_tags']) ? '<meta name="keywords" content="'.$ss_info['ss_meta_tags'].'">' : '' ; ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php echo link_tag('assets/css/default.css'); ?>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
	</head>
	<body>
	
	<div id="base" class="column">
		
		<div id="header">
			<a href="<?php echo base_url();?>"><?php $image_logo = array(
				'src' => 'images/main_logo.png',
				'alt' => 'company logo',
				'class' => 'col_one',
				);
				echo img($image_logo);
			?></a>
			<div class="right col_two">
				<div id="fh_info" style="display:block; position:relative; font-size:16px; top:110px; text-align:center; color:white;">
					<!-- <?php echo isset($ss_info['ss_name']) ? $ss_info['ss_name'] : '' ; ?><br /> -->
					<?php echo isset($ss_info['ss_address']) ? $ss_info['ss_address'] : '' ; ?><br />
					<?php echo isset($ss_info['ss_city']) ? $ss_info['ss_city'] : '' ; ?>, <?php echo isset($ss_info['ss_state']) ? $ss_info['ss_state'] : '' ; ?> <?php echo isset($ss_info['ss_zip']) ? $ss_info['ss_zip'] : '' ; ?><br />
					<?php echo isset($ss_info['ss_phone']) ? $ss_info['ss_phone'] : '' ; ?>
				</div>
			</div>
		</div>

		<div id="main">
			<div id="navbox">
				<?php echo $this->navigation->display('primary'); ?>
			</div>
		<br clear="all">
			<div id="content" class="col_one left">

				<?php $find = strpos($headline,'grfx');
					if($find === false) {
						echo '<h2>'.$headline.'</h2>';
					}
					else {
						echo '<img src="'.base_url().'images/'.$headline.'" class="headline" />' ;
					}
				?>

				<?php echo $content_a; ?>
				
				<?php if ($this->uri->segment($this->uri->total_segments()) == '') { echo isset($services_partial)?'<br><br>'.$services_partial:'' ; } ?>
			</div>

			<div id="graphic" class="col_two right">
				<?php $switchval = $this->uri->segment($this->uri->total_segments());
				 switch ($switchval) {
					case '': ?>
						<?php $image_home = array(
							'src' => 'images/grfx_photo_home.png',
							'alt' => 'Almont Funeral Home - Welcome Image',
							'class' => 'graphic',
							'style' => 'padding-left:44px;'
							);
							echo img($image_home);
						?>
						<br />
						<div style="text-align:center;">
							<iframe width="320" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?oe=utf-8&amp;q=<?php echo $ss_locstring; ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $ss_locstring; ?>&amp;gl=us&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
							<br />
							<small><a href="http://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=<?php echo $ss_locstring; ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $ss_locstring; ?>&amp;gl=us&amp;t=m&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
						</div>
						<br />
					<?php break;
					case 'about-us': ?>
						<?php $image_about = array(
							'src' => ''.$content_b.'',
							'alt' => 'Almont Funeral Home - About Us',
							'class' => 'graphic',
							'style' => 'margin-top:10px;'
							);
							echo img($image_about);
						?>
                    <?php break;
                    case 'history': ?>
						<?php $image_about = array(
                            'src' => ''.$content_b.'',
                            'alt' => 'Almont Funeral Home - History',
                            'class' => 'graphic',
                            'style' => 'margin-top:10px;'
                        );
							echo img($image_about);
						?>
					<?php break;
					case 'prearrangement': ?>
						<?php $image_about = array(
							'src' => ''.$content_b.'',
							'alt' => 'Almont Funeral Home - Prearrangement',
							'class' => 'graphic',
							'style' => 'margin-top:10px; position:relative; right:20px; z-index:-1;'
							);
							echo img($image_about);
						?>
					<?php break;
					case 'helpful-links': ?>
						<?php $image_about = array(
							'src' => ''.$content_c.'',
							'alt' => 'Almont Funeral Home - Helpful Links',
							'class' => 'graphic',
							'style' => 'margin-top:10px;'
							);
							echo img($image_about);
						?>
					<?php break;
					case 'resources': ?>
						<?php $image_about = array(
							'src' => ''.$content_c.'',
							'alt' => 'Almont Funeral Home - Grief Resources',
							'class' => 'graphic',
							'style' => 'margin-top:10px;'
							);
							echo img($image_about);
						?>
                    <?php break;
                    case 'floral': ?>
						<?php $image_about = array(
                            'src' => ''.$content_c.'',
                            'alt' => 'Almont Funeral Home - Flowers',
                            'class' => 'graphic',
                            'style' => 'margin-top:10px;'
                        );
							echo img($image_about);
						?>
					<?php break;
					case 'staff': ?>
						<?php $image_about = array(
							'src' => ''.$content_b.'',
							'alt' => 'Almont Funeral Home - Staff',
							'class' => 'graphic',
							'style' => 'margin-top:10px;'
							);
							echo img($image_about);
						?>
					<?php break;
					case 'contact-us': ?>
						<br />
							<iframe width="320" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?oe=utf-8&amp;q=<?php echo $ss_locstring; ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $ss_locstring; ?>&amp;gl=us&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
							<br />
							<small><a href="http://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=<?php echo $ss_locstring; ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $ss_locstring; ?>&amp;gl=us&amp;t=m&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
						<br />
					<?php break;
				} ?>
			</div>
		<br clear="all">
			<div id="sub" class="col_full">
			
				<?php $switchval = $this->uri->segment($this->uri->total_segments());
				//$switchval = $this->uri->segment(1);
				 switch ($switchval) {
					case '':?>

					<?php //echo isset($services_partial)?$services_partial:''; ?> 
					<div class="col_indent" style="display:none">
					<?php 
						//echo $content_b;
						//echo $content_c;
						//echo $content_d;
					?>
					</div>
					
					<div style="display:inline-block; width:100%; text-align:center; margin-top:20px;">
						<div style="display:inline-block;"><a href="helpful-links/floral"><img src="images/main_btn_floral.png"></a></div>
						<div style="display:inline-block;"><a href="helpful-links/memorial-products"><img src="images/main_btn_memo.png"></a></div>
						<div style="display:inline-block;"><a href="prearrangement"><img src="images/main_btn_prearr.png"></a></div>
					</div>
					<?php //break;
					//case 'about-us':?>
						<?php //echo isset($staff_partial)?$staff_partial:'' ;  ?>
					<?php break;
					case 'prearrangement':?>
						
					<?php break;
					case 'helpful-links':?>
						<div class="col_indent"><?php echo $content_b; ?></div>
					<?php break;
					case 'resources':?>
						<div class="col_indent"><?php echo $content_b; ?></div>
					<?php break;
					case 'hospitality':?>
						<div class="col_indent"><?php echo $content_b; ?></div>
					<?php break;
					case 'floral':?>
						<div class="col_indent"><?php echo $content_b; ?></div>
					<?php break;
					case 'contact-us':?>
						<div class="col_indent">
							<?php echo isset($ss_info['ss_name']) ? $ss_info['ss_name'] : '' ; ?><br />
							<?php echo isset($ss_info['ss_address']) ? $ss_info['ss_address'] : '' ; ?><br />
							<?php echo isset($ss_info['ss_city']) ? $ss_info['ss_city'] : '' ; ?>, <?php echo isset($ss_info['ss_state']) ? $ss_info['ss_state'] : '' ; ?> <?php echo isset($ss_info['ss_zip']) ? $ss_info['ss_zip'] : '' ; ?><br />
							<?php echo isset($ss_info['ss_phone']) ? $ss_info['ss_phone'] : '' ; ?>
							<br /><br />
							Insert Staff email addresses here
						</div>
					<?php break;
					case 'memorial-products':?>
						<?php echo isset($items_partial)?$items_partial:'' ;  ?>
					<?php break;
					case 'staff':?>
						<?php echo isset($staff_partial)?$staff_partial:'' ;  ?>
					<?php break;
				} ?>
			
			</div>
		
		</div>

		<div id="footer">
			<?php echo isset($ss_info['ss_name']) ? $ss_info['ss_name'] : '' ; ?>
			&#149;
			<?php echo isset($ss_info['ss_address']) ? $ss_info['ss_address'] : '' ; ?>
			&#149;
			<?php echo isset($ss_info['ss_city']) ? $ss_info['ss_city'] : '' ; ?>, <?php echo isset($ss_info['ss_state']) ? $ss_info['ss_state'] : '' ; ?> <?php echo isset($ss_info['ss_zip']) ? $ss_info['ss_zip'] : '' ; ?>
			&#149;
			<?php echo isset($ss_info['ss_phone']) ? $ss_info['ss_phone'] : '' ; ?>

			<br clear="all" />
			<div id="foot_nav" class="small">
			<a href='<?php echo base_url();?>login'>Admin</a> | &copy;<?php echo date('Y');?> <?php echo isset($ss_info['ss_name']) ? $ss_info['ss_name'] : '' ; ?> | Privacy Policy | Site Map | Powered by FHM
			<br />
			<?php 
			if (!$this->ion_auth->logged_in()) {
				//echo ('rendered in {elapsed_time} seconds,  and {memory_usage} memory used.');
				//echo ('You are not logged in.');
				//echo (' <a href=\'login\'>login</a>');
			} else {
				$user = $this->ion_auth->get_user();
				echo ('You are logged in as: '.$user->email.' - '.$user->username);
				echo (' <a href=\'logout\'>logout</a>');
			}
			?>
			</div>
			<?php echo $contents; ?>
		</div>

	</div>
	</body>
</html>
