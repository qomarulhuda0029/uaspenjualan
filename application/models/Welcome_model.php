<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
	public $table = 'user';
    public $id_user = 'id_user';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

	// public function check_credential(){
	// 	$username = set_value('username');
	// 	$password = set_value('password');
	// 	$hasil =$this->db->select('id_user')
	// 					->where('username', $username)
	// 					->where('password', $password)
	// 					->limit(1)
	// 					->get('user');

	// 	if ($hasil->num_rows() > 0 ) {
	// 		return $hasil->row();
	// 	}else{
	// 		return array();
	// 	}
	// }

	public function test($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$hasil = $this->db->get('user', 1);

		return $hasil;

	}
	



}