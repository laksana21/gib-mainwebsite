<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($settings as $row)
  {$set[$row->meta] = $row->value;}
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $header ?></title>
    <link href="<?php echo base_url() ?>assets/admin/images/fav.ico" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <meta name="description" content="PT. Gama Innovasi Berdikari uniquely improves every products and services through innovation. Our objectives are scaling up bussiness to prioritize integrity, quality, and compassion.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo base_url() ?>assets/admin/styles/shards-dashboards.1.3.1.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/styles/extras.1.3.1.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/styles/scss/fontawesome/css/all.css">
    <?php
      if($active == 'activity')
      {
        echo "<link rel=".chr(32)."stylesheet".chr(32)." href=".chr(32)."https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css".chr(32)."> </head>";
      }
    ?>
  </head>
  <body class="h-100" onload="startTime()">
  <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="<?php echo base_url() ?>admin/dashboard" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?php echo base_url()."assets/home/images/".$set['website_second_logo'] ?>" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Administrator Page</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <div class="nav-wrapper" style="overflow-y: auto;">
            <ul class="nav nav--no-borders flex-column">
              <?php
              if($login==true)
              {
              ?>
              <li class="nav-item">
                <a class="nav-link <?php if($active == 'dashboard'){echo 'active';} ?>" href="<?php echo base_url() ?>admin/dashboard">
                  <i class="material-icons">home</i>
                  <span>Blog Dashboard</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php if($active == 'activity' || $active == 'activity2'){echo 'active';} ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">vertical_split</i>
                  <span>Activity and Startups</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small " x-placement="bottom-start" style="display: none; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-6px, 51px, 0px);">
                  <a class="dropdown-item " href="<?php echo base_url() ?>admin/startup">Startups</a>
                  <a class="dropdown-item " href="<?php echo base_url() ?>admin/gallery">Gallery</a>
                </div>
              </li>
              <li class="nav-item <?php if($active == 'team'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/team">
                  <i class="material-icons">people</i>
                  <span>Team</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php if($active == 'company'){echo 'active';} ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">work</i>
                  <span>Company</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small " x-placement="bottom-start" style="display: none; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-6px, 51px, 0px);">
                  <a class="dropdown-item " href="<?php echo base_url() ?>admin/expertise">Expertise List</a>
                  <a class="dropdown-item " href="<?php echo base_url() ?>admin/paging">Role and Function</a>
                  <a class="dropdown-item " href="<?php echo base_url() ?>admin/partner">Partner</a>
                </div>
              </li>

              <li class="nav-item <?php if($active == 'product'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/product">
                  <i class="material-icons">local_grocery_store</i>
                  <span>Product List</span>
                </a>
              </li>
              <li class="nav-item <?php if($active == 'message'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/message">
                  <i class="material-icons">mail_outline</i>
                  <span>Message</span>
                </a>
              </li>
              <li class="nav-item <?php if($active == 'setting'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/settings">
                  <i class="material-icons">settings</i>
                  <span>Settings</span>
                </a>
              </li>
              <li class="nav-item <?php if($active == 'testimony'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/testimonial" onclick="return confirm('This feature is deactivated on public site. Are you sure want to continue?');">
                  <i class="material-icons">contact_support</i>
                  <span>Testimonials</span>
                </a>
              </li>
              <li class="nav-item <?php if($active == 'login'){echo 'active';} ?>">
                <a class="nav-link " href="<?php echo base_url() ?>admin/logout">
                  <i class="material-icons">power_settings_new</i>
                  <span>Logout</span>
                </a>
              </li>
              <?php }
              else
              {
              ?>
              <li class="nav-item <?php if($active == 'login'){echo 'active';} ?>">
                <a class="nav-link " href="#">
                  <i class="material-icons">power_settings_new</i>
                  <span>Login</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
