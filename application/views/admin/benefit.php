<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
?>
          <div class="color-switcher-toggle animated pulse infinite" data-toggle="modal" data-target="#modalContactForm">
            <i class="material-icons">create</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-12 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Company Benefit List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Title</th>
                          <th scope="col" class="border-0">Icon</th>
                          <th scope="col" class="border-0">Message</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($benefit as $ben){
                        ?>
                        <tr>
                          <td rowspan="2" style="border-top-width:2px;"><?php echo $i ?></td>
                          <td style="border-top-width:2px;"><?php echo $ben->title ?></td>
                          <td style="border-top-width:2px;"><i class="fas fa-<?php echo $ben->logo ?>"></i></td>
                          <td style="border-top-width:2px;max-width: 350px;"><?php echo $ben->description ?></td>
                          <td style="border-top-width:2px;">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <button class="btn btn-white" type="button" data-toggle="modal" data-target="#modalEditbenefit" onclick='editPaging(<?php echo chr(34).$ben->id.chr(34).",".chr(34).$ben->title.chr(34).",".chr(34).$ben->logo.chr(34).",".chr(34).$ben->description.chr(34) ?>)'>
                                <i class="material-icons">create</i>
                              </button>
                              <a href="<?php echo base_url()."admin/execute/benefit/".$id['user_id']."/delete-benefit"."/".$ben->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this company value?');">
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
            <!-- End Default Light Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
          <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="<?php echo base_url()."admin/execute/benefit/".$id['user_id']."/add-benefit/add" ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Company Benefit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Title</label>
                      <input type="text" name="title" id="form34" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form29">Icon -See cheatsheet <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_blank">here</a></label>
                      <label data-error="wrong" data-success="right" for="form29">Write without fa-</label>
                      <input type="text" name="icon" id="form29" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Description</label>                            
                      <textarea type="text" name="message" id="form8" class="md-textarea form-control" rows="6" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3" value="SAVE">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="modalEditbenefit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="<?php echo base_url()."admin/execute/benefit/".$id['user_id']."/update-benefit/change-value" ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Company Benefit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <input type="text" name="edId" id="edId" class="form-control validate" hidden>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Title</label>
                      <input type="text" name="edTitle" id="edTitle" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form29">Icon -See cheatsheet <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_blank">here</a></label>
                      <label data-error="wrong" data-success="right" for="form29">Write without fa-</label>
                      <input type="text" name="edIcon" id="edIcon" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Description</label>                            
                      <textarea type="text" name="edMessage" id="edMessage" class="md-textarea form-control" rows="6" required></textarea>
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
          function editPaging(a,b,c,d)
          {
            var id = a;
            var title = b;
            var icon = c;
            var message = d;

            document.getElementById("edId").value = id;
            document.getElementById("edTitle").value = title;
            document.getElementById("edIcon").value = icon;
            document.getElementById("edMessage").value = message;
          }
        </script>
      </div>
    </div>