<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_portfolio extends CI_Model{

	public function get_startup()
    {
        $this->db->order_by('order_no', 'ASC');
        return $this->db->get('startup_list');
    }

    public function add_startup($data)
	{$this->db->insert('startup_list',$data);}

    public function get_lastest_startup()
    {
        $this->db->order_by('upload_at', 'DESC');
        return $this->db->get('startup_list');
    }

    public function get_specific_startup($where)
	{return $this->db->get_where('startup_list',$where);}

    public function update_startup($where,$data)
	{
		$this->db->where($where);
		$this->db->update('startup_list',$data);
    }
    
    public function delete_startup($data)
	{
		$this->db->where($data);
		$this->db->delete('startup_list');
	}
    
    //----------->>>>>>>>>>>>>>>>
    
    public function add_startup_status($data)
    {$this->db->insert('startup_step',$data);}

    public function delete_startup_status($data)
	{
		$this->db->where($data);
		$this->db->delete('startup_step');
	}
    
    public function get_startup_status()
    {
        $this->db->order_by('order_list', 'ASC');
        return $this->db->get('startup_step');
    }

    public function update_startup_status($where,$data)
	{
		$this->db->where($where);
		$this->db->update('startup_step',$data);
    }

    //----------->>>>>>>>>>>>>>>>

    public function get_lastest_gallery()
    {
        $this->db->order_by('date_event', 'DESC');
        return $this->db->get('gallery');
    }

    public function get_specific_gallery($where)
	{return $this->db->get_where('gallery',$where);}

    public function add_gallery($data)
    {$this->db->insert('gallery',$data);}
    
    public function delete_gallery($data)
	{
		$this->db->where($data);
		$this->db->delete('gallery');
    }

    public function update_gallery($where,$data)
	{
		$this->db->where($where);
		$this->db->update('gallery',$data);
    }
    
    public function get_paging_gallery($number,$offset){
        $where = array('publication' => '1');

        $this->db->where($where);
        $this->db->order_by('date_event', 'DESC');
		return $this->db->get('gallery',$number,$offset)->result();		
    }
    
    //----------->>>>>>>>>>>>>>>>

    public function get_product()
    {return $this->db->get('product_list');}

    public function get_product_features()
    {return $this->db->get('product_features');}

    public function get_product_gallery()
    {return $this->db->get('product_gallery');}

    public function get_product_properties()
    {return $this->db->get('product_properties');}


    public function get_specific_product($where)
    {return $this->db->get_where('product_list',$where);}
    
    public function get_specific_product_features($where)
    {return $this->db->get_where('product_features',$where);}
    
    public function get_specific_product_gallery($where)
    {return $this->db->get_where('product_gallery',$where);}

    public function get_specific_product_properties($where)
    {return $this->db->get_where('product_properties',$where);}
    

    public function add_product($data)
    {$this->db->insert('product_list',$data);}

    public function add_product_features($data)
    {$this->db->insert('product_features',$data);}
    
    public function add_product_gallery($data)
    {$this->db->insert('product_gallery',$data);}

    public function add_product_properties($data)
    {$this->db->insert('product_properties',$data);}

    
    public function delete_product($data)
	{
		$this->db->where($data);
		$this->db->delete('product_list');
    }

    public function delete_product_features($data)
	{
		$this->db->where($data);
		$this->db->delete('product_features');
    }

    public function delete_product_gallery($data)
	{
		$this->db->where($data);
		$this->db->delete('product_gallery');
    }

    public function delete_product_properties($data)
	{
		$this->db->where($data);
		$this->db->delete('product_properties');
    }

    
    public function update_product($where,$data)
	{
		$this->db->where($where);
		$this->db->update('product_list',$data);
    }
}