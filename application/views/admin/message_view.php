<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  foreach($user as $log)
  {$id['name'] = $log->name;$id['image'] = $log->image;$id['user_id'] = $log->user_id;}
  foreach($messages as $m)
  {
    $msg['id'] = $m->id;  
    $msg['name'] = $m->m_name;
    $msg['subject'] = $m->subject;
    $msg['email'] = $m->email;
    $msg['message'] = $m->message;
  }
  foreach($settings as $set)
  {$id[$set->meta] = $set->value;}
?>
          <div class="main-content-container container-fluid px-4">
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Messages</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">From</strong>
                      <span><?php echo $msg['name'] ?></span>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Email</strong>
                      <span><?php echo $msg['email'] ?></span>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Subject</strong>
                      <span><?php echo $msg['subject'] ?></span>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Message</strong>
                      <span><?php echo $msg['message'] ?></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 mt-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Reply Email</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="<?php echo base_url()."admin/execute/message/".$id['user_id']."/send-mail"."/".$msg['id'] ?>" method="post">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Name</label>
                                <input class="form-control" name="sendername" type="text" placeholder="Sender Name" value="<?php echo $id['website_name'] ?>">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input class="form-control" name="fromemail" type="email" placeholder="Email" value="<?php echo $id['website_contact_email'] ?>">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Destination Email</label>
                                <input class="form-control" name="desemail" type="email" placeholder="Email" value="<?php echo $msg['email'] ?>">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Subject</label>
                                <input class="form-control" name="subject" type="text" placeholder="Subject" value="Re-<?php echo $msg['subject'] ?>">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Message</label>
                                <textarea name="mailcontent" class="form-control" rows="5"></textarea>
                              </div>
                            </div>
                            <button class="btn btn-accent" type="submit">Send Email</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
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
        </main>
      </div>
    </div>