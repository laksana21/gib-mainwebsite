<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
?>
          <div class="color-switcher-toggle animated pulse infinite" id="adder" onclick="resetform()" data-toggle="modal" data-target="#modalAddProduct">
            <i class="material-icons">add</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-12 mt-4">
                <div class="card card-small lo-stats h-100" style="min-height:640px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Product List</h6>
                  </div>
                  <div class="card-body p-0 text-center">
                    <div class="container-fluid px-0">
                    <table class="table mb-0">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Photo</th>
                          <th scope="col" class="border-0">Date Add</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($product as $test){
                            $photo = ($test->picture != '') ? $test->picture : 'No Image Available.png';
                        ?>
                        <tr>
                          <td class="lo-stats__items"><?php echo $i ?></td>
                          <td class="lo-stats__items"><?php echo $test->name ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="<?php echo $test->name ?>" src="<?php echo base_url()."assets/home/images/product/".$photo ?>"></td>
                          <td class="lo-stats__items text-center"><?php echo $test->date_upload ?></td>
                          <td class="lo-stats__actions">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <textarea type="text" style="display:none" id="<?php echo $test->id ?>" name="descTemp" class="md-textarea form-control" rows="8"><?php echo $test->detail_info ?></textarea>
                              <a href="<?php echo base_url()."admin/product/".$test->id ?>"><button class="btn btn-white" type="button">
                                <i class="material-icons">create</i>
                              </button></a>
                              <a href="<?php echo base_url()."admin/execute/product/".$id['user_id']."/delete-product"."/".$test->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this product?');">
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
          <div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="min-width:50.125rem;">
              <?php echo form_open_multipart('admin/execute/product/'.$id['user_id'].'/add-product/add');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">

                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <label data-error="wrong" data-success="right" for="form34">Product Name</label>
                        <input type="text" id="pdName" name="pdName" class="form-control validate" required>
                        <input type="text" id="pdId" name="pdId" class="form-control validate" hidden>
                      </div>
                    </div>

                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form pt-2">
                          <label data-error="wrong" data-success="right">Description</label>
                          <div id="editor-container" class="add-new-post__editor mb-1"></div>
                          <textarea type="text" style="display:none" id="pdDesc" name="pdDesc" class="md-textarea form-control" rows="8"></textarea>
                        </div>
                        <div class="md-form pt-2">
                          <label data-error="wrong" data-success="right" for="form8">Photo</label>                            
                          <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:60%;">
                            <img class="img-fluid" alt="User Avatar" id="edPhoto" src="<?php echo base_url()."assets/home/images/product/No Image Available.png" ?>">
                            <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                              <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                              <input name="pdPhoto" onchange="readURL(this);" class="d-none" id="userProfilePicture" type="file">
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
        
      });

      /*function editProduct(a,b,c,d,e,f,g,h)
      {
        var postid = a;
        var name = b;
        var detail = document.getElementById(c).value;
        var link = d;
        var lg1 = '<?php //echo base_url()."assets/home/images/product/" ?>'
        if(e === '')
        {e = 'No Image Available.png';}
        var lg2 = e;
        var photo = lg1.concat(lg2);
        var weight = f;
        var size = g;
        var power = h;

        document.getElementById("pdId").value = postid;
        document.getElementById("pdName").value = name;
        document.getElementById("tempPhoto").value = lg2;
        document.getElementById("pdLink").value = link;
        document.getElementById("edPhoto").src = photo;
        document.getElementById("pdWeight").value = weight;
        document.getElementById("pdSize").value = size;
        document.getElementById("pdPower").value = power;

        var raw_markdown = detail;
        var html = quill.container.firstChild.innerHTML;
        $("#pdDesc").val(html);

        var result = raw_markdown;
        quill.clipboard.dangerouslyPasteHTML(result + "\n");
      }*/

      function resetform()
      {
        document.getElementById("pdId").value = '';
        document.getElementById("pdName").value = '';
        document.getElementById("tempPhoto").value = '';
        document.getElementById("edPhoto").src = '<?php echo base_url()."assets/home/images/product/No Image Available.png" ?>';

        var raw_markdown = '';
        var html = quill.container.firstChild.innerHTML;
        $("#pdDesc").val(html);

        var result = raw_markdown;
        quill.clipboard.dangerouslyPasteHTML(result + "\n");
      }
      
      quill.on("text-change", function(delta, source) {
        var html = quill.container.firstChild.innerHTML;
        $("#pdDesc").val(html);
      });

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