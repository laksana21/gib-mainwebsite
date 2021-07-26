<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
  foreach($gallery as $gal)
  {
    if(strlen ($gal->name)>24)
    {$title = substr($gal->name, 0, 50)."...";}
    else
    {$title = $gal->name;}
    $image = $gal->image;
  }
?>
          <div class="main-content-container container-fluid px-4">

            <div class="row">
              <div class="col-lg-12 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Web Status</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-0 px-3 pt-3">
                      <div class="row">
                        <div class="col mb-4">
                          <?php
                            if($id['website_enable'] == 1)
                            {
                              echo
                              "<div class='bg-success rounded text-white text-center p-3' style='box-shadow: inset 0 0 5px rgba(0,0,0,.2);'><strong>ACTIVE</strong></div>";
                            }
                            else
                            {
                              echo
                              "<div class='bg-danger rounded text-white text-center p-3' style='box-shadow: inset 0 0 5px rgba(0,0,0,.2);'><strong>DOWN</strong></div>";
                            }
                          ?>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-3">
                          <?php if($id['website_enable'] == 1){ ?>
                            <button type="button" onClick="location.href='<?php echo base_url()."admin/execute/settings/".$id['user_id']."/web-power/stop" ?>'" class="mb-2 btn btn-outline-danger mr-2">Deactivate</button> 
                          <?php } else { ?>
                            <button type="button" onClick="location.href='<?php echo base_url()."admin/execute/settings/".$id['user_id']."/web-power/start" ?>'" class="mb-2 btn btn-outline-success mr-2">Activate</button>
                          <?php } ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 mb-4">
                <!-- Edit User Details Card -->
                <div class="card card-small mb-4 h-100">
                  <form action="<?php echo base_url()."admin/execute/settings/".$id['user_id']."/web-settings/save" ?>" method="post">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">General Setting</h6>
                    </div>
                    <div class="card-body p-0 py-4">                    
                      <div class="form-row mx-4">
                        <div class="col-lg-6">
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="Name">Website Name</label>
                              <input class="form-control" name="website_name" type="text" value="<?php echo $id['website_name'] ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="phoneNumber">Phone Number</label>
                              <div class="input-group input-group-seamless">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="material-icons"></i>
                                  </div>
                                </div>
                                <input class="form-control" name="website_contact_phone" type="text" value="<?php echo $id['website_contact_phone'] ?>" required>
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="emailAddress">Email</label>
                              <div class="input-group input-group-seamless">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="material-icons"></i>
                                  </div>
                                </div>
                                <input class="form-control" name="website_contact_email" type="email" value="<?php echo $id['website_contact_email'] ?>" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="userBio">About (Use &lt;br&gt; to get new line on home)</label>
                          <textarea class="form-control" name="website_about" style="height:85%;" required><?php echo $id['website_about'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                          <label for="userBio">Contact Info (Use &lt;br&gt; to get new line on home)</label>
                          <textarea class="form-control" name="website_contact_info" style="min-height: 87px;"><?php echo $id['website_contact_info'] ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="userBio">Address (Use &lt;br&gt; to get new line on home)</label>
                          <textarea class="form-control" name="website_contact_address" style="min-height: 87px;"><?php echo $id['website_contact_address'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-12">
                          <label for="userBio">Google Map Point</label>
                          <textarea class="form-control" name="website_google_map" style="min-height: 87px;"><?php echo $id['website_google_map'] ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer border-top">
                      <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" onclick="return confirm('Are you sure want to save this settings?')" value="Save Changes">
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-4 mb-4">
                <!-- Input & Button Groups -->
                <div class="card card-small mb-4 h-100">
                <?php echo form_open_multipart('admin/execute/settings/'.$id['user_id'].'/change-logo/update');?>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Website Logo</h6>
                  </div>
                  <div class='card-body p-0'>
                    <div class="form-row mx-4">
                      <div class="col-lg-12">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="userBio">Main Logo</label>
                            <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                              <img class="img-fluid" id="mainLogo" alt="User Avatar" src="<?php echo base_url() ?>assets/home/images/<?php echo $id['website_logo'] ?>">
                              <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                                <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                                <input class="d-none" onchange="readURL(this,'mainLogo');" name="mainLogo" type="file">
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="userBio">Second Logo</label>
                            <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                              <img class="img-fluid" id="secondLogo" alt="User Avatar" src="<?php echo base_url() ?>assets/home/images/<?php echo $id['website_second_logo'] ?>">
                              <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                                <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                                <input class="d-none" onchange="readURL(this,'secondLogo');" name="secondLogo" type="file">
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" onclick="return confirm('Are you sure want to save this settings?')" value="Save Changes">
                  </div>
                </form>
                </div>
                <!-- / Input & Button Groups -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 mb-4">
                <!-- Edit User Details Card -->
                <div class="card card-small mb-4 h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Instagram Photo <strong>(Maks 3 items)</strong></h6>
                  </div>
                  <div class="card-body p-0 py-4">
                    <div class="col-lg-12">
                      <div class="form-row">
                        <?php
                          foreach($instagram as $ig){
                            $logo = ($ig->image != '') ? $ig->image : 'no-image.jpeg';
                          ?>
                          <div class="form-group col-md-3" style="margin-bottom:0rem;margin-top:1rem;">
                            <div class="card card-small card-post h-100">
                              <div class="card-post__image" style="background-image: url('<?php echo base_url()."assets/home/images/instagram/".$logo ?>');">
                                <a class="card-post__category badge badge-danger" href="<?php echo base_url()."admin/execute/settings/".$id['user_id']."/delete-instagram-photo"."/".$ig->id ?>" style="float:right;margin:10px 10px 0px 0px;" onclick="return confirm('Are you sure want to delete this link?');">Delete</a>
                              </div>
                              <div class="card-footer text-muted border-top py-3">
                                <span class="d-inline-block"><?php echo $ig->name ?></span>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <?php if($igcount < 3) { ?>
                  <div class="card-footer border-top">
                    <input type="button" class="btn btn-sm btn-accent ml-auto d-table mr-3" id="adder" data-toggle="modal" data-target="#modalAddInstagram" value="Add Photo">
                  </div>
                  <?php } ?>
                </div>
              </div>

              <div class="col-lg-4 mb-4">
                <!-- Input & Button Groups -->
                <div class="card card-small mb-4 h-100">
                <?php echo form_open_multipart('admin/execute/settings/'.$id['user_id'].'/change-youtube-video/update');?>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Youtube Embeded Video</h6>
                  </div>
                  <div class='card-body p-0'>
                    <div class="form-row mx-4">
                      <label class="col col-form-label" for="ToggleWebPoster"> Show Embeded Video <small class="form-text text-muted"> Show Youtube video on your Home Page. </small></label>
                      <div class="col d-flex">
                          <?php
                            $checked = ($id['website_youtube_enable'] == '1') ? 'checked' : '';
                            $change = ($id['website_youtube_enable'] == '1') ? 'deactivated' : 'activated';
                          ?>
                          <div class="custom-control custom-toggle ml-auto my-auto">
                            <input class="custom-control-input" onChange="location.href='<?php echo base_url()."admin/execute/settings/".$id['user_id']."/change-video-show"."/".$change ?>'" id="ToggleWebPoster" type="checkbox" <?php echo $checked ?>>
                            <label class="custom-control-label" for="ToggleWebPoster"></label>
                          </div>
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="form-group col-md-12 pt-2">
                        <label for="userBio">Embeded URL</label>
                        <textarea class="form-control" name="website_youtube_embed" style="min-height: 87px;"><?php echo $id['website_youtube_embed'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" onclick="return confirm('Are you sure want to save this settings?')" value="Save Changes">
                  </div>
                </form>
                </div>
                <!-- / Input & Button Groups -->
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-8 mb-4">
                <!-- Edit User Details Card -->
                <div class="card card-small mb-4">
                <form class="pb-4" action="<?php echo base_url()."admin/execute/settings/".$id['user_id']."/social-media/update" ?>" method="post">
                  <div class="card-header border-bottom">
                      <h6 class="m-0">Other Setting</h6>
                  </div>
                  <div class="card-body p-0">
                    
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Social</h6>
                          <p class="form-text text-muted m-0">Setup your social profiles info.</p>
                        </div>
                      </div>

                      <?php foreach($sosmed as $med) {
                        $checked = ($med->appear == '1') ? 'checked' : '';
                      ?>
                      <div class="form-row mx-4">
                        <div class="form-group col-md-6">
                          <label for="<?php echo "social".$med->meta ?>"><?php echo $med->name ?></label>
                          <div class="input-group input-group-seamless">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fab fa-<?php echo $med->logo ?>"></i>
                              </div>
                            </div>
                            <input class="form-control" name="<?php echo "link".$med->meta ?>" id="social<?php echo $med->name ?>" type="text" value="<?php echo $med->link ?>">
                          </div>
                        </div>
                        <label class="col col-form-label" for="<?php echo "Toggle".$med->meta ?>"> <?php echo "Show ".$med->name ?> <small class="form-text text-muted"> Show <?php echo $med->name ?> link on your Home Page. </small></label>
                        <div class="col d-flex">
                          <div class="custom-control custom-toggle ml-auto my-auto">
                            <input class="custom-control-input" onChange="location.href='<?php echo base_url()."admin/execute/settings/".$id['user_id']."/change-sosmed-show"."/".$med->meta ?>'" id="<?php echo "Toggle".$med->meta ?>" type="checkbox" <?php echo $checked ?>>
                            <label class="custom-control-label" for="<?php echo "Toggle".$med->meta ?>"></label>
                          </div>
                        </div>
                      </div>
                      <?php }?>

                  </div>
                  <div class="card-footer border-top">
                    <input type="submit" class="btn btn-sm btn-accent float-right d-table mr-3" onclick="return confirm('Are you sure want to save this settings?')" value="Save Changes">
                  </div>
                </form>
                </div>
                <!-- End Edit User Details Card -->
              </div>

              <div class="col-lg-4 mb-4">
                <!-- Input & Button Groups -->
                <div class="card card-small">
                <?php echo form_open_multipart('admin/execute/settings/'.$id['user_id'].'/change-poster/update');?>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Welcome Poster</h6>
                  </div>
                  <div class='card-body p-0'>
                    <div class="form-row mx-4">
                      <label class="col col-form-label" for="ToggleWebPoster"> Show Web Poster <small class="form-text text-muted"> Show web poster on your Home Page. </small></label>
                      <div class="col d-flex">
                          <?php
                            $checked = ($id['website_poster_enable'] == '1') ? 'checked' : '';
                            $change = ($id['website_poster_enable'] == '1') ? 'deactivated' : 'activated';
                          ?>
                          <div class="custom-control custom-toggle ml-auto my-auto">
                            <input class="custom-control-input" onChange="location.href='<?php echo base_url()."admin/execute/settings/".$id['user_id']."/change-poster-show"."/".$change ?>'" id="ToggleWebPoster" type="checkbox" <?php echo $checked ?>>
                            <label class="custom-control-label" for="ToggleWebPoster"></label>
                          </div>
                      </div>
                      <div class="col-lg-12 pt-2">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="userBio">Web Poster</label>
                            <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                              <img class="img-fluid" id="posterImage" alt="Welcome Poster" src="<?php echo base_url() ?>assets/home/images/gallery/<?php echo $image ?>">
                              <!--label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                                <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                                <input class="d-none" onchange="readURL(this,'posterImage');" name="posterImage" type="file">
                              </label-->
                            </div>
                          </div>
                          <label for="userBio"><?php echo $title ?></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--div class="card-footer border-top">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" onclick="return confirm('Are you sure want to save this settings?')" value="Save Changes">
                  </div-->
                </form>
                </div>
                <!-- / Input & Button Groups -->
              </div>

            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>

          <div class="modal fade" id="modalAddInstagram" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/settings/'.$id['user_id'].'/add-instagram-photo/add-new');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Instagram Photo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">Name</label>
                          <input type="text" name="addName" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">Instagram Link</label>
                          <input type="text" name="addLink" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form8">Image</label>                            
                          <input type="file" name="addImage" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" value="SAVE">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </main>
        <script>
          function readURL(input,loc) {
            var id = '#';
            var attr = loc;
            var final = id.concat(attr);
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $(final).attr('src', e.target.result)
              };
              reader.readAsDataURL(input.files[0]);
            }
          }
        </script>
      </div>
    </div>