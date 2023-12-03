<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Model
{
    public $table = 'productos';
    public $table_id = 'id_producto';

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
        $allowed_keys = ['nombre', 'categoria', 'unidad_medida', 'cantidad', 'punto_reorden', 'precio_compra', 'valor_venta', 'created_at', 'observaciones'];
        $filtered_data = array_intersect_key($data, array_flip($allowed_keys));

        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $filtered_data);
    }

    public function obtenerProducto($idProducto)
    {
        $this->db->select('nombre, categoria');
        $this->db->from('productos');
        $this->db->where('id_producto', $idProducto);
        $query = $this->db->get();
        return $query->row();
    }

    public function obtenerProductoPorCategoria($categoriaElegida)
    {
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->where('categoria',$categoriaElegida);
        $query = $this->db->get();

        return $query->result();
    }
}