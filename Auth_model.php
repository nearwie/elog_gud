<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
    }



    var $table = 'user';
    
     function logout($id, $date)
     {
          $this->db->where('user.id', $id);
          $this->db->update('user', $date);
          
     }


}

