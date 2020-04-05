<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Alat_model');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Data Peralatan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Alat_model');
        
        
        $data['alats'] = $this->alat_model->getUserRecords();
		// $data['gejalas'] = $this->db->get('gejala') -> result_array();
		
		$this->form_validation->set_rules('nama_alat', 'Alat', 'required', [
			'required' => 'Kolom Nama Peralatan wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'Merk', 'required', [
			'required' => 'Kolom Merk/Type wajib diisi'
		]);
		$this->form_validation->set_rules('sn', 'Sn', 'required', [
			'required' => 'Kolom SN wajib diisi'
		]);
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', [
			'required' => 'Kolom Lokasi wajib diisi'
		]);
		$this->form_validation->set_rules('rentang', 'Rentang', 'required', [
			'required' => 'Kolom Rentang wajib diisi'
		]);
		$this->form_validation->set_rules('resolusi', 'Resolusi', 'required', [
			'required' => 'Kolom Resolusi wajib diisi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'Kolom keterangan wajib diisi'
		]);
		

		if ($this->form_validation->run() == false ) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/alat', $data);
		$this->load->view('templates/footer', $data);
		} else{
			$data = [
				
				'nama_alat' => $this->input->post('nama_alat'),
		        'merk' => $this->input->post('merk'),
		        'sn' => $this->input->post('sn'),
		        'lokasi'=> $this->input->post('lokasi'),
		        'rentang' => $this->input->post('rentang'),
		        'resolusi' => $this->input->post('resolusi'),
		        'keterangan' => $this->input->post('keterangan')
		      
			];

			$this->db->insert('data_alat', $data);
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil menambahkan data peralatan baru</div>');
			redirect('alat');
		}

	}


	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('alat');
        }
        
        $this->load->helper('url');
      
        
        $data['title'] = 'Edit Alat';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$data['alats'] = $this->db->get('data_alat')->result_array();
		$this->load->model('Alat_model');
        
        $data['a'] = $this->Alat_model->get_alat_by_id($id);

  
		$this->form_validation->set_rules('nama_alat', 'Alat', 'required', [
			'required' => 'Kolom Nama Peralatan wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'Merk', 'required', [
			'required' => 'Kolom Merk/Type wajib diisi'
		]);
		$this->form_validation->set_rules('sn', 'Sn', 'required', [
			'required' => 'Kolom SN wajib diisi'
		]);
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', [
			'required' => 'Kolom Lokasi wajib diisi'
		]);
		$this->form_validation->set_rules('rentang', 'Rentang', 'required', [
			'required' => 'Kolom Rentang wajib diisi'
		]);
		$this->form_validation->set_rules('resolusi', 'Resolusi', 'required', [
			'required' => 'Kolom Resolusi wajib diisi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'Kolom keterangan wajib diisi'
		]);
    
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editalat', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {
            $this->alat_model->set_alat($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit data peralatan</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'alat');
        }
    }


    public function tambah()
    {
       
        $data['title'] = 'Tambah Alat';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		

  
		$this->form_validation->set_rules('nama_alat', 'Alat', 'required', [
			'required' => 'Kolom Nama Peralatan wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'Merk', 'required', [
			'required' => 'Kolom Merk/Type wajib diisi'
		]);
		$this->form_validation->set_rules('sn', 'Sn', 'required', [
			'required' => 'Kolom SN wajib diisi'
		]);
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', [
			'required' => 'Kolom Lokasi wajib diisi'
		]);
		$this->form_validation->set_rules('rentang', 'Rentang', 'required', [
			'required' => 'Kolom Rentang wajib diisi'
		]);
		$this->form_validation->set_rules('resolusi', 'Resolusi', 'required', [
			'required' => 'Kolom Resolusi wajib diisi'
		]);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
			'required' => 'Kolom Keterangan wajib diisi'
		]);
    
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambahalat', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {

        	$data = [
				
				'nama_alat' => $this->input->post('nama_alat'),
		        'merk' => $this->input->post('merk'),
		        'sn' => $this->input->post('sn'),
		        'lokasi'=> $this->input->post('lokasi'),
		        'rentang' => $this->input->post('rentang'),
		        'resolusi' => $this->input->post('resolusi'),
		        'keterangan' => $this->input->post('keterangan')
		      
			];

			$this->db->insert('data_alat', $data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil tambah data peralatan</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'alat');
        }
    }




    
    public function delete()
    {	$this->load->model('Alat_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data peralatan </div>');
        redirect( base_url() . 'alat'); 
        }
                
        $a = $this->alat_model->get_alat_by_id($id);
        
        $this->alat_model->delete_alat($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data peralatan </div>');
        redirect( base_url() . 'alat');        
    }


}