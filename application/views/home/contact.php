<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
    {$dat[$s->meta] = $s->value;}
    $font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
    $container = ($mobile == '1') ? '<div class="container pt-5 mt-5" style="padding:5% 0% 5% 0%;">' : '<div class="container" style="padding:10% 0% 5% 0%;">';
?>

<section class="section banner-2" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-18.jpg');background-repeat: no-repeat;background-size: cover;background-position:center;padding:0px;">
	<div class="overlay pt-4 pb-4">
	<?php echo $container ?>
		<div class="row pl-4 pr-4">
			<div class="text-center" style="margin:auto">
                <h2 class="cd-headline clip is-full-width mb-4 mt-4" style="text-align:center;<?php echo $font ?>">
					Get in touch<br>
                </h2>
            </div>
		</div>
	</div>
	</div>
</section>

<!-- contact form start -->
<section class="contact section pt-4">
    <div class="col-lg-12 container">
        <div class="row pt-4 pb-4 border-top border-bottom">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <center>
                <iframe src="<?php echo $dat['website_google_map'] ?>" width="100%" height="480" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
             <!-- form message -->
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                            Your message was sent successfully.
                        </div>
                    </div>
                </div>
                <!-- end message -->
                <div class="form-row">
                        <div class="col-lg-4 pb-2">
                            <div class="col-md-12">
                                <h4>Contact Info</h4>
                                <p><?php echo $dat['website_contact_info'] ?></p>
                            </div>
                            <div class="col-md-12 pt-2 pb-2">
                                <h4>Address</h4>
                                <p><?php echo $dat['website_contact_address'] ?> <?php echo $dat['website_postal_code'] ?></p>
                            </div>
                            <div class="col-md-12">
                                <h4>Contact</h4>
                                <p class="mb-0"><?php echo $dat['website_contact_email'] ?></p>
                                <p class="mb-0"><?php echo $dat['website_contact_phone'] ?></p>
                            </div>
                        </div>
                        <div class="col-lg-8 pt-4">
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
                                    <button class="btn btn-main" name="submit" type="submit" style="color:#FFF">Send Message</button>
                                </div>
                            </div>
                        </div>
                    <?php /* ?><div class="col-lg-4 border-right">
                        <div class="col-lg-12 mb-4">
                            <h4>Contact Info</h4>
                            <p><?php echo $dat['website_contact_info'] ?></p>
                        </div>
                        <div class="col-lg-12 mb-4 border-top border-bottom">
                            <h4>Address</h4>
                            <p><?php echo $dat['website_contact_address'] ?> <?php echo $dat['website_postal_code'] ?></p>
                        </div>
                        <div class="col-lg-12">
                            <h4>Contact</h4>
                            <p class="mb-0"><?php echo $dat['website_contact_email'] ?></p>
                            <p class="mb-0"><?php echo $dat['website_contact_phone'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        
                    </div> <?php */ ?>
                </div>
                </form>
            </div>  
        </div>
    </div>
</section>