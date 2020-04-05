<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
    }



    var $table = 'user';
    
     function getUserRecords()
     {
          
          $query = $this->db->get($this->table);
          return $query->result_array();
     }



     function countTotalRecord()
     {
         return $this->db->count_all($this->table);
     }


   

	public function get_pengguna_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }



    public function set_pengguna($id = 0)
    {
        $this->load->helper('url');
       $id = $this->input->post('id');
		$name = $this->input->post('name');
        $email = $this->input->post('email');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');
		$is_active = $this->input->post('is_active');
		
 
        $data = array(
            		'name'=>$name,
					'email'=>$email,
          'nomor'=>$nomor,
					'password'=>$password,
					'role_id'=>$role_id,
					'is_active'=>$is_active,
					
        );
        
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }

    public function delete_pengguna($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

}

