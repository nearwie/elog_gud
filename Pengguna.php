<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

	}


	public function index ()
	{
		$data['title'] = 'Data Pengguna';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Pengguna_model');

		
		// $data['users'] = $this->db->get('user') -> result_array();

        
        $data['users'] = $this->pengguna_model->getUserRecords();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/pengguna', $data);
		$this->load->view('templates/footer', $data);
	}

	


    public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('pengguna');
        }
        
        $this->load->helper('url');
      
        $this->load->model('Pengguna_model');
        $data['title'] = 'Edit Pengguna';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->library('form_validation');
        $data['users'] = $this->db->get('user') -> result_array();

        $data['u'] = $this->pengguna_model->get_pengguna_by_id($id);

         $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Role wajib diisi' ]);
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editpengguna', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {
            $this->pengguna_model->set_pengguna($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit pengguna</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'pengguna');
        }
    }



    
    public function delete()
    {	$this->load->model('Pengguna_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus </div>');
        redirect( base_url() . 'pengguna'); 
        }
                
        $u = $this->pengguna_model->get_pengguna_by_id($id);
        
        $this->pengguna_model->delete_pengguna($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus </div>');
        redirect( base_url() . 'pengguna');        
    }

}