<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function manajemen ()
	{
		$data['title'] = 'Manajemen Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Menu_model', 'menu');
		
		// KIRIM DATA KE manajemen.php
		// $data['subMenu'] = $this->db->get('user_sub_menu') -> result_array();

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();



		$this->form_validation->set_rules('title', 'Title', 'required', [
			'required' => 'Nama submenu wajib diisi'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', [
			'required' => 'Menu submenu wajib diisi'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required', [
			'required' => 'URL submenu wajib diisi'
		]);
		$this->form_validation->set_rules('icon', 'Icon', 'required', [
			'required' => 'Icon submenu wajib diisi'
		]);


		if ($this->form_validation->run() == false ) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/manajemen', $data);
		$this->load->view('templates/footer', $data);
		} else{
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');

			$data = [
				'title' => $title,
				'menu_id' => $menu_id,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $is_active

			];
			
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil menambahkan submenu baru</div>');
			redirect('admin/manajemen');
		}
	}



	public function edit()
    {	
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Menu_model');
        $data['title'] = 'Edit Menu';        
        $data['m'] = $this->menu_model->get_news_by_id($id);
        
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/p', $data);
			$this->load->view('templates/footer', $data);
 
        }
        else
        {
            $this->menu_model->set_news($id);
            //$this->load->view('news/success');
            redirect( base_url() . 'index.php/news');
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
	


	public function role ()
	{
		$data['title'] = 'Level Akses';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		
		$data['role'] = $this->db->get('user_role') -> result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer', $data);
	}



	public function roleAccess ($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id]) -> row_array();

		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/roleaccess', $data);
		$this->load->view('templates/footer', $data);
	}



	public function changeAccess ()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id

		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Akses berhasil diubah!</div>');
   
	}

}