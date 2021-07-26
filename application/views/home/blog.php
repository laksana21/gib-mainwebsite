<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$font = ($mobile == '1') ? 'font-size:24px;' : 'font-size:34px;';

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
			<div class="text-center" style="margin:auto">
				 	<h2 class="cd-headline clip is-full-width mb-4 mt-4" style="<?php echo $font ?>">
						Get to know us more<br>
						With our update activities
                	</h2>
            </div>
		</div>
	</div>
	</div>
</section>


<section class="section blog-post">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<article class="single-post">
					<div class="d-flex justify-content-center">
						<img src="<?php echo base_url()."assets/home/images/gallery/".$image?>" alt="" class="img-fluid" style="max-height:550px;">
					</div>
					<div class="single-post-content mt-4">
						<style>
							img{max-width:100%;}
							p, a, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6{overflow: auto;}
						</style>
						<div class="post-meta mb-4">
							<span class="date"><?php echo tanggal(substr($date,0,10)) ?></span>
						</div>
		
						<h3><?php echo $title ?></h3>

						<p><?php echo $desc ?></p>
	
					</div>
				</article>
			</div>

			<div class="col-lg-4">
				<div class="sidebar-widget mt-5 mt-lg-0">
					<div class="widget mb-5">
						<h4 class="mb-4 widget-title">Recent Posts</h4>
						<ul class="list-unstyled">

						<?php
							$i = 1;
							foreach($recent as $r) {
								if($i < 5 ) {

									$title = (strlen ($r->name)>25) ? substr($r->name, 0, 22)."..." : $r->name;
									
									if(strlen (deletetag($r->description))>50)
                					{$desc = substr(deletetag($r->description), 0, 50)."...";}
                					else
									{$desc = ($r->description != '<p></p>') ? substr(deletetag($r->description), 0, 250) : '<p>No Description</p>';}
						?>
							<li class="d-flex mb-4">
								<img src="<?php echo base_url()."assets/home/images/gallery/".$r->image?>" alt="" class="img-fluid mr-3" style="width:100px;height:100px;object-fit:cover;overflow:hidden;">
								<div class="post-body">
									<a href="<?php echo base_url().$testweb."blog/".$r->id ?>"><h5><?php echo $title ?></h5></a>
									<?php echo $desc ?>
								</div>
							</li>
							
						<?php } $i++; }?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
