<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		redirect('admin/dashboard');
	}

	public function login()
	{
		if($this->checkdevice())
		{
			if($this->checksession())
			{
				$meta = $this->session->userdata('meta');
				$where = array('meta_api' => $meta);
				$credential = $this->session->userdata('credential');

				if($this->checkcredential('login_admin',$credential))
				{redirect('admin/dashboard');}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{
				$chkfail = get_cookie('login', false);
				$fail = ($chkfail == "failed") ? true : false;

				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['active'] = 'login';
				$data['header'] = 'Login Page';
				$data['login'] = false;
				$data['fail'] = $fail;

				$this->load->view('admin/header',$data);
				$this->load->view('admin/login');
				$this->load->view('admin/footer');

				delete_cookie('login');
			}
		}
		else
		{redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	private function failed_login($param = null)
	{
		$msg = (func_num_args() === 0) ? "failed" : $param ;
		$cookie= array(
			'name'   => 'login',
			'value'  => $msg,
			'expire' => '3600',
		);
		$this->input->set_cookie($cookie);

		redirect('admin/login');
	}

	public function authentication()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$where = array(
			'username' => $username,
			'password' => base64_encode($password)
		);
		$cek = $this->m_setting->login('users',$where)->num_rows();
		if($cek > 0)
		{
			$metaraw = $this->m_setting->login('users',$where)->result();
			foreach($metaraw as $meta)
			{
			$data_session = array(
				'user_id' => $meta->user_id,
				'user' => $username,
				'status' => $meta->status,
				'meta' => $meta->meta_api,
				'credential' => '1f96df72a9c90fc634f8c48ba7502815'
				);
			}
 
			$this->session->set_userdata($data_session);

			delete_cookie('login');
 
			redirect('admin/dashboard');
 
		}
		else
		{$this->failed_login();}
	}

	//---------->>>>>>>>>>>>>>>

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	//---------->>>>>>>>>>>>>>>

	public function dashboard()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array(
				'meta_api' => $meta
			);
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['messages'] = $this->m_setting->get_all_message()->result();
					$data['startup'] = $this->m_portfolio->get_lastest_startup()->result();
					$data['startup_total'] = $this->m_portfolio->get_startup()->num_rows();
					$data['partner'] = $this->m_setting->get_partner()->result();
					$data['gallery_total'] = $this->m_portfolio->get_lastest_gallery()->num_rows();
					$data['active'] = 'dashboard';
					$data['header'] = 'Admin Page - Dashboard';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/dashboard');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function execute($page,$user,$param,$value)
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);

			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$time = now('Asia/Jakarta');
					$getdt = date('yy-m-d h:m:s', $time);
					
					if($page=='settings')
					{
						if($param=='web-power')
						{
							$val = ($value == 'start') ? 1 : 0;
							$data = array(
								'value' => $val,
								'last_edited' => $getdt,
								'editor' => $user
							);
							$whereMeta = array('meta' => 'website_enable');

							$this->m_setting->update_settings($whereMeta,$data,'settings');
						}
						else if($param=='web-settings')
						{
        					$website_name = $this->input->post('website_name');
        					$website_contact_phone = $this->input->post('website_contact_phone');
        					$website_contact_email = $this->input->post('website_contact_email');
							$website_about = $this->input->post('website_about');
							$website_contact_info = $this->input->post('website_contact_info');
							$website_contact_address = $this->input->post('website_contact_address');
							$website_google_map = $this->input->post('website_google_map');

							$settings = array(
								"website_name" => $website_name,
								"website_contact_phone" => $website_contact_phone,
								"website_contact_email" => $website_contact_email,
								"website_about" => $website_about,
								"website_contact_info" => $website_contact_info,
								"website_contact_address" => $website_contact_address,
								"website_google_map" => $website_google_map
							);

							foreach($settings as $x => $val)
							{
								$data = array(
									'value' => $val,
									'last_edited' => $getdt,
									'editor' => $user
								);
								$whereMeta = array('meta' => $x);
	
								$this->m_setting->update_settings($whereMeta,$data,'settings');
							}
						}
						if($param=='add-instagram-photo')
						{
							$id = $this->randomAdder($this->m_gallery->get_lastest_instagram_photo()->result());
							$name = $this->input->post('addName');
							$link = $this->input->post('addLink');

							$config['upload_path'] = './assets/home/images/instagram/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

							$new_name = time().'ig'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($link)))
							{
								if ($this->upload->do_upload('addImage'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}

									$logData = array(
										'id' => $id,
										'name' => $name,
										'external_link' => $link,
										'image' => $log,
										'date_upload' => $getdt,
										'uploader' => $user
									);
	
									$this->m_gallery->add_instagram_photo($logData);
								}
							}
						}
						else if($param=='delete-instagram-photo')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_gallery->get_specific_instagram_photo($whereId)->result();
							foreach($getSpec as $row)
	   						{$rnd = $row->image;}
							
							if($rnd != '' )
							{unlink(FCPATH ."./assets/home/images/instagram/".$rnd);}

							$this->m_gallery->delete_instagram_photo($whereId);
						}
						else if($param=='change-video-show')
						{
							$val = ($value == 'activated') ? 1 : 0;
							$data = array(
								'value' => $val,
								'last_edited' => $getdt,
								'editor' => $user
							);
							$whereMeta = array('meta' => 'website_youtube_enable');

							$this->m_setting->update_settings($whereMeta,$data,'settings');
						}
						else if($param=='change-youtube-video')
						{
							$ytiframe = $this->input->post('website_youtube_embed');

							$data = array(
								'value' => $val,
								'last_edited' => $getdt,
								'editor' => $user
							);
							$whereMeta = array('meta' => 'website_youtube_embed');
	
							$this->m_setting->update_settings($whereMeta,$ytiframe);
						}
						else if($param=='social-media')
						{
							$facebook = $this->input->post('linkfacebook');
        					$instagram = $this->input->post('linkinstagram');
        					$twitter = $this->input->post('linktwitter');
							$likedin = $this->input->post('linklinkedin');
							$youtube = $this->input->post('linkyoutube');

							$sosmed = array(
								"facebook" => $facebook,
								"instagram" => $instagram,
								"twitter" => $twitter,
								"linkedin" => $likedin,
								"youtube" => $youtube
							);

							foreach($sosmed as $x => $val)
							{
								$data = array(
									'link' => $val,
									'upload_at' => $getdt,
									'uploader' => $user
								);
								$whereMeta = array('meta' => $x);
	
								$this->m_setting->update_social_media($whereMeta,$data);
							}
						}
						else if($param=='change-sosmed-show')
						{
							$metaAppear = $this->m_setting->get_social_media()->result();
							foreach($metaAppear as $app)
							{
								if($app->meta == $value)
								{
									$status = ($app->appear == '1') ? '0' : '1';

									$data = array(
										'appear' => $status
									);
									$whereMeta = array('meta' => $value);
									$this->m_setting->update_social_media($whereMeta,$data);
								}
							}
						}
						else if($param=='change-poster-show')
						{
							$val = ($value == 'activated') ? 1 : 0;
							$data = array(
								'value' => $val,
								'last_edited' => $getdt,
								'editor' => $user
							);
							$whereMeta = array('meta' => 'website_poster_enable');

							$this->m_setting->update_settings($whereMeta,$data,'settings');
						}
						else if($param=='change-poster')
						{
							$config['upload_path'] = './assets/home/images/blog/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
 
							$this->load->library('upload', $config);

							if ($this->upload->do_upload('posterImage'))
							{
								$rnd = '';
								$getSpec = $this->m_setting->get_setting()->result();
								foreach($getSpec as $row)
	   							{
									if($row->meta == 'website_poster')
									{$rnd = $row->value;}
								}

								if($rnd != '' )
								{unlink(FCPATH ."./assets/home/images/blog/".$rnd);}

								$data = $this->upload->data();
								$log = '';
								foreach ($data as $item => $val)
								{
									if($item=='file_name')
									{$log = $val;}
								}
								
								$logData = array(
									'value' => $log,
									'last_edited' => $getdt,
									'editor' => $user
								);

								$whereMeta = array('meta' => 'website_poster');
								$this->m_setting->update_settings($whereMeta,$logData,'settings');
							}
						}
						else if($param=='change-logo')
						{
							$config['upload_path'] = './assets/home/images/';
							$config['allowed_types'] = 'gif|jpg|png';
 
							$this->load->library('upload', $config);

							if ($this->upload->do_upload('mainLogo'))
							{
								$rnd = '';
								$getSpec = $this->m_setting->get_setting()->result();
								foreach($getSpec as $row)
	   							{
									if($row->meta == 'website_logo')
									{$rnd = $row->value;}
								}

								if($rnd != '' )
								{unlink(FCPATH ."./assets/home/images/".$rnd);}

								$data = $this->upload->data();
								$log = '';
								foreach ($data as $item => $val)
								{
									if($item=='file_name')
									{$log = $val;}
								}
								
								$logData = array(
									'value' => $log,
									'last_edited' => $getdt,
									'editor' => $user
								);

								$whereMeta = array('meta' => 'website_logo');
								$this->m_setting->update_settings($whereMeta,$logData,'settings');
							}

							if ($this->upload->do_upload('secondLogo'))
							{
								$rnd = '';
								$getSpec = $this->m_setting->get_setting()->result();
								foreach($getSpec as $row)
	   							{
									if($row->meta == 'website_second_logo')
									{$rnd = $row->value;}
								}

								if($rnd != '' )
								{unlink(FCPATH ."./assets/home/images/".$rnd);}

								$data = $this->upload->data();
								$log = '';
								foreach ($data as $item => $val)
								{
									if($item=='file_name')
									{$log = $val;}
								}
								
								$logData = array(
									'value' => $log,
									'last_edited' => $getdt,
									'editor' => $user
								);

								$whereMeta = array('meta' => 'website_second_logo');
								$this->m_setting->update_settings($whereMeta,$logData,'settings');
							}
						}
						redirect('admin/settings');
					}
					else if($page=='gallery')
					{
						if($param=='add-gallery')
						{
							$id = $this->randomAdder($this->m_portfolio->get_lastest_gallery()->result());
							$name = $this->input->post('addName');
							$description = $this->input->post('addDesc');
							$type = $this->input->post('addType');
							$publication = $this->input->post('addPublic');
							$date_event = $this->input->post('addDate');

							$publication = (!empty($publication)) ? $publication : '0';

							$config['upload_path'] = './assets/home/images/gallery/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

							$new_name = time().'gallery'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($date_event)))
							{
								if ($this->upload->do_upload('addImage'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}

									$logData = array(
										'id' => $id,
										'name' => $name,
										'date_event' => $date_event,
										'description' => $description,
										'image' => $log,
										'type' => $type,
										'publication' => $publication,
										'date_upload' => $getdt,
										'uploader' => $user
									);
	
									$this->m_portfolio->add_gallery($logData);
								}
							}
						}
						else if($param=='update-gallery')
						{
							$id = $this->input->post('id');
							$name = $this->input->post('title');
							$description = $this->input->post('content');
							$type = $this->input->post('ptype');
							$publication = $this->input->post('ppublic');
							$date_event = $this->input->post('pdate');
							$temp_date = $this->input->post('tmpdate');

							$config['upload_path'] = './assets/home/images/gallery/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

							$new_name = time().'gallery'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($description)))
							{
								$whereId = array('id' => $id);
								$date = $temp_date;

								if((!empty($date_event)))
								{$date = $date_event;}

								if ($this->upload->do_upload('mainLogo'))
								{
									$rnd = '';
									$getSpec = $this->m_portfolio->get_lastest_gallery()->result();
									foreach($getSpec as $row)
									{
										if($row->id == $id)
										{$rnd = $row->image;}
									}

									if($rnd != '' )
									{unlink(FCPATH ."./assets/home/images/gallery/".$rnd);}

									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}

									$logData = array(
										'name' => $name,
										'date_event' => $date,
										'description' => $description,
										'image' => $log,
										'type' => $type,
										'publication' => $publication,
										'date_upload' => $getdt,
										'uploader' => $user
									);
								}
								else
								{
									$logData = array(
										'name' => $name,
										'date_event' => $date,
										'description' => $description,
										'type' => $type,
										'publication' => $publication,
										'date_upload' => $getdt,
										'uploader' => $user
									);
								}

								$this->m_portfolio->update_gallery($whereId, $logData);
							}
						}
						else if($param=='delete-gallery')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_portfolio->get_specific_gallery($whereId)->result();
							foreach($getSpec as $row)
	   						{$rnd = $row->image;}
							
							if($rnd != '' )
							{unlink(FCPATH ."./assets/home/images/gallery/".$rnd);}

							$this->m_portfolio->delete_gallery($whereId);
						}
						redirect('admin/gallery');
					}
					else if($page=='paging')
					{
						if($param=='add-paging')
						{
							$title = $this->input->post('title');
        					$message = $this->input->post('message');
        					$icon = $this->input->post('icon');
							$external_link = $this->input->post('link');
							
							$logData = array(
								'title' => $title,
								'message' => $message,
								'icon' => $icon,
								'external_link' => $external_link,
								'date_created' => $getdt,
								'uploader' => $user
							);

							$this->m_setting->save_paging($logData);
						}
						else if($param=='delete-paging')
						{
							$whereId = array('id' => $value);
							$this->m_setting->delete_paging($whereId);
						}
						else if($param=='update-paging')
						{
							$id = $this->input->post('edId');
							$title = $this->input->post('edTitle');
        					$message = $this->input->post('edMessage');
        					$icon = $this->input->post('edIcon');
							$external_link = $this->input->post('edlink');
							
							$logData = array(
								'title' => $title,
								'message' => $message,
								'icon' => $icon,
								'external_link' => $external_link,
								'date_created' => $getdt,
								'uploader' => $user
							);

							$whereId = array('id' => $id);
							$this->m_setting->update_paging($whereId,$logData);
						}
						redirect('admin/paging');
					}
					else if($page=='benefit')
					{
						if($param=='add-benefit')
						{
							$title = $this->input->post('title');
        					$message = $this->input->post('message');
        					$icon = $this->input->post('icon');
							
							$logData = array(
								'title' => $title,
								'description' => $message,
								'logo' => $icon,
								'date_upload' => $getdt,
								'uploader' => $user
							);

							$this->m_setting->save_benefit($logData);
						}
						else if($param=='delete-benefit')
						{
							$whereId = array('id' => $value);
							$this->m_setting->delete_benefit($whereId);
						}
						else if($param=='update-benefit')
						{
							$id = $this->input->post('edId');
							$title = $this->input->post('edTitle');
        					$message = $this->input->post('edMessage');
        					$icon = $this->input->post('edIcon');
							
							$logData = array(
								'title' => $title,
								'message' => $message,
								'icon' => $icon,
								'date_upload' => $getdt,
								'uploader' => $user
							);

							$whereId = array('id' => $id);
							$this->m_setting->update_benefit($whereId,$logData);
						}
						redirect('admin/benefit');
					}
					else if($page=='message')
					{
						if($param=='change-status-read')
						{
							$data = array('status' => '1');

							$whereId = array('id' => $value);
							$this->m_setting->update_message($whereId,$data);
						}
						else if($param=='change-status-unread')
						{
							$data = array('status' => '0');

							$whereId = array('id' => $value);
							$this->m_setting->update_message($whereId,$data);
						}
						else if($param=='delete-message')
						{
							$whereId = array('id' => $value);
							$this->m_setting->delete_message($whereId);
						}
						else if($param=='send-mail')
						{
							$senderName = $this->input->post('sendername');
        					$fromMail = $this->input->post('fromemail');
        					$destMail = $this->input->post('desemail');
        					$subject = $this->input->post('subject');
							$message = $this->input->post('mailcontent');

							$this->email->from($fromMail, $senderName);
							$this->email->to($destMail);

							$this->email->subject($subject);
							$this->email->message($message);

							$this->email->send();

							$data = array('status' => '3');
							$whereId = array('id' => $value);
							$this->m_setting->update_message($whereId,$data);
						}

						redirect('admin/message');
					}
					else if($page=='dashboard')
					{
						if($param=='change-status-read')
						{
							$data = array('status' => '1');

							$whereId = array('id' => $value);
							$this->m_setting->update_message($whereId,$data);
						}
						else if($param=='change-status-unread')
						{
							$data = array('status' => '0');

							$whereId = array('id' => $value);
							$this->m_setting->update_message($whereId,$data);
						}
						else if($param=='delete-message')
						{
							$whereId = array('id' => $value);
							$this->m_setting->delete_message($whereId);
						}

						redirect('admin/dashboard');
					}
					else if($page=='startup')
					{
						if($param=='add-startup')
						{
							$id = $this->randomAdder($this->m_portfolio->get_startup()->result());
							$step_total = $this->m_portfolio->get_startup()->num_rows();
							$log = '';

							$name = $this->input->post('addName');
							$ceo = $this->input->post('addCEO');
							$category = $this->input->post('addCategory');
							$yrlaunch = $this->input->post('addLaunch');
							$link = $this->input->post('addLink');
							$status = $this->input->post('addStatus');
							$description = $this->input->post('addDesc');

							$config['upload_path'] = './assets/home/images/startup/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($status)) && (!empty($description)))
							{
								if ($this->upload->do_upload('addLogo'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
								}

								$logData = array(
									'id' => $id,
									's_name' => $name,
									'ceo' => $ceo,
									'category' => $category,
									'description' => $description,
									'yearlaunch' => $yrlaunch,
									'status' => $status,
									'logo' => $log,
									'website' => $link,
									'loadurl' => '0',
									'order_no' => $step_total+1,
									'upload_at' => $getdt,
									'uploader' => $user
								);

								$this->m_portfolio->add_startup($logData);
							}
						}
						else if($param=='update-startup')
						{
							$id = $this->input->post('edId');
							$name = $this->input->post('edName');
							$ceo = $this->input->post('edCEO');
							$category = $this->input->post('edCategory');
							$yrlaunch = $this->input->post('edLaunch');
							$link = $this->input->post('edLink');
							$status = $this->input->post('edStatus');
							$description = $this->input->post('edDesc');

							$config['upload_path'] = './assets/home/images/startup/';
							$config['allowed_types'] = 'gif|jpg|png';
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($status)) && (!empty($description)))
							{
								if ($this->upload->do_upload('logo'))
								{
									$rnd = '';
									$whereId = array('id' => $id);
									$getSpec = $this->m_portfolio->get_specific_startup($whereId)->result();
									
									foreach($getSpec as $row)
	   								{$rnd = $row->logo;}

									if($rnd != '' )
									{unlink(FCPATH ."./assets/home/images/startup/".$rnd);}

									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
									$logData = array('logo' => $log);

									$this->m_portfolio->update_startup($whereId,$logData);
								}

								$logData = array(
									's_name' => $name,
									'ceo' => $ceo,
									'category' => $category,
									'yearlaunch' => $yrlaunch,
									'description' => $description,
									'website' => $link,
									'status' => $status
								);

								$whereId = array('id' => $id);
								$this->m_portfolio->update_startup($whereId,$logData);
							}
						}
						else if($param=='delete-startup')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_portfolio->get_specific_startup($whereId)->result();
							foreach($getSpec as $row)
	   						{
								$rnd = $row->logo;
							}
							if($rnd != '' )
							{
								unlink(FCPATH ."./assets/home/images/startup/".$rnd);
							}

							$this->m_portfolio->delete_startup($whereId);
						}
						else if($param=='add-category')
						{
							$step_total = $this->m_portfolio->get_startup_status()->num_rows();
							$stepname = $this->input->post('stepname');
							$stepmeta = $this->input->post('stepmeta');
							
							$data = array(
								'step_name' => $stepname,
								'meta' => $stepmeta,
								'order_list' => $step_total+1,
								'last_edited' => $getdt
							);
							$this->m_portfolio->add_startup_status($data);
						}
						else if($param=='delete-category')
						{
							$step = $this->m_portfolio->get_startup_status()->result();
							$startup = $this->m_portfolio->get_startup()->result();
							$val = ''; $chk = '';
							
							foreach($step as $st)
							{
								if($st->id == $value)
								{$val = $st->meta;}
								if($st->order_list == '1')
								{$chk = $st->meta;}
							}
							foreach($startup as $star)
							{
								if($val == $star->status)
								{
									$logData = array(
										'status' => $chk
									);
		
									$whereId = array('id' => $star->id);
									$this->m_portfolio->update_startup($whereId,$logData);
								}
							}

							$whereId = array('id' => $value);
							$this->m_portfolio->delete_startup_status($whereId);
						}
						else if($param=='order-up')
						{
							if($value >= 1)
							{
								$step = $this->m_portfolio->get_startup()->result();

								foreach($step as $stp)
								{
									if($stp->order_no == $value)
									{$op = $stp->id;}
									if($stp->order_no == $value-1)
									{$tmp = $stp->id;}
								}
								$dataUp = array('order_no' => $value-1);
								$dataDown = array('order_no' => $value);

								$whereUp = array('id' => $op);
								$whereDown = array('id' => $tmp);
								$this->m_portfolio->update_startup($whereUp,$dataUp);
								$this->m_portfolio->update_startup($whereDown,$dataDown);
							}
						}
						else if($param=='order-down')
						{
							$step_total = $this->m_portfolio->get_startup()->num_rows();
							if($value <= $step_total)
							{
								$step = $this->m_portfolio->get_startup()->result();

								foreach($step as $stp)
								{
									if($stp->order_no == $value)
									{$op = $stp->id;}
									if($stp->order_no == $value+1)
									{$tmp = $stp->id;}
								}
								$dataUp = array('order_no' => $value);
								$dataDown = array('order_no' => $value+1);

								$whereUp = array('id' => $tmp);
								$whereDown = array('id' => $op);
								$this->m_portfolio->update_startup($whereUp,$dataUp);
								$this->m_portfolio->update_startup($whereDown,$dataDown);
							}
						}
						else if($param=='category-up')
						{
							if($value >= 1)
							{
								$step = $this->m_portfolio->get_startup_status()->result();

								foreach($step as $stp)
								{
									if($stp->order_list == $value)
									{$op = $stp->id;}
									if($stp->order_list == $value-1)
									{$tmp = $stp->id;}
								}
								$dataUp = array('order_list' => $value-1);
								$dataDown = array('order_list' => $value);

								$whereUp = array('id' => $op);
								$whereDown = array('id' => $tmp);
								$this->m_portfolio->update_startup_status($whereUp,$dataUp);
								$this->m_portfolio->update_startup_status($whereDown,$dataDown);
							}
						}
						else if($param=='category-down')
						{
							$step_total = $this->m_portfolio->get_startup_status()->num_rows();
							if($value <= $step_total)
							{
								$step = $this->m_portfolio->get_startup_status()->result();

								foreach($step as $stp)
								{
									if($stp->order_list == $value)
									{$op = $stp->id;}
									if($stp->order_list == $value+1)
									{$tmp = $stp->id;}
								}
								$dataUp = array('order_list' => $value);
								$dataDown = array('order_list' => $value+1);

								$whereUp = array('id' => $tmp);
								$whereDown = array('id' => $op);
								$this->m_portfolio->update_startup_status($whereUp,$dataUp);
								$this->m_portfolio->update_startup_status($whereDown,$dataDown);
							}
						}

						redirect('admin/startup');
					}
					else if($page=='product')
					{
						if($param=='add-product')
						{
							$id = $this->randomAdder($this->m_portfolio->get_product()->result());

							$name = $this->input->post('pdName');
							$info = $this->input->post('pdDesc');
							$link = $this->input->post('pdLink');

							$config['upload_path'] = './assets/home/images/product/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							
							$new_name = time().$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($name)))
							{
								if ($this->upload->do_upload('pdPhoto'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
								}

								$logData = array(
									'id' => $id,
									'name' => $name,
									'picture' => $log,
									'detail_info' => $info,
									'youtube_link' => $link,
									'date_upload' => $getdt,
									'uploader' => $user
								);

								$this->m_portfolio->add_product($logData);

								$segments = array('admin', 'product', $id);
								redirect($segments);
							}
						}
						else if($param=='update-product')
						{
							$id = $this->input->post('edId');
							$name = $this->input->post('edName');
							$info = $this->input->post('edDesc');
							$link = $this->input->post('edLink');
							
							$whereData = array('id' => $id);

							$chkid = $this->m_portfolio->get_specific_product($whereData)->num_rows();
									
							if($chkid > 0)
							{
								$logData = array(
									'name' => $name,
									'detail_info' => $info,
									'youtube_link' => $link,
									'date_upload' => $getdt,
									'uploader' => $user
								);

								$this->m_portfolio->update_product($whereData,$logData);

								$segments = array('admin', 'product', $id);
								redirect($segments);
							}
						}
						else if($param=='change-cover-picture')
						{
							$id = $value;
							$config['upload_path'] = './assets/home/images/product/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';

							$new_name = time().$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							$whereData = array('id' => $value);
							$chkid = $this->m_portfolio->get_specific_product($whereData)->num_rows();
									
							if($chkid > 0)
							{
								$rnd = '';
								$getSpec = $this->m_portfolio->get_specific_product($whereData)->result();

								foreach($getSpec as $row)
								{
									$rnd = $row->picture;
								}
								
								if($rnd != '' && $rnd != 'No Image Available.png')
								{
									unlink(FCPATH ."./assets/home/images/product/".$rnd);
								}

								if($this->upload->do_upload('edPhoto'))
								{
									$data = $this->upload->data();
									foreach($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}

									$logData = array('picture' => $log);

									$this->m_portfolio->update_product($whereData,$logData);

									$segments = array('admin', 'product', $id);
									redirect($segments);
								}
							}
						}
						else if($param=='delete-product')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_portfolio->get_specific_product($whereId)->result();
							foreach($getSpec as $row)
	   						{
								$rnd = $row->picture;
							}
							if($rnd != '' && $rnd != 'No Image Available.png')
							{
								unlink(FCPATH ."./assets/home/images/product/".$rnd);
							}

							$this->m_portfolio->delete_product($whereId);
						}
						else if($param=='add-product-feature')
						{
							$id = $this->randomAdder($this->m_portfolio->get_product_features()->result());

							$ftName = $this->input->post('addFtName');
							$ftDesc = $this->input->post('addFtDesc');

							$config['upload_path'] = './assets/home/images/product/feature/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							
							$new_name = time().$value.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if( (!empty($ftName)) && (!empty($ftDesc)) )
							{
								if ($this->upload->do_upload('addFtLogo'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}

									$logData = array(
										'id' => $id,
										'parent' => $value,
										'title' => $ftName,
										'description' => $ftDesc,
										'logo' => $log,
										'date_upload' => $getdt,
										'uploader' => $user
									);
	
									$this->m_portfolio->add_product_features($logData);
	
									$segments = array('admin', 'product', $value);
									redirect($segments);
								}
							}
						}
						else if($param=='delete-product-feature')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_portfolio->get_specific_product_features($whereId)->result();
							foreach($getSpec as $row)
	   						{
								$rnd = $row->logo;
							}
							if($rnd != '' && $rnd != 'No Image Available.png')
							{
								unlink(FCPATH ."./assets/home/images/product/feature/".$rnd);
							}

							$this->m_portfolio->delete_product_features($whereId);

							$segments = array('admin', 'product', $user);
							redirect($segments);
						}
						else if($param=='add-properties')
						{
							$id = $this->randomAdder($this->m_portfolio->get_product_properties()->result());

							$prdId = $this->input->post('propprdid');
							$propname = $this->input->post('propname');
							$propval = $this->input->post('propvalue');

							if($prdId != '' && $propname != '' && $propval != '')
							{
								$logData = array(
									'id' => $id,
									'parent' => $prdId,
									'name' => $propname,
									'value' => $propval,
									'date_upload' => $getdt,
									'uploader' => $user
								);

								$this->m_portfolio->add_product_properties($logData);

								$segments = array('admin', 'product', $prdId);
								redirect($segments);
							}
						}
						else if($param=='delete-properties')
						{
							$whereId = array('id' => $value);

							$this->m_portfolio->delete_product_properties($whereId);

							$segments = array('admin', 'product', $user);
							redirect($segments);
						}
						else if($param=='add-product-image')
						{
							$id = $this->randomAdder($this->m_portfolio->get_product_gallery()->result());

							$config['upload_path'] = './assets/home/images/product/gallery/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							
							$new_name = time().$value.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if ($this->upload->do_upload('addGalPhoto'))
							{
								$data = $this->upload->data();
								$log = '';
								foreach ($data as $item => $val)
								{
									if($item=='file_name')
									{$log = $val;}
								}

								$logData = array(
									'id' => $id,
									'parent' => $value,
									'image_name' => $log,
									'date_upload' => $getdt,
									'uploader' => $user
								);
	
								$this->m_portfolio->add_product_gallery($logData);
	
								$segments = array('admin', 'product', $value);
								redirect($segments);
							}
						}
						else if($param=='delete-product-image')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_portfolio->get_specific_product_gallery($whereId)->result();
							foreach($getSpec as $row)
	   						{
								$rnd = $row->image_name;
							}
							if($rnd != '' && $rnd != 'No Image Available.png')
							{
								unlink(FCPATH ."./assets/home/images/product/gallery/".$rnd);
							}

							$this->m_portfolio->delete_product_gallery($whereId);

							$segments = array('admin', 'product', $user);
							redirect($segments);
						}
						
						redirect('admin/product/');
					}
					else if($page=='partner')
					{
						if($param=='add-partner')
						{
							$id = $this->randomAdder($this->m_setting->get_partner()->result());
							$log = '';

							$name = $this->input->post('addName');
							$category = $this->input->post('addCategory');
							$link = $this->input->post('addLink');

							$config['upload_path'] = './assets/home/images/partner/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';

							$new_name = time().'partner'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($category)))
							{
								if($this->upload->do_upload('addLogo'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
								}

								$logData = array(
									'id' => $id,
									'nama' => $name,
									'category' => $category,
									'logo' => $log,
									'link' => $link,
									'date_upload' => $getdt,
									'uploader' => $user
								);

								$this->m_setting->save_partner($logData);
							}
						}
						else if($param=='update-partner')
						{
							$id = $this->input->post('edid');
							$name = $this->input->post('edname');
							$category = $this->input->post('edcategory');
							$link = $this->input->post('edlink');

							$config['upload_path'] = './assets/home/images/partner/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';

							$new_name = time().'partner'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($category)))
							{
								if ($this->upload->do_upload('edlogo'))
								{
									$rnd = '';
									$whereId = array('id' => $id);
									$getSpec = $this->m_setting->get_specific_partner($whereId)->result();
									foreach($getSpec as $row)
	   								{
										$rnd = $row->logo;
									}
									if($rnd != '' )
									{
										unlink(FCPATH ."./assets/home/images/partner/".$rnd);
									}

									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
									$logData = array('logo' => $log);

									$this->m_setting->update_partner($whereId,$logData);
								}

								$logData = array(
									'nama' => $name,
									'category' => $category,
									'link' => $link,
								);

								$whereId = array('id' => $id);
								$this->m_setting->update_partner($whereId,$logData);
							}
						}
						else if($param=='delete-partner')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_setting->get_specific_partner($whereId)->result();
							foreach($getSpec as $row)
	   						{
								$rnd = $row->logo;
							}
							if($rnd != '' )
							{
								unlink(FCPATH ."./assets/home/images/partner/".$rnd);
							}

							$this->m_setting->delete_partner($whereId);
						}

						else if($param=='add-category')
						{
							$id = $this->randomAdder($this->m_setting->get_partner_category()->result());
							$category = $this->input->post('addcategory');
							
							$data = array(
								'id' => $id,
								'name' => $category,
								'date_upload' => $getdt,
								'uploader' => $user
							);
							$this->m_setting->add_partner_category($data);
						}

						else if($param=='delete-category')
						{
							$category = $this->m_setting->get_partner_category()->result();
							$partner = $this->m_setting->get_partner()->result();
							$val = '';

							foreach($category as $cat)
							{
								if($cat->id == $value)
								{$val = $cat->id;}
							}

							if($val != '')
							{
								foreach($partner as $part)
								{
									if($part->category == $value)
									{
										$logData = array('category' => '');
			
										$whereId = array('id' => $part->id);
										$this->m_setting->update_partner($whereId,$logData);
									}
								}

								$whereId = array('id' => $value);
								$this->m_setting->delete_partner_category($whereId);
							}
						}
						
						redirect('admin/partner');
					}
					else if($page=='team')
					{
						if($param=='add-team')
						{
							$id = $this->randomAdder($this->m_setting->get_team()->result());
							$log = '';

							$name = $this->input->post('addName');
							$position = $this->input->post('addPos');
							$category = $this->input->post('addCat');

							$config['upload_path'] = './assets/home/images/team/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';

							$new_name = time().'team'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($position)))
							{
								if ($this->upload->do_upload('addPhoto'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
								}

								$logData = array(
									'id' => $id,
									'name' => $name,
									'position' => $position,
									'category' => $category,
									'image' => $log,
									'upload_at' => $getdt,
									'uploader' => $user
								);

								$this->m_setting->save_team($logData);
							}
						}
						else if($param=='update-team')
						{
							$id = $this->input->post('edId');
							$name = $this->input->post('edName');
							$position = $this->input->post('edPos');
							$category = $this->input->post('edCat');

							$config['upload_path'] = './assets/home/images/team/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							
							$new_name = time().'team'.$id;
							$config['file_name'] = $new_name;
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($name)) && (!empty($position)))
							{
								if ($this->upload->do_upload('photo'))
								{
									$rnd = '';
									$whereId = array('id' => $id);
									$getSpec = $this->m_setting->get_specific_team($whereId)->result();
									foreach($getSpec as $row)
	   								{
										$rnd = $row->logo;
									}
									if($rnd != '' )
									{
										unlink(FCPATH ."./assets/home/images/team/".$rnd);
									}

									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
									$logData = array('image' => $log);

									$this->m_setting->update_team($whereId,$logData);
								}

								$logData = array(
									'name' => $name,
									'position' => $position,
									'category' => $category
								);

								$whereId = array('id' => $id);
								$this->m_setting->update_team($whereId,$logData);
							}
						}
						else if($param=='delete-team')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_setting->get_specific_team($whereId)->result();
							foreach($getSpec as $row)
	   						{$rnd = $row->logo;}
							
							if($rnd != '' )
							{unlink(FCPATH ."./assets/home/images/team/".$rnd);}

							$this->m_setting->delete_team($whereId);
						}
						
						redirect('admin/team');
					}
					else if($page=='testimony')
					{
						if($param=='add-testimony')
						{
							$name = $this->input->post('name');
        					$job = $this->input->post('job');
							$testimony = $this->input->post('test');
							
							$data = array(
								'name' => $name,
								'job' => $job,
								'testimony' => $testimony,
								'date_add' => $getdt
							);
							$this->m_setting->save_testimony($data);
						}
						else if($param=='delete-testimony')
						{
							$whereId = array('id' => $value);
							$this->m_setting->delete_testimony($whereId);
						}

						redirect('admin/testimonial');
					}
					else if($page=='expertise')
					{
						if($param=='add-expertise')
						{
							$id = $this->randomAdder($this->m_setting->get_expertise()->result());
							$log = '';

							$title = $this->input->post('addName');
							$description = $this->input->post('addDesc');

							$config['upload_path'] = './assets/home/images/expertise/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
 
							$this->load->library('upload', $config);

							if((!empty($id)) && (!empty($title)) && (!empty($description)))
							{
								if ($this->upload->do_upload('addImage'))
								{
									$data = $this->upload->data();
									$log = '';
									foreach ($data as $item => $val)
									{
										if($item=='file_name')
										{$log = $val;}
									}
								}

								$logData = array(
									'id' => $id,
									'title' => $title,
									'description' => $description,
									'image' => $log,
									'date_upload' => $getdt,
									'uploader' => $user
								);

								$this->m_setting->save_expertise($logData);
							}
						}
						else if($param=='delete-expertise')
						{
							$rnd = '';
							$whereId = array('id' => $value);
							$getSpec = $this->m_setting->get_specific_expertise($whereId)->result();
							foreach($getSpec as $row)
	   						{$rnd = $row->logo;}
							
							if($rnd != '' )
							{unlink(FCPATH ."./assets/home/images/expertise/".$rnd);}

							$this->m_setting->delete_expertise($whereId);
						}

						redirect('admin/expertise');
					}
					else
					{redirect('admin/logout');}
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function settings()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);

			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['gallery'] = $this->m_gallery->get_first_gallery()->result();
					$data['sosmed'] = $this->m_setting->get_social_media()->result();
					$data['instagram'] = $this->m_gallery->get_lastest_instagram_photo()->result();
					$data['igcount'] = $this->m_gallery->get_lastest_instagram_photo()->num_rows();
					$data['active'] = 'setting';
					$data['header'] = 'Admin Page - Site Setting';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
					
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/home-setting');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function gallery($param = null)
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					if(func_num_args() === 0 )
					{
						$data['user'] = $this->m_setting->login('users',$where)->result();
						$data['settings'] = $this->m_setting->get_setting()->result();
						$data['gallery'] = $this->m_portfolio->get_lastest_gallery()->result();
						$data['active'] = 'activity';
						$data['header'] = 'Admin Page - Gallery List';
						$data['login'] = true;
						$data['notifmsg'] = $this->checkNotif('10')->result();
						$data['notifcnt'] = $this->checkNotif('10')->num_rows();
						
						$this->load->view('admin/header',$data);
						$this->load->view('admin/sidebar');
						$this->load->view('admin/post-list');
						$this->load->view('admin/footer',$data);
					}
					else
					{
						$idpost = array('id' => $param);

						$data['user'] = $this->m_setting->login('users',$where)->result();
						$data['settings'] = $this->m_setting->get_setting()->result();
						$gallery = $this->m_portfolio->get_specific_gallery($idpost);

						if($gallery->num_rows() > 0)
						{
							$data['gallery'] = $gallery->result();
							$data['active'] = 'activity2';
							$data['login'] = true;
							$data['header'] = 'Admin Page - Edit Blog';
							$data['notifmsg'] = $this->checkNotif('10')->result();
							$data['notifcnt'] = $this->checkNotif('10')->num_rows();
							
							$this->load->view('admin/header',$data);
							$this->load->view('admin/sidebar');
							$this->load->view('admin/post');
							$this->load->view('admin/footer',$data);
						}
						else
						{redirect('admin/gallery');}
					}
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function paging()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);

			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['paging'] = $this->m_setting->get_paging()->result();
					$data['active'] = 'company';
					$data['header'] = 'Admin Page - Role and Function';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
					
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/paging');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function message()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['messages'] = $this->m_setting->get_all_message()->result();
					$data['active'] = 'message';
					$data['header'] = 'Admin Page - Message';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
					
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/message');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function read($param)
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$dt = array('status' => '1');
					$updWhere = array('id' => $param);
					$this->m_setting->update_message($updWhere,$dt);
					
					$msgWhere = array('id' => $param);

					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['messages'] = $this->m_setting->get_message($msgWhere)->result();
					$data['active'] = 'message';
					$data['header'] = 'Admin Page - Read Message';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
					
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/message_view');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function testimonial()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();
					$data['testimony'] = $this->m_setting->get_testimony()->result();
					$data['active'] = 'testimony';
					$data['header'] = 'Admin Page - Testimonial';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/testimonial');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function startup()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();

					$data['startup'] = $this->m_portfolio->get_startup()->result();
					$data['startup_total'] = $this->m_portfolio->get_startup()->num_rows();
					$data['startup_step'] = $this->m_portfolio->get_startup_status()->result();
					$data['step_total'] = $this->m_portfolio->get_startup_status()->num_rows();

					$data['active'] = 'activity';
					$data['header'] = 'Admin Page - Startup List';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/startup');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function partner()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();

					$data['partner'] = $this->m_setting->get_partner()->result();
					$data['partner_category'] = $this->m_setting->get_partner_category()->result();

					$data['active'] = 'company';
					$data['header'] = 'Admin Page - Partner List';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/partner');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function team()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();

					$data['team'] = $this->m_setting->get_team()->result();

					$data['active'] = 'team';
					$data['header'] = 'Admin Page - Team List';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/team');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function product($param = null)
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					if(func_num_args() === 0 )
					{
						$data['user'] = $this->m_setting->login('users',$where)->result();
						$data['settings'] = $this->m_setting->get_setting()->result();
						$data['product'] = $this->m_portfolio->get_product()->result();

						$data['active'] = 'product';
						$data['header'] = 'Admin Page - Product List';
						$data['login'] = true;
						$data['notifmsg'] = $this->checkNotif('10')->result();
						$data['notifcnt'] = $this->checkNotif('10')->num_rows();
					
						$this->load->view('admin/header',$data);
						$this->load->view('admin/sidebar');
						$this->load->view('admin/product-list');
						$this->load->view('admin/footer');
					}
					else
					{
						$whprd = array('id' => $param);
						$chkPrd = $this->m_portfolio->get_specific_product($whprd)->num_rows();

						if($chkPrd > 0)
						{
							$data['user'] = $this->m_setting->login('users',$where)->result();
							$data['settings'] = $this->m_setting->get_setting()->result();
							
							$data['product'] = $this->m_portfolio->get_specific_product($whprd)->result();

							$whrprnt = array('parent' => $param);
							$data['feature'] = $this->m_portfolio->get_specific_product_features($whrprnt)->result();
							$data['gallery'] = $this->m_portfolio->get_specific_product_gallery($whrprnt)->result();
							$data['properties'] = $this->m_portfolio->get_specific_product_properties($whrprnt)->result();

							$data['active'] = 'product';
							$data['header'] = 'Admin Page - Product List';
							$data['login'] = true;
							$data['notifmsg'] = $this->checkNotif('10')->result();
							$data['notifcnt'] = $this->checkNotif('10')->num_rows();

							/*$prdWhere = array('id' => $param);
							$chkPrd = $this->m_portfolio->get_specific_product($msgWhere)->num_rows();
							if($chkPrd > 0)
							{}
							else
							{redirect('admin/dashboard');}*/

							$this->load->view('admin/header',$data);
							$this->load->view('admin/sidebar');
							$this->load->view('admin/product-detail');
							$this->load->view('admin/footer');
						}
						else
						{redirect('admin/product');}
					}
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function expertise()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();

					$data['expert'] = $this->m_setting->get_expertise()->result();

					$data['active'] = 'company';
					$data['header'] = 'Admin Page - Expertise';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/expertise');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	public function benefit()
	{
		if($this->checkdevice())
		{
			$meta = $this->session->userdata('meta');
			$where = array('meta_api' => $meta);
			
			$credential = $this->session->userdata('credential');

			if($this->checksession())
			{
				if($this->checkcredential('login_admin',$credential))
				{
					$data['user'] = $this->m_setting->login('users',$where)->result();
					$data['settings'] = $this->m_setting->get_setting()->result();

					$data['benefit'] = $this->m_setting->get_benefit()->result();

					$data['active'] = 'company';
					$data['header'] = 'Admin Page - Benefit List';
					$data['login'] = true;
					$data['notifmsg'] = $this->checkNotif('10')->result();
					$data['notifcnt'] = $this->checkNotif('10')->num_rows();
				
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('admin/benefit');
					$this->load->view('admin/footer');
				}
				else
				{$this->session->sess_destroy();redirect('admin/error');}
			}
			else
			{redirect('admin/login');}
		}
		else
		{$this->session->sess_destroy();redirect('admin/error');}
	}

	//---------->>>>>>>>>>>>>>>

	private function checkdevice()
	{
		$detect = $this->m_ismobile->isMobile();

		if ($detect)
   		{return false;}
		else
   		{return true;}
	}

	//---------->>>>>>>>>>>>>>>

	private function checkcredential($usage, $credential)
	{return true;}

	//---------->>>>>>>>>>>>>>>

	private function randomAdder($data)
	{
		$rnd = rand(10001,99991);
		$form = $data;
		$x = 0;

		foreach($data as $row)
	    {
			if($rnd == $row->id)
			{$this->randomAdder($form);}
			else
			{$ret = $rnd;}
			$x = $x + 1;
		}
		if($x == 0)
		{$ret = $rnd;}
		return $ret;
	}

	//---------->>>>>>>>>>>>>>>

	private function checkNotif($limit)
	{
		$where = array('status' => '0');
		$message = $this->m_setting->get_message_read_list($where,$limit);
		return $message;
	}

	//---------->>>>>>>>>>>>>>>

	private function checksession()
	{
		$chkuser = $this->session->userdata('user');
		if($chkuser != NULL)
		{
			$meta = $this->session->userdata('meta');
			$where = array(
				'meta_api' => $meta
			);
			$chkdata = $this->m_setting->login('users',$where)->result();
			foreach($chkdata as $chk)
			{$dat = $chk->username;}
			if($dat == $chkuser)
			{return true;}
			else
			{return false;}
		}
		else
		{return false;}
	}

	public function error()
	{
		if(!$this->checkdevice())
		{echo 'This page cannot open from mobile device!';}
		else if(!$this->checkcredential())
		{echo 'Certificate API error! Please contact Administrator!';}
		else
		{echo 'This page cannot show because unknown error. Please contact Administrator!';}
	}
}
