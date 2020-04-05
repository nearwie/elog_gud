<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
  public $table  = 'user_sub_menu';
  public $id  = 'id';
  public $order  = 'ASC';

	public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }



	public function getSubMenu()
	{
        $this->db->select('user_sub_menu.*, user_menu.menu as menu');
        $this->db->order_by($this->id,$this->order);
        $this->db->join('user_menu','user_menu.id = user_sub_menu.menu_id', 'left');
        
        return $this->db->get($this->table)->result_array();
    }



     public function countTotalRecord()
     {
         return $this->db->count_all($this->table);
     }

	
   

    public function get_submenu_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user_sub_menu');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user_sub_menu', array('id' => $id));
        return $query->row_array();
    }



    public function set_submenu ($id = 0)
    {
        $this->load->helper('url');
       $id = $this->input->post('id');
		$title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$is_active = $this->input->post('is_active');
		
        $data = array(
                    'id'=>$id,
            		'title'=>$title,
					'menu_id'=>$menu_id,
					'url'=>$url,
					'icon'=>$icon,
					'is_active'=>$is_active,
					
        );
        
        if ($id == 0) {
            return $this->db->insert('user_sub_menu', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user_sub_menu', $data);
        }
    }

    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_sub_menu');
    }

}