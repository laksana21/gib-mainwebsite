<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	foreach($sosmed as $med)
	{$sos[$med->meta] = $med->link;}

	$font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
	$font2 = ($mobile == '1') ? 'font-size:22px;' : 'font-size:28px;';
	$btmPos = ($mobile == '1') ? 'bottom:30px;' : 'bottom:10px;';
	$top = ($mobile == '1') ? 'top:60%;' : 'top:65%;';
?>

<section class="section banner" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-16.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;padding:0px;">
<header style="height:100vh;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner overlay" role="listbox" style="height:100vh;">
	  
	  <?php $i=1; foreach($paging as $page) { ?>
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item <?php if($i == 1) { echo "active";} ?>" >
        <div class="carousel-caption d-md-block">
		      <div style="position:absolute;<?php echo $top ?>right:15%;left:15%;">
          		<h2 class="display-4 text-white pb-2" style="<?php echo $font ?>"><?php echo strtoupper($page->title) ?></h2>
				<?php if($mobile == 1) { ?>
				<p class="text-white"><?php $arr = explode(".", $page->message, 2); echo ucwords($arr[0]); ?></p>
				<?php } else { ?>
				<h3 class="text-white"><?php $arr = explode(".", $page->message, 2); echo ucwords($arr[0]); ?></h3>
				<?php } ?>
		      </div>
        </div>
      </div>
	  <?php $i++; } ?>

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

<?php /*
<!-- Banner Start -->
<section class="section banner" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-16.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;padding:0px;">
	<div class="overlay pb-2" style="height:100vh;">
	<div class="container" style="height:100vh">
		<div class="d-flex row h-100 flex-column">
			<div class="position-relative align-items-center text-center h-100">
				 	<div class="cd-headline clip position-absolute w-100 pl-2" style="top:30%;left:0px;right:0px;">
                    	<!-- <span class="cd-words-wrapper text-color">
                        	<b class="is-visible">COMMITED TO QUALITY</b>
                        	<b>COMPASSION THROUGH INNOVATION</b>
                    	</span> -->
						<h2 class="is-full-width text-white" style="margin-bottom:50px;">
							<div id="slideshow" style="position: relative;width:100%;height:80px;">
								<div style="position:absolute;left:10px;right:10px;<?php echo $font ?>">COMMITED TO QUALITY</div>
								<div style="position:absolute;left:10px;right:10px;<?php echo $font ?>">COMPASSION THROUGH INNOVATION</div>
								<div style="position:absolute;left:10px;right:10px;<?php echo $font ?>">INTEGRITY AS OUR CORE VALUE</div>
							</div>
						</h2>
						<button class="btn btn-main" onClick="location.href='<?php echo base_url().$testweb ?>about'" type="button">Learn More</button>
                	</div>
					<div class="align-items-center position-absolute fixed-bottom text-center" style="<?php echo $btmPos ?>z-index:0;">
						<h2 class="text-center mb-4 w-100">
							<a class="text-white" href="#next">
								<img src="<?php echo base_url()."assets/home/images/arrow.png" ?>" style="height:30px;width:30px;" class="img-fluid" alt="arrow">
							</a>
						</h2>
					</div>
                	<!-- <p style="color:rgb(240, 240, 240);">Something big started from something small. Through pain and suffer, make it growth and develop.<br>You are loser when you surrender to your own problems.</p> -->
			</div>
		</div>
	</div>
	</div>
</section>
*/ ?>


<section class="section blog-post pb-4 pt-4" style="background-color:#ededed;">
	<div class="container pt-4">
		<div class="row">
			<div class="col-6 col-md-3 mt-4 mb-4" style="border-right:solid;">
				<div>
					<?php if($mobile == 1) { ?>
						<h3 style="font-size:24px;">What's New</h3>
					<?php } else { ?>
						<h2 style="font-size:34px;">What's New</h2>
					<?php } ?>
					<p class="text-dark">Visit our Activities to know our recent news.</p>
					<a href="<?php echo base_url().$testweb ?>activities" <?php if($mobile != 1) { ?> style="position: absolute;bottom: 20%;" <?php } ?>><strong><u>Visit Activities</u></strong></a>
				</div>
			</div>

			<?php
			if($total == 0)
			{
			?>
			<div class="col-6 col-lg-9">
				<h2 class="mb-2 ">Gallery is Empty</h2>
				<div class="col-md-6">
				</div>
			</div>
			<?php
			}
			else { $i=1;
			foreach($gallery as $gal){
				
				if($i <=3 ) {
			?>
			<div class="col-6 col-md-3 mt-4 mb-4">
			  <div class="card card-small card-post h-100 border-0">
				<div class="card-body h-100">
					<a class="image-content" href="<?php echo base_url().$testweb."blog/".$gal->id ?>">
						<img src="<?php echo base_url()."assets/home/images/gallery/".$gal->image?>" alt="" class="img-fluid" style="object-fit:cover;overflow:hidden;">
						<h5 class="pt-4"><?php echo strtoupper($gal->name) ?></h5>
					</a>
				</div>
			  </div>
			</div>
			<?php } $i++;  }} ?>

		</div>
	</div>
</section>

<?php if(($dat['website_youtube_enable'] == 1) && ($dat['website_youtube_embed'] != "")) { ?>
<section class="section border-bottom pt-4 pb-4">
	<div class="container">
		<div class="row pt-2">
			<div class="col-md-3 pt-4 pb-4">
				<div class="pt-2 <?php if($mobile==1){echo "text-center";} ?>">
					<h3 class="mb-2" style="<?php echo $font2 ?>">BUILDING INNOVATION INTO BUSINESS</h3>
					<p class="mb-2">Uniquely improves every products and services through innovation.</p>
					<button class="btn btn-outline-primary rounded" onClick="location.href='<?php echo base_url().$testweb ?>about'" type="button" <?php if($mobile != 1) { ?> style="position: absolute;bottom: 20%;" <?php } ?>>Learn More</button>
				</div>
			</div>
			<div class="col-md-9">
				<div class="col-md-12 pb-4">
					<div class="video-wrapper mt-2 mb-2">
						<?php echo $dat['website_youtube_embed'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php /*
<!-- Banner End 
<section class="page-title section pb-0 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <h1 class="text-capitalize mb-0 text-lg">Recent Portfolio</h1>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- Portfolio start 
<section class="portfolio ">
	<div class="container">
		<div class="row mb-2">
	      	<div class="col-12 text-center">
		        <div class="btn-group btn-group-toggle " data-toggle="buttons">
		          <label class="btn active ">
		            <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Startup
				  </label>
				  <?php
				  foreach($sStatus as $stat)
				  {
					  echo "
					  <label class='btn'>
					  	<input type='radio' name='shuffle-filter' value=".$stat->meta." />".$stat->step_name."
					  </label>";
				  }
				  ?>
		        </div>
	      	</div>
		</div>	
		<div class="row shuffle-wrapper portfolio-gallery">
		<?php
		foreach($startup as $star)
		{
			$logo = ($star->logo != '') ? $star->logo : 'No Image Available.png';
			echo "
			<div class='col-lg-4 shuffle-item mt-2 mx-auto'  data-groups='[&quot;".$star->status."&quot;]'>
		    	<div class='position-relative inner-box'>
		        	<div class='image position-relative'>
	            		<img src='".base_url()."assets/home/images/startup/".$logo."' alt='portfolio-image' class='img-fluid w-100 d-block'>
	            		<div class='overlay-box'>
	                		<div class='overlay-inner'>
	                    		<h5 style='color:#f7f7f7;'>".$star->s_name."</h5>
	                    		<p style='color:#fff;'>".$star->description."</p>
	                  		</div>
	                	</div> 
	            	</div>
		    	</div>
	    	</div>
			";
		}
		?>

	    </div>
	</div>
</section>
<!-- Portfolio End -->

<!--section class="section service-home border-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2 class="mb-2 ">Key Benefit</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4">
				<div class="service-item mb-5" data-aos="fade-left" >
					<h4 class="my-3">Networking Session</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5" data-aos="fade-left"  data-aos-delay="450">
					<h4 class="my-3">Key Discussion of Business</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5 mb-lg-0" data-aos="fade-left"  data-aos-delay="750">
					<h4 class="my-3">Deep Engagement with Mentor</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item" data-aos="fade-left"  data-aos-delay="750">
					<h4 class="my-3">Prossess in Prototyping</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5" data-aos="fade-left"  data-aos-delay="950">
					<h4 class="my-3">Routine Guidance with Standard</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5 mb-lg-0" data-aos="fade-left"  data-aos-delay="1050">
					<h4 class="my-3">Get Your Brand Reputation</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item" data-aos="fade-left"  data-aos-delay="750">
					<h4 class="my-3">Tech Learning Facilities</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5" data-aos="fade-left"  data-aos-delay="950">
					<h4 class="my-3">Laboratory Access</h4>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="service-item mb-5 mb-lg-0" data-aos="fade-left"  data-aos-delay="1050">
					<h4 class="my-3">Cozzy Corner</h4>
				</div>
			</div>
		</div>
	</div>
</section -->
*/ ?>

<!-- Service start -->
<section class="section service-home col-lg-12 pt-0 pb-0" id="next" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/image0-2000x1292.jpg');background-repeat: no-repeat;background-size: cover;background-position:center top;">
	<div class="overlay mw-100">
	<div class="container" style="padding:5% 0% 5% 0%;">
		<div class="row">
			<div class="col-lg-8 text-white pt-4 pb-4">
				<div class="col-lg-12 <?php if($mobile==1){echo "text-center";} ?>">
					<h2 class="cd-headline clip text-white is-full-width pt-4 mb-4 w-100" style="<?php echo $font ?>">PURSUE <span style="color:#0bdbb9;">OUR</span> DREAM</h2>
					<p class="text-white" style="font-size:130%;">Accompanies the founder and team through the death valley of hottest moments to cross the business, within a culture of quality, a value of integrity.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 pt-4 pb-4">
				<div class="col-lg-12 <?php if($mobile==1){echo "text-center";} ?>">
                	<button class="btn btn-main" onClick="location.href='<?php echo base_url().$testweb ?>portfolio'" type="button" style="border:0px solid white;"><i class="fas fa-file-alt"></i> Check it out</button>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>


<?php if($igcount > 0 && $sos['instagram'] != '') { ?>
<section class="section border-bottom pt-4 pb-4" style="background-color:#ededed;">
	<div class="container">
		<div class="row pt-2">
			<div class="col-6 col-md-3 mt-4 mb-4" style="border-right:solid;">
				<div>
					<?php if($mobile == 1) { ?>
						<h3 style="font-size:24px;">Social Portal</h3>
					<?php } else { ?>
						<h2 style="font-size:34px;">Social Portal</h2>
					<?php } ?>
					<p class="text-dark">Check our Instagram for other Activity</p>
					<a href="<?php echo $sos['instagram'] ?>" <?php if($mobile != 1) { ?> style="position: absolute;bottom: 20%;" <?php } ?> target="_blank" ><strong><u>Check Instagram</u></strong></a>
				</div>
			</div>
			<?php
			$i=1;
			foreach($igpost as $ig){ if($i <=3 ) {
			?>
			<div class="col-6 col-md-3 mt-4 mb-4">
			  <div class="card card-small card-post h-100 border-0">
				<div class="card-body h-100 d-flex align-items-center" style="padding:0.5rem;">
					<a class="image-content" href="<?php echo $ig->external_link ?>" target="_blank">
						<img src="<?php echo base_url()."assets/home/images/instagram/".$ig->image?>" alt="<?php echo $ig->name ?>" class="img-fluid" style="object-fit:cover;overflow:hidden;">
					</a>
				</div>
			  </div>
			</div>
			<?php } $i++; } ?>
		</div>
	</div>
</section>
<?php } ?>

<!-- contact form start -->
<section class="contact section pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center pt-4 mb-5 contact-title">
                    <h2>Contact us</h2>
                </div>

                <form class="contact__form mt-5" method="post" action="<?php echo base_url().$testweb."send_messages/".$testweb?>">
             <!-- form message -->
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                            Your message was sent successfully.
                        </div>
                    </div>
                </div>
                <!-- end message -->
				<?php if($mobile == 1){ ?>
                <div class="form-row pb-4">
                    <div class="col-lg-4">
                        <div class="col-lg-12">
                            <h4>Address</h4>
                            <p><?php echo $dat['website_contact_address'] ?> <?php echo $dat['website_postal_code'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
						<iframe src="<?php echo $dat['website_google_map'] ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
					<div class="col-lg-4">
						<div class="col-lg-12 pt-2">
                            <h4>Contact</h4>
                            <p class="mb-0"><?php echo $dat['website_contact_email'] ?></p>
                            <p class="mb-0"><?php echo $dat['website_contact_phone'] ?></p>
                        </div>
					</div>
                </div> <?php /*
				<div class="form-row pt-2">
					<div class="col-lg-12">
                		<div class="text-center pt-4 mb-5">
                    		<h4>Send Us Messages</h4>
                		</div>
					</div>
					<div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="subject" type="text" class="form-control" placeholder="Your Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group-2 mb-4">
                                <textarea name="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-center">
                                <button class="btn btn-main" name="submit" type="submit">Send Message</button>
                            </div>
                        </div>
					</div>
				</div> */ ?>
				<?php } else { ?>
				<div class="form-row pb-4">
                    <div class="col-lg-4">
                        <div class="col-lg-12">
                            <h4>Address</h4>
                            <p><?php echo $dat['website_contact_address'] ?> <?php echo $dat['website_postal_code'] ?></p>
                        </div>
						<div class="col-lg-12 pt-2">
                            <h4>Contact</h4>
                            <p class="mb-0"><?php echo $dat['website_contact_email'] ?></p>
                            <p class="mb-0"><?php echo $dat['website_contact_phone'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
						<iframe src="<?php echo $dat['website_google_map'] ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div> <?php /*
				<div class="form-row pt-2">
					<div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="subject" type="text" class="form-control" placeholder="Your Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group-2 mb-4">
                                <textarea name="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-center">
                                <button class="btn btn-main" name="submit" type="submit">Send Message</button>
                            </div>
                        </div>
					</div>
				</div> */ ?>
				<?php } ?>
                </form>
            </div>  
        </div>
    </div>
</section>