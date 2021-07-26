<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}

	if($poscount > 0)
	{
		foreach($poster as $pos)
		{
			$postitle = $pos->name;
			$posimage = $pos->image;
			$posid = $pos->id;
			$postype = $pos->type;
		}
	}

	if($this->session->userdata('guest') == NULL) {
		$newGuest = true;
		$data_session = array(
		  'guest' => 'login'
		);
		$this->session->set_userdata($data_session);
	}
	else {$newGuest = false;}
?>
<!-- Footer start -->
<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<img class="img-fluid" src="<?php echo base_url()."assets/home/images/logo gib putih.png" ?>" alt="" style="height:100px;">
			</div>
			<div class="col-lg-6">
				<p class="mb-0">Copyrights © <?php echo $dat['website_name'] ?> 2020.</p>
				<p class="mb-0">All rights reserved.</p>
				<?php //<p class="mb-0">Designed by <a href="https://themefisher.com" class="text-white" target="_blank">Themefisher</a></p> ?>
			</div>
			<div class="col-lg-4">
				<div class="widget footer-widget text-lg-right mt-5 mt-lg-0">
					<ul class="list-inline mb-0">
						<?php 
							foreach($sosmed as $med) {
							$link = ($med->link != '') ? $med->link : '#';
							if($med->appear != '0')
							{
						?>
						<li class="list-inline-item"><a href="<?php echo $link ?>" target="_blank"><i class="ti-<?php echo $med->logo ?> mr-3"></i></a></li>
						<?php }} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer End -->

<?php /* ?>
<style>
.float{
	position:fixed;
	width:180px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	border-radius:20px;
	text-align:center;
	box-shadow: 2px 2px 3px #FFF;
}

.timer{
	display:flex;
	color:#FFF !important;
	justify-content:center;
	align-items:center;
	height:100%;
}

.my-float{
	margin-top:22px;
}

.blink-bg{
	color: #fff;
	display: inline-block;
	animation: blinkingBackground 2s infinite;
}
@keyframes blinkingBackground{
	0%		{ background-color: #10c018;}
	25%		{ background-color: #1056c0;}
	50%		{ background-color: #ef0a1a;}
	75%		{ background-color: #254878;}
	100%	{ background-color: #04a1d5;}
}
</style>

<div id="flid" class="float">
	<h5 class="timer" id="timer"></h5>
</div>

<?php */ ?>

<?php if($dat['website_poster_enable'] == '1' && $poscount > 0 && $header != 'Error 404'){if($newGuest == true) {?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Latest News</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
				<img class="img-fluid" src="<?php echo base_url()."assets/home/images/gallery/".$posimage ?>" id="imageLogo" alt="" style="display:block;">
				<h5 class="pt-3 pb-3" ><?php echo $postitle ?></h5>
				<?php if($postype != "2") { ?><a href="<?php echo base_url().$testweb."blog/" ?>"><p class="text-right mb-0">Read more</p></a><?php } ?>
            </div>
        </div>
    </div>
</div>
<?php }} ?>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/home/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url() ?>assets/home/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/shuffle/shuffle.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/animated-text/animated-text.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/counto/apear.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/counto/counTo.js"></script>

 <!-- Google Map -->
<script src="<?php echo base_url() ?>assets/home/plugins/google-map/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script> 
<!-- Main Script -->
<script src="<?php echo base_url() ?>assets/home/js/script.js"></script>
<?php /* ?><script src="<?php echo base_url() ?>assets/home/js/countdown.js"></script><?php */?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
	(function ($) {
		var s = $("#navbar");
		var l = $("#imageLogo");
    	var pos = s.position();
		var anim = 0;
    	$(window).on('scroll', function() {
			var windowpos1 = $(window).scrollTop() > 300;
			var windowpos2 = $(window).scrollTop() > 200;
			if (windowpos2 > pos.top) {
				if(anim == 0)
				{
					l.slideUp(500,'swing',function () {
						document.getElementById("imageLogo").style.display = "none";
						l.attr('src','<?php echo base_url()."assets/home/images/".$dat['website_second_logo'] ?>');
					});
					setTimeout(function () {
						l.slideDown();
					}, 1000);
					anim = 1;
				}
        	} else {
				if(anim == 1)
				{
					l.slideUp(500,'swing',function () {
						document.getElementById("imageLogo").style.display = "none";
						l.attr('src','<?php echo base_url()."assets/home/images/".$dat['website_logo'] ?>');
					});
					setTimeout(function () {
						l.slideDown();
					}, 1000);
					anim = 0;
				}
			}
			
        	if (windowpos1 > pos.top) {
				s.addClass("sticky");
        	} else {
				s.removeClass("sticky");
        	}
		});
	})(jQuery);

	
	$(document).ready(function(){
		$("a").on('click', function(event) {
			if (this.hash !== "") {
				event.preventDefault();
    			var hash = this.hash;
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 800, function(){
					window.location.hash = hash;
				});
    		}
		  });
	});
</script>
<script>
	$("#slideshow > div:gt(0)").hide();
	setInterval(function() {
  		$('#slideshow > div:first')
    	.fadeOut(1000)
    	.next()
    	.fadeIn(1000)
    	.end()
    	.appendTo('#slideshow');
	}, 3000);
</script>

<?php if($dat['website_poster_enable'] == '1'){if($newGuest == true) {?>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<?php }} ?>

</html>