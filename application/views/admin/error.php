<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
?>
<div class="error">
    <div class="error__content">
        <h2>404</h2>
        <h3>Page Not Found!</h3>
        <p>The page you are looking for is not found.</p>
        <button type="button" class="btn btn-primary btn-pill">← Go Back</button>
    </div> <!-- / .error_content -->
</div>