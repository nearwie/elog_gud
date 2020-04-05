<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Lokasi_model');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Data Lokasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Lokasi_model');
        
        
        $data['lokasis'] = $this->lokasi_model->getUserRecords();
		// $data['gejalas'] = $this->db->get('gejala') -> result_array();
		
		$this->form_validation->set_rules('nama_sta', 'Stasiun', 'required', [
			'required' => 'Kolom Nama Stasiun wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Lat', 'required', [
			'required' => 'Kolom Latitude wajib diisi'
		]);
		$this->form_validation->set_rules('lng', 'Lng', 'required', [
			'required' => 'Kolom Longitude wajib diisi'
		]);
		$this->form_validation->set_rules('elevasi', 'Elevasi', 'required', [
			'required' => 'Kolom Elevasi wajib diisi'
		]);
		

		if ($this->form_validation->run() == false ) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lokasi', $data);
		$this->load->view('templates/footer', $data);
		} else{
			$data = [
				
				'id_sta' => $this->input->post('id_sta'),
		        'nama_sta' => $this->input->post('nama_sta'),
				'alamat' => $this->input->post('alamat'),
		        'kab' => $this->input->post('kab'),
		        'lat' => $this->input->post('lat'),
		        'lng' => $this->input->post('lng'),
		        'elevasi'=> $this->input->post('elevasi')
		      
			];

			$this->db->insert('meta_dt', $data);
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil menambahkan lokasi baru</div>');
			redirect('lokasi');
		}

	}


	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('lokasi');
        }
        
        $this->load->helper('url');
      
        
        $data['title'] = 'Edit Lokasi';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$data['lokasis'] = $this->db->get('meta_dt')->result_array();
		$this->load->model('Lokasi_model');
        
        $data['a'] = $this->Lokasi_model->get_lokasi_by_id($id);

  
  		$this->form_validation->set_rules('id_sta', 'Id_sta', 'required', [
			'required' => 'Kolom Nama Stasiun wajib diisi'
		]);
		$this->form_validation->set_rules('nama_sta', 'Sta', 'required', [
			'required' => 'Kolom Nama Stasiun wajib diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Kolom Alamat wajib diisi'
		]);
		$this->form_validation->set_rules('kab', 'Kab', 'required', [
			'required' => 'Kolom Kab/Kota wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Lat', 'required', [
			'required' => 'Kolom Latitude wajib diisi'
		]);
		$this->form_validation->set_rules('lng', 'Lng', 'required', [
			'required' => 'Kolom Longitude wajib diisi'
		]);
		$this->form_validation->set_rules('elevasi', 'Elevasi', 'required', [
			'required' => 'Kolom Elevasi wajib diisi'
		]);
		
    
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editlokasi', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {
            $this->lokasi_model->set_lokasi($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil Edit Lokasi</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'lokasi');
        }
    }


    public function tambah()
    {
       
        $data['title'] = 'Tambah Lokasi';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		
		$this->form_validation->set_rules('id_sta', 'Id_sta', 'required', [
			'required' => 'Kolom Nama Stasiun wajib diisi'
		]);
		$this->form_validation->set_rules('nama_sta', 'Sta', 'required', [
			'required' => 'Kolom Nama Stasiun wajib diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Kolom Alamat wajib diisi'
		]);
		$this->form_validation->set_rules('kab', 'Kab', 'required', [
			'required' => 'Kolom Kab/Kota wajib diisi'
		]);
		$this->form_validation->set_rules('prov', 'Prov', 'required', [
			'required' => 'Kolom Prov wajib diisi'
		]);
		$this->form_validation->set_rules('lat', 'Lat', 'required', [
			'required' => 'Kolom Latitude wajib diisi'
		]);
		$this->form_validation->set_rules('lng', 'Lng', 'required', [
			'required' => 'Kolom Longitude wajib diisi'
		]);
		$this->form_validation->set_rules('elevasi', 'Elevasi', 'required', [
			'required' => 'Kolom Elevasi wajib diisi'
		]);
		
    
		$data['list_provinsi'] = $this->lokasi_model->getProv();

		$prov_id = $this->input->post('prov_id');
		$data['list_kab'] = $this->Lokasi_model->fetch_kab($prov_id);
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambahlokasi_form', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {

        	$data = [
				
				'id_sta' => $this->input->post('id_sta'),
		        'nama_sta' => $this->input->post('nama_sta'),
				'alamat' => $this->input->post('alamat'),
		        'kab' => $this->input->post('kab'),
		        'lat' => $this->input->post('lat'),
		        'lng' => $this->input->post('lng'),
		        'elevasi'=> $this->input->post('elevasi')
		      
			];

			$this->db->insert('data_alat', $data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit data peralatan</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'lokasi');
        }
    }




    
    public function delete()
    {	$this->load->model('lokasi_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data peralatan </div>');
        redirect( base_url() . 'lokasi'); 
        }
                
        $a = $this->alat_model->get_alat_by_id($id);
        
        $this->alat_model->delete_alat($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data lokasi</div>');
        redirect( base_url() . 'lokasi');        
    }


}