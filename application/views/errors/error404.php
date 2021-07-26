<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($settings as $s)
	{$dat[$s->meta] = $s->value;}
	$padding = ($mobile == '1') ? 'padding:40% 0% 5% 0%;' : 'padding:15% 0% 5% 0%;';
	$top = ($mobile == '1') ? 'pt-5' : '';
  $title = ($mobile == '1') ? 'style="font-size:32px;"' : '';
  header("HTTP/1.0 404 Not Found");
?>

<!-- Service start -->
<section class="page-title section" style="height:85vh">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center" style="<?php echo $padding ?>">
          <h1 class="text-capitalize mb-4 text-lg" <?php echo $title ?>>404 NOT FOUND</h1>
          <p class="mb-5">The page you are looking for is not found!</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- service end -->
