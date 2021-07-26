<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_gallery extends CI_Model{
	public function get_gallery(){
    //return $this->db->get('gallery');
    return $this->db->query("SELECT * FROM gallery ORDER BY id DESC");
  }

  public function get_first_gallery(){
    return $this->db->query("SELECT * FROM gallery WHERE gallery.publication = 1 ORDER BY date_event DESC LIMIT 1");
  }

  public function get_lastest_gama_gallery(){
    return $this->db->query("SELECT * FROM gallery WHERE gallery.publication = 1 AND gallery.type = 1 ORDER BY date_event DESC");
  }
  
  public function get_paging_gallery($number,$offset){
    $where = array(
      'publication' => '1',
      'type' => '1'
    );

    $this->db->where($where);
    $this->db->order_by('date_event', 'DESC');
  return $this->db->get('gallery',$number,$offset)->result();		
  }

  //----------->>>>>>>>>>>>>>>>

  public function get_lastest_instagram_photo()
  {
    $this->db->order_by('date_upload', 'DESC');
    return $this->db->get('instagram_link');
  }

  public function get_specific_instagram_photo($where)
	{return $this->db->get_where('instagram_link',$where);}

  public function add_instagram_photo($data)
  {$this->db->insert('instagram_link',$data);}
    
  public function delete_instagram_photo($data)
	{
		$this->db->where($data);
		$this->db->delete('instagram_link');
  }
}