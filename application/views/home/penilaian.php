<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($settings as $s)
  {$dat[$s->meta] = $s->value;}
  $font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
  $container = ($mobile == '1') ? '<div class="container pt-5 mt-5" style="padding:5% 0% 5% 0%;">' : '<div class="container" style="padding:10% 0% 5% 0%;">';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title><?php echo $dat['website_name'] ?></title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="PT. Gama Innovasi Berdikari uniquely improves every products and services through innovation. Our objectives are scaling up bussiness to prioritize integrity, quality, and compassion.">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/bootstrap/bootstrap.min.css">
  <link href="//db.onlinewebfonts.com/c/7cc8cbbd7a330c0d1e7c08c6d62711e4?family=League+Spartan" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/themify/css/themify-icons.css">
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/fontawesome/css/all.css">

  <script src="<?php echo base_url() ?>assets/home/js/bootstrap.bundle.min.js"></script>
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/counto/animate.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/aos/aos.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/plugins/animated-text/animated-text.css">
  <style>
    .float{
	    position:fixed;
	    bottom:30px;
	    right:30px;
	    color:#FFF;
	    text-align:center;
    }

    .my-float{
	    margin-top:22px;
    }
  </style>

  <!-- Main Stylesheet -->
  <link href="<?php echo base_url() ?>assets/home/css/style.css" rel="stylesheet">
</head>

<body>
<!-- contact form start -->
<a href="#" class="float">
    <img src="<?php echo base_url()."assets/home/images/".$dat['website_logo'] ?>" id="imageLogo" alt="" style="display:block;height:80px;" class="img-fluid">
</a>
<section class="contact section pt-2">
    <div class="col-lg-12 container">
        <div class="row justify-content-center text-center pt-1 pb-0">
            <script type="text/javascript">
                document.write("<h3>Form Penilaian Tampilan Website</h3>")
            </script>
            <noscript>JavaScript is off. Please enable to view full site.</noscript>
            
        </div>
        <div class="row pt-2 pb-2 border-top border-bottom">
            <div class="col-lg-9 col-md-12 col-sm-12 h-100">
                <center>
                <iframe src="https://butimo.co/" frameborder="0" style="width:100%;height:90vh;border-style:solid;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </center>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center pt-4 mb-5 contact-title">
                    <h2>Contact us</h2>
                </div>

                <form class="contact__form mt-5" method="post" action="<?php echo base_url().$testweb."send_messages/".$testweb?>">
                <div class="form-row">
                        <div class="col-lg-4 mb-4">
                            <h4>Contact Info</h4>
                            <p><?php echo $dat['website_contact_info'] ?></p>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <h4>Address</h4>
                            <p><?php echo $dat['website_contact_address'] ?> <?php echo $dat['website_postal_code'] ?></p>
                        </div>
                        <div class="col-lg-4">
                            <h4>Contact</h4>
                            <p class="mb-0"><?php echo $dat['website_contact_email'] ?></p>
                            <p class="mb-0"><?php echo $dat['website_contact_phone'] ?></p>
                        </div>
                </form>
            </div>  
        </div>
    </div>
</body>
</section>
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
<!-- Main Script -->
<script src="<?php echo base_url() ?>assets/home/js/script.js"></script>
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
</html>