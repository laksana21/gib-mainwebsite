<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_setting extends CI_Model{

	public function get_setting()
	{return $this->db->get('settings');}
	
	public function update_settings($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
    
	//----------->>>>>>>>>>>>>>>>

	public function get_all_message()
	{
		$this->db->order_by('date_send', 'DESC');
		return $this->db->get('message');
	}
	
	public function get_message($where)
	{
		$this->db->order_by('date_send', 'DESC');
		return $this->db->get_where('message',$where);
	}

	public function save_message($data)
	{$this->db->insert('message',$data);}

	public function update_message($where,$data)
	{
		$this->db->where($where);
		$this->db->update('message',$data);
	}

	public function get_message_read_list($where,$limit)
	{
		$this->db->order_by('date_send', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('message',$where);
	}

	public function delete_message($data)
	{
		$this->db->where($data);
		$this->db->delete('message');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_all_users()
	{return $this->db->get('users');}
	
	public function login($table,$where)
	{return $this->db->get_where($table,$where);}

	//----------->>>>>>>>>>>>>>>>

	public function get_testimony()
	{return $this->db->get('testimony');}

	public function save_testimony($data)
	{$this->db->insert('testimony',$data);}

	public function delete_testimony($data)
	{
		$this->db->where($data);
		$this->db->delete('testimony');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_paging()
	{return $this->db->get('paging');}

	public function save_paging($data)
	{$this->db->insert('paging',$data);}

	public function delete_paging($data)
	{
		$this->db->where($data);
		$this->db->delete('paging');
	}

	public function update_paging($where,$data)
	{
		$this->db->where($where);
		$this->db->update('paging',$data);
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_social_media()
	{return $this->db->get('social_media');}

	public function save_social_media($data)
	{$this->db->insert('social_media',$data);}

	public function update_social_media($where,$data)
	{
		$this->db->where($where);
		$this->db->update('social_media',$data);
	}

	public function delete_social_media($data)
	{
		$this->db->where($data);
		$this->db->delete('social_media');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_team()
	{return $this->db->get('team');}

	public function save_team($data)
	{$this->db->insert('team',$data);}

	public function get_specific_team($where)
	{return $this->db->get_where('team',$where);}

	public function update_team($where,$data)
	{
		$this->db->where($where);
		$this->db->update('team',$data);
	}

	public function delete_team($data)
	{
		$this->db->where($data);
		$this->db->delete('team');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_expertise()
	{return $this->db->get('expertise');}

	public function get_specific_expertise($where)
	{return $this->db->get_where('expertise',$where);}

	public function save_expertise($data)
	{$this->db->insert('expertise',$data);}

	public function update_expertise($where,$data)
	{
		$this->db->where($where);
		$this->db->update('expertise',$data);
	}

	public function delete_expertise($data)
	{
		$this->db->where($data);
		$this->db->delete('expertise');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_benefit()
	{return $this->db->get('benefit');}

	public function get_specific_benefit($where)
	{return $this->db->get_where('benefit',$where);}

	public function save_benefit($data)
	{$this->db->insert('benefit',$data);}

	public function update_benefit($where,$data)
	{
		$this->db->where($where);
		$this->db->update('benefit',$data);
	}

	public function delete_benefit($data)
	{
		$this->db->where($data);
		$this->db->delete('benefit');
	}

	//----------->>>>>>>>>>>>>>>>

	public function get_partner()
	{return $this->db->query("SELECT * FROM partner ORDER BY date_upload DESC");}

	public function get_specific_partner($where)
	{return $this->db->get_where('partner',$where);}

	public function save_partner($data)
	{$this->db->insert('partner',$data);}

	public function update_partner($where,$data)
	{
		$this->db->where($where);
		$this->db->update('partner',$data);
	}

	public function delete_partner($data)
	{
		$this->db->where($data);
		$this->db->delete('partner');
	}

	//----------->>>>>>>>>>>>>>>>
    
    public function add_partner_category($data)
    {$this->db->insert('partner_category',$data);}

    public function delete_partner_category($data)
	{
		$this->db->where($data);
		$this->db->delete('partner_category');
	}
    
    public function get_partner_category()
    {return $this->db->get('partner_category');}

    public function update_partner_category($where,$data)
	{
		$this->db->where($where);
		$this->db->update('partner_category',$data);
    }
}