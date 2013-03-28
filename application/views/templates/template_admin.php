<!DOCTYPE html>
<html lang="en">
	<head>
	<title><?php echo $title ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php echo link_tag('assets/css/base.css'); ?>
	<?php echo link_tag('assets/cleditor/jquery.cleditor.css'); ?>
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/cleditor/jquery.cleditor.min.js"></script>
	<script type="text/javascript">
      $(document).ready(function() {
        $(".cledit").cleditor({
        	width: 500,
        	height: 250,
        	bodyStyle: "margin:4px; font:10pt Arial,Verdana; cursor:text"
            });
      });
    </script>
	
	</head>
	<body>
	
	<div id="base" class="column">	
		
		<div id="header">
			<?php if (isset($headline)) {echo $headline;} ?>
		</div>
		
		<div id="main">
			<div id="navbox">
				<?php if ($shownav) {echo ($this->ion_auth->is_admin() ? $this->navigation->display('admin') : $this->navigation->display('members'));} ?>
			</div>
		
			<?php echo $contents; ?>
			
		</div>
		
		<div id="footer">
			Page rendered in {elapsed_time} seconds,  and {memory_usage} memory used.
			
			<?php 
			if (!$this->ion_auth->logged_in()) {
				echo ('You are not logged in.');
			} else {
				$user = $this->ion_auth->get_user();
				echo ('You are logged in as: '.$user->email.' / '.$user->username);
				echo ('&nbsp;&#149;&nbsp;<a href=\''.base_url().'logout\'>logout</a>');
			}
			?>
		
		</div>

	</div>
	</body>
</html>