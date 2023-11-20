<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
    public $table = 'usuarios';
    public $table_id = 'id_usuario';
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Usuarios');
        $this->load->database();
    }

    public function selectAllUsuarios(){
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }


}
