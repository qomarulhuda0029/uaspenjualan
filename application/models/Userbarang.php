<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userbarang extends CI_Model
{

    public $tablebarang = 'barang';
    public $tablekeranjang ='keranjang';
    public $id_barang = 'id_barang';
    public $user = 'id_user';
    public $group = 'group';

    function __construct()
    {
        parent::__construct();
    }



    //admin barang

    function idbarang($id_b)
    {
        $this->db->where($this->id_barang, $id_b);
        return $this->db->get($this->tablebarang)->row();
        // $this->db->query('SELECT * FROM barang');
        // return $this->db->get($this->tablebarang)->row();
    }

    public function engat_usertable($id_user){
        // $this->db->order_by($this->id_barang, $this->user);
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get($this->tablebarang)->result();
    }

    public function delete_userbarang($id_b){
    	$this->db->where($this->id_barang, $id_b);
        $this->db->delete($this->tablebarang);
        
    }

    public function tambah_userbarang($data)
    {
        $this->db->insert($this->tablebarang, $data);
    }

    function user_ubahbarang($id_barang, $data)
    {
        $this->db->where($this->id_barang, $id_barang);
        $this->db->update($this->tablebarang, $data);
    }



    function keranjang($data){
        $this->db->insert($this->tablekeranjang, $data);
    }
}



?>