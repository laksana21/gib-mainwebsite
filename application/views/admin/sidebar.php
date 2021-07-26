<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    foreach($user as $log)
    {$id['name'] = $log->name;$id['image'] = $log->image;}
?>
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div style="color:rgba(0,0,0,9);font-size:16px;font-weight:bold;font-family: 'Courier New', Times, serif;text-align: left;">
                        <div id="clock"></div><div id="date"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <?php
                        if($notifcnt>=1)
                        {echo "<span class='badge badge-pill badge-danger'>".$notifcnt."</span>";}
                      ?>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <?php
                      if($notifcnt>=1){
                      foreach($notifmsg as $msg)
                      {
                    ?>
                    <a class="dropdown-item" href="<?php echo base_url()."admin/read/".$msg->id ?>">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">mail_outline</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Message</span>
                        <p>You have unread message from
                          <span class="text-success text-semibold"><?php echo $msg->m_name ?></span> in the inbox!</p>
                      </div>
                    </a>
                    <?php }}
                    else {
                    ?>
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">block</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Message</span>
                        <p>You have no unread message</p>
                      </div>
                    </a>
                    <?php } ?>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?php echo base_url() ?>assets/admin/images/avatars/<?php echo $id['image'] ?>" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $id['name'] ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="#" onclick="alert('This feature is unavailable!')">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?php echo base_url() ?>admin/logout">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>