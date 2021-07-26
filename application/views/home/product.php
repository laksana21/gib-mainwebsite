<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
	$top = ($mobile == '1') ? 'pt-5' : '';
	$title = ($mobile == '1') ? 'style="font-size:32px;"' : '';

	function deletetag($httag){
		$strTag = array (
			1 => '<p>','</p>',
			'<b>','</b>',
			'<i>','</i>',
			'<strong>','</strong>',
			'<em>','</em>',
			'<p class="ql-align-justify">'
		);

		$output = str_replace($strTag, "", $httag);

		return $output;
	}
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

<section class="portfolio pt-4" style='overflow:hidden;min-height:50vh;'>
	<div class="container pt-4">
		<div class="row">
		<?php
		foreach($product as $prd){
			$image = ($prd->picture != '') ? $prd->picture : 'No Image Available.png';
		?>

			<div class="col-6 col-lg-3 mb-4">
			  <div class="card card-small card-post h-100 rounded">
				<div class="post h-100 border-bottom h-100" style="object-fit:contain;display:block;padding:10px;">
					<a class="image-content h-100 d-flex align-items-center" href="<?php echo base_url()."home/product/".$prd->id ?>">
						<img src="<?php echo base_url()."assets/home/images/product/".$image?>" alt="<?php echo $prd->name ?>" class="img-fluid">
					</a>
				</div>
			  </div>
			</div>

		<?php } ?>
	    </div>
	</div>
</section>
