<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('Userbarang');
        $this->load->model('User_model');
        $this->load->library('form_validation');

    }

    public function index()
    {
        
    	$data ['barang'] = $this->Userbarang->engat_usertable('id_user');
    	$this->load->view('user/usertable', $data);
    }
    public function homepage(){
        $data ['barang'] = $this->User_model->engat_admintable();
        $this->load->view('user/homepage', $data);
    }
    public function home(){
        $data ['barang'] = $this->User_model->engat_admintable();
        $this->load->view('user/baranghome', $data);
    }

    public function delete($delete_id){
    	$data = $this->Userbarang->idbarang($delete_id);
    	$this->Userbarang->delete_userbarang($delete_id, $data);
    	redirect(site_url('user'));
    }

    public function usertambah(){
        $data = array(
            'button' => 'tambah',
            'action' => site_url('user/aksiusertambah'),
            'id_barang' => set_value('id_barang'),
            'id_user' => set_value('id_user'),
            'nama_barang' => set_value('nama_barang'),
            'jenis_barang' => set_value('jenis_barang'),
            'stok' => set_value('stok'),
            'foto' => set_value('f'),
            'harga' => set_value('harga'),
        );
        $this->load->view('user/adminform', $data);
    }

    public function aksiusertambah() 
    {
        $this->_rules();
            $config['upload_path'] = './assets/upload/barang/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size']     = '10240';
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
           
        if (!$this->upload->do_upload('f')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            // $fo = $this->upload->data('f');
            // $fo = $_FILES['f']['name'];
                $data = array(
                    'id_user' => $this->input->post('i',TRUE),
                    'nama_barang' => $this->input->post('nama_barang',TRUE),
                    'jenis_barang' => $this->input->post('jenis_barang',TRUE),
                    'stok' => $this->input->post('stok',TRUE),
                    'foto' => $this->upload->data('file_name'),
                    'harga' => $this->input->post('harga',TRUE),
                );


                $this->Userbarang->tambah_userbarang($data, 'barang');
                $this->session->set_flashdata('message', 'tambah data sukses');
                redirect(site_url('user'));
        }
    }

    public function userubah($id_barang) 
    {
        $row = $this->Userbarang->idbarang($id_barang);
        
        if ($row) {
            $data = array(
                'button' => 'ubah',
                'action' => site_url('user/aksiuserubah'),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'id_user' => set_value('id_user', $row->id_user),
                'nama_barang' => set_value('nama_barang', $row->nama_barang),
                'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
                'stok' => set_value('stok', $row->stok),
                'foto' => set_value('f', $row->foto),
                'harga' => set_value('harga', $row->harga),
            );
            $this->load->view('user/adminform', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function aksiuserubah() 
    {
        $this->_rules();

        $config['upload_path'] = './assets/upload/barang/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['max_size']     = '10240';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('f')){
            $error = $this->upload->display_errors();
            print_r($error);
        }else{
        

        if ($this->form_validation->run() == TRUE) {
            $this->userubah($this->input->post('id_barang', TRUE));
        } else {
            
            $data = array(
                'id_user' => $this->input->post('i',TRUE),
                'nama_barang' => $this->input->post('nama_barang',TRUE),
                'jenis_barang' => $this->input->post('jenis_barang',TRUE),
                'stok' => $this->input->post('stok',TRUE),                
                'foto' => $this->upload->data('file_name'),
                'harga' => $this->input->post('harga',TRUE),
            );

            $this->Userbarang->user_ubahbarang($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
            }    
        }
    }





    
    public function _rules() 
    {
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
        $this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        // $this->form_validation->set_rules('foto', 'f', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'trim');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}
    
    


