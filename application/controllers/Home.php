<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['paging'] = $this->m_setting->get_paging()->result();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['startup'] = $this->m_portfolio->get_startup()->result();
				$data['sStatus'] = $this->m_portfolio->get_startup_status()->result();
				$data['gallery'] = $this->m_portfolio->get_lastest_gallery()->result();
				$data['total'] = $this->m_portfolio->get_lastest_gallery()->num_rows();
				$data['igpost'] = $this->m_gallery->get_lastest_instagram_photo()->result();
				$data['igcount'] = $this->m_gallery->get_lastest_instagram_photo()->num_rows();
				$data['testweb'] = 'home/';
				$data['mobile'] = $this->checkdevice();
				$data['header'] = 'Home';
			
				$this->load->view('home/header',$data);
				$this->load->view('home/home');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

	public function about($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['paging'] = $this->m_setting->get_paging()->result();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['testimony'] = $this->m_setting->get_testimony()->result();
				$data['testweb'] = 'home/';
				$data['mobile'] = $this->checkdevice();
				$data['header'] = 'About Us';
				
				$this->load->view('home/header',$data);
				$this->load->view('home/about');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
    }

	public function portfolio($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['startup'] = $this->m_portfolio->get_startup()->result();
				$data['sStatus'] = $this->m_portfolio->get_startup_status()->result();

				$data['benefit'] = $this->m_setting->get_benefit()->result();
				$data['bCount'] = $this->m_setting->get_benefit()->num_rows();
				
				$data['team'] = $this->m_setting->get_team()->result();
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				
				$data['testweb'] = 'home/';
				$data['header'] = 'Portfolio';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/portfolio');
				$this->load->view('home/footer');
			}
			else
			{
				$where = array('id' => $param);
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
					
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['startup'] = $this->m_portfolio->get_specific_startup($where)->result();
				$data['sStatus'] = $this->m_portfolio->get_startup_status()->result();

				$data['benefit'] = $this->m_setting->get_benefit()->result();
				$data['bCount'] = $this->m_setting->get_benefit()->num_rows();
					
				$data['testweb'] = 'home/';
				$data['header'] = 'Startup Detail';
				$data['mobile'] = $this->checkdevice();

				$this->load->view('home/header',$data);
				$this->load->view('home/portfoliodetail');
				$this->load->view('home/footer');
			}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}
	
	public function team($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['team'] = $this->m_setting->get_team()->result();
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				
				$data['testweb'] = 'home/';
				$data['header'] = 'Our Team';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/team');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}
	
	public function expert($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['expert'] = $this->m_setting->get_expertise()->result();
				
				$data['testweb'] = 'home/';
				$data['header'] = 'Expertise';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/expert');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
    }

	public function contact($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['testweb'] = 'home/';
				$data['header'] = 'Contact Us';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/contact');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

	public function partner($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['partner'] = $this->m_setting->get_partner()->result();
				$data['partner_category'] = $this->m_setting->get_partner_category()->result();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['testweb'] = 'home/';
				$data['header'] = 'Our Partner';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/partner');
				$this->load->view('home/footer');
			}
			else
			{redirect(base_url().'errors/404');}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

	public function product($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{
				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$data['product'] = $this->m_portfolio->get_product()->result();
				
				$data['testweb'] = 'home/';
				$data['header'] = 'Product';
				$data['mobile'] = $this->checkdevice();
				
				$this->load->view('home/header',$data);
				$this->load->view('home/product');
				$this->load->view('home/footer');
			}
			else
			{
				$where = array('id' => $param);

				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();

				$chkPrd = $this->m_portfolio->get_specific_product($where)->num_rows();

				$data['mobile'] = $this->checkdevice();
				$data['header'] = 'Detail';
				$data['testweb'] = 'home/';

				if($chkPrd > 0)
				{
					$whrprnt = array('parent' => $param);
					
					$data['tCount'] = $this->m_setting->get_team()->num_rows();
					$data['galcount'] = $this->m_portfolio->get_specific_product_gallery($whrprnt)->num_rows();
					$data['featcount'] = $this->m_portfolio->get_specific_product_features($whrprnt)->num_rows();

					$data['product'] = $this->m_portfolio->get_specific_product($where)->result();
					$data['feature'] = $this->m_portfolio->get_specific_product_features($whrprnt)->result();
					$data['gallery'] = $this->m_portfolio->get_specific_product_gallery($whrprnt)->result();
					$data['properties'] = $this->m_portfolio->get_specific_product_properties($whrprnt)->result();

					$this->load->view('home/header',$data);
					$this->load->view('home/productdetail');
					$this->load->view('home/footer');
				}
				else
				{redirect('home/product');}
			}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}
	
	public function blog($param = null)
	{
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			if(func_num_args() === 0 )
			{redirect('home/activities');}
			else
			{
				$where = array('id' => $param);

				$data['tCount'] = $this->m_setting->get_team()->num_rows();
				$data['settings'] = $this->m_setting->get_setting()->result();
				$data['poster'] = $this->m_gallery->get_first_gallery()->result();
				$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
				$data['sosmed'] = $this->m_setting->get_social_media()->result();
				$gallery = $this->m_portfolio->get_specific_gallery($where)->result();

				$chkgallery = $this->m_portfolio->get_specific_gallery($where)->num_rows();

				$data['mobile'] = $this->checkdevice();
				$data['testweb'] = 'home/';
				$data['header'] = 'Blog';
				$data['recent'] = $this->m_portfolio->get_lastest_gallery()->result();

				if($chkgallery>0)
				{
					foreach($gallery as $gal){
						$desc = ($gal->description != '<p></p>') ? $gal->description: '<p>No Description</p>';

						$data['title'] = $gal->name;
						$data['desc'] = $desc;
						$data['image'] = $gal->image;
						$data['date'] = $gal->date_event;
					}

					$this->load->view('home/header',$data);
					$this->load->view('home/blog');
					$this->load->view('home/footer');
				}
				else
				{redirect('home/activities');}
			}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

    public function activities()
    {
		$check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			$this->load->library('pagination');

			$data['tCount'] = $this->m_setting->get_team()->num_rows();
			$data['settings'] = $this->m_setting->get_setting()->result();
			$data['poster'] = $this->m_gallery->get_first_gallery()->result();
			$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
			$data['sosmed'] = $this->m_setting->get_social_media()->result();
			$count = $this->m_gallery->get_lastest_gama_gallery()->num_rows();
			$data['total'] = $count;
			$data['testweb'] = 'home/';
			$data['mobile'] = $this->checkdevice();
			
			$config['base_url'] = base_url().'home/activities/';
			$config['total_rows'] = $count;
			$config['per_page'] = 15;

			$config['full_tag_open'] = "<ul class='list-inline d-block mx-auto'>";
			$config['full_tag_close'] = '</ul>';
			
			$config['num_tag_open'] = '<li class="list-inline-item">';
			$config['num_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="active list-inline-item"><a href=""><span>';
			$config['cur_tag_close'] = '</span></a></li>';
			
			$config['first_tag_open'] = '<li class="list-inline-item">';
			$config['first_tag_close'] = '</li>';
			
			$config['last_tag_open'] = '<li class="list-inline-item">';
			$config['last_tag_close'] = '</li>';

			$config['next_tag_open'] = '<li class="list-inline-item">';
			$config['next_tag_close'] = '</li>';

			$config['prev_tag_open'] = '<li class="list-inline-item">';
			$config['prev_tag_close'] = '</li>';

			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);	
			$data['header'] = 'Our Activity';	
			$data['gallery'] = $this->m_gallery->get_paging_gallery($config['per_page'],$from);
			
			$this->load->view('home/header',$data);
			$this->load->view('home/gallery');
			$this->load->view('home/footer');
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

	public function review()
	{
		$data['settings'] = $this->m_setting->get_setting()->result();
		$data['sosmed'] = $this->m_setting->get_social_media()->result();
		$data['testweb'] = 'home/';
		$data['mobile'] = $this->checkdevice();
        
        $this->load->view('home/penilaian',$data);
	}

	private function checkhttp()
	{
		$isHttps = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? true : false;
		
		echo $isHttps;
	}
	
	public function send_messages($param)
	{
        $time = now('Asia/Jakarta');
        $getdt = date('yy-m-d h:m:s', $time);

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        if(!$name=='' && !$email=='' && !$subject=='' && !$message=='')
        {
		    $data = array(
                'm_name' => $name,
				'subject' => $subject,
				'email' => $email,
				'message' => $message,
				'status' => '0',
			    'date_send' => $getdt
			);
            $this->m_setting->save_message($data);

            echo "
                <script type='text/javascript'>alert('Your message has sent!');</script>
                <script>
                    setTimeout(function(){window.location.href = '".base_url().$param."/contact';}, 0);
                 </script>
            ";
        }
        else
        {
            echo "
                <script type='text/javascript'>alert('Your message failed to sent!');</script>
                <script>
                    setTimeout(function(){window.location.href = '".base_url()."';}, 0);
                </script>
            ";
        }
    }

	private function testActiveWeb($param)
	{
		if($param=="14igdoirwo")
		{
			$query = $this->m_setting->get_setting()->result();

			foreach($query as $row)
			{$data[$row->meta] = $row->value;}

			if($data['website_enable'] == '1')
			{return true;}
			else
			{return false;}
		}
		else
		{echo "Unwanted Access!";}
	}

	private function checkdevice()
	{
		$detect = $this->m_ismobile->isMobile();

		if ($detect)
   		{return '1';}
		else
   		{return '0';}
	}
}
