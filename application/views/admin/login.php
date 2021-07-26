<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($settings as $row)
  {$set[$row->meta] = $row->value;}
?>
        <!-- End Main Sidebar -->
        <main class="main-content col">
          <div class="main-content-container container-fluid px-4 my-auto h-100">
            <div class="row no-gutters h-100">
              <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                <div class="card">
                  <div class="card-body">
                    <img class="img-fluid" alt="" src="<?php echo base_url()."assets/home/images/".$set['website_logo'] ?>">
                    <h5 class="auth-form__title text-center mb-2" style="padding-top:10px">Access Your Account</h5>
                    <?php if($fail == true) { ?>
                      <h5 class="auth-form__title text-center mb-4" style="color:red;">Invalid Username or Password</h5>
                    <?php }?>
                    <form action="<?php echo base_url() ?>admin/authentication" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" name="pass" id="exampleInputPassword1" type="password" placeholder="Password">
                      </div>
                      <button class="btn btn-pill btn-accent d-table mx-auto" type="submit">Access Account</button>
                    </form>
                  </div>
                  <div class="card-footer border-top">
                    <div style="color:rgba(0,0,0,9);font-size:16px;font-weight:bold;font-family: 'Courier New', Times, serif;text-align: center;">
                        <div id="clock"></div><div id="date"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>