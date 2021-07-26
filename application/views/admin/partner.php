<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
?>
          <div class="color-switcher-toggle animated pulse infinite" id="adder" data-toggle="modal" data-target="#modalAddPartner">
            <i class="material-icons">add</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->
            <div class="row">

              <div class="col-lg-9 mt-4">
                <div class="card card-small lo-stats h-100" style="min-height:640px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Partner List</h6>
                  </div>
                  <div class="card-body p-0 text-center">
                    <div class="container-fluid px-0">
                    <table class="table mb-0">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Category</th>
                          <th scope="col" class="border-0">Link</th>
                          <th scope="col" class="border-0">Logo</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($partner as $part){
                            $category = '';
                            $logo = ($part->logo != '') ? $part->logo : 'No Image Available.png';
                            foreach($partner_category as $pc)
                            {if($part->category == $pc->id){$category = $pc->name;}}
                        ?>
                        <tr>
                          <td class="lo-stats__items"><?php echo $i ?></td>
                          <td class="lo-stats__items"><?php echo $part->nama ?></td>
                          <td class="lo-stats__items"><?php echo $category ?></td>
                          <td class="lo-stats__items"><?php echo $part->link ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/partner/".$logo ?>"></td>
                          <td class="lo-stats__actions">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <button class="btn btn-white" type="button" data-toggle="modal" data-target="#modalEditPartner" onclick='editPartner(<?php echo chr(34).$part->id.chr(34).",".chr(34).$part->nama.chr(34).",".chr(34).$part->category.chr(34).",".chr(34).$part->link.chr(34).",".chr(34).$logo.chr(34) ?>)''>
                                <i class="material-icons">create</i>
                              </button>
                              <a href="<?php echo base_url()."admin/execute/partner/".$id['user_id']."/delete-partner"."/".$part->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this partner?');">
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

              <div class="col-lg-3 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Category List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($partner_category as $step){
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td class="text-left"><?php echo $step->name ?></td>
                          <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a href="<?php echo base_url()."admin/execute/partner/".$id['user_id']."/delete-category"."/".$step->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure to delete this category?');">
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
                    <form action="<?php echo base_url()."admin/execute/partner/".$id['user_id']."/add-category/save" ?>" method="post">
                      <label>Add new category</label>
                      <div class="input-group">
                        <input type="text" name="addcategory" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
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
          <div class="modal fade" id="modalAddPartner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/partner/'.$id['user_id'].'/add-partner/add-new');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Partner</h4>
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
                      <label data-error="wrong" data-success="right" for="form8">Category</label>                            
                      <select class="form-control" name="addCategory">
                        <?php 
                          foreach($partner_category as $step)
                          {echo "<option value='".$step->id."'>".$step->name."</option>";}
                        ?>    
                      </select>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">External Link</label>
                      <input type="text" name="addLink" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Logo</label>                            
                      <input type="file" name="addLogo" class="form-control validate">
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" value="SAVE">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="modalEditPartner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/partner/'.$id['user_id'].'/update-partner/update-details');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Partner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Name</label>
                      <input type="text" name="edid" id="edId" class="form-control validate" hidden>
                      <input type="text" name="edname" id="edName" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Category</label>                            
                      <select class="form-control" name="edcategory" id="edCategory">
                        <?php 
                          foreach($partner_category as $step)
                          {echo "<option value='".$step->id."'>".$step->name."</option>";}
                        ?>    
                      </select>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">External Link</label>
                      <input type="text" name="edlink" id="edLink" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Logo</label>                            
                      <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                        <img class="img-fluid" alt="User Avatar" id="edImg" src="">
                        <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                          <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                          <input name="edlogo" onchange="readURL(this);" class="d-none" id="userProfilePicture" type="file">
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
      function editPartner(a,b,c,d,e)
      {
        var id = a;
        var name = b;
        var category = c;
        var link = d;
        var lg1 = '<?php echo base_url()."assets/home/images/partner/" ?>'
        var lg2 = e;
        var logo = lg1.concat(lg2);

        document.getElementById("edId").value = id;
        document.getElementById("edName").value = name;
        document.getElementById("edCategory").value = category;
        document.getElementById("edLink").value = link;
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