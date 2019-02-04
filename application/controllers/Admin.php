<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

    }

    

        //tampilan admin barang


        public function index()
        {   
            $data ['barang1'] = $this->User_model->engat_admintable();
            $this->load->view('admin/admintable', $data);
        }

        public function delete($delete_id){
            $data = $this->User_model->idbarang($delete_id);
            $this->User_model->deleteadmintable($delete_id);
            redirect(site_url('admin'));
        }

        public function admintambah(){
            $data = array(
                'button' => 'tambah',
                'action' => site_url('admin/aksiadmintambah'),
                'id_barang' => set_value('id_barang'),
                'id_user' => set_value('id_user'),
                'nama_barang' => set_value('nama_barang'),
                'jenis_barang' => set_value('jenis_barang'),
                'stok' => set_value('stok'),
                'foto' => set_value('f'),
                'harga' => set_value('harga'),
            );
            $this->load->view('admin/adminform', $data);
        }

        public function aksiadmintambah() 
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


                    $this->User_model->tambahadmintable($data, 'barang');
                    $this->session->set_flashdata('message', 'tambah data sukses');
                    
                    redirect(site_url('admin'));
            }
        }

        public function adminubah($id_barang) 
        {
            $row = $this->User_model->idbarang($id_barang);

            if ($row) {
                $data = array(
                    'button' => 'ubah',
                    'action' => site_url('admin/aksiadminubah'),
                    'id_barang' => set_value('id_barang', $row->id_barang),
                    'id_user' => set_value('id_user', $row->id_user),
                    'nama_barang' => set_value('nama_barang', $row->nama_barang),
                    'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
                    'stok' => set_value('stok', $row->stok),
                    'foto' => set_value('f', $row->foto),
                    'harga' => set_value('harga', $row->harga),
                );
                $this->load->view('admin/adminform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('admin'));
            }
        }
        
        public function aksiadminubah() 
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
                $this->adminubah($this->input->post('id_barang', TRUE));
            } else {
                
                $data = array(
                    'id_user' => $this->input->post('i',TRUE),
                    'nama_barang' => $this->input->post('nama_barang',TRUE),
                    'jenis_barang' => $this->input->post('jenis_barang',TRUE),
                    'stok' => $this->input->post('stok',TRUE),                
                    'foto' => $this->upload->data('file_name'),
                    'harga' => $this->input->post('harga',TRUE),
                );

                $this->User_model->adminubah($this->input->post('id_barang', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('admin'));
                }    
            }
        }









    //tampilan admin user

        

        public function user()
        {
            $data ['user1'] = $this->User_model->engat_usertable();
            $this->load->view('admin/adminusertable', $data);
        }

        public function deleteuser($delete_iduser){
            $data = $this->User_model->iduser($delete_iduser);
            $this->User_model->deleteusertable($delete_iduser);
            redirect(site_url('admin/user'));
        }

        public function usertambah(){

            $data = array(
                'button' => 'tambah',
                'action1' => site_url('admin/aksiusertambah'),
                'id_user' => set_value('id_user'),
                'group' => set_value('group'),
                'nama_user' => set_value('nama_user'),
                'alamat_user' => set_value('alamat_user'),
                'no_hp' => set_value('no_hp'),
                'username' => set_value('username'),
                'password' => set_value('password'),
                'foto' => set_value('f'),

            );
            $this->load->view('admin/adminuserform', $data);
        }

        public function aksiusertambah() 
        {
            $this->_rules();

            $config['upload_path'] = './assets/upload/user/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size']     = '10240';
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('f')) {
                $error = $this->upload->display_errors();
                print_r($error);
            } else {
                // $fo = $this->upload->data('f');
                // $fo = $_FILES['f']['name'];
                $data = array(
                    'id_user' => $this->input->post('i', TRUE),
                    'group' => $this->input->post('group', TRUE),
                    'nama_user' => $this->input->post('nama_user', TRUE),
                    'alamat_user' => $this->input->post('alamat_user', TRUE),
                    'no_hp' => $this->input->post('no_hp', TRUE),
                    'username' => $this->input->post('username', TRUE),
                    'password' => $this->input->post('password', TRUE),
                    'foto' => $this->upload->data('file_name'),
                );

                $this->User_model->tambahuser($data, 'user');
                $this->session->set_flashdata('message', 'tambah data sukses');
                redirect(site_url('admin/user'));
                
            }
        }

        public function userubah($id_user) 
        {
            $row = $this->User_model->iduser($id_user);

            if ($row) {
                $data = array(
                    'button' => 'ubah',
                    'action1' => site_url('admin/aksiuserubah'),
                    'id_user' => set_value('id_u', $row->id_user),
                    'group' => set_value('group', $row->group),
                    'nama_user' => set_value('nama_user', $row->nama_user),
                    'alamat_user' => set_value('alamat_user', $row->alamat_user),
                    'no_hp' => set_value('no_hp', $row->no_hp),
                    'username' => set_value('username', $row->username),
                    'password' => set_value('password', $row->password),
                    
                    'foto' => set_value('f', $row->foto),
                );
                $this->load->view('admin/adminuserform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('admin/user'));
            }
        }
        
        public function aksiuserubah() 
        {
            $this->_rules();

            $config['upload_path'] = './assets/upload/user/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size']     = 10240;
            
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            

            if (!$this->upload->do_upload('f')) {
                $error = $this->upload->display_errors();
                // menampilkan pesan error
                print_r($error);
            } else {
                // $fo = $this->upload->data('f');

                if ($this->form_validation->run() == TRUE) {
                    $this->userubah($this->input->post('id_user', TRUE));
                } else {
                    $data = array(
                        'group' => $this->input->post('group'),
                        'nama_user' => $this->input->post('nama_user'),
                        'alamat_user' => $this->input->post('alamat_user'),
                        'no_hp' => $this->input->post('no_hp'),
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                        'foto' => $this->upload->data('file_name'),
                    );

                $this->User_model->userubah($this->input->post('id_user', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('admin/user'));
                }

            }
        }




        
        public function _rules() 
        {
            $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
            $this->form_validation->set_rules('group', 'group', 'trim|required');
            $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
            $this->form_validation->set_rules('alamat_user', 'alamat_user', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim');
            // $this->form_validation->set_rules('foto', 'foto', 'trim|required');

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
    
    


