<style>
#gallery_photos { width: 430px; height: 430px;  }
#gallery_photos div { width: 400px; height: 400px; padding: 15px; color: #333; text-align: left; font-size: 16px; overflow: hidden }
.photos_nav { text-align:center; margin-top:5px; }
</style>
<br />
<div id="gallery_box">
	<div id="gallery_photos"> 
	<?php 
		foreach($list_photos as $photo)
		{
			echo '<img src="'.base_url().$photo->filename.'" />';
		}
	?>
	</div>
	<div class="photos_nav"><a id="prev2" href="#"><?php echo '<img src="'.base_url().'images/grfx_btn_photo_prev.jpg" />'; ?></a><a id="next2" href="#"><?php echo '<img src="'.base_url().'images/grfx_btn_photo_next.jpg" />'; ?></a></div>
	<script type="text/javascript">
		$('#gallery_photos').cycle({
		    fx:     'fade',
		    speed:  'fast',
		    timeout: 0,
		    width: 480,
		    fit: 1,
		    startingSlide: <?php echo $start ?>,
		    next:   '#next2',
		    prev:   '#prev2'
		});
	</script> 
</div>



