<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}

  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}

  foreach($product as $prd)
  {
    $prId = $prd->id;
    $prName = $prd->name;
    $prPict = $prd->picture;
    $prInfo = $prd->detail_info;
    $prYt = $prd->youtube_link;
    $prUp = $prd->date_upload;
  }
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->

            <div class="row">
              <div class="col-lg-8 mt-4">
                <!-- Input & Button Groups -->
                <div class="card card-small">
                  <?php echo form_open_multipart('admin/execute/product/'.$id['user_id'].'/update-product/update');?>
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Description</h6>
                    </div>
                    <div class='card-body p-0'>
                      <div class="form-row mx-4">
                        <div class="col-lg-12">
                          <div class="form-group col-md-12 mt-3">
                            <input class="form-control form-control-lg mb-3" name="edId" type="text" style="display:none" value="<?php echo $prId ?>">
                            <input type="text" name="tempPhoto" style="display:none" value="<?php echo $prPict ?>">
                            <input class="form-control form-control-lg mb-3" name="edName" type="text" placeholder="Your Post Title" value="<?php echo $prName ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="col-lg-12">
                          <div class="form-group col-md-12 mt-2">
                            <div id="editor-container" class="add-new-post__editor mb-1"></div>
                            <textarea type="text" style="display:none" id="edDesc" name="edDesc" class="md-textarea form-control" rows="8"><?php echo $prInfo ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="col-lg-12">
                          <div class="form-group col-md-12 mt-2">
                            <textarea class="form-control" name="edLink" style="min-height: 87px;" placeholder="Youtube Link"><?php echo $prYt ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer border-top">
                      <div class="col text-center view-report">
                        <input type="submit" class="btn btn-sm btn-accent" value="Save Description">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- / Input & Button Groups -->
              </div>
              <div class="col-lg-4 mt-4">
                <!-- Input & Button Groups -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2"><i class="material-icons mr-1">flag</i><strong class="mr-1">Post Number:</strong class="text-success"><?php echo $prId ?></span>
                        <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Date Upload:</strong> <strong><?php echo $prUp ?></strong></span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <div class="col text-center view-report">
                          <a class="w-100" href="<?php echo base_url()."admin/product" ?>"><span class="btn btn-warning btn-sm btn-block"> <i class="material-icons">cancel</i> Return</span></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Input & Button Groups -->
                    
                <!-- Input & Button Groups -->
                <div class="card card-small mb-4">
                  <?php echo form_open_multipart('admin/execute/product/'.$id['user_id'].'/change-cover-picture'.'/'.$prId);?>
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Header Image</h6>
                    </div>
                    <div class='card-body p-0'>
                      <div class="form-row mx-4">
                        <div class="col-lg-12">
                          <div class="form-row">
                            <div class="form-group col-md-12 mt-2 ">
                              <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                                <img class="img-fluid" alt="User Avatar" id="edPhoto" src="<?php echo base_url()."assets/home/images/product/".$prPict ?>">
                                <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                                  <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                                  <input class="d-none" onchange="readURL(this,'edPhoto');" name="edPhoto" type="file">
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer border-top">
                      <div class="col text-center view-report">
                        <input type="submit" class="btn btn-sm btn-accent" value="Change Image">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 mt-4">
                <!-- / Input & Button Groups -->
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Feature List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Logo</th>
                          <th scope="col" class="border-0">Title</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($feature as $feat){
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/product/feature/".$feat->logo ?>"></td>
                          <td class="text-center"><?php echo $feat->title ?></td>
                          <td class="text-center"><?php echo $feat->description ?></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a href="<?php echo base_url()."admin/execute/product/".$feat->parent."/delete-product-feature"."/".$feat->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure to delete this feature?');">
                                <span class="text-danger"><i class="material-icons">delete</i></span></button>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <?php $i=$i+1; } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer border-top">
                    <input type="button" class="btn btn-sm btn-accent mr-auto d-table ml-3" value="Add Feature" data-toggle="modal" data-target="#modalAddFeature">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mt-4">
                <!-- / Input & Button Groups -->
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Properties List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Value</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($properties as $prop){
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          
                          <td class="text-left"><?php echo $prop->name ?></td>
                          <td class="text-left"><?php echo $prop->value ?></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a href="<?php echo base_url()."admin/execute/product/".$prId."/delete-properties"."/".$prop->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure to delete this properties?');">
                                <span class="text-danger"><i class="material-icons">delete</i></span></button>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <?php $i=$i+1; } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer border-top">
                    <form action="<?php echo base_url()."admin/execute/product/".$id['user_id']."/add-properties"."/".$prId ?>" method="post">
                      <label>Add new properties</label>
                      <div class="input-group">
                        <input type="text" name="propprdid" class="form-control" style="display:none" value="<?php echo $prId ?>">
                        <input type="text" name="propname" class="form-control" placeholder="Add new properties" aria-label="Add new properties" aria-describedby="basic-addon2">
                        <input type="text" name="propvalue" class="form-control" placeholder="Value properties" aria-label="Value properties" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-white px-2" type="submit" onclick="return confirm('Add this new properties?');">
                              <i class="material-icons">add</i>
                            </button>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 mt-4">
                <!-- / Input & Button Groups -->
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Gallery List</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12">
                      <div class="form-row">
                        <?php
                          foreach($gallery as $gal){
                        ?>
                        <div class="form-group col-md-2" style="margin-bottom:0rem;margin-top:1rem;">
                          <div class="border border-info rounded">
                            <img class="img-fluid mb-2" alt="<?php echo $gal->image_name ?>" src="<?php echo base_url()."assets/home/images/product/gallery/".$gal->image_name ?>">
                            <div class="text-center border-top pt-2 mb-2">
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url()."admin/execute/product/".$prId."/delete-product-image"."/".$gal->id ?>" onclick="return confirm('Are you sure want to delete this image?');">Delete</a>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top">
                    <div class="col text-center view-report">
                      <input type="button" class="btn btn-sm btn-accent" value="Add Image" data-toggle="modal" data-target="#modalAddGallery">
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

          <div class="modal fade" id="modalAddGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="min-width:50.125rem;">
              <?php echo form_open_multipart('admin/execute/product/'.$id['user_id'].'/add-product-image'.'/'.$prId);?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">

                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form pt-2">
                          <label data-error="wrong" data-success="right" for="form8">Photo</label>                        
                          <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:60%;">
                            <img class="img-fluid" alt="User Avatar" id="addGallery" src="<?php echo base_url()."assets/home/images/product/No Image Available.png" ?>">
                            <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                              <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                              <input name="addGalPhoto" onchange="readURL(this,'addGallery');" class="d-none" id="userProfilePicture" type="file">
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

          <div class="modal fade" id="modalAddFeature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="min-width:50.125rem;">
              <?php echo form_open_multipart('admin/execute/product/'.$id['user_id'].'/add-product-feature'.'/'.$prId);?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Feature</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">

                    <div class="row mb-2">
                      <div class="col-lg-12 mb-2">
                        <label data-error="wrong" data-success="right" for="form34">Feature Name</label>
                        <input type="text" name="addFtName" class="form-control validate" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form pt-2">
                          <label data-error="wrong" data-success="right">Description</label>
                          <textarea class="form-control" name="addFtDesc" style="min-height: 87px;" placeholder="Write description"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form pt-2">
                          <label data-error="wrong" data-success="right" for="form8">Photo</label>                            
                          <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:60%;">
                            <img class="img-fluid" alt="User Avatar" id="FtLogo" src="<?php echo base_url()."assets/home/images/product/No Image Available.png" ?>">
                            <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                              <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                              <input name="addFtLogo" onchange="readURL(this,'FtLogo');" class="d-none" id="userProfilePicture" type="file">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
    <script>
      var quill = new Quill("#editor-container",{
        modules:
        {
          toolbar:
            [
              [{header:[1,2,3,4,5,!1]}],
              [{'font': [] }],
              ["bold","italic","underline","strike"],
              ["blockquote","code-block"],

              [{header:1},{header:2}],
              [{list:"ordered"},{list:"bullet"}],
              [{script:"sub"},{script:"super"}],
              [{indent:"-1"},{indent:"+1"}],

              ['link'],

              [{ 'color': [] }, { 'background': [] }],
              [{ 'align': [] }],
            ]
        },
        placeholder:"Everytyhing starts from words...",theme:"snow"
      })
      
      jQuery(document).ready(function()
      {
        var detail = document.getElementById("edDesc").value;
        var raw_markdown = detail;
        var html = quill.container.firstChild.innerHTML;
        $("#edDesc").val(html);

        var result = raw_markdown;
        quill.clipboard.dangerouslyPasteHTML(result + "\n");
      });

      function resetform()
      {
        document.getElementById("pdId").value = '';
        document.getElementById("pdName").value = '';
        document.getElementById("tempPhoto").value = '';
        document.getElementById("pdLink").value = '';
        document.getElementById("edPhoto").src = '<?php echo base_url()."assets/home/images/product/No Image Available.png" ?>';

        var raw_markdown = '';
        var html = quill.container.firstChild.innerHTML;
        $("#edDesc").val(html);

        var result = raw_markdown;
        quill.clipboard.dangerouslyPasteHTML(result + "\n");
      }
      
      quill.on("text-change", function(delta, source) {
        var html = quill.container.firstChild.innerHTML;
        $("#edDesc").val(html);
      });

      function readURL(input,tgt) {
        var hsh = '#';
        var final = hsh.concat(tgt);
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $(final).attr('src', e.target.result)
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>