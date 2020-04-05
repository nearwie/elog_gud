<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
					FROM `user_sub_menu` JOIN `user_menu`
					ON `user_sub_menu`.`menu_id` = `user_menu`. `id`
				";
		return $this->db->query($query)->result_array();
	}


    public function get_news_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user_menu');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user_menu', array('id' => $id));
        return $query->row_array();
    }



    public function set_menu($id = 0)
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
 
        $data = array(
            'id' => $id,
            'menu' => $menu,
            
        );
        
        if ($id == 0) {
            return $this->db->insert('user_menu', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user_menu', $data);
        }
    }

    public function delete_news($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_menu');
    }


}