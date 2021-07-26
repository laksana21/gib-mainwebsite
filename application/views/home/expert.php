<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$font = ($mobile == '1') ? 'font-size:14px;' : 'font-size:34px;';
	$height = ($mobile == '1') ? 'height:50vh;' : '';
	$top = ($mobile == '1') ? 'top:35%;' : 'top:45%;';
	$title = ($mobile == '1') ? 'style="font-size:32px;"' : '';
?>

<section class="section banner-2" style="padding:0px;">
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox" style="<?php echo $height ?>">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-17.jpg')">
        <div class="carousel-caption d-md-block overlay">
		  <div style="position:absolute;<?php echo $top ?>right:15%;left:15%;">
          	<h2 class="display-4 text-white" style="<?php echo $font ?>">Exploring Innovation is our priority</h2>
		  </div>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-19 (1).jpg')">
        <div class="carousel-caption d-md-block overlay">
		  <div style="position:absolute;<?php echo $top ?>right:15%;left:15%;">
		  	<h2 class="display-4 text-white" style="<?php echo $font ?>">Strengthen Network for Developing Business</h2>
		  </div>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-16 (1).jpg')">
        <div class="carousel-caption d-md-block overlay">
		  <div style="position:absolute;<?php echo $top ?>right:15%;left:15%;">
          	<h2 class="display-4 text-white" style="<?php echo $font ?>">Developing Business through quality</h2>
		  </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>
	
</section>

<section class="page-title section border-top pb-3 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <h1 class="text-capitalize mb-0 text-lg" <?php echo $title ?>>Our Expertise</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section border-bottom pt-4 pb-4" style="min-height:50vh;">
	<div class="container">
		<div class="row align-items-center pt-2">
			<div class="col-lg-12 pr-4 h-100 aos-init" data-aos="fade-right">
				<div class="col-lg-12 pb-3 pr-2">
					<?php
						foreach($expert as $exp){
							$image = ($exp->image != '') ? $exp->image : 'no-image.png';
					?>
					<div class="row pb-4 ml-2 mr-2">
						<div class="col-md-4 aos-init pt-2" data-aos="fade-left" data-aos-delay="450">
							<img src="<?php echo base_url()."assets/home/images/expertise/".$image?>" alt="" class="img-fluid" style="height:156px;">
						</div>
						<div class="col-md-8 pb-4 pt-2 aos-init" data-aos="fade-left" data-aos-delay="450">
							<h4 class="mb-2 "><?php echo $exp->title ?></h4>
							<p class="mb-2"><?php echo $exp->description ?></p>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>

		</div>
		<div class="row align-items-center border-top pt-4">
			<img class="img-fluid" src="<?php echo base_url()."assets/home/images/ia-dark-logo.png" ?>" style="margin:auto;">
		</div>
	</div>
</section>
