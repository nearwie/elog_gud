<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat_model extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
    }


    var $table = 'data_alat';
   
    
     public function getUserRecords()
     {
         
         
         $this->db->select('*');
        $this->db->from('data_alat');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
     }

     



     public function countTotalRecord()
     {
         return $this->db->count_all($this->table);
     }


     function get_list_data(){
        $this->db->select('*');
        $this->db->from('data_alat');
        return $this->db->get();
    }


	public function get_alat_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('data_alat');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('data_alat', array('id' => $id));
        return $query->row_array();
    }




    public function get_alatt_by_id($nama_alat=0)
    {
        
        $this->db->select('*');
        $this->db->from('data_alat');
         $this->db->where('nama_alat',$nama_alat);
        return $this->db->get();
    
    }





  public function get_list_by_id($id){
         $sql = "select id,nama_alat,merk, lokasi, rentang, resolusi,from gejala where id in (".$id.")";
        return $this->db->query($sql);
         
     }





    public function set_alat($id = 0)
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
		    $nama_alat = $this->input->post('nama_alat');
        $merk = $this->input->post('merk');
        $sn = $this->input->post('sn');
        $lokasi = $this->input->post('lokasi');
        $rentang = $this->input->post('rentang');
        $resolusi = $this->input->post('resolusi');
        $keterangan = $this->input->post('keterangan');
      
		
		
 
        $data = array(
            		'id'=>$id,
					'nama_alat'=>$nama_alat,
					'merk'=>$merk,
          'sn'=>$sn,
          'lokasi'=>$lokasi,
          'rentang'=>$rentang,
          'resolusi'=>$resolusi,
          'keterangan'=>$keterangan,
					
        );
        
        if ($id == 0) {
            return $this->db->insert('data_alat', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('data_alat', $data);
        }
    }

    public function delete_alat($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('data_alat');
    }


}

