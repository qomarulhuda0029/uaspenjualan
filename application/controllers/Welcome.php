<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Welcome_model');
        $this->load->model('Userbarang');
        $this->load->library('form_validation');
    }



   
    public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

		if ($this->form_validation->run()== FALSE) {
			# code...
			// echo "gagal";
			$this->load->view('header/login');
		}else{
			$this->load->model('Welcome_model');
			$valid_user = $this->Welcome_model->check_credential();

			if ($valid_user == FALSE) {
				# code...
				$this->session->set_flashdata('error', 'username / password salaq !');
				redirect(base_url());
			}else{
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group);
				$this->session->set_userdata('id_user', $valid_user->id_user);

				switch ($valid_user->group) {
					case 1: //admin
						redirect('admin');
						break;
					case 2:
						redirect(base_url('aa'));
						break;
					case 3 :
						redirect('header/login');
					
					default: break;
				}

			}
		}
	}


	public function login(){
	

	$this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
	$this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

		if ($this->form_validation->run()== FALSE) {
			
			$this->load->view('header/login');
		}else{

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$ambil = $this->Welcome_model->test($username, $password);

		if($ambil->num_rows() > 0){
			$data = $ambil->row_array();
			$id_user = $data['id_user'];
			$nama_user = $data['nama_user'];
			$username = $data['username'];
			$group = $data['group'];

			if ($ambil) {
				
				$sess_data = array(
					'id_user'=> $id_user,
					'nama_user' => $nama_user,
					'username' => $username,
					'group' => $group,

				);
				$this->session->set_userdata($sess_data);
				redirect('redirect');
			} else{
				redirect ('header/login');
			}
		}else{
			$this->load->view('header/login');
		}

	}

	}

	public function cart(){
		$data = array(
			'button' => site_url('welcome/add_to_cart'),
			'id_keranjang' => set_value('id_keranjang'),
			'id_barang' => set_value('id_barang'),
			'nama_barang' => set_value('nama_barang'),
			'harga' => set_value('harga'),
		);
	}

	public function add_to_cart($id_barang){
		$data = array(
			'id_barang' => $this->input->post('id_barang', TRUE),
			'nama_barang' =>$this->input->post('nama_barang', TRUE),
			'harga' => $this->input->post('harga', TRUE),
			
		);
		$this->Userbarang->keranjang($data, 'keranjang');
		redirect('user/homepage');
	}


	public function keranjang(){
		$this->load->view('user/keranjang');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}






	
}