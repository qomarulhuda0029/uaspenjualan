<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redirect extends CI_Controller {

    public function index(){
        if ($this->session->userdata('group') =='1') {
            redirect(site_url('admin'));
        }else if($this->session->userdata('group')=='2'){
            redirect(site_url('user'));
        }else{
            redirect(site_url('home'));
        };
    }
}


?>