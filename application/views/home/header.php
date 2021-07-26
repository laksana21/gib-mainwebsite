<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($settings as $s)
  {$dat[$s->meta] = $s->value;}
  $imgsize = ($mobile == '1') ? 'height:40px;' : 'height:60px;';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $dat['website_name'].' - '.$header ?></title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="<?php echo $dat['website_about'] ?>">
  
  <meta property="og:url" content="<?php echo base_url() ?>">
  <meta property="og:site_name" content="<?php echo $dat['website_name'] ?>">
  <meta property="og:title" content="<?php echo $dat['website_name'] ?>">
  <meta property="og:type" content="website">
  <meta property="og:description" content="<?php echo $dat['website_about'] ?>">
  <meta property="og:image" content="<?php echo base_url() ?>assets/home/images/fav.ico">

  <!-- ** Plugins Needed for the Project ** -->
  <link href="<?php echo base_url() ?>assets/home/images/fav.ico" rel="icon">
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

  <!-- Main Stylesheet -->
  <link href="<?php echo base_url() ?>assets/home/css/style.css" rel="stylesheet">
</head>

<body>
  
<!-- Navigation Start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg main-nav mw-100" id="navbar" style="z-index:1000;">
	<div class="container">
	  <a class="navbar-brand" href="<?php echo base_url() ?>">
	  	<img src="<?php echo base_url()."assets/home/images/".$dat['website_logo'] ?>" id="imageLogo" alt="" style="display:block;<?php echo $imgsize ?>" class="img-fluid">
	  </a>

	  <button class="navbar-toggler collapsed text-white" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation" style="z-index: 1000;">
		  <span class="ti-align-justify" style="z-index: 1000;"></span>
	  </button>
  
		  <div class="collapse navbar-collapse" id="navbarsExample09" style="z-index:1000;">
			<ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown01">
						<li><a class="dropdown-item" href="<?php echo base_url().$testweb ?>about">About Us</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url().$testweb ?>expert">Expertise</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url().$testweb ?>partner">Our Partner</a></li>
						<?php if($tCount > 0) { ?><li><a class="dropdown-item" href="<?php echo base_url().$testweb ?>team">Our Team</a></li><?php } ?>
					</ul>
			  </li>

			  <li class="nav-item active"><a class="nav-link shadow" href="<?php echo base_url().$testweb ?>activities">Activities</a></li>

        <li class="nav-item"><a class="nav-link shadow" href="<?php echo base_url().$testweb ?>product">Product Innovation</a></li>
			  
			  <li class="nav-item"><a class="nav-link shadow" href="<?php echo base_url().$testweb ?>contact">Contact</a></li>			  
			</ul>
		</div>
	</div>
</nav>

<!-- Header Close --> 


<!-- Navigation ENd -->
