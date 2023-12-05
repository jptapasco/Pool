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

    public function find($id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id,$id);

        $query = $this->db->get();
        return $query->row();
    }

    public function lista()
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

    public function update($id,$data)
    {
        $this->db->where($this->table_id,$id);
        $this->db->update($this->table,$data);
    }

}
