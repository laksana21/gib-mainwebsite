<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
?>
          <div class="color-switcher-toggle animated pulse infinite" id="adder" data-toggle="modal" data-target="#modalAddStartups">
            <i class="material-icons">add</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-8 mt-4">
                <div class="card card-small lo-stats h-100" style="min-height:640px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Startup List</h6>
                  </div>
                  <div class="card-body p-0 text-center">
                    <div class="container-fluid px-0">
                    <table class="table mb-0">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">CEO</th>
                          <th scope="col" class="border-0">Logo</th>
                          <th scope="col" class="border-0">Status</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($startup as $test){
                            $status = '';
                            $logo = ($test->logo != '') ? $test->logo : 'No Image Available.png';
                            foreach($startup_step as $step)
                            {
                              if($test->status == $step->meta)
                              {$status = $step->step_name;}
                            }
                        ?>
                        <tr>
                          <td class="lo-stats__items"><?php echo $i ?></td>
                          <td class="lo-stats__items"><?php echo $test->s_name ?></td>
                          <td class="lo-stats__items"><?php echo $test->ceo ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/startup/".$logo ?>"></td>
                          <td class="lo-stats__items text-center"><?php echo $status ?></td>
                          <td class="lo-stats__actions">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <button class="btn btn-white" type="button" data-toggle="modal" data-target="#modalEditStartups" onclick='editStartup(<?php echo chr(34).$test->id.chr(34).",".chr(34).$test->s_name.chr(34).",".chr(34).$test->status.chr(34).",".chr(34).$test->description.chr(34).",".chr(34).$logo.chr(34).",".chr(34).$test->ceo.chr(34).",".chr(34).$test->category.chr(34).",".chr(34).$test->yearlaunch.chr(34).",".chr(34).$test->website.chr(34) ?>)''>
                                <i class="material-icons">create</i>
                              </button>
                              <?php if($i>1) {?>
                              <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/startup/".$id['user_id']."/order-up"."/".$test->order_no ?>'">
                                <i class="material-icons">arrow_upward</i>
                              </button>
                              <?php } ?>
                              <?php if($i<$startup_total) {?>
                              <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/startup/".$id['user_id']."/order-down"."/".$test->order_no ?>'">
                                <i class="material-icons">arrow_downward</i>
                              </button>
                              <?php } ?>
                              <a href="<?php echo base_url()."admin/execute/startup/".$id['user_id']."/delete-startup"."/".$test->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this startup?');">
                                <span class="text-danger"><i class="material-icons">delete</i></span>
                              </button></a>
                            </div>
                          </td>
                        </tr>
                        <?php $i=$i+1; } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Category List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Step Name</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($startup_step as $step){
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td class="text-left"><?php echo $step->step_name ?></td>
                          <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <?php if($i>1) {?>
                              <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/startup/".$id['user_id']."/category-up"."/".$step->order_list ?>'">
                                <i class="material-icons">arrow_upward</i>
                              </button>
                              <?php } ?>
                              <?php if($i<$step_total) {?>
                              <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/startup/".$id['user_id']."/category-down"."/".$step->order_list ?>'">
                                <i class="material-icons">arrow_downward</i>
                              </button>
                              <?php } ?>
                              <a href="<?php echo base_url()."admin/execute/startup/".$id['user_id']."/delete-category"."/".$step->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure to delete this category?');">
                                <span class="text-danger"><i class="material-icons">delete</i></span>
                              </button></a>
                            </div>
                          </td>
                        </tr>
                        <?php $i=$i+1; } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer border-top">
                    <form action="<?php echo base_url()."admin/execute/startup/".$id['user_id']."/add-category/save" ?>" method="post">
                      <label>Add new category</label>
                      <div class="input-group">
                        <input type="text" name="stepname" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                        <input type="text" name="stepmeta" class="form-control" placeholder="Meta_name" aria-label="Meta name" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-white px-2" type="submit" onclick="return confirm('Add this new category?');">
                            <i class="material-icons">add</i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
            <!-- End Default Light Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
          <div class="modal fade" id="modalAddStartups" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/startup/'.$id['user_id'].'/add-startup/add-new');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Startup</h4>
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
                      <div class="col-lg-6 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">CEO</label>
                          <input type="text" name="addCEO" class="form-control validate" required>
                        </div>
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">Category</label>
                          <input type="text" name="addCategory" class="form-control validate">
                        </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">Year Launch</label>
                          <input type="text" name="addLaunch" class="form-control validate">
                        </div>
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form8">Status</label>                            
                          <select class="form-control" name="addStatus">
                            <?php 
                              foreach($startup_step as $step)
                              {echo "<option value='".$step->meta."'>".$step->step_name."</option>";}
                            ?>    
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form34">External Link</label>
                          <input type="text" name="addLink" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right">Description</label>
                          <textarea type="text" name="addDesc" class="md-textarea form-control" rows="8" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-1">
                          <label data-error="wrong" data-success="right" for="form8">Logo</label>                            
                          <input type="file" name="addLogo" class="form-control validate">
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
          <div class="modal fade" id="modalEditStartups" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/startup/'.$id['user_id'].'/update-startup/update-details');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Startup</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">

                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form34">Name</label>
                          <input type="text" name="edId" id="edId" class="form-control validate" hidden>
                          <input type="text" name="edName" id="edName" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-6 mb-2">
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form34">CEO</label>
                          <input type="text" name="edCEO" id="edCEO" class="form-control validate" required>
                        </div>
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form34">Category</label>
                          <input type="text" name="edCategory" id="edCategory" class="form-control validate">
                        </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form34">Year Launch</label>
                          <input type="text" name="edLaunch" id="edLaunch" class="form-control validate">
                        </div>
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form8">Status</label>                            
                          <select class="form-control" name="edStatus" id="edStatus">
                            <?php 
                              foreach($startup_step as $step)
                              {echo "<option value='".$step->meta."'>".$step->step_name."</option>";}
                            ?>    
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form34">External Link</label>
                          <input type="text" name="edLink" id="edLink" class="form-control validate" required>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-2">
                          <label data-error="wrong" data-success="right" for="form29">Description</label>
                          <textarea type="text" name="edDesc" id="edDesc" class="md-textarea form-control" rows="8" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form">
                          <label data-error="wrong" data-success="right" for="form8">Logo</label>                            
                          <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                            <img class="img-fluid" alt="User Avatar" id="edImg" src="">
                            <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                              <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                              <input name="logo" onchange="readURL(this);" class="d-none" id="userProfilePicture" type="file">
                            </label>
                          </div>
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
      </div>
    </div>
    <script>
      function editStartup(a,b,c,d,e,f,g,h,i)
      {
        var id = a;
        var name = b;
        var status = c;
        var desc = d;
        var lg1 = '<?php echo base_url()."assets/home/images/startup/" ?>'
        var lg2 = e;
        var logo = lg1.concat(lg2);
        var ceo = f;
        var category = g;
        var year = h;
        var link = i;

        document.getElementById("edId").value = id;
        document.getElementById("edCEO").value = ceo;
        document.getElementById("edName").value = name;
        document.getElementById("edCategory").value = category;
        document.getElementById("edLaunch").value = year;
        document.getElementById("edLink").value = link;
        document.getElementById("edStatus").value = status;
        document.getElementById("edDesc").value = desc;
        document.getElementById("edImg").src = logo;
      }

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#edImg').attr('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>