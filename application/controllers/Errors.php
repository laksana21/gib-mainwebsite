<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class errors extends CI_Controller {
    public function index($param = null)
	{
        $check = $this->testActiveWeb("14igdoirwo");
		if($check==true)
		{
			$data['settings'] = $this->m_setting->get_setting()->result();
			$data['poster'] = $this->m_gallery->get_first_gallery()->result();
			$data['paging'] = $this->m_setting->get_paging()->result();
			$data['poscount'] = $this->m_gallery->get_first_gallery()->num_rows();
			$data['sosmed'] = $this->m_setting->get_social_media()->result();
			$data['testweb'] = 'home/';
			$data['header'] = 'Error 404';
			$data['mobile'] = $this->checkdevice();

			if(func_num_args() === 0 )
			{
				$this->load->view('home/header',$data);
				$this->load->view('errors/error404');
				$this->load->view('home/footer');
			}
			elseif($param == '404')
			{
				$this->load->view('home/header',$data);
				$this->load->view('errors/error404');
				$this->load->view('home/footer');
			}
		}
		else
		{redirect(base_url().'blocked/underconstruction');}
	}

	private function checkdevice()
	{
		$detect = $this->m_ismobile->isMobile();

		if ($detect)
   		{return '1';}
		else
   		{return '0';}
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
}