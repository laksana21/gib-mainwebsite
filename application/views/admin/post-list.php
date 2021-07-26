<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
  function tanggal($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
   
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }

  function deletetag($httag){
		$strTag = array (
			1 => '<p>','</p>',
      '<b>','</b>',
			'<strong class="ql-font-monospace">',
			'<span class="ql-font-monospace">',
			'<h1>','</h1>',
			'<h2>','</h2>',
			'<h3>','</h3>',
			'<h4>','</h4>',
			'<i>','</i>',
      '<strong>','</strong>',
      '<span>','</span>',
			'<em>','</em>',
			'<p class="ql-align-justify">'
		);

		$output = str_replace($strTag, "", $httag);

		return $output;
	}
?>
          <div class="color-switcher-toggle animated pulse infinite" id="adder" data-toggle="modal" data-target="#modalAddActivities">
            <i class="material-icons">add</i>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <div class="row">
              
              <?php
                foreach($gallery as $gal)
                {
                  foreach($user as $usr)
                  {
                    if($usr->user_id == $gal->uploader)
                    {$uploader = $usr->name;}
                  }

                  if(strlen ($gal->name)>54)
                  {$title = substr($gal->name, 0, 51)."...";}
                  else
                  {$title = $gal->name;}

                  if($gal->publication == "1")
                  {$badge = "Gama Inovasi";}
                  else if($gal->publication == "2")
                  {$badge = "Butimo";}
                  else if($gal->publication == "3")
                  {$badge = "Gama Kids";}
                  else
                  {$badge = "Draft";}

                  $pbadge = ($gal->type == "1") ? "Activity" : "Greetings";

                  if(strlen ($gal->description)>50)
                  {$desc = substr(strip_tags($gal->description), 0, 200)."...";}
                  else
                  {$desc = ($gal->description != '<p></p>' && $gal->description != '<p><br></p>') ? substr(strip_tags($gal->description), 0, 200) : 'No Description';}
              ?>
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mt-4">
                <div class="card card-small card-post h-100">
                  <div class="card-post__image" style="background-image: url('<?php echo base_url()."assets/home/images/gallery/".$gal->image ?>');">
                    <span class="card-post__category badge badge-primary" style="float:left;margin:10px 0px 0px 10px;"><?php echo $badge ?></span>
                    <a class="card-post__category badge badge-danger" href="<?php echo base_url()."admin/execute/gallery/".$id['user_id']."/delete-gallery"."/".$gal->id ?>" style="float:right;margin:10px 10px 0px 0px;" onclick="return confirm('Are you sure want to delete this activity?');">Delete</a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title mb-4">
                      <a class="text-fiord-blue" href="<?php echo base_url()."admin/gallery/".$gal->id ?>"><?php echo $title ?></a>
                    </h5>
                    <p><?php echo $desc ?></p>
                  </div>
                  <div class="card-footer text-muted border-top py-3">
                    <span class="d-inline-block"><?php echo "By ".$uploader." at ".tanggal(substr($gal->date_event,0,10)) ?></span>
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
          <div class="modal fade" id="modalAddActivities" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <?php echo form_open_multipart('admin/execute/gallery/'.$id['user_id'].'/add-gallery/upload-image');?>
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Activities</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <label data-error="wrong" data-success="right" for="form34">Title</label>
                        <input type="text" name="addName" class="form-control validate" placeholder="Input blog title" required>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-4 mb-2">
                        <div class="md-form">
                          <label data-error="wrong" data-success="right">Date</label>
                          <input type="date" name="addDate" class="form-control validate" required>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="md-form">
                          <label data-error="wrong" data-success="right">Publication</label>
                          <div class="input-group mb-2">
                            <select class="custom-select" name="addPublic" id="customSelect01" required>
                              <option selected="" >Choose...</option>
                              <option value="1" >Gama Inovasi</option>
                              <option value="2" >Butimo</option>
                              <option value="3" >Gama Kids</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="md-form">
                          <label data-error="wrong" data-success="right">Post Type</label>
                          <div class="input-group mb-2">
                            <select class="custom-select" name="addType" id="customSelect02" required>
                              <option selected="" >Choose...</option>
                              <option value="1" >Activity</option>
                              <option value="2" >Greetings</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form">
                          <label data-error="wrong" data-success="right">Description</label>
                          <div id="editor-container" class="add-new-post__editor mb-1"></div>
                          <textarea type="text" style="display:none" id="html" name="addDesc" class="md-textarea form-control" rows="8" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row border mb-2">
                      <div class="col-lg-12 mb-2">
                        <div class="md-form mb-2">
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
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/scripts/app/app-blog-new-post.1.1.0.js"></script>