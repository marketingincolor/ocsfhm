	
			<div id="footer">
				Insert Footer Data here: rendered in {elapsed_time} seconds,  and {memory_usage} memory used.
				
				<?php 
				if (!$this->ion_auth->logged_in()) {
					echo ('You are not logged in.');
					echo (' <a href=\'login\'>login</a>');
				} else {
					$user = $this->ion_auth->logged_in();
					echo ('You are logged in as: '.$user.' - ');
					echo (' <a href=\'logout\'>logout</a>');
				}
				?>
			
			</div>
	
		</div>

	</div>
	</body>
</html>