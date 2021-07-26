<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';
	$top = ($mobile == '1') ? 'pt-5' : '';

	function tanggal($tanggal){
		$bulan = array (
		  1 =>   'Januari',
		  'Februari',
		  'Maret',
		  'April',
		  'Mei',
		  'Juni',
		  'Juli',
		  'Agustus',
		  'September',
		  'Oktober',
		  'November',
		  'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	   
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function deletetag($httag){
		$strTag = array (
			1 => '<p>','</p>',
			'<b>','</b>',
			'<strong class="ql-font-monospace">',
			'<span class="ql-font-monospace">',
			'<h1>','</h1>',
			'<h2>','</h2>',
			'<h3>','</h3>',
			'<h4>','</h4>',
			'<i>','</i>',
			'<strong>','</strong>',
			'<span>','</span>',
			'<em>','</em>',
			'<p class="ql-align-justify">'
		);

		$output = str_replace($strTag, "", $httag);

		return $output;
	}
?>

<section class="section banner-2" style="background-image:url('<?php echo base_url() ?>assets/home/images/banner/PHOTO-2020-02-20-17-54-17 (1).jpg');background-repeat: no-repeat;background-size: cover;background-position:center;padding:0px;">
	<div class="overlay" style="padding:40px 0px;">
	<div class="container" style="padding:10% 0% 5% 0%;">
		<div class="row pl-4 pr-4">
			<div class="text-center <?php echo $top ?>" style="margin:auto">
				 	<h2 class="cd-headline clip is-full-width mb-4 mt-4" style="<?php echo $font ?>">
						Get to know us more<br>
						With our update activities
                	</h2>
            </div>
		</div>
	</div>
	</div>
</section>

<section class="section blog-post mt-4 pt-4">
	<div class="container pt-4">
		<div class="row">

			<?php
			if($total == 0)
			{
			?>
			<div class="col-lg-12">
				<h2 class="mb-2 ">Gallery is Empty</h2>
				<div class="col-md-6">
				</div>
			</div>
			<?php
			}
			else {
			foreach($gallery as $gal){
				if(strlen ($gal->description)>50)
                {$desc = substr(deletetag($gal->description), 0, 250)."...";}
                else
				{$desc = ($gal->description != '<p></p>' && $gal->description != '<p><br></p>') ? substr(deletetag($gal->description), 0, 250) : 'No Description';}

			?>
			<div class="col-lg-4 col-md-4 mt-4 mb-4 d-flex align-items-center">
			  <div class="card card-small card-post">
				<div class="card-body h-100">
					<a class="image-content" href="<?php echo base_url().$testweb."blog/".$gal->id ?>">
						<img src="<?php echo base_url()."assets/home/images/gallery/".$gal->image?>" alt="" class="img-fluid" style="object-fit:cover;overflow:hidden;">
						<span class="card-post__category badge badge-primary" style="float:right;margin:15px 0px 0px 0px;">Read more...</span>
					</a>
				</div>
			  </div>
			</div>
			<?php }} ?>

		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="pagination">

				<?php echo $this->pagination->create_links(); ?>

        		</div>
			</div>
		</div>
	</div>
</section>
