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
?>
          <div class="main-content-container container-fluid px-4 mb-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                <h3 class="page-title">Messaging</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Transaction History Table -->
            <table class="transaction-history d-none dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1224px;">
              <thead>
                <tr role="row">
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 32.34px;" aria-label="#: activate to sort column ascending" rowspan="1" colspan="1">#</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 250.84px;" aria-label="Date: activate to sort column ascending" rowspan="1" colspan="1">Date</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 169.84px;" aria-label="Customer: activate to sort column ascending" rowspan="1" colspan="1">Name</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 86.84px;" aria-label="Products: activate to sort column ascending" rowspan="1" colspan="1">Subject</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 79.84px;" aria-label="Status: activate to sort column ascending" rowspan="1" colspan="1">Status</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 64.84px;" aria-label="Total: activate to sort column ascending" rowspan="1" colspan="1">Email</th>
                    <th tabindex="0" class="sorting" aria-controls="DataTables_Table_0" style="width: 64.84px;" aria-label="Total: activate to sort column ascending" rowspan="1" colspan="1">Message</th>
                    <th tabindex="0" class="sorting_asc" aria-controls="DataTables_Table_0" style="width: 224.34px;" aria-label="Actions: activate to sort column descending" aria-sort="ascending" rowspan="1" colspan="1">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $class = 'odd';
                foreach($messages as $msg){
                  $class = ($i%2==0) ? 'even' : 'odd';
                  if($msg->status == '1')
                  {$status='opened';}
                  else if($msg->status == '0')
                  {$status='unread';}
                  else
                  {$status='replied';}
                  $color = ($msg->status == '1') ? 'text-warning' : 'text-success';
                ?>
                <tr class="<?php echo $class ?>" role="row">
                  <td tabindex="0"><?php echo $i ?></td>
                  <td><?php echo tanggal(substr($msg->date_send,0,10))?></td>
                  <td><?php echo $msg->m_name ?></td>
                  <td><?php echo $msg->subject ?></td>
                  <td><span class="<?php echo $color ?>"><?php echo $status ?></span></td>
                  <td><?php echo $msg->email ?></td>
                  <td><?php echo substr($msg->message, 0, 37)."..." ?></td>
                  <td class="sorting_1">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                      <?php
                      if($msg->status == '0')
                      {
                      ?>
                      <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/message/".$id['user_id']."/change-status-read"."/".$msg->id ?>'">
                        <span class="text-success"><i class="material-icons">done</i></span>
                      </button>
                      <?php } else if($msg->status == '1') { ?>
                      <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/execute/message/".$id['user_id']."/change-status-unread"."/".$msg->id ?>'">
                        <span class="text-warning"><i class="material-icons">clear</i></span>
                      </button>
                      <?php } ?>

                      <button class="btn btn-white" type="button" onClick="location.href='<?php echo base_url()."admin/read/".$msg->id ?>'">
                        <i class="material-icons">pageview</i>
                      </button>
                      <a href="<?php echo base_url()."admin/execute/message/".$id['user_id']."/delete-message"."/".$msg->id ?>"><button class="btn btn-white" type="button" onclick="return confirm('Are you sure want to delete this message?');">
                        <span class="text-danger"><i class="material-icons">delete</i></span>
                      </button></a>
                    </div>
                  </td>
                </tr>
                <?php $i=$i+1; } ?>

              </tbody>
            </table>
            
            <!-- End Transaction History Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="https://gamainovasi.com" rel="nofollow" target="_blank">PT. Gama Inovasi Berdikari</a>
            </span>
          </footer>
        </main>
      </div>
    </div>