<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
	foreach($settings as $s)
    {$dat[$s->meta] = $s->value;}

    foreach($startup as $st)
    {
        $name = $st->s_name;
        $ceo = ($st->ceo != '') ? $st->ceo : '-';
        $description = $st->description;
        $year = ($st->yearlaunch != '') ? $st->yearlaunch : '-';
        $logo = ($st->logo != '') ? $st->logo : 'No Image Available.png';
        $website = ($st->website != '') ? $st->website : '-';
        $category = ($st->category != '') ? $st->category : '-';
    }

	$font = ($mobile == '1') ? 'font-size:14px;' : 'font-size:34px;';
	$height = ($mobile == '1') ? 'height:50vh;' : '';
	$top = ($mobile == '1') ? 'top:35%;' : 'top:45%;';
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


<section class="page-title section pt-5 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <h1 class="text-capitalize mb-0 text-lg">STARTUP DETAIL</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section portfolio-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<img src="<?php echo base_url()."assets/home/images/startup/".$logo ?>" alt="" class="img-fluid w-100">
			</div>

			<div class="col-lg-6">
				<div class="project-info">
					<h3 class="mb-4"><?php echo $name ?></h3>

					<p><?php echo $description ?></p>

					<div class="row mt-4">
						<div class="col-lg-6">
							<div class="info">
								<h5 class="mb-0">CEO</h5>
								<p><?php echo $ceo ?></p>
							</div>

							<div class="info">
								<h5 class="mb-0">Start Year</h5>
								<p><?php echo $year ?></p>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="info">
								<h5 class="mb-0">Category</h5>
								<p><?php echo $category ?></p>
							</div>
							<div class="info">
								<h5>Website</h5>
								<a href="<?php echo $website ?>" target=”_blank”><p><?php echo $website ?></p></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<a href="<?php echo base_url().$testweb."portfolio" ?>" class="btn btn-dark">RETURN</a>
			</div>
		</div>
	</div>
</section>
