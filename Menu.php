<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function index ()
	{
		$data['title'] = 'Menu Manajemen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

		// QUERY MENU
		$data['menu'] = $this->db->get('user_menu') -> result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create ()
	{
		$this->form_validation->set_rules('menu', '	Menu', 'required');
		if ($this->form_validation->run() == false ) {
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer', $data);
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]) ;
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil tambah menu baru</div>');
	 				redirect('menu/index');

		}
	}



		public function delete()
    {	$this->load->model('Menu_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus menu</div>');
        redirect( base_url() . 'menu'); 
        }
                
        $news_item = $this->menu_model->get_news_by_id($id);
        
        $this->menu_model->delete_news($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus menu</div>');
        redirect( base_url() . 'menu');        
    }



	public function edit()
    { $this->load->model('Menu_model');

        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
               
        $data['menu'] = $this->menu_model->get_news_by_id($id);
        
        $this->form_validation->set_rules('menu', 'Menu', 'required', [
			'required' => 'Nama submenu wajib diisi'
		]);
		
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu', $data);
			$this->load->view('templates/footer', $data);
	 
        }
        else
        {
            $this->menu_model->set_menu($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit menu</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'menu');
        }
    }
		
 
}