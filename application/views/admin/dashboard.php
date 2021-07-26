<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- End Page Header -->
            <div class="row">
              <!-- New Draft Component -->
              <div class="col-lg-7 col-md-6 col-sm-12 mt-4">
                <!-- Quick Post -->
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Web Summary</h6>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <div class="user-details__user-data p-4">
                      <div class="row mb-3">
                        <div class="col w-50">
                          <span>Web Status</span>
                          <?php
                            if($id['website_enable']=='1')
                            {echo "<span class='text-success'>ACTIVE</span>";}
                            else
                            {echo "<span class='text-danger'>DOWN</span>";}
                          ?>
                        </div>
                        <div class="col w-50">
                          <span>Site Name</span>
                          <span><?php echo $id['website_name'] ?></span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col w-50">
                          <span>Phone</span>
                          <span><?php echo $id['website_contact_phone'] ?></span>
                        </div>
                        <div class="col w-50">
                          <span>Email Address</span>
                          <span><?php echo $id['website_contact_email'] ?></span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col w-50">
                          <span>Portfolio Total</span>
                          <span><?php echo $startup_total ?></span>
                        </div>
                        <div class="col w-50">
                          <span>Gallery Total</span>
                          <span><?php echo $gallery_total ?></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col w-100">
                          <span>About Site</span>
                          <span><?php echo $id['website_about'] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Quick Post -->
              </div>
              <!-- End New Draft Component -->
              <!-- Discussions Component -->
              <div class="col-lg-5 col-md-12 col-sm-12 mt-4">
                <div class="card card-small blog-comments h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Messaging</h6>
                  </div>
                  <div class="card-body p-0">
                    <?php
                    $i = 1;
                    $now = time(); // or your date as well
                    foreach($messages as $msg){
                      if($i<=3){
                        $datediff = $now - strtotime($msg->date_send);
                    ?>
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <div class="notification__icon-wrapper">
                          <div class="notification__icon">
                            <i class="material-icons">mail_outline</i>
                          </div>
                        </div>
                      </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="<?php echo base_url()."admin/read/".$msg->id ?>"><?php echo $msg->m_name ?></a> with Subject <a class="text-secondary" href="<?php echo base_url()."admin/read/".$msg->id ?>"><?php echo $msg->subject ?></a> <span class="text-muted">– <?php echo round($datediff / (60 * 60 * 24)); ?> days ago</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted"><?php echo substr($msg->message, 0, 57)."..." ?></p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                          <?php if($msg->status == '0'){ ?>
                            <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/dashboard/".$id['user_id']."/change-status-read"."/".$msg->id ?>'">
                            <span class="text-success"><i class="material-icons">drafts</i></span> Mark as Read </button>
                          <?php } else if($msg->status == '1') { ?>
                            <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/dashboard/".$id['user_id']."/change-status-unread"."/".$msg->id ?>'">
                            <span class="text-warning"><i class="material-icons">mail_outline</i></span> Mark as Unread </button>
                          <?php } ?>
                            <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/read/".$msg->id ?>'">
                              <span class="text-light"><i class="material-icons">pageview</i></span> Open </button>
                              <a href="<?php echo base_url()."admin/execute/message/".$id['user_id']."/delete-message"."/".$msg->id ?>"><button class="btn btn-white" type="button">
                              <span class="text-danger"><i class="material-icons">clear</i></span> Delete </button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                      <?php $i=$i+1; }} ?>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col text-center view-report">
                        <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/message" ?>'">View All Message</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Discussions Component -->
            </div>

            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-8 col-md-12 col-sm-12 mt-4 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Latest Startups</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12">
                      <div class="form-row">
                        <?php
                          $i = 1;
                          foreach($startup as $star){
                            if($i<=8){
                              $logo = ($star->logo != '') ? $star->logo : 'No Image Available.png';
                        ?>
                        <div class="form-group col-md-3" style="margin-bottom:0rem;margin-top:1rem;">
                          <img class="img-fluid border border-info rounded" alt="" src="<?php echo base_url()."assets/home/images/startup/".$logo ?>">
                        </div>
                        <?php $i=$i+1; }} ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mt-4 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Latest Partner</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <ul class="list-group list-group-small list-group-flush" style="width:100%;">
                    
                      <?php 
                        $i = 1;
                        foreach($partner as $part){
                          if($i<=5){
                            $logo = ($part->logo != '') ? $part->logo : 'No Image Available.png';
                      ?>
                      <li class="list-group-item d-flex px-3">
                        <span class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/partner/".$logo ?>"></span>
                        <span class="text-semibold text-fiord-blue"><?php echo $part->nama ?></span>
                        <!--span class="ml-auto text-right text-semibold text-reagent-gray"></span-->
                      </li>
                      <?php $i=$i+1; }} ?>

                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Users By Device Stats -->
            </div>

          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
        </main>
      </div>
    </div>