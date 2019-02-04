<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'barang';
    public $tableuser = 'user';
    public $id_barang = 'id_barang';
    public $id_user = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }



    //admin barang

    function idbarang($id_b)
    {
        $this->db->where($this->id_barang, $id_b);
        return $this->db->get($this->table)->row();
    }

    public function engat_admintable( $aa = array()){
        $this->db->query('SELECT * FROM barang');
        return $this->db->get($this->table)->result();
    }

    public function deleteadmintable($id_b){
    	$this->db->where($this->id_barang, $id_b);
    	$this->db->delete($this->table);
    }

    public function tambahadmintable($data)
    {
        $this->db->insert($this->table, $data);
    }

    function adminubah($id_barang, $data)
    {
        $this->db->where($this->id_barang, $id_barang);
        $this->db->update($this->table, $data);
    }





    //admin user

    function iduser($id_u)
    {
        $this->db->where($this->id_user, $id_u);
        return $this->db->get($this->tableuser)->row();
    }
    public function engat_usertable(){
        $this->db->query('SELECT * FROM user');
        return $this->db->get($this->tableuser)->result();
    }

    public function deleteusertable($id_u){
    	$this->db->where($this->id_user, $id_u);
    	$this->db->delete($this->tableuser);
    }
    public function tambahuser($datauser){
        $this->db->insert($this->tableuser, $datauser);
    }
    function userubah($id_user, $data)
    {
        $this->db->where($this->id_user, $id_user);
        $this->db->update($this->tableuser, $data);
    }



}



?>