<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
?>
          <div class="color-switcher-toggle animated pulse infinite" data-toggle="modal" data-target="#modalAddExpertise">
            <i class="material-icons">create</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-12 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Expertise List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Title</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Image</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($expert as $exp){
                            $image = ($exp->image != '') ? $exp->image : 'no-image.png';
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $exp->title ?></td>
                          <td style="max-width: 300px;"><?php echo $exp->description ?></td>
                          <td class="lo-stats__image"><img class="border rounded" alt="" src="<?php echo base_url()."assets/home/images/expertise/".$image?>"></td>
                          <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a href="<?php echo base_url()."admin/execute/expertise/".$id['user_id']."/delete-expertise"."/".$exp->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this expertise?');">
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
          <div class="modal fade" id="modalAddExpertise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <?php echo form_open_multipart('admin/execute/expertise/'.$id['user_id'].'/add-expertise/add-new');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Expertise</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form34">Title</label>
                      <input type="text" name="addName" class="form-control validate" required>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right">Description</label>
                      <textarea type="text" name="addDesc" id="form8" class="md-textarea form-control" rows="8" required></textarea>
                    </div>
                    <div class="md-form">
                      <label data-error="wrong" data-success="right" for="form8">Image</label>                            
                      <input type="file" name="addImage" class="form-control validate">
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