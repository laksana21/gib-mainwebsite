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

<section class=" portfolio ">
	<div class="container">
		<div class="row mb-5 justify-content-center">
	      	<div class="col-10 text-center">
		        <div class="btn-group btn-group-toggle " data-toggle="buttons">
		          <!--label class="btn active">
		            <input type="radio" name="shuffle-filter" value="all" >All Portfolio
		          </label -->
		          <?php /*
				  $ch = 1;
				  foreach($sStatus as $stat)
				  {
					if($ch == 1)
					{$chk = "checked=".chr(32)."checked".chr(32)."";$btn = "active";}
					else
					{$chk = " "; $btn=" ";}
					echo "
					  <label class='btn ".$btn."'>
					  	<input type='radio' name='shuffle-filter' value=".$stat->meta." ".$chk." />".$stat->step_name."
					  </label>";
					$ch = $ch + 1;
				  }
				  */?>
		        </div>
	      	</div>
    	</div>	

		<div class="row shuffle-wrapper portfolio-gallery shuffle" style="position: relative; overflow: hidden; height: 1252.45px; transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1) 0s;">
		<?php
		foreach($startup as $star)
		{
			$logo = ($star->logo != '') ? $star->logo : 'No Image Available.png';

			if($star->loadurl == '1')
			{$urllink = $star->website; $target = "target='_blank'";}
			else
			{$urllink = base_url().$testweb."portfolio/".$star->id; $target = "";}
			echo "
			<div class='col-lg-4 col-6 mb-4 shuffle-item'  data-groups='[&quot;".$star->status."&quot;]'>
				<div class='position-relative inner-box'>
				<a href='".$urllink."' ".$target.">
		        	<div class='image position-relative'>
	            		<img src='".base_url()."assets/home/images/startup/".$logo."' alt='portfolio-image' class='img-fluid w-100 d-block'>
	            		
					</div>
				</a>
		    	</div>
	    	</div>
			";
		}
		?>
	    </div>
	</div>
</section>

<?php if($bCount > 0) { ?>
<!-- Service start -->
<section class="section service-home border-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2 class="mb-2 ">Your Benefit</h2>
			</div>
		</div>
		
		<div class="row">
		<?php foreach($benefit as $ben) { ?>
			<div class="col-lg-4">
				<div class="service-item mb-5">
					<i class="fa fa-<?php echo $ben->logo ?> fa-2x" style="margin:0% 5% 10% 5%;"></i>
					<h4 class="my-3"><?php echo $ben->title ?></h4>
					<p><?php echo $ben->description ?></p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<!-- service end -->
<?php } ?>
