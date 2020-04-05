<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

	}


	public function index()
	{
		$data['title'] = 'Entry Data Pengecekan Alat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$user_id = $this->session->userdata('id');
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();
		 $this->load->model(array('Alat_model', 'Kerusakan_model', 'Aturan_model'));

		if (!$this->input->post('data_alat')) {
			$data['contentuser'] = 'user/entry'; //nama file yang akan jadSi kontent di template
			$data['listAlat'] = $this->Alat_model->get_alatt_by_id();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/entry', $data);
			$this->load->view('templates/footer', $data);
		}else{
			
			$this->db->insert('hasil_konsul', $data_hasil);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/hslkonsul', $data);
			$this->load->view('templates/footer', $data);
		}
	}


	public function riwayat(){

		$data['title'] = 'Riwayat Diagnosa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$user = $this->session->userdata('email');
		$this->load->library('session');

		$this->load->model(array('History_model'));


		$id = $this->session->userdata('id');
		
		$data['listHistory'] = $this->History_model->listHistory($id);
		$data['listHasil'] = $this->History_model->listHasil($id);

		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/riwayat', $data);
		$this->load->view('templates/footer', $data);
	}

	public function createPdf(){
		
	
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$user = $this->session->userdata('email');
		$this->load->library('session');

		$this->load->model(array('History_model'));


		$id = $this->session->userdata('id');
		
		$data['listHistory'] = $this->History_model->listHistory($id);
		$data['listHasil'] = $this->History_model->listHasil($id);

		$this->load->library('pdf');
        $this->pdf->load_view('report/laporankonsul',$data);

	}
	



	
}