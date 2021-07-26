<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
	foreach($settings as $s)
  {$dat[$s->meta] = $s->value;}

  foreach($product as $prd)
	{
		$desc = ($prd->detail_info != '<p></p>' && $prd->detail_info != '<p><br></p>') ? $prd->detail_info: '<p>No Description</p>';

		$title = $prd->name;
		$detail = $desc;
    $image = $prd->picture;
    $ytlink = $prd->youtube_link;
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


<section class="section portfolio-single pt-4">
	<div class="container">
    <div class="row mt-2 border">
      <div class="col-md-12">
        <div class="project-info">
          <h3 class="mb-2 mt-2"><?php echo $title ?></h3>
        </div>
      </div>
    </div>

		<div class="row mt-2 border">
			<div class="col-lg-4 mb-2 mt-2">
				<img src="<?php echo base_url()."assets/home/images/product/".$image ?>" alt="<?php echo $title ?>" class="img-fluid w-100" style="border-radius:25px;">
			</div>

			<div class="col-lg-8 mb-2 mt-2">
				<div class="project-info">

        <?php foreach($properties as $prop) { ?>
					<div class="row mt-2">
						<div class="col-md-12">
							<div class="info">
								<h5 class="mb-0"><?php echo $prop->name ?></h5>
								<p class="mb-2"><?php echo $prop->value ?></p>
							</div>
						</div>
          </div>
        <?php } ?>

				</div>
			</div>
		</div>

    <div class="row mt-2 border">
      <div class="col-md-12">
        <style>
          p {margin-bottom : 0px !important;}
        </style>

        <h5 class="mb-0 mt-2">Description</h5>
        <p><?php echo $detail ?></p>
      </div>
    </div>

    <?php if($featcount > 0) { ?>
    <div class="row mt-2 border">
      <?php foreach($feature as $feat) { ?>
        <div class="col-12 col-lg-4 mb-2">
          <div class="post text-center" style="object-fit:contain;display:block;padding:10px;">
            <img src="<?php echo base_url()."assets/home/images/product/feature/".$feat->logo?>" alt="<?php echo $feat->title ?>" class="image-content img-fluid" style="max-height:100px;">
            <div class="post-content">
              <h4><?php echo $feat->title ?></h4>
              <p><?php echo $feat->description ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?>

    <?php if($galcount > 0) { ?>
    <div class="row mt-2 border">
        <?php foreach($gallery as $gal) { ?>
          <div class="col-lg-3 col-md-4 mt-2 mb-2">
			      <div class="card card-small card-post h-100 rounded">
				      <div class="post h-100 h-100" style="object-fit:contain;display:block;padding:10px;">
					      <a class="image-content h-100 d-flex align-items-center" href="<?php echo base_url()."assets/home/images/product/gallery/".$gal->image_name?>" target="_blank">
						      <img src="<?php echo base_url()."assets/home/images/product/gallery/".$gal->image_name?>" alt="<?php echo $gal->image_name ?>" class="img-fluid">
					      </a>
				      </div>
			      </div>
			    </div>
        <?php } ?>
    </div>
    <?php } ?>

    

    <?php if($ytlink != '') { ?>
    <div class="row mt-2 border">
      <div class="col-md-12">
        <h5 class="mt-2">Youtube Video</h5>
        <div class="video-wrapper mt-2 mb-2">
          <?php echo $ytlink ?>
        </div>
      </div>
    </div>
    <?php } ?>

		<div class="row mt-4 justify-content-center">
			<div class="col-lg-6 text-center">
				<a href="<?php echo base_url().$testweb."product" ?>" class="btn btn-dark">RETURN</a>
			</div>
		</div>
    
	</div>
</section>
