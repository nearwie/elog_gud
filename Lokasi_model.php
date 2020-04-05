<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
    }


    var $table = 'meta_dt';
   
    
     public function getUserRecords()
     {
          
         
         $this->db->select('*');
        $this->db->from('meta_dt');
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
        $this->db->from('meta_dt');
        return $this->db->get();
    }


	public function get_lokasi_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('meta_dt');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('meta_dt', array('id' => $id));
        return $query->row_array();
    }





  public function get_list_by_id($id){
         $sql = "select id,nama_alat,merk, lokasi, rentang, resolusi,from gejala where id in (".$id.")";
        return $this->db->query($sql);
         
     }





    public function set_lokasi($id = 0)
    {
        $this->load->helper('url');
        $id_sta = $this->input->post('id_sta');
		    $nama_sta = $this->input->post('nama_sta');
        $alamat = $this->input->post('alamat');
        $kab = $this->input->post('kab');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $elevasi = $this->input->post('elevasi');
       
      
		
		
 
        $data = array(
          'id_sta'=>$id_stas,
					'nama_sta'=>$nama_sta,
					'alamat'=>$alamat,
          'kab'=>$kab,
          'lat'=>$lat,
          'lng'=>$lng,
          'elevasi'=>$elevasi,
          
        );
        
        if ($id == 0) {
            return $this->db->insert('meta_dt', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('meta_dt', $data);
        }
    }

    public function delete_alat($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('meta_dt');
    }

    public function getProv()
  {
        $this->db->select('*');
        $this->db->from('tbl_provinsi');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
  }



    public function getKab()
{
   $this->db->select('*');
        $this->db->from('tbl_kab');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
  }


  function fetch_kab($prov_id)
 {
  $this->db->where('prov_id', $prov_id);
  $this->db->order_by('kab', 'ASC');
  $query = $this->db->get('tbl_kab');
  return $query->result_array();
  
 }



  

}

