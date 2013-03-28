
<div id="boxes"><!-- DIV contains ALL forms used on page, display is controlled via jQuery below -->
	<div id="dialog" class="window">
		<img src="../images/btn_close.png" class="closex" alt="close">
		<div id="actual">
			<h2>Share Your Condolences...</h2>
			<form id="cond_form">
				<label for="name">Your Name:</label><input name="name" id="name"><br />
				<label for="quote">Condolence:</label><textarea name="quote" id="quote"></textarea><br />
				<label for="passcode">Passcode:</label><input name="passcode" id="passcode"><br />
				<span>NOTE: You must supply the passcode to post your condolences. You can obtain the code from the family.</span>
				<input type="button" value="Submit" name="submitcond" id="submitcond"><br />
			</form>
		</div>
		<div id="ractual" style="display:none;">
			<br /><br /><br />
			<p>Thank you for your Condolences. The family is most appreciative at this time... </p>
			<br /><br /><br />
	        <p style="text-align:center;"><input type="button" name="close" value="Close" id="closer"></p>
		</div>
	</div>
	
	<div id="dialog2" class="window">
		<img src="../images/btn_close.png" class="closex" alt="close">
		<div id="actual2">
			<h2>Share Your Story...</h2>
			<form id="memo_form">
				<label for="mname">Your Name:</label><input name="name2" id="name2"><br />
				<label for="title">Story Title:</label><input name="title" id="title"><br />
				<label for="memo">Your Story:</label><textarea name="memo" id="memo"></textarea><br />
				<label for="passcode">Passcode:</label><input name="passcode" id="passcode"><br />
				<span>NOTE: You must supply the passcode to post your story about the deceased. You can obtain the code from the family.</span>
				<input type="button" value="Submit" name="submitmemo" id="submitmemo"><br />
			</form>
		</div>
		<div id="ractual2" style="display:none;">
			<br /><br /><br />
			<p>Thank you for sharing your memory of the deceased. The family is most appreciative at this time... </p>
			<br /><br /><br />
	        <p style="text-align:center;"><input type="button" name="close" value="Close" id="closer2"></p>
		</div>
	</div>
	
	<div id="dialog3" class="window">
		<img src="../images/btn_close.png" class="closex" alt="close">
		<div id="actual3">
			<h2>Share A Photograph...</h2>

			<form enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>upload/do_upload" id="photo_form">
				<input type="hidden" value="<?php echo $service_id; ?>" id="services_id" name="services_id">
				<label for="name3">Your Name:</label><input name="name3" id="name3"><br />
				<label for="title3">Photo Title:</label><input name="title3" id="title3"><br />
				<label for="photo">Your Photo:</label><input type="file" name="userfile" id="userfile"><br />
				<label for="passcode">Passcode:</label><input name="passcode" id="passcode"><br />
				<span>NOTE: You must supply the passcode to post a photograph. Please only post one photo per visitor. You can obtain the code from the family.</span>
				<input type="submit" value="Submit" name="submit" id="submit"><br />
			</form>
			
		</div>
		<div id="ractual3" style="display:none;">
			<br /><br /><br />
			<p>Thank you for sharing your photo. The family is most appreciative at this time... </p>
			<br /><br /><br />
	        <p style="text-align:center;"><input type="button" name="close" value="Close" id="closer3"></p>
		</div>
	</div>
	
	
    <div id="mask"></div>
</div><!-- END boxes form div -->


<div id="view_controls" class="right">
	<a href="" name="show1"><img src="<?php echo base_url();?>images/grfx_btn_sd_1.png"></a><a href="" name="show2"><img src="<?php echo base_url();?>images/grfx_btn_im_1.png"></a>
</div>
<div id="view_controls2" class="right" style="display:none;">
	<a href="" name="show3"><img src="<?php echo base_url();?>images/grfx_btn_sd_2.png"></a><a href="" name="show4"><img src="<?php echo base_url();?>images/grfx_btn_im_2.png"></a>
</div>

<div id="service_memory_container">
	<div id="service_memory_bio" class="left">
		<p><?php echo element('bio', $services); ?> <br /> </p>
	</div><!-- END service_memory_bio -->

	<div id="service_memory_cnd" class="right">
		<div>&nbsp;</div>
		<div class="scrollbox">
			<?php if (count($condarray) > 0) { ?>
			<table>
				<?php foreach ($condarray as $condolence):?>
				<tr>
					<td><span style="font-size:14px; font-style:italic;">"<?php echo $condolence->quote; ?>"</span></td>
				</tr>
				<tr>
					<td style="text-align:center;"> - <span style="font-size:12px;"><?php echo $condolence->name; ?></span> - </td>
				</tr>
				<tr>
					<td> &nbsp; </td>
				</tr>
				<?php endforeach;?>
			</table>
			<?php } else { echo 'No Data Available';} ?>
		</div>
		
		<div style="display:inline-block; position:relative; text-align:center; width:100%; top:12px;"><a href="" name="condmodal"><img src="<?php echo base_url();?>images/grfx_btn_add_cond.jpg"></a></div>
	</div><!-- END service_memory_cnd -->
	
	<br clear="all" /><br />
	<div id="service_memory_pic" class="left">
		<div style="margin:5px;"><img src="<?php echo base_url();?>images/grfx_band_mem_photo.jpg" alt="Add Your Photo"></div>
		<div class="scrollbox">
			<?php if (count($filearray) > 0) { ?>

				<?php $pcounter = 0;
					echo '<table>';
					foreach($filearray as $photo)
					{ 
						if($pcounter % 4 == 0)
							echo '<tr><td align="center">';
							//echo '<tr><td colspan="4"> </td></tr><tr>';
							
							//echo '<td align="center"><a class="popup" href="gallery_view/'.$photo->id.'"><img src="'.base_url().$photo->filename.'" style="max-height:80px;" /></a></td>';
							echo '<td align="center"><a class="popup" href="gallery_view/'.$photo->id.'?s='.$pcounter.'"><img src="'.base_url().$photo->filename.'" style="max-height:80px;" /></a></td>';
						$pcounter++;
					}
					echo '</table>'; 
				?>

			
			<?php } else { echo 'No Data Available';} ?>
		</div>
	</div>
	<div id="service_memory_sto" class="right">
		<div style="margin:5px;"><img src="<?php echo base_url();?>images/grfx_band_mem_story.jpg" alt="Add Your Story"></div>
		<div class="scrollbox">
			<?php function limit_words($string, $word_limit)
				{
					$words = explode(" ",$string);
					return implode(" ",array_splice($words,0,$word_limit));
				} ?>
			<?php if (count($memoarray) > 0) { ?>
			<table>
				<?php foreach ($memoarray as $memory):?>
				<tr>
					<td style="padding:10px 20px;">
					<?php echo '<i>'.limit_words($memory->story,16).'...</i> <a href="gallery_read/'.$memory->id.'" class="popup">Read More</a>';//echo $memory->story; ?>
					</td>
				</tr>
				<?php endforeach;?>
			</table>
			<?php } else { echo 'No Data Available';} ?>
		</div>
	</div>
	<div class="left" style="margin-left:49px; width:408px; display:inline-block; position:relative; text-align:center;"><a href="" name="photomodal"><img src="<?php echo base_url();?>images/grfx_btn_add_photo.jpg" alt="add your photo"></a></div> 
	<div class="right" style="margin-right:49px; width:408px; position:relative; text-align:center;"><a href="" name="memomodal"><img src="<?php echo base_url();?>images/grfx_btn_add_story.jpg" alt="add your story"></a></div>
</div><br clear="all" />

<div id="service_details_container">
	<table border="0" cellspacing="10">
		<tr>
			<td class="colhead"><strong>General Information</strong></td>
			<td class="tright">Full Name</td>
			<td class="tleft"><?php echo element('full_name', $services); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Date of Birth</td>
			<td><?php echo date("F j, Y", strtotime(element('dob', $services))); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Date of Death</td>
			<td><?php echo date("F j, Y", strtotime(element('dod', $services))); ?></td>
		</tr>
		
		<tr>
			<td class="colhead"><strong>Service Information</strong></td>
			<td class="tright">Location</td>
			<td><?php echo element('service_location', $services); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Date of Service</td>
			<td><?php echo date("F j, Y", strtotime(element('service_date', $services))); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Time</td>
			<td><?php echo element('service_time', $services); ?></td>
		</tr>
		
		<tr>
			<td class="colhead"><strong>Visitation Information</strong></td>
			<td class="tright">Date(s) of Visitation</td>
			<td><?php echo date("F j, Y", strtotime(element('visit_date', $services))); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Hours</td>
			<td><?php echo element('visit_time', $services); ?></td>
		</tr>

		<tr>
			<td class="colhead"><strong>Interment Information</strong></td>
			<td class="tright">Location</td>
			<td><?php echo element('int_location', $services); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Date of Interment</td>
			<td><?php echo date("F j, Y", strtotime(element('int_date', $services))); ?></td>
		</tr>
		<tr>
			<td class="colhead"></td>
			<td class="tright">Time</td>
			<td><?php echo element('int_time', $services); ?></td>
		</tr>
		
		<tr>
			<td class="colhead"><strong>Published Obituary</strong></td>
			<td colspan="2"><?php echo element('obit', $services); ?></td>
		</tr>

	</table>
</div>

<script>
$(document).ready(function() {
    jQuery('a.popup').live('click', function(){
        newwindow=window.open($(this).attr('href'),'','height=500,width=500');
        if (window.focus) {newwindow.focus();}
        return false;
    });
	$('#service_details_container').hide();
	$('#service_memory_container').show();
	$('a[name=show1]').click(function(e) {
		e.preventDefault();
		$('#service_memory_container').hide();
		$('#service_details_container').show();
		$('#view_controls').hide();
		$('#view_controls2').show();
	});
	$('a[name=show2]').click(function(e) {
		e.preventDefault();
		$('#service_memory_container').show();
		$('#service_details_container').hide();
		$('#view_controls').show();
		$('#view_controls2').hide();
	});
	$('a[name=show3]').click(function(e) {
		e.preventDefault();
		$('#service_memory_container').hide();
		$('#service_details_container').show();
		$('#view_controls').hide();
		$('#view_controls2').show();
	});
	$('a[name=show4]').click(function(e) {
		e.preventDefault();
		$('#service_memory_container').show();
		$('#service_details_container').hide();
		$('#view_controls').show();
		$('#view_controls2').hide();
	});

	// Jquery functions for modal lightbox operation
    //select all the a tag with name equal to modal
    $('a[name=condmodal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();
        var id = '#dialog';
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
        //transition effect
        $('#mask').fadeIn(1000);
        $('#mask').fadeTo("fast",0.8);
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
        //Set the popup window to center
        $(id).css('top',  winH/2-$(id).height()/2);
        $(id).css('left', winW/2-$(id).width()/2);
        //transition effect
        $(id).fadeIn(2000);
    });
    $('a[name=memomodal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();
        var id = '#dialog2';
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
        //transition effect
        $('#mask').fadeIn(1000);
        $('#mask').fadeTo("fast",0.8);
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
        //Set the popup window to center
        $(id).css('top',  winH/2-$(id).height()/2);
        $(id).css('left', winW/2-$(id).width()/2);
        //transition effect
        $(id).fadeIn(2000);
    });
    $('a[name=photomodal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();
        var id = '#dialog3';
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
        //transition effect
        $('#mask').fadeIn(1000);
        $('#mask').fadeTo("fast",0.8);
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
        //Set the popup window to center
        $(id).css('top',  winH/2-$(id).height()/2);
        $(id).css('left', winW/2-$(id).width()/2);
        //transition effect
        $(id).fadeIn(2000);
    });
    
    //if close button is clicked
    $('.window .close').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        $('form')[0].reset();
        $('#mask, .window').hide();
    });
    $('#closer').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        $('cond_form')[0].reset();
        $('#mask, .window').hide();
    	$('#actual').show();
    	$('#ractual').hide();
    });
    $('#closer2').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        $('memo_form')[0].reset();
        $('#mask, .window').hide();
    	$('#actual2').show();
    	$('#ractual2').hide();
    });
    $('#closer3').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        //$('photo_form')[0].reset();
        $('#mask, .window').hide();
    	$('#actual3').show();
    	$('#ractual3').hide();
    });
    
    //if mask is clicked
    $('#mask').click(function () {
    	$('form')[0].reset();
        $(this).hide();
        $('.window').hide();
    });
    
    //if closex is clicked
    $('.closex').click(function () {
    	$('form')[0].reset();
        $('#mask, .window').hide();
    });


	

	//if submit button is clicked for condolence form
	$('#submitcond').click(function () {
		var name = $('input[name=name]');
        var quote = $('textarea[name=quote]');
		$.ajax({
			url : '<?php echo base_url();?>services/add/cond',
			type : 'post',
			dataType : 'json',
			data : {
				services_id : '<?php echo $service_id; ?>',
				passcode : '<?php echo $passcode; ?>',
				name : name.val(),
				quote : quote.val()
            },
            success : function(result) {
            	//insert here to execute when url has returned a result/success
                /*if (result) {
                	// execute if true
                	$('form')[0].reset();
                	$('#mask, .window').hide();
                } else {
                    //execute if false
                    $('form')[0].reset();
                	$('#mask, .window').hide();
                }*/
                $('#cond_form')[0].reset();
            	$('#actual').hide();
            	$('#ractual').show();
            }
        });
            return false;
        });

	//if submit button is clicked for memory form
	$('#submitmemo').click(function () {
		var name = $('input[name=name2]');
		var title = $('input[name=title]');
        var memo = $('textarea[name=memo]');
		$.ajax({
			url : '<?php echo base_url();?>services/add/memo',
			type : 'post',
			dataType : 'json',
			data : {
				services_id : '<?php echo $service_id; ?>',
				title : title.val(),
				name : name.val(),
				story : memo.val()
            },
            success : function(result) {
            	//insert here to execute when url has returned a result/success
                /*if (result) {
                	// execute if true
                	$('form')[0].reset();
                	$('#mask, .window').hide();
                } else {
                    //execute if false
                    $('form')[0].reset();
                	$('#mask, .window').hide();
                }*/
                $('#memo_form')[0].reset();
            	$('#actual2').hide();
            	$('#ractual2').show();
            }
        });
            return false;
        });

    
	//if submit button is clicked for photo form

	$('#photo_form').on('submit', function(e) {
		e.preventDefault(); // <-- important
		$('#photo_form').prop('method', 'POST').ajaxSubmit({
		//$(this).ajaxSubmit({
			//target: '#ractual3'
		});
        $('#photo_form')[0].reset();
    	$('#actual3').hide();
    	$('#ractual3').show();
	});
	
	

	
	$('#submitphotozzz').click(function () {
		var name = $('input[name=name3]');
		var photo = $('input[name=photo]');
		$.ajax({
			url : '<?php echo base_url();?>services/add/photo',
			type : 'post',
			dataType : 'json',
			data : {
				services_id : '<?php echo $service_id; ?>',
				photo : photo.val(),
				name : name.val(),

            },
            success : function(result) {
            	//insert here to execute when url has returned a result/success
                /*if (result) {
                	// execute if true
                	$('form')[0].reset();
                	$('#mask, .window').hide();
                } else {
                    //execute if false
                    $('form')[0].reset();
                	$('#mask, .window').hide();
                }*/
                $('#photo_form')[0].reset();
            	$('#actual3').hide();
            	$('#ractual3').show();
            }
        });
            return false;
        });

	
});
</script>
