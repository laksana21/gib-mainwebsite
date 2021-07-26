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
              <div class="col-lg-12 mt-4">
                <div class="card card-small lo-stats h-100" style="min-height:640px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Team Member</h6>
                  </div>
                  <div class="card-body p-0 text-center">
                    <div class="container-fluid px-0">
                    <table class="table mb-0">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Position</th>
                          <th scope="col" class="border-0">Photo</th>
                          <th scope="col" class="border-0">Category</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($team as $test){
                            $photo = ($test->image != '') ? $test->image : 'No Image Available.png';
                            $category = ($test->category == 'expert') ? 'Expertise' : 'Team Member';
                        ?>
                        <tr>
                          <td class="lo-stats__items"><?php echo $i ?></td>
                          <td class="lo-stats__items"><?php echo $test->name ?></td>
                          <td class="lo-stats__items text-center"><?php echo $test->position ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/team/".$photo ?>"></td>
                          <td class="lo-stats__items text-center"><?php echo $category ?></td>
                          <td class="lo-stats__actions">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <button class="btn btn-white" type="button" data-toggle="modal" data-target="#modalEditStartups" onclick='editStartup(<?php echo chr(34).$test->id.chr(34).",".chr(34).$test->name.chr(34).",".chr(34).$test->position.chr(34).",".chr(34).$test->category.chr(34).",".chr(34).$photo.chr(34) ?>)''>
                                <i class="material-icons">create</i>
                              </button>
                              <a href="<?php echo base_url()."admin/execute/team/".$id['user_id']."/delete-team"."/".$test->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this person?');">
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
              <?php echo form_open_multipart('admin/execute/team/'.$id['user_id'].'/add-team/add-new');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Team</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Name</label>
                      <input type="text" name="addName" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right">Position</label>
                      <input type="text" name="addPos" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Category</label>                            
                      <select class="form-control" name="addCat">
                        <option value="team">Team Member</option>
                        <option value="expert">Expertise</option>
                      </select>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Photo</label>                            
                      <input type="file" name="addPhoto" class="form-control validate">
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
              <?php echo form_open_multipart('admin/execute/team/'.$id['user_id'].'/update-team/update-details');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Team Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Name</label>
                      <input type="text" name="edId" id="edId" class="form-control validate" hidden>
                      <input type="text" name="edName" id="edName" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form29">Position</label>
                      <input type="text" name="edPos" id="edPos" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Category</label>                            
                      <select class="form-control" id="edCat" name="edCat">
                        <option value="team">Team Member</option>
                        <option value="expert">Expertise</option>
                      </select>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Photo</label>                            
                      <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                        <img class="img-fluid" alt="User Avatar" id="edPhoto" src="">
                        <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                          <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                          <input name="photo" onchange="readURL(this);" class="d-none" id="userProfilePicture" type="file">
                        </label>
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
      function editStartup(a,b,c,d,e)
      {
        var id = a;
        var name = b;
        var position = c;
        var category = d;
        var lg1 = '<?php echo base_url()."assets/home/images/startup/" ?>'
        var lg2 = e;
        var photo = lg1.concat(lg2);

        document.getElementById("edId").value = id;
        document.getElementById("edName").value = name;
        document.getElementById("edPos").value = position;
        document.getElementById("edCat").value = category;
        document.getElementById("edPhoto").src = photo;
      }

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#edPhoto').attr('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>