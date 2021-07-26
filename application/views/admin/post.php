<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}

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

  $s = '';
  $v = '';
  $pn = '';
  foreach($gallery as $gal)
  {
    $pid = $gal->id;
    $pict = $gal->image;
    $pn = $gal->id;
    $title = $gal->name;
    $cont = $gal->description;
    $tmpdate = $gal->date_event;
    $posttype = $gal->type - 1;
    $date = tanggal(substr($gal->date_event,0,10));
    $public = $gal->publication - 1;
  }
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Edit Post</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                  <div class="card-body">
                    <form class="add-new-post">
                      <input class="form-control form-control-lg mb-3" id="maintitle" onchange="titlechange()" type="text" placeholder="Your Post Title" value="<?php echo $title ?>">
                      <hr>
                      <div id="editor-container" class="add-new-post__editor mb-1"></div>
                    </form>
                  </div>
                </div>
                <!-- / Add New Post Form -->
              </div>
              <div class="col-lg-3 col-md-12">
                <div class='card card-small mb-3'>
                  <div class='card-header p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex px-3">
                        <span class="d-flex w-100">
                          <button class="btn btn-warning btn-sm btn-block" onClick="location.href='<?php echo base_url()."admin/gallery" ?>'"> <i class="material-icons">cancel</i> Return</button>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Post Overview -->
                <?php echo form_open_multipart('admin/execute/gallery/'.$id['user_id'].'/update-gallery/update');?>
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Header Image</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                            <div class="edit-user-details__avatar m-auto" style="border-radius:0%;max-width:100%">
                              <img class="img-fluid" id="mainLogo" alt="Blog Cover" src="<?php echo base_url() ?>assets/home/images/gallery/<?php echo $pict ?>">
                              <label class="edit-user-details__avatar__change" style="border-radius:0%;position:absolute;">
                                <i class="material-icons mr-1" style="line-height:0px;top:25%;"></i>
                                <input class="d-none" onchange="readURL(this,'mainLogo');" name="mainLogo" type="file">
                              </label>
                            </div>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Type and Publication</h6>
                  </div>
                  <div class='card-body p-0'>
                    <div class="col-md-12 mt-3">
                      <div class="md-form mb-3">
                        <select class="custom-select" name="ppublic" id="mySelect">
                          <option value="1">Gama Inovasi</option>
                          <option value="2">Butimo</option>
                          <option value="3">Gama Kids</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="md-form mb-3">
                        <select class="custom-select" name="ptype" id="typeSelect">
                          <option value="1">Activity</option>
                          <option value="2">Greetings</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1" style="margin-top:auto;margin-bottom:auto;">calendar_today</i>
                          <strong class="mr-1" style="margin-top:auto;margin-bottom:auto;">Date Event:</strong> <?php echo $date ?>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1" style="margin-top:auto;margin-bottom:auto;">calendar_today</i>
                          <strong class="mr-1" style="margin-top:auto;margin-bottom:auto;">Change Date:</strong>
                          <input type="date" name="pdate" class="form-control validate">
                        </span>
                        <input type="hidden" id="pid" name="id" value="<?php echo $pid ?>">
                        <input type="hidden" id="ptitle" name="title" value="<?php echo $title ?>">
                        <input type="hidden" id="tmpdate" name="tmpdate" value="<?php echo $tmpdate ?>">
                        <textarea id="conPost" name="content" hidden></textarea>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1" style="margin-top:auto;margin-bottom:auto;">attachment</i>
                          <strong class="mr-1" style="margin-top:auto;margin-bottom:auto;">Post Number:</strong> <?php echo $pn; ?>
                        </span>
                      </li>
                      <li class="list-group-item d-flex px-3 w-100">
                        <button type="submit" class="btn btn-sm btn-accent btn-block"> <i class="material-icons">save</i> Save </button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->
                </form>
              </div>
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <script>
      function titlechange() {
        var x = document.getElementById("maintitle").value;
        document.getElementById("ptitle").value = x;
      }
    </script>
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

              [{'size': ['small', false, 'large', 'huge']}],

              [{header:1},{header:2}],
              [{list:"ordered"},{list:"bullet"}],
              [{script:"sub"},{script:"super"}],
              [{indent:"-1"},{indent:"+1"}],

              ['link', 'image', 'video', 'formula'],

              [{ 'color': [] }, { 'background': [] }],
              [{ 'align': [] }],
            ]
        },
        placeholder:"Everytyhing starts from words...",theme:"snow"
      })
      
      jQuery(document).ready(function()
      {
        document.getElementById("mySelect").selectedIndex = "<?php echo $public ?>";
        document.getElementById("typeSelect").selectedIndex = "<?php echo $posttype ?>";
        var raw_markdown = '<?php echo $cont ?>';
        var html = quill.container.firstChild.innerHTML;
        $("#conPost").val(html);

        var result = raw_markdown;
        quill.clipboard.dangerouslyPasteHTML(result + "\n");
      });
      
      quill.on("text-change", function(delta, source) {
        var html = quill.container.firstChild.innerHTML;
        $("#conPost").val(html);
      });
    </script>
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