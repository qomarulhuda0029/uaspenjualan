<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data ['user1'] = $this->User_model->engat_usertable();
        $this->load->view('home/', $data);
    }


    public function usertambah(){

        $data = array(
            'button' => 'tambah',
            'actiondaftar' => site_url('home/aksiusertambah'),
            'id_user' => set_value('id_user'),
            'group' => set_value('group'),
            'nama_user' => set_value('nama_user'),
            'alamat_user' => set_value('alamat_user'),
            'no_hp' => set_value('no_hp'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'foto' => set_value('f'),

        );
        $this->load->view('home/daftar', $data);
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
            redirect(site_url('home/usertambah'));
            
        }
    }


    public function _rules(){
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('group', 'group', 'trim|required');
        $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
        $this->form_validation->set_rules('alamat_user', 'alamat_user', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim');
    }
}