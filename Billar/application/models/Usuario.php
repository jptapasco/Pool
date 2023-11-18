<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Model
{

    public $table = 'usuarios';
    public $table_id = 'id_usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }

    public function index()
    {
    }

    public function guardar()
    {
    }

    public function borrar()
    {
    }

    public function editar()
    {
    }

    function lista()
    {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

}
