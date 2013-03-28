<style>
#memos { width: 430px; height: 430px; }
#memos div { width: 400px; height: 400px; padding: 15px; color: #333; text-align: left; font-size: 16px; overflow: hidden }
.memos_nav { text-align:center; margin-top:5px; }
</style>

<div id="memo_box">

	 <div id="memos">
		<?php 
			foreach($list_memos as $memo)
			{
				echo '<div id="story"><p>'.$memo->title.'</p><p>'.$memo->story.'</p></div>';
			}
		?>
	</div>
	
	<div class="memos_nav"><a id="prev2" href="#"><?php echo '<img src="'.base_url().'images/grfx_btn_story_prev.png" />'; ?></a><a id="next2" href="#"><?php echo '<img src="'.base_url().'images/grfx_btn_story_next.png" />'; ?></a></div>
	
	<script type="text/javascript">
	$('#memos').cycle({
	    //fx:    'scrollRight',
	    //delay: -1000
	    fx:     'fade',
	    speed:  'fast',
	    timeout: 0,
	    startingSlide: <?php echo $memoid-1 ?>,
	    next:   '#next2',
	    prev:   '#prev2'
	});

	</script>

</div>

