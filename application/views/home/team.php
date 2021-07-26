<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
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

<!-- Service start -->
<section class="section service-home border-top mt-5 pt-5" style="min-height:50vh;">
	<div class="container">

        <?php if($tCount == '0') { ?>
		<div class="row">
			<div class="col-lg-12">
				<h2 class="mb-2 ">We stand by to accompany you, compassionately.</h2>
				<p class="mb-5">Regards, Team.</p>
			</div>
		</div>

        <?php } else { ?>

		<div class="row">
		<?php
			$i = 1;
			foreach($team as $t) {
				$marg = ($i == 3) ? 'mb-lg-0' : '';
				if($i > 3){$i = 1;}
				$image = ($t->image != '') ? $t->image : 'No Image Available.png';
		?>
			<div class="col-lg-3">
				<div class="service-item border border-primary rounded text-center mb-5 <?php echo $marg ?>">
					<img src="<?php echo base_url()."assets/home/images/team/".$image ?>" class="img-fluid w-100 d-block">
					<h4 class="my-3"><?php echo $t->name ?></h4>
					<h5><?php echo $t->position ?></h5>
				</div>
			</div>
			<?php $i = $i + 1; } ?>
		</div>
        <?php } ?>
	</div>
</section>
<!-- service end -->
