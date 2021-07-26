<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title><?php echo $dat['website_name'] ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<!-- Icon -->

	<link href="<?php echo base_url() ?>assets/home/images/fav.ico" rel="icon">
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/underconstruction/common-css/ionicons.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/underconstruction/common-css/jquery.classycountdown.css" />
	<link href="<?php echo base_url() ?>assets/underconstruction/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/underconstruction/css/responsive.css" rel="stylesheet">
	
</head>
<body>
	
	<div class="main-area-wrapper">
		<div class="main-area center-text" style="background-image:url(<?php echo base_url() ?>assets/underconstruction/images/countdown-5-1600x900.jpg);">
			
			<div class="display-table">
				<div class="display-table-cell">
					
					<h1 class="title"><b>Comming Soon</b></h1>
					<p class="desc font-white">Our website is currently undergoing scheduled maintenance.
						We Should be back shortly. Thank you for your patience.</p>
					
					<div id="normal-countdown" data-date="<?php echo $dat['website_date_countdown'] ?>"></div>

					<ul class="social-btn">
						<li class="list-heading">Follow us for update</li>
						<?php 
							foreach($sosmed as $med) {
							$link = ($med->link != '') ? $med->link : '#';
							if($med->appear != '0')
							{
						?>
						<li><a href="<?php echo $link ?>"><i class="ion-social-<?php echo $med->logo ?>"></i></a></li>
						<?php }} ?>
					</ul>
					
				</div><!-- display-table -->
			</div><!-- display-table-cell -->
		</div><!-- main-area -->
	</div><!-- main-area-wrapper -->
	
	<!-- SCIPTS -->
	
	<script src="<?php echo base_url() ?>assets/underconstruction/common-js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/underconstruction/common-js/jquery.countdown.min.js"></script>
	<script src="<?php echo base_url() ?>assets/underconstruction/common-js/scripts.js"></script>
	
</body>
</html>