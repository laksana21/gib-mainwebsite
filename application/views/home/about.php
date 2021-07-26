<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
	$font2 = ($mobile == '1') ? 'font-size:22px;' : 'font-size:28px;';
	$top = ($mobile == '1') ? 'pt-5' : '';
	$title = ($mobile == '1') ? 'style="font-size:32px;"' : '';
?>
<!-- Banner Start -->
<section class="section banner-2" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-20 (1).jpg');background-repeat: no-repeat;background-size: cover;background-position:center;padding:0px;">
	<div class="overlay pt-4 pb-4">
	<div class="container" style="padding:10% 0% 5% 0%;">
		<div class="row pl-4 pr-4">
			<div class="text-center <?php echo $top ?>">
				 <h2 class="cd-headline clip is-full-width mb-4 mt-4 pt-2" style="text-align:center;<?php echo $font ?>">
				 	Building Innovation into business Through integrity quality and compasion	
                 </h2>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- Banner End -->

<!-- About start -->
<section class="page-title section border-top pb-0 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <h1 class="text-capitalize mb-0 text-lg" <?php echo $title ?>>About</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section border-bottom pt-4 pb-4">
	<div class="container">
	
		<div class="row align-items-center pt-2">
			<div class="col-lg-6 pr-4 pb-4 h-100 aos-init" data-aos="fade-right">
				<div style="margin:auto;">
					<h3 class="mb-2 "><?php echo $dat['website_name'] ?></h3>
					<p class="mb-2"><?php echo $dat['website_about'] ?></p>
				</div>
			</div>
			<div class="col-lg-6">
				<?php
					foreach($paging as $page){
						$link = ($page->external_link != '') ? $page->external_link : '#';
				?>
				<div class="col-md-12 pb-4 aos-init pl-0" data-aos="fade-left" data-aos-delay="450">
					<h4 class="mb-2 "><?php echo $page->title ?></h4>
					<p class="mb-2"><?php echo $page->message ?></p>
					<!--a class="text-secondary" href="<?php //echo $link ?>">Learn More</a -->
				</div>
				<?php } ?>

			</div>
		</div>

	</div>
</section>

<section class="section pt-4 pb-4">
	<div class="container">
		<div class="row align-items-center">
			<img class="img-fluid" src="<?php echo base_url()."assets/home/images/ia-dark-logo.png" ?>" style="margin:auto;">
		</div>
	</div>
</section>
<!-- About ENd  -->

<?php /*
<!-- Testimonial Start -->
<section class="section testimonial pt-4">
	<div class="container pt-4">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center mb-5">
				<h2 class="mb-2">Testimonials</h2>
			</div>
		</div>


		<div class="row justify-content-center align-items-center">
			<div class="col-lg-8"> 
				<div class="owl-carousel owl-theme owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(-1380px, 0px, 0px); transition: all 0s ease 0s; width: 4830px;">
							
							<?php
								$i = 1;
								foreach($testimony as $test){
							?>
							<div class="owl-item <?php if($i==1){echo "active";} ?>" style="width: 690px;">
								<div class="testimonial-content">
									<i class="ti-quote-left text-color"></i>
									<p><?php echo $test->testimony ?></p>
									<h4 class="mb-0"><?php echo $test->name ?></h4>
									<span><?php echo $test->job ?></span>
								</div>
							</div>
							<?php $i=$i+1; } ?>

						</div>
					</div>
					<div class="owl-nav disabled">
						<button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
						<button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
					</div>
					<div class="owl-dots disabled"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Testimonial End -->
*/ ?>