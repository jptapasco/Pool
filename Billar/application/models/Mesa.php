<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Model
{
    public $table = 'mesa';
    public $table_id = 'id_mesa';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function borrar($id)
    {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
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
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data)      
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id,$data)
    {
        $allowed_keys = ['id_mesa', 'tipo', 'created_at'];
        $filtered_data = array_intersect_key($data, array_flip($allowed_keys));

        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $filtered_data);
    }

    public function obtenerMesa($id_mesa)
    {
        $this->db->select('id_mesa, tipo');
        $this->db->from('mesa');
        $this->db->where('id_mesa', $id_mesa);
        $query = $this->db->get();
        return $query->row();
    }
}