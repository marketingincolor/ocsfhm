<script>
	$(document).ready(function(){
	 var str=location.href.toLowerCase();
	    $('.navlist li a').each(function() {
	            if (str.indexOf(this.href.toLowerCase()) > -1) {
	                    $(this).parent().addClass("current");
                    	//$(this).addClass("current");
	               }
	           });
	});
</script>

<div id="nav" class="">	
<?php echo $this->navigation->display('primary'); ?>
</div>
