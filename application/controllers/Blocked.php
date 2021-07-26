<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends CI_Controller {

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
        redirect(base_url());
    }

    public function underconstruction()
    {
        $check = $this->testActiveWeb("14igdoirwo");
		if($check==false)
		{
            $data['settings'] = $this->m_setting->get_setting()->result();
            $data['sosmed'] = $this->m_setting->get_social_media()->result();
            $data['testweb'] = 'home/';
		    $data['header'] = 'Error 404';
            $data['mobile'] = $this->checkdevice();

            $this->load->view('underconstruction', $data);
        }
        else
        {redirect(base_url());}
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